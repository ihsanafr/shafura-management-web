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
        return view('pages.customer.contact.index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactCustomer $contactCustomer)
    {
        return view('pages.customer.contact.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactCustomer $contactCustomer)
    {
        return view('pages.customer.contact.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactCustomer $contactCustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactCustomer $contactCustomer)
    {
        //
    }
}
