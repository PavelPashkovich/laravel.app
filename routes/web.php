<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;

use App\Http\Controllers\WishListController;
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

Route::get('blade', function () {
    return view('main');
});

Route::get('roles', function () {
    $user = \App\Models\User::first();
    $user->assignRole('admin');
//    \Spatie\Permission\Models\Role::create([
//        'name' => 'admin',
//        'guard_name' => 'admin'
//    ]);
//    \Spatie\Permission\Models\Role::create([
//        'name' => 'user',
//        'guard_name' => 'user'
//    ]);
});

Route::get('send-email', [\App\Http\Controllers\SendEmailController::class, 'index']);

Route::get('route', function () {
    dump(\route('someRoute'));
})->name('someRoute');

Route::get('weather', function () {
    $response = \Illuminate\Support\Facades\Http::get('api.openweathermap.org/data/2.5/weather', [
        'q' => 'Minsk',
        'appid' => '3b5c5c2d08df33a981a9b27f954eefa3',
        'lang' => 'ru',
        'units' => 'metric'
    ]);
    dump($response->object());
    $response2 = \Illuminate\Support\Facades\Http::get('api.openweathermap.org/data/2.5/weather', [
        'q' => 'Brest',
        'appid' => '3b5c5c2d08df33a981a9b27f954eefa3',
        'lang' => 'ru',
        'units' => 'metric'
    ]);
    dump($response2->object());
});

Route::get('nbrb', function () {

//    $response = \Illuminate\Support\Facades\Http::get('https://www.nbrb.by/api/exrates/rates?ondate=2016-7-6&periodicity=0');
//    dump($response->json());
//    dump($response->object());
//    dump($response->collect());
//    dump($response->status());

//    $client = new \GuzzleHttp\Client();
//    $response = $client->request('GET', 'https://www.nbrb.by/api/exrates/rates/145', [
//        'query' => [
//            'ondate' => '2021-1-1',
//            'periodicity' => 0
//        ]
//    ]);
//    dump($response->getBody()->getContents());

//    $client = new \GuzzleHttp\Client();
//    $response = $client->post('https://www.nbrb.by/api/exrates/rates/145', [
//        'formParams' => [
//            'Cur_ID' => 145,
//            'Cur_RATE' => 5
//        ]
//    ]);
//    dump($response);

//    $client = new \GuzzleHttp\Client();
//    $response = $client->get('https://www.nbrb.by/api/exrates/rates/145', [
//        'query' => [
//            'ondate' => '2021-1-1',
//            'periodicity' => 0
//        ]
//    ]);
//    dump($response->getStatusCode());
//    $curr = json_decode($response->getBody()->getContents(), true);
//    dump($curr);

//    $client = new \GuzzleHttp\Client();
//    $response = $client->get('https://www.nbrb.by/api/exrates/currencies/145');
//    dump($response->getStatusCode());
//    $curr = json_decode($response->getBody()->getContents(), true);
//    dump($curr);

});


Route::get('bingo-job', function () {
   App\Jobs\BingoJob::dispatch();
   dump(2222);
});

//Route::get('mail', function () {
//
//});

Route::get('test-bingo', function () {
   $balance = rand(0, 100);
   dump($balance);
   if($balance > 50) {
       \App\Events\BingoEvent::dispatch($balance);
   }

//    \Illuminate\Support\Facades\Mail::to(['ololo@mail.ru', 'ololo2@mail.ru'])
//        ->send(new \App\Mail\BingoMail($balance));

});


//Route::get('test-event', function () {
//    \App\Events\TestEvent::dispatch(1); // первый способ стартовать событие
//   event(new \App\Events\TestEvent(1)); // второй способ стартовать событие
//    $balance = 1;
//    if($balance > 1000) {
//        \App\Events\TestEvent::dispatch(1);
//    }
//});

Route::get('test', function () {
    $brand = \App\Models\Brand::query()->inRandomOrder()->first();
    $brand->name = 'Bond';
//   $brand->save(); // добавление в базу данных
    dump($brand->fullName);
});


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
});

Route::get('test-file', function () {

//    $product = Product::find(2);
//
//    $image = \App\Models\Image::create([
//        'url' => 'ololo',
//        'imageable_id' => $product->id,
//        'imageable_type' => Product::class,
//    ]);
//
//    dump($image);

//    $products = \App\Models\Product::where('id', '<', '5')->with('brand')->get();
//
//    foreach ($products as $product) {
//        dump($product->brand);
//    };

//    $brand = \App\Models\Brand::find(1);
//    dump($brand->products()->where('price', '>', 5)->get());


//    Storage::disk('public')->put('pictures/5.txt', 'Hola, muchacha!');
//    $file = Storage::disk('public')->get('pictures/5.txt');
//    dump($file);
//    Storage::put('images/3.txt', 'Hasta la vista, baby!');
//    $file = Storage::get('images/3.txt');
//    $file = Storage::path('images/3.txt');
    $file = Storage::disk('public')->url('images/3.txt');
//    $file = Storage::exists('images/3.txt');
//    $file = Storage::missing('images/3.txt');
//    Storage::prepend('images/3.txt', 'Terminator says: ');
//    Storage::append('images/3.txt', 'Good bye, Terminator');
//    return Storage::download('images/3.txt', 'r');
    dump($file);
//    $size = Storage::size('images/3.txt');
//    dump($size);
//    $lastModified = Storage::lastModified('images/3.txt');
//    dump($lastModified);

//    dump(Storage::disk('public')->path('images/3.txt'));
});

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');

Route::get('wishlist', [WishListController::class, 'index'])->name('wishList');
Route::post('add-to-wishlist', [CartController::class, 'addToWishList'])->name('addToWishList');


Route::middleware(CheckAuth::class)->prefix('admin')->name('admin.')->group(function () {
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
