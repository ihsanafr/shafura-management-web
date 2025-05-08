<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');

        $services = Service::where(function ($query) use ($search) {
            $query->where('type', 'like', "%$search%")
                ->orWhere('company_name', 'like', "%$search%")
                ->orWhere('title', 'like', "%$search%")
                ->orWhere('products', 'like', "%$search%");

        })
        ->orderByDesc('id')
        ->paginate(50)
        ->withQueryString();

        return view('pages.services.index', compact('services'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.services.create');
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

        Service::create($validatedData);

        return redirect('services')->with('success', 'Service has successfully created.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
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

        $service->update($validatedData);

        return redirect('services')->with('success', 'Service has successfully changed.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if (Gate::any(['staff', 'sales'])) {
            abort(403);
        }

        $service->delete();

        return redirect('services')->with('success', 'Service has successfully deleted.');

    }


    /**
     * Displaying soft deleted Services.
     */
    public function indexDeleted()
    {
        Gate::authorize('admin');

        $deletedServices = Service::onlyTrashed()->get();

        return view('pages.services.deleted.index', compact('deletedServices'));
    }

    /**
     * Show a single soft deleted service by ID.
     */
    public function showDeleted(string $id)
    {
        Gate::authorize('admin');

        $service = Service::onlyTrashed()->findOrFail($id);

        return view('pages.services.deleted.show', compact('service'));
    }

    /**
     * Fully delete specific customer from database.
     */
    public function fullyDelete(string $id)
    {
        Gate::authorize('admin');

        Service::forceDestroy($id);

        return redirect('services/deleted')->with('success', 'Service has permanently deleted.');
    }

    /**
     * Restore deleted specific customer from database.
     */
    public function restoreDeleted(string $id)
    {
        Gate::authorize('admin');

        $customer = Service::onlyTrashed()->findOrFail($id);
        $customer->restore();

        return redirect('services/deleted')->with('success', 'Service has successfully restored');
    }

    /**
     * Delete All customer in soft deletes.
     */
    public function deleteAll()
    {
        Gate::authorize('admin');

        Service::onlyTrashed()->forceDelete();
        return redirect('services/deleted')->with('success', 'All services has successfully deleted');
    }
}
