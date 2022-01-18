<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WishListController extends Controller
{
    public function index() {
        $wishList = Session::get('wishlist', []);
        $productIds = array_keys($wishList);
        $products = Product::whereIn('id', $productIds);
        dump($products);
    }

    public function addToWishList(Request $request) {
        $productId = $request->get('product_id');
        Session::increment('wishlist.'.$productId);
        return redirect()->to(route('wishList'));
    }


}
