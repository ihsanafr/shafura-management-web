<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\ContactCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->search;

        $contacts = ContactCustomer::whereAny([
            'company', 'name', 'position', 'address', 'email', 'pic_phone'
        ], 'like', "%$search%")
        ->orderByDesc('id')
        ->paginate(10)
        ->withQueryString();

        return view('pages.customer.contact.index', compact(['request', 'contacts']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.customer.contact.create');
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
            'company' => 'required|string',
            'name' => 'required|string',
            'position' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'pic_phone' => 'required',
        ]);

        ContactCustomer::create($validatedData);

        return redirect('customers/contacts');

    }

    /**
     * Display the specified resource.
     */
    public function show(ContactCustomer $contactCustomer)
    {
        return view('pages.customer.contact.show', compact('contactCustomer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactCustomer $contactCustomer)
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.customer.contact.edit', compact('contactCustomer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactCustomer $contactCustomer)
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'company' => 'required|string',
            'name' => 'required|string',
            'position' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'pic_phone' => 'required'
        ]);

        $contactCustomer->update($validatedData);

        return redirect('customers/contacts');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactCustomer $contactCustomer)
    {

        if (Gate::any(['staff', 'sales'])) {
            abort(403);
        }

        $contactCustomer->delete();

        return redirect('customers/contacts');

    }
}
