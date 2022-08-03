<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$type)
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }
        $user = $request->user();
        //dd($user);
        //dd($user['attributes']);
        //dd($user->where('type', "=", "admin")->first());
        // if ($user->where('type', "admin")) {
        /*2
        if ($user->where('type', "=", "admin")->first()) {
            return $next($request);
        } else {
            abort(403, "you not Admin");
        }*/
        if (!in_array($user->type, $type)) {
            abort(403, "you not Admin");
        } else {
            return $next($request);
        }
    }
}
