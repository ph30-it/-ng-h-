<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            return redirect()->intended('account')->with('status','Bạn phải đăng nhập mới được sử dụng chức năng Checkout!');
        }
        return $next($request);
    }
}
