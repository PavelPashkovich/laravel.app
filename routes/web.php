<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProductController;
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

//    $category = new Category();
//    $category->name = 'Category 1';
//    $category->status = false;
//    $category->save();
//
//    $data = [
//        'name' => 'Category 2',
//        'status' => true,
//    ];
//
//    Category::create($data);

    return view('main');
});

Route::get('admin', function () {
    return view('admin.index');
});


Route::resources([
    'brand' => \App\Http\Controllers\Admin\BrandController::class,
    'category' => \App\Http\Controllers\Admin\CategoryController::class,
    'product' => \App\Http\Controllers\Admin\ProductController::class,
]);

//Route::resource('brand', \App\Http\Controllers\Admin\BrandController::class)->except(['destroy']);
//Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
//Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);





Route::get('show-form', [FormController::class, 'showForm'])->name('showForm');
Route::post('show-form', [FormController::class, 'postForm'])->name('namePostForm');

Route::get('product/{id}', [ProductController::class, 'index'])->name('show-product');
Route::get('catalog', [ProductController::class, 'catalog'])->name('catalog');


//Route::get('/product', function () {
//    return view('product');
//});

//Route::get('hello', [SiteController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
