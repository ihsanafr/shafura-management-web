<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ListCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CostumersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->search;

        $customers = ListCustomer::where(function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('customer_code', 'like', "%$search%")
                ->orWhere('website_url', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%");
        })
        ->orderByDesc('id')
        ->paginate(50)
        ->withQueryString();

        return view('pages.costumers.index', compact(['request', 'customers']));
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


        ListCustomer::create($validatedData);

        return redirect('customers')->with('success', 'Data berhasil dibuat.');

    }

    /**
     * Display the specified resource.
     */
    public function show(ListCustomer $listCustomer)
    {
        return view('pages.costumers.show', compact('listCustomer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ListCustomer $listCustomer)
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.costumers.edit', compact('listCustomer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ListCustomer $listCustomer)
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

        $listCustomer->update($validatedData);

        return redirect('customers')->with('success', 'Data berhasil diubah.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ListCustomer $listCustomer)
    {
        if (Gate::any(['staff', 'sales'])) {
            abort(403);
        }

        $listCustomer->delete();

        return redirect('customers')->with('success', 'Data berhasil dihapus.');
    }

    /**
     * Displaying soft deleted Customer.
     */
    public function indexDeleted()
    {

        $deletedCustomers = ListCustomer::onlyTrashed()->get();

        return view('pages.costumers.deleted.index', compact('deletedCustomers'));
    }

    /**
     * Show a single soft deleted customer by ID.
     */
    public function showDeleted(string $id)
    {
        $customer = ListCustomer::onlyTrashed()->findOrFail($id);

        return view('pages.costumers.deleted.show', compact('Customer'));
    }

    /**
     * Fully delete specific customer from database.
     */
    public function fullyDelete(string $id)
    {
        ListCustomer::forceDestroy($id);

        return redirect('customers/deleted')->with('success', 'Customer permanently deleted.');
    }

    /**
     * Restore deleted specific customer from database.
     */
    public function restoreDeleted(string $id)
    {
        $customer = ListCustomer::onlyTrashed()->findOrFail($id);
        $customer->restore();

        return redirect('customers/deleted')->with('success', 'Customer successfully restored');
    }

    /**
     * Delete All customer in soft deletes.
     */
    public function deleteAll()
    {
        ListCustomer::onlyTrashed()->forceDelete();
        return redirect('customers/deleted')->with('success', 'All customers are successfully deleted');
    }
}
