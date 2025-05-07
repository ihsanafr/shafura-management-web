@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mr-3">Contacts</h3>
                                @cannot('staff')
                                    <a href="{{ route('contacts.create') }}" class="btn btn-primary btn-sm">+ Add new contact</a>
                                @endcannot
                                @can('admin')
                                    <a href="{{ route('contacts.deleted') }}" class="btn btn-danger btn-sm">Restore deleted
                                        contacts</a>
                                @endcan
                            </div>

                            <div class="m-3">
                                <form method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search"
                                            placeholder="Search anything">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="card-body">
                                @if (request()->filled('search'))
                                    <p><b>Result for "{{ request('search') }}"</b></p>
                                    <p>Showing {{ $contacts->total() }} results found</p>
                                @endif
                                <div class="table-responsive">
                                    <table class="table-striped table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Company</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>PIC Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contacts as $contact)
                                                <tr>
                                                    <td>{{ $contact->company }}</td>
                                                    <td>{{ $contact->name }}</td>
                                                    <td>{{ $contact->position }}</td>
                                                    <td>{{ $contact->address }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>{{ $contact->pic_phone }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('contacts.show', $contact) }}"
                                                                class="btn btn-link text-info"><i
                                                                    class="fa-solid fa-eye"></i></a>

                                                            @cannot('staff')
                                                                <a href="{{ route('contacts.edit', $contact) }}"
                                                                    class="btn btn-link text-primary"><i
                                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                                @cannot('sales')
                                                                    <a data-toggle="modal" data-target="#deleteModal"
                                                                        class="btn btn-link text-danger"><i
                                                                            class="fa-solid fa-trash"></i></a>
                                                                    <form action="{{ route('contacts.destroy', $contact) }}"
                                                                        id="delete-form-{{ $contact->id }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <!-- Modal Confimation -->
                                                                        <div class="modal fade" id="deleteModal" tabindex="-1"
                                                                            aria-labelledby="editConfirmLabel" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title"
                                                                                            id="editConfirmLabel">Confirmation!</h5>
                                                                                        <button type="button" class="close"
                                                                                            data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        Are you sure you want to delete this?
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">Cancel</button>
                                                                                        <button type="submit"
                                                                                            class="btn btn-danger">Delete</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                @endcannot
                                                            @endcannot
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                @if ($contacts->hasPages())
                                    <div class="float-right">
                                        <nav>
                                            {{ $contacts->links() }}
                                        </nav>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
