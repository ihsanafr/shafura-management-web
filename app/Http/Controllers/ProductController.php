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

        $products = Product::where(function ($query) use ($search) {
            $query->where('id', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%")
                ->orWhere('vendor_name', 'like', "%$search%")
                ->orWhere('vendor_url', 'like', "%$search%");
        })
        ->orderByDesc('id')
        ->paginate(50)
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

        $validatedData = $request->validate([
            'name' => 'required',
            'vendor_name' => 'required',
            'vendor_url' => 'required|regex:/^https?:\/\/.+$/i'
        ]);

        Product::create($validatedData);

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

        $validatedData = $request->validate([
            'name' => 'required',
            'vendor_name' => 'required',
            'vendor_url' => 'required|regex:/^https?:\/\/.+$/i'
        ]);

        $product->update($validatedData);

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
