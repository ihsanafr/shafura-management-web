<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CostumersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $search = request('search');

        $customers = Customer::where(function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('customer_code', 'like', "%$search%")
                ->orWhere('website_url', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%");
        })
        ->orderByDesc('id')
        ->paginate(50)
        ->withQueryString();

        return view('pages.costumers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.costumers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'name' => 'required|string',
            'customer_code' => 'required',
            'website_url' => 'required|regex:/^https?:\/\/.+$/i',
            'phone' => 'required'
        ]);


        Customer::create($validatedData);

        return redirect('customers')->with('success', 'Customer has successfully created.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('pages.costumers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.costumers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'name' => 'required|string',
            'customer_code' => 'required',
            'website_url' => 'required|regex:/^https?:\/\/.+$/i',
            'phone' => 'required'
        ]);

        $customer->update($validatedData);

        return redirect('customers')->with('success', 'Customer has successfully changed.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        if (Gate::any(['staff', 'sales'])) {
            abort(403);
        }

        $customer->delete();

        return redirect('customers')->with('success', 'Data has successfully deleted.');
    }

    /**
     * Displaying soft deleted Customer.
     */
    public function indexDeleted()
    {
        Gate::authorize('admin');

        $deletedCustomers = Customer::onlyTrashed()->get();

        return view('pages.costumers.deleted.index', compact('deletedCustomers'));
    }

    /**
     * Show a single soft deleted customer by ID.
     */
    public function showDeleted(string $id)
    {
        Gate::authorize('admin');

        $customer = Customer::onlyTrashed()->findOrFail($id);

        return view('pages.costumers.deleted.show', compact('customer'));
    }

    /**
     * Fully delete specific customer from database.
     */
    public function fullyDelete(string $id)
    {
        Gate::authorize('admin');

        Customer::forceDestroy($id);

        return redirect('customers/deleted')->with('success', 'Customer has permanently deleted.');
    }

    /**
     * Restore deleted specific customer from database.
     */
    public function restoreDeleted(string $id)
    {
        Gate::authorize('admin');

        $customer = Customer::onlyTrashed()->findOrFail($id);
        $customer->restore();

        return redirect('customers/deleted')->with('success', 'Customer has successfully restored');
    }

    /**
     * Delete All customer in soft deletes.
     */
    public function deleteAll()
    {
        Gate::authorize('admin');

        Customer::onlyTrashed()->forceDelete();
        return redirect('customers/deleted')->with('success', 'All customers has successfully deleted');
    }
}
