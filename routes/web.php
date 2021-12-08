<?php

use App\Http\Controllers\SiteController;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    $product = Product::find(1);
//    select * from
//    $list = Product::query()
//        ->where('status', true)
//        ->where('price', '>', 120)
//        ->get();
//    dd($list);
//
//
//    dd(Product::all());
//
//    $data = [
//        'name' => 'create product',
//        'price' => 1000,
//    ];
//    $product = Product::query()->create($data);
//    dd($product);
//    $product->name = 'New name';
//    $product->price = 123;
//    $product->save();
//
//    dd($product);

    $category = new Category();
    $category->name = 'Category 1';
    $category->status = false;
    $category->save();

    $data = [
        'name' => 'Category 2',
        'status' => true,
    ];

    Category::query()->create($data);

    return view('main');
});

Route::get('/store', function () {
    return view('store');
});

Route::get('/product', function () {
    return view('product');
});

//Route::get('hello', [SiteController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
