<?php

namespace App\Http\Middleware;

use Closure, Auth;

use App\Models\Cart;

class CheckCartEmpty
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
            return redirect()
            ->route('home', ['redirect' => route('carts.checkout')]);
        }

        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }

        if ($carts->count() > 0) {
            return $next($request);
        }
        return redirect()
            ->route('home')
            ->withErrors(['error' => 'Không có sản phẩm nào trong giỏ hàng']);
    }
}
