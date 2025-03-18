<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\ListCustomer;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.customer.list.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.customer.list.create');
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
    public function show(ListCustomer $listCustomer)
    {
        return view('pages.customer.list.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ListCustomer $listCustomer)
    {
        return view('pages.customer.list.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ListCustomer $listCustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ListCustomer $listCustomer)
    {
        //
    }
}
