<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Locker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            $user->token_expire_time = date('Y-m-d H:i:s', time() + 10 * 60);
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
        if ($request["lockerNo"] != null && $request['email'] != NULL && $request['name'] != NULL && $request['cardId'] != NULL && $request['phone'] != NULL) {
            $locker = Locker::where("lockerNo", "=", $request["lockerNo"]);
            if ($locker->first() != null) {
                if ($locker->first()->userId == null) {
                    if (preg_match("/^09\d{8}$/", $request['phone'])) {
                        $request['phone'] = "886" . ltrim($request['phone'], "0");
                    }
        
                    if (!preg_match("/^[\w!\#$%&'*+\-\/=?^_`{|}~]+(\.[\w!#$%&'*+\-\/=?^_`{|}~]+)*@[\w\-]+(\.[\w\-]+)+$/", $request['email'])) {
                        return response("emailerror", 400);
                    } else {
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
                    }
                } else return response("error", 400);
            } else return response("lockNoerror", 400);
        } else return response("dataerror", 400);
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
        if ($id == NULL || $request['email'] == NULL || $request['name'] == NULL || $request['cardId'] == NULL || $request['phone'] == NULL) {
            return response("error", 400);
        } else {
            if (preg_match("/^09\d{8}$/", $request['phone'])) {
                $request['phone'] = "886" . ltrim($request['phone'], "0");
            }

            if (!preg_match("/^[\w!\#$%&'*+\-\/=?^_`{|}~]+(\.[\w!#$%&'*+\-\/=?^_`{|}~]+)*@[\w\-]+(\.[\w\-]+)+$/", $request['email'])) {
                return response("email error", 400);
            } elseif (strlen($request['name']) > 40) {
                return response("name error", 400);
            } else {
                $user = User::where('id', '=', $id);
                if ($user->first() == NULL) {
                    return response("id error", 400);
                } else {
                    try {
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
