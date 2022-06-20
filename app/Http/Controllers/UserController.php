<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Locker;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function newAdmin(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'mail' => 'required|unique:users|email:rfc|max:80',
                // 'name' => 'required|unique:users|max:40',
                // 'password' => 'required',
                // 'confirm' => 'required'
            ],
            [],
            [
                'mail' => '電子信箱',
                // 'name' => '姓名',
                // 'password' => '密碼',
                // 'confirm' => '確認密碼'
            ]
        );
        if ($validator->fails()) {
            return  response($validator->errors(), 400);
        // }elseif($request->password != $request->confirm){
        //     return  response("密碼與確認密碼不一致 ", 400);
        }else {
            try {
                $newUser = new user();
                $newUser->mail = $request["mail"];
                $newUser->permission = 0;
                $newUser->save();
                return response("新增成功", 200);
            } catch (\Exception $e) {
                return response($e->getMessage(), 200);
            }
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('mail', 'password');

        //先確認user資訊是否正確
        if (Auth::attempt($credentials)) {
            do {
                //建立隨機亂碼
                $loginToken = Str::random(60);
                $checkTokenExist = User::where('remember_token', '=', $loginToken)
                    ->first();
            } while ($checkTokenExist);
            //建立token並寫入使用時間
            $user = User::where('mail', '=', $request["mail"])->first();
            $user->remember_token =  $loginToken;
            $user->token_expire_time = date('Y-m-d H:i:s', time() + 60 * 60);
            $user->save();
            $response = array(
                "name" => $user->name,
                "permission" => $user->permission,
                "token" => $user->remember_token,
                "expire_time" => $user->token_expire_time
            );
            $httpstatus = 200;
        } else {
            //user not exist or input infomation error
            $response = "login error";
            $httpstatus = 400;
        }
        return response()->json(['message' => $response], $httpstatus);
    }

    public function logout(Request $request)
    {
        $Token = $request->header('token');
        $user = User::where("remember_token", $Token);
        if ($user->first() == null) {
            return response("token not found", 400);
        } else {
            $user->update(["remember_token" => null, "token_expire_time" => null]);
            return response("success", 200);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (preg_match("/^09\d{8}$/", $request['phone'])) {
            $request['phone'] = "886" . ltrim($request['phone'], "0");
        }
        $validator = Validator::make(
            $request->all(),
            [
                'lockerNo' => 'required|exists:lockers',
                'mail' => 'required|unique:users|email:rfc|max:80',
                'name' => 'required|unique:users|max:40',
                'cardId' => 'required|unique:users|digits_between:0,20',
                'phone' => 'required|unique:users|digits_between:0,20',
            ],
            [],
            [
                'lockerNo' => '置物櫃編號',
                'mail' => '電子信箱',
                'name' => '姓名',
                'cardId' => '卡號',
                'phone' => '電話',
            ]
        );
        if ($validator->fails()) {
            return  response($validator->errors(), 400);
        }
        $locker = Locker::where("lockerNo", "=", $request["lockerNo"]);
        if ($locker->first()->userId == null) {
            try {
                $newUser = new user();
                $newUser->mail = $request["mail"];
                $newUser->name = $request["name"];
                $newUser->password = Hash::make($request["password"]);
                $newUser->phone = $request["phone"];
                $newUser->cardId = $request['cardId'];
                $newUser->save();

                $locker->update(["userId" => $newUser->id]);
                return response()->json(['id' => $newUser->id], 200);
            } catch (\Exception $e) {
                return response($e->getMessage(), 400);
            }
        } else return response("此置物櫃已被使用", 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (preg_match("/^09\d{8}$/", $request['phone'])) {
            $request['phone'] = "886" . ltrim($request['phone'], "0");
        }
        $validator = Validator::make(
            $request->all(),
            [
                'mail' => ['required', 'email:rfc', 'max:80', Rule::unique('users')->ignore($id)],
                'name' => ['required', 'max:40', Rule::unique('users')->ignore($id)],
                'cardId' => ['required', 'numeric', 'digits_between:6,20', Rule::unique('users')->ignore($id)],
                'phone' => ['required', 'numeric', 'digits_between:1,20', Rule::unique('users')->ignore($id)],
            ],
            [],
            [
                'mail' => '電子信箱',
                'name' => '姓名',
                'cardId' => '卡號',
                'phone' => '電話',
            ]
        );
        if ($validator->fails()) {
            return  response($validator->errors(), 400);
        }
        try {
            if ($id == NULL) {
                return response("id error", 400);
            } else {
                $user = User::where('id', $id);
                if ($user->first() == NULL) {
                    return response("id not found", 400);
                } else {
                    $user->update([
                        'mail' => $request['mail'],
                        'name' => $request['name'],
                        'cardId' => $request['cardId'],
                        'phone' => $request['phone']
                    ]);
                    return response($user->first(['id', 'name', 'mail', 'phone', 'cardId']), 200);
                }
            }
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        try {
            if ($id == NULL) {
                return response("id error", 400);
            } else {
                $user = User::where('id', $id);
                if ($user == NULL) {
                    return response("id not found", 400);
                } else {
                    $user->delete();
                    return response("success", 200);
                }
            }
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }
    }
}
