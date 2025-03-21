<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\ContactCustomer;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $contacts = ContactCustomer::all();

        return view('pages.customer.contact.index', compact('contacts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.customer.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'company' => 'required|string',
            'name' => 'required|string',
            'position' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'pic_phone' => 'required',
        ]);

        $data = [
            'company' => $request->company,
            'name' => $request->name,
            'position' => $request->position,
            'address' => $request->address,
            'email' => $request->email,
            'pic_phone' => $request->pic_phone,
        ];

        ContactCustomer::create($data);

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
        return view('pages.customer.contact.edit', compact('contactCustomer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactCustomer $contactCustomer)
    {

        $request->validate([
            'company' => 'required|string',
            'name' => 'required|string',
            'position' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'pic_phone' => 'required'
        ]);

        $data = [
            'company' => $request->company,
            'name' => $request->name,
            'position' => $request->position,
            'address' => $request->address,
            'email' => $request->email,
            'pic_phone' => $request->pic_phone
        ];

        $contactCustomer->update($data);

        return redirect('customers/contacts');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactCustomer $contactCustomer)
    {

        $contactCustomer->delete();

        return redirect('customers/contacts');

    }
}
