@extends('layouts.app')

{{--
    View: Customers Index Page

    - Displays a list of active (non-deleted) customers.
    - Provides search functionality through GET request (?search=).
    - Shows the result count if a search query is provided.
    - Conditionally shows the "Add New Customer" and "Restore Deleted Customers" buttons based on user roles.
    - Displays customer data in a table with actions:
        - View details (all roles)
        - Edit (only if user is not 'staff')
        - Soft-delete (only if user is not 'staff' or 'sales')
    - Uses pagination for customer list.
--}}


@section('main')
    <div class="main-content">
        <section class="section">

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mr-3">Customers</h3>
                                @cannot('staff')
                                    <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm">+ Add new
                                        customer</a>
                                @endcannot
                                @can('admin')
                                    <a href="{{ route('customers.deleted') }}" class="btn btn-danger btn-sm">Restore deleted
                                        customers</a>
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
                                    <p>Showing {{ $customers->total() }} results found</p>
                                @endif
                                <div class="table-responsive">
                                    <table class="table-striped table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Customer Code</th>
                                                <th>Website</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customers as $customer)
                                                <tr>
                                                    <td>{{ $customer->name }}</td>
                                                    <td>{{ $customer->customer_code }}</td>
                                                    <td><a href="{{ $customer->website_url }}" rel="noopener noreferrer"
                                                            target="_blank">{{ $customer->website_url }}</a></td>
                                                    <td>{{ $customer->phone }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('customers.show', $customer) }}"
                                                                class="btn btn-link text-info" title="show"><i
                                                                    class="fa-solid fa-eye"></i></a>
                                                            @cannot('staff')
                                                                <a href="{{ route('customers.edit', $customer) }}"
                                                                    class="btn btn-link text-primary" title="edit"><i
                                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                                @cannot('sales')
                                                                    <a data-toggle="modal" data-target="#deleteModal"
                                                                        class="btn btn-link text-danger" title="delete"><i
                                                                            class="fa-solid fa-trash"></i></a>
                                                                    <form action="{{ route('customers.destroy', $customer) }}"
                                                                        id="delete-form-{{ $customer->id }}" method="POST">
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
                                @if ($customers->hasPages())
                                    <div class="float-right">
                                        <nav>
                                            {{ $customers->links() }}
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
