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
    public function index()
    {

        $search = request('search');

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

        return view('pages.contacts.index', compact('contacts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.contacts.create');
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
        return view('pages.contacts.show', compact('contactCustomer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactCustomer $contactCustomer)
    {

        if (Gate::check('staff')) {
            abort(403);
        }

        return view('pages.contacts.edit', compact('contactCustomer'));
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

    /**
     * Displaying soft deleted Contact.
     */
    public function indexDeleted()
    {
        Gate::authorize('admin');

        $deletedContacts = ContactCustomer::onlyTrashed()->get();

        return view('pages.contacts.deleted.index', compact('deletedContacts'));
    }

    /**
     * Show a single soft deleted contact by ID.
     */
    public function showDeleted(string $id)
    {
        Gate::authorize('admin');

        $contact = ContactCustomer::onlyTrashed()->findOrFail($id);

        return view('pages.contacts.deleted.show', compact('Contact'));
    }

    /**
     * Fully delete specific contact from database.
     */
    public function fullyDelete(string $id)
    {
        Gate::authorize('admin');

        ContactCustomer::forceDestroy($id);

        return redirect('contacts/deleted')->with('success', 'Contact permanently deleted.');
    }

    /**
     * Restore deleted specific contact from database.
     */
    public function restoreDeleted(string $id)
    {
        Gate::authorize('admin');

        $contact = ContactCustomer::onlyTrashed()->findOrFail($id);
        $contact->restore();

        return redirect('contacts/deleted')->with('success', 'Contact successfully restored');
    }

    /**
     * Delete All contact in soft deletes.
     */
    public function deleteAll()
    {
        Gate::authorize('admin');

        ContactCustomer::onlyTrashed()->forceDelete();
        return redirect('contacts/deleted')->with('success', 'All contacts are successfully deleted');
    }
}
