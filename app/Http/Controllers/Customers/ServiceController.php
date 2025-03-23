<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\ServiceCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->search;

        $services = ServiceCustomer::whereAny([
            'type', 'company_name', 'title', 'products'
        ], 'like', "%$search%")
        ->orderByDesc('id')
        ->paginate(10)
        ->withQueryString();

        return view('pages.customer.service.index', compact(['request', 'services']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.customer.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (Gate::check('staff')) {
            abort(403);
        }

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

        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.customer.service.show', compact('serviceCustomer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceCustomer $serviceCustomer)
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.customer.service.edit', compact('serviceCustomer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceCustomer $serviceCustomer)
    {

        if (Gate::check('staff')) {
            abort(403);
        }

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

        if (Gate::any(['staff', 'sales'])) {
            abort(403);
        }

        $serviceCustomer->delete();

        return redirect('customers/services');
        
    }
}
