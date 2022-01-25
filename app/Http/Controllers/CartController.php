<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use function React\Promise\all;

class CartController extends Controller
{
    public function index(Request $request) {

//        $cookie = $request->cookie();
//        dump($cookie);

        $cart = Session::get('cart', []);
        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get();
        dump($products);

//        $response = new Response(view('welcome'));
//        return $response->withCookie(cookie('33333', 'eeeeee', 3));

//        $request->session()->push('session_name', 'session_value'); // загрузить строковые данные в сессию
//        dump($request->session()->all()); // получить данные из сессии
//        $request->session()->push('session_name.another_name.one_more_name', 'one_more_session_value'); // загрузить вложенные данные в сессию
//        dump($request->session()->get('session_name.another_name', 'default')); // получить вложенные данные из сессии, если их нет - значение по умолчанию
//        $request->session()->put('test', [1,2,3,4,5]); // добавляет любые данные (строку, массив)
//        $request->session()->pull('test', [1,2,3,4,5]); // достает элемент по ключу и сразу его убивает
//        dump($request->session()->all());
//        $request->session()->increment('count');
//        dump($request->session()->get('count'));
//        dump($request->session()->has('count')); // проверяет наличие элемента в сессии
//        dump($request->session()->exists('count')); // проверяет наличие элемента в сессии  и может быть null
//        dump(session()->exists('count')); // все то же делается через глобальный помощник session
//        session()->flash('message', 'hello'); // добавляет данные в сессию до следующего http запроса, затем удаляет
//        session()->forget('count'); // удаляет элемент из сессии
//        session()->flush(); // очищает сессию
//        Session::all(); // работа с сессиями через фасад Sessions
//        dump(Session::all());
    }

    public  function addToCart(Request $request) {

//        dump($request->all());

//        $productId = $request->get('product_id');
//        $cart = session('cart', []);
//        if(isset($cart[$productId])) {
//            $cart[$productId] += 1;
//        } else {
//            $cart[$productId] = 1;
//        }
//
//        session([
//            'cart' => $cart,
//        ]);
//
//        dump($cart);

        $productId = $request->get('product_id');
        Session::increment('cart.'.$productId);
        return redirect()->to(route('cart'));
    }

}
