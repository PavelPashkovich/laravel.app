<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate();
        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(CreateProductRequest $request)
    {
        $img = $request->file('img');
//        Storage::disk('public')->put('product/images/'.$request->name.'.'.$img->getClientOriginalExtension(), $img->getContent());
        Storage::disk('public')->putFileAs('product/images/', $img, $request->name.'.'.$img->getClientOriginalExtension());
        $fileUrl = Storage::url('product/images/'.$request->name.'.'.$img->getClientOriginalExtension());

        $data = $request->all();
        $data['img'] = $fileUrl;
        Product::query()->create($data);
        return redirect(route('admin.product.index'));

//        $img = $request->file('img');
//        Storage::disk('public')->put('product/images/'.$request->name.'.'.$img->getClientOriginalExtension(), $img->getContent());
//        $fileUrl = Storage::disk('public')->url('product/images/'.$request->name.'.'.$img->getClientOriginalExtension());
////        dd($fileUrl);
//
//        Product::query()->create([
//            'name' => $request->name,
//            'img' => $fileUrl,
//            'content' => $request->content,
//            'price' => $request->price,
//            'status' => isset($request->status) ?? 0,
//            'brand_id' => $request->brand_id
//
//        ]);
//        return redirect(route('admin.product.index'));

//        $request->img = $fileUrl;
//        $data = $request->all();
//        Product::query()->create($data);
//        return redirect(route('admin.product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(CreateProductRequest $request, Product $product)
    {
        $img = $request->file('img');
//        Storage::disk('public')->put('product/images/'.$request->name.'.'.$img->getClientOriginalExtension(), $img->getContent());
        Storage::disk('public')->putFileAs('product/images/', $img, $request->name.'.'.$img->getClientOriginalExtension());
        $fileUrl = Storage::url('product/images/'.$request->name.'.'.$img->getClientOriginalExtension());
        $data = $request->all();
        $data['img'] = $fileUrl;

        $product->fill($data);
        $product->save();
        return redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('admin.product.index'));
    }
}
