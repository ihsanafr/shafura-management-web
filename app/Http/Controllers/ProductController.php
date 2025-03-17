<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('products/create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'vendor_name'=>'required',
            'vendor_url'=>'required',
        ]);

        $data = $request->all();

        Product::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products/show');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'vendor_name'=>'required',
            'vendor_url'=>'required',
        ]);

        $data=([
            'name'=>$request->name,
            'vendor_name'=>$request->vendor_name,
            'vendor_url'=>$request->vendor_url,

        ]);

        $data = $request->all();
        $product->update($data);
        return view('products/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->destroy();
        return view('products/index');
    }
}
