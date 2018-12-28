<?php
namespace App\Composers;

use Illuminate\View\View;

use App\Models\Cart;
use Auth;

class CartComposers {

    protected $carts;

    public function __construct()
    {
        if (Auth::guest()) {
            $session_id = app('request')->session()->getId();
            $carts = Cart::where('session_id', $session_id)->get();
        }

        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }

        $this->carts = $carts;
    }

    public function compose(View $view)
    {
        $view->with('carts', $this->carts);
    }

}