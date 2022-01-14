<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $brands = Brand::paginate();
        return view('admin.brand.index', [
            'brands' => $brands,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBrandRequest $request)
    {
        $filePath = $request->file('logo')->storeAs('brands', 'maiz.jpg', 'public');
//        dd($filePath);
        $data = $request->all();
        $data['logo'] = $filePath;
        dd($data['logo']);

//        $file = $request->file('logo');
//        $file->store('brands/logos', 'public');
//        $file->storeAs('brands/logos', 'maiz21.jpg', 'public');
//        Storage::put('public/brands/logos/maiz.jpg', $file->getContent());
//        $path = Storage::disk('public')->putFileAs('brands/logos', $file, 'photoMaiz2.jpg');
//        dd($file->getMimeType());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('admin.brand.show', ['brands' => $brand]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateBrandRequest $request, Brand $brand)
    {
        $brand->fill($request->all());
        $brand->save();
        return redirect(route('admin.brand.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect(route('admin.brand.index'));
    }
}
