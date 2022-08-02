<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Localization
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
        if ($request->header('X-localization') == null) {
            $local = config('app.faker_locale');
        } elseif (!in_array($request->header('X-localization'), config('app.available_locales'))) {
            $local = config('app.faker_locale');
        } else {
            $local = $request->header('X-localization');
        }
        app()->setLocale($local);
        return $next($request);
    }
}
