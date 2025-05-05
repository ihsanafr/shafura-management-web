@extends('layouts.app')

{{--
    View: Services Index Page

    Description:
    - Displays a paginated list of services with optional search filtering.
    - Search input performs a GET request and displays the results with count.
    - Only non-staff users can:
        - Access the "Add new services" and "Restore deleted services" buttons.
        - Edit services.
        - Delete services (sales are restricted from deletion too).
    - The table lists key service attributes: type, company, title, product, start and end date.
    - Each row provides action buttons for show, edit, and delete (with permission checks).
    - Uses pagination and maintains responsive layout with Bootstrap classes.
--}}

@section('main')
    <div class="main-content">
        <section class="section">

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mr-3">Services</h3>
                                @cannot('staff')
                                    <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm">+ Add new services</a>
                                @endcannot
                                @can('admin')
                                    <a href="{{ route('services.deleted') }}" class="btn btn-danger btn-sm">Restore deleted
                                        services</a>
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
                                @if ($request->filled('search'))
                                    <p><b>Result for "{{ $request->search }}"</b></p>
                                    <p>Showing {{ $services->total() }} results found</p>
                                @endif
                                <div class="table-responsive">
                                    <table class="table-striped table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Company</th>
                                                <th>Title</th>
                                                <th>Product</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $service)
                                                <tr>
                                                    <td>{{ $service->type }}</td>
                                                    <td>{{ $service->company_name }}</td>
                                                    <td>{{ $service->title }}</td>
                                                    <td>{{ $service->products }}</td>
                                                    <td>{{ $service->start_date }}</td>
                                                    <td>{{ $service->end_date }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('services.show', $service) }}"
                                                                class="btn btn-link text-info"><i class="fa-solid fa-eye"
                                                                    title="show"></i></a>
                                                            @cannot('staff')
                                                                <a href="{{ route('services.edit', $service) }}"
                                                                    class="btn btn-link text-primary" title="edit"><i
                                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                                @cannot('sales')
                                                                    <a data-toggle="modal" data-target="#deleteModal"
                                                                        class="btn btn-link text-danger" title="delete"><i
                                                                            class="fa-solid fa-trash"></i></a>
                                                                    <form action="{{ route('services.destroy', $service) }}"
                                                                        id="delete-form-{{ $service->id }}" method="POST">
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
                                @if ($services->hasPages())
                                    <div class="float-right">
                                        <nav>
                                            {{ $services->links() }}
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
