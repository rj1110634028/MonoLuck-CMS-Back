<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Locker;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Null_;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        //先確認user資訊是否正確
        if (Auth::attempt($credentials)) {
            do {
                //建立隨機亂碼
                $loginToken = Str::random(60);
                $checkTokenExist = User::where('remember_token', '=', $loginToken)
                    ->first();
            } while ($checkTokenExist);
            //建立token並寫入使用時間
            $user = User::where('email', '=', $request["email"])->first();
            $user->remember_token =  $loginToken;
            $user->token_expire_time = date('Y-m-d H:i:s', time() + 60 * 60);
            $user->save();
            $response = array(
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
        $user = User::where("remember_token", "$Token");
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
        try {
            $request->validate([
                'lockerNo' => 'required|exists:lockers',
                'email' => 'required|unique:users|email:rfc,dns|max:80',
                'name' => 'required|unique:users|max:40',
                'cardId' => 'required|unique:users|numeric|digits_between:0,20',
                'phone' => 'required|unique:users|numeric|digits_between:0,20',
            ]);
            $locker = Locker::where("lockerNo", "=", $request["lockerNo"]);
            if ($locker->first()->userId == null) {
                if (preg_match("/^09\d{8}$/", $request['phone'])) {
                    $request['phone'] = "886" . ltrim($request['phone'], "0");
                }
                try {
                    $newUser = new user();
                    $newUser->email = $request["email"];
                    $newUser->name = $request["name"];
                    $newUser->password = Hash::make($request["password"]);
                    $newUser->phone = $request["phone"];
                    $newUser->cardId = $request['cardId'];
                    $newUser->save();

                    $locker->update(["userId" => $newUser->id]);
                    return response("success", 200);
                } catch (\Exception $e) {
                    return response($e->getMessage(), 400);
                }
            } else return response("error", 400);
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }
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
    public function update(Request $request, $lockerNo)
    {
        if ($lockerNo == NULL) {
            return response("lockerNo error", 400);
        } else {
            $locker = Locker::where('lockerNo', '=', $lockerNo)->first();
            if ($locker == NULL) {
                return response("lockerNo not found", 400);
                $user = User::where('id', '=', $locker->userId);
                if ($user->first() != NULL) {
                    return response("user not found", 400);
                } else {
                    $email = [];
                    $name = [];
                    $cardId = [];
                    $phone = [];
                    $otheruser = User::where("id", "!=", $lockerNo)->get();
                    foreach ($otheruser as $v) {
                        array_push($email, $v->email);
                        array_push($name, $v->name);
                        array_push($cardId, $v->cardId);
                        array_push($phone, $v->phone);
                    }
                    if (preg_match("/^09\d{8}$/", $request['phone'])) {
                        $request['phone'] = "886" . ltrim($request['phone'], "0");
                    }
                    try {
                        $request->validate([
                            'email' => ['required', 'email:rfc,dns', 'max:80', Rule::notIn($email)],
                            'name' => ['required', 'max:40', Rule::notIn($name)],
                            'cardId' => ['required', 'numeric', 'digits_between:0,20', Rule::notIn($cardId)],
                            'phone' => ['required', 'numeric', 'digits_between:0,20', Rule::notIn($phone)],
                        ]);
                        $user->update([
                            'email' => $request['email'],
                            'name' => $request['name'],
                            'cardId' => $request['cardId'],
                            'phone' => $request['phone']
                        ]);
                        return response($user->first(['id', 'name', 'email', 'phone', 'cardId']), 200);
                    } catch (\Exception $e) {
                        return response($e->getMessage(), 400);
                    }
                }
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
