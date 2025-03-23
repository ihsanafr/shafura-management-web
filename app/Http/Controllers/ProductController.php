<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->search;

        $products = Product::whereAny([
            'id', 'name', 'vendor_name', 'vendor_url'
        ], 'like', "%$search%")
        ->orderByDesc('id')
        ->paginate(10)
        ->withQueryString();

        return view('pages.products.index', compact(['request', 'products']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        $request->validate([
            'name' => 'required',
            'vendor_name' => 'required',
            'vendor_url' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'vendor_name' => $request->vendor_name,
            'vendor_url' => $request->vendor_url
        ];

        Product::create($data);

        return redirect('products');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('pages.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        $request->validate([
            'name' => 'required',
            'vendor_name' => 'required',
            'vendor_url' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'vendor_name' => $request->vendor_name,
            'vendor_url' => $request->vendor_url
        ];

        $product->update($data);

        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (Gate::any(['staff', 'sales'])) {
            abort(403);
        }

        $product->delete();

        return redirect('products');
    }
}
