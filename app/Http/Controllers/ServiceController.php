<?php

namespace App\Http\Controllers;

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

        $services = ServiceCustomer::where(function ($query) use ($search) {
            $query->where('type', 'like', "%$search%")
                ->orWhere('company_name', 'like', "%$search%")
                ->orWhere('title', 'like', "%$search%")
                ->orWhere('products', 'like', "%$search%");
                
        })
        ->orderByDesc('id')
        ->paginate(50)
        ->withQueryString();

        return view('pages.service.index', compact(['request', 'services']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.service.create');
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
            'type' => 'required',
            'company_name' => 'required',
            'title' => 'required',
            'products' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        ServiceCustomer::create($validatedData);

        return redirect('services')->with('success', 'Data berhasil dibuat.');

    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceCustomer $serviceCustomer)
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.service.show', compact('serviceCustomer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceCustomer $serviceCustomer)
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.service.edit', compact('serviceCustomer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceCustomer $serviceCustomer)
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'type' => 'required',
            'company_name' => 'required',
            'title' => 'required',
            'products' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $serviceCustomer->update($validatedData);

        return redirect('services')->with('success', 'Data berhasil diubah.');

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

        return redirect('services')->with('success', 'Data berhasil dihapus.');
        
    }
}
