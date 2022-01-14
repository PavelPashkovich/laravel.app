<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;

use App\Http\Middleware\CheckAuth;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
//    $file = Illuminate\Support\Facades\Storage::get('1.txt');
//    \Illuminate\Support\Facades\Storage::
});

Route::get('test-file', function () {
    $products = \App\Models\Product::where('id', '<', '5')->with('brand')->get();

    foreach ($products as $product) {
        dump($product->brand);
    };

//    $product = \App\Models\Product::first();
//    dump($product->brand()->first());


//    Storage::disk('public')->put('pictures/5.txt', 'Hola, muchacha!');
//    $file = Storage::disk('public')->get('pictures/5.txt');
//    dump($file);
//    Storage::put('images/3.txt', 'Hasta la vista, baby!');
//    $file = Storage::get('images/3.txt');
//    $file = Storage::path('images/3.txt');
//    $file = Storage::url('images/3.txt');
//    $file = Storage::exists('images/3.txt');
//    $file = Storage::missing('images/3.txt');
//    Storage::prepend('images/3.txt', 'Terminator says: ');
//    Storage::append('images/3.txt', 'Good bye, Terminator');
//    return Storage::download('images/3.txt', 'r');
//    dump($file);
//    $size = Storage::size('images/3.txt');
//    dump($size);
//    $lastModified = Storage::lastModified('images/3.txt');
//    dump($lastModified);

//    dump(Storage::disk('public')->path('images/3.txt'));
});

Route::get('cart', [\App\Http\Controllers\CartController::class, 'index']);
Route::post('add-to-cart', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('addToCart');




Route::middleware(CheckAuth::class)->prefix('admin')->name('admin.')
    ->group(function () {
        Route::get('/', function () {
           echo 'test';
        });
        Route::resources([
            'brand' => \App\Http\Controllers\Admin\BrandController::class,
            'category' => \App\Http\Controllers\Admin\CategoryController::class,
            'product' => \App\Http\Controllers\Admin\ProductController::class,
        ]);
});




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
