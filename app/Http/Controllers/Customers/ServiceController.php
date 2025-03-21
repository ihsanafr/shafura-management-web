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
        $service = Secviceustomer::all();
        return view('pages.customer.service.index',compact('service'));
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
        $request ->validate([
            "type"=>"required",
            "company_name"=>"required",
            "title"=>"required",
            "products"=>"required",
        ]);
        $data =$request->all();
        ServiceCustomer::create($data);

        return redirect('pages.customer.service.index');
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
        $request ->validate([
            "type"=>"required",
            "company_name"=>"required",
            "title"=>"required",
            "products"=>"required",
        ]);
        $data = ([
            "type"=>$request ->type,
            "company_name"=>$request ->company_name,
            "title"=>$request ->title,
            "products"=>$request ->products,
        ]);

        ServiceCustomer::update($data);
        return redirect('pages.customer.service.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceCustomer $serviceCustomer)
    {
        $serviceCustomer->delete();
        return redirect('pages.customer.service.index');

    }
}
