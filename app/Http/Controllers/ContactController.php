<?php

namespace App\Http\Controllers;

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

        $contacts = ContactCustomer::where(function ($query) use ($search) {
            $query->where('company', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%")
                ->orWhere('position', 'like', "%$search%")
                ->orWhere('address', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('pic_phone', 'like', "%$search%");
        })
        ->orderByDesc('id')
        ->paginate(50)
        ->withQueryString();

        return view('pages.contact.index', compact(['request', 'contacts']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.contact.create');
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

        return redirect('contacts')->with('success', 'Data berhasil dibuat.');

    }

    /**
     * Display the specified resource.
     */
    public function show(ContactCustomer $contactCustomer)
    {
        return view('pages.contact.show', compact('contactCustomer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactCustomer $contactCustomer)
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.contact.edit', compact('contactCustomer'));
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

        return redirect('contacts')->with('success', 'Data berhasil diubah.');

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

        return redirect('contacts')->with('success', 'Data berhasil dihapus.');

    }
}
