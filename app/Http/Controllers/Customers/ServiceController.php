<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\ServiceCustomer;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.customer.service.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.customer.service.create');
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
    public function show(ServiceCustomer $serviceCustomer)
    {
        return view('pages.customer.service.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceCustomer $serviceCustomer)
    {
        return view('pages.customer.service.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceCustomer $serviceCustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceCustomer $serviceCustomer)
    {
        //
    }
}
