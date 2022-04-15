<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = DB::table('users')->where('rememberToken', '=', $request->input('token'))->first();
        if ($user == NULL) {
            return response("", 400);
        } else {
            if (strtotime($user->token_expire_time) < time()) {
                return response("", 400);
            } else {
                return $next($request);
            }
        }
    }
}
