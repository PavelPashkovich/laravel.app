<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request) {

//
//        session()->flash('message', 1111);
//        dump(session());
//        session('count');
//        session()->forget('count');
//        $request->session()->push('test', 'some value');
//        $request->session()->put('testtest', 'some testtest value');
//        dd($request->session()->pull('test', '123'));
    }

    public  function addToCart(Request $request) {
        $productId = $request->get('product_id');
        $cart = session('cart', []);
        if(isset($cart[$productId])) {
            $cart[$productId] += 1;
        } else {
            $cart[$productId] = 1;
        }

//        dump($cart);
    }

}
