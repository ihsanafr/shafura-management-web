<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a paginated list of products with optional search filtering.
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
     * Showing the create products page with authorization.
     */
    public function create()
    {
        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.products.create');
    }

    /**
     * Store a newly created product in database with validation and authorization.
     */
    public function store(Request $request)
    {
        if (Gate::check('staff')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'name' => 'required',
            'vendor_name' => 'required',
            'vendor_url' => 'required|regex:/^https?:\/\/.+$/i'
        ]);

        Product::create($validatedData);

        return redirect('products')->with('success', 'Data berhasil dibuat.');
    }

    /**
     * Display or show the specified product.
     */
    public function show(Product $product)
    {
        return view('pages.products.show', compact('product'));
    }

    /**
     * Display edit page for the specified product with validation.
     */
    public function edit(Product $product)
    {
        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.products.edit', compact('product'));
    }

    /**
     * Update the specified product with validation and role restriction.
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

        return redirect('products')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Soft delete a specified product after authorization check.
     */
    public function destroy(Product $product)
    {
        if (Gate::any(['staff', 'sales'])) {
            abort(403);
        }

        $product->delete();

        return redirect('products')->with('success', 'Data berhasil dihapus.');
    }

    /**
     * Displaying soft deleted product.
     */
    public function indexDeleted()
    {
        Gate::authorize('admin');

        $deletedProducts = Product::onlyTrashed()->get();

        return view('pages.products.deleted.index', compact('deletedProducts'));
    }

    /**
     * Show a single soft deleted product by ID.
     */
    public function showDeleted(string $id)
    {
        Gate::authorize('admin');

        $product = Product::onlyTrashed()->findOrFail($id);

        return view('pages.products.deleted.show', compact('product'));
    }

    /**
     * Fully delete specific product from database.
     */
    public function fullyDelete(string $id)
    {
        Gate::authorize('admin');

        Product::forceDestroy($id);

        return redirect('products/deleted')->with('success', 'Product permanently deleted.');
    }

    /**
     * Restore deleted specific product from database.
     */
    public function restoreDeleted(string $id)
    {
        Gate::authorize('admin');

        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();

        return redirect('products/deleted')->with('success', 'Product successfully restored');
    }

    /**
     * Delete All product in soft deletes.
     */
    public function deleteAll()
    {
        Gate::authorize('admin');
        
        Product::onlyTrashed()->forceDelete();
        return redirect('products/deleted')->with('success', 'All products are successfully deleted');
    }
}
