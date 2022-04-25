<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\user;
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
            $user = User::where('email', '=', $request->email)->first();
            $user->remember_token =  $loginToken;
            $user->token_expire_time = date('Y-m-d H:i:s', time() + 10 * 60);
            $user->save();
            $response = array(
                "permission" => $user->permission,
                "token" => $user->remember_token,
                "expire_time" => $user->token_expire_time);
            $httpstatus = 200;
        } else {
            //user not exist or input infomation error
            $response = "login error";
            $httpstatus = 400;
        }
        return response()->json(['message' => $response], $httpstatus);
    }

    public function register(Request $request)
    {
        $registrations = new user();
        $registrations->email = '000@example.com';
        $registrations->name = 'root';
        $registrations->password = Hash::make('root');
        $registrations->phone = '0987654321';
        $registrations->permission = 0;
        $registrations->save();
        // DB::table('users')->insert([
        //     'email' => '000@example.com',
        //     'name' => 'root',
        //     'password' => Hash::make('root'),
        //     'phone' => '0987654321',
        //     'permission' => 0,
        // ]);
        return user::get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return user::get();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request['id'] == NULL || $request['email'] == NULL || $request['name'] == NULL || $request['cardId'] == NULL || $request['phone'] == NULL) {
            return response("error", 400);
        } else {
            if (preg_match("/^8869\d{8}$/", $request['phone'])) {
                $request['phone'] = "0" . ltrim($request['phone'], "886");
            }

            if (!preg_match("/^09\d{8}$/", $request['phone'])) {
                return response("error", 400);
            } elseif (!preg_match("/^[\w!\#$%&'*+\-\/=?^_`{|}~]+(\.[\w!#$%&'*+\-\/=?^_`{|}~]+)*@[\w\-]+(\.[\w\-]+)+$/", $request['email'])) {
                return response("error", 400);
            } elseif (strlen($request['name'])>40){
                return response("error", 400);
            }else {
                $user = user::where('id', '=', $request['id']);
                if ($user->first() == NULL) {
                    return response("error", 400);
                } else {
                    $user->update([
                        'email' => $request['email'],
                        'name' => $request['name'],
                        'cardId' => $request['cardId'],
                        'phone' => $request['phone']
                    ]);
                    return response($user->first(['id','name','email','phone','cardId']), 200);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
}
