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

        $services = ServiceCustomer::all();

        return view('pages.customer.service.index', compact('services'));

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

        $request->validate([
            'type' => 'required',
            'company_name' => 'required',
            'title' => 'required',
            'products' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $data = [
            'type' => $request->type,
            'company_name' => $request->company_name,
            'title' => $request->title,
            'products' => $request->products,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ];

        ServiceCustomer::create($data);

        return redirect('customers/services');

    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceCustomer $serviceCustomer)
    {
        return view('pages.customer.service.show', compact('serviceCustomer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceCustomer $serviceCustomer)
    {
        return view('pages.customer.service.edit', compact('serviceCustomer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceCustomer $serviceCustomer)
    {

        $request->validate([
            'type' => 'required',
            'company_name' => 'required',
            'title' => 'required',
            'products' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        
        $data = [
            'type' => $request->type,
            'company_name' => $request->company_name,
            'title' => $request->title,
            'products' => $request->products,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ];

        $serviceCustomer->update($data);

        return redirect('customers/services');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceCustomer $serviceCustomer)
    {

        $serviceCustomer->delete();

        return redirect('customers/services');
        
    }
}
