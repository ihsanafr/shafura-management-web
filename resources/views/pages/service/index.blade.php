@extends('layouts.app')

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
                                <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm">+ Add New Services</a>
                                @endcannot
                            </div>

                            <div class="m-3">
                                <form method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search"
                                            placeholder="Search anything" value="">
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
                                                                class="btn btn-link text-info"><i class="fa-solid fa-eye"></i></a>
                                                            @cannot('staff')
                                                                <a href="{{ route('services.edit', $service) }}" class="btn btn-link text-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                                @cannot('sales')
                                                                    <a onclick="event.preventDefault(); document.getElementById('delete-form-{{ $service->id }}').submit();"
                                                                        class="btn btn-link text-danger"><i class="fa-solid fa-trash"></i></a>
                                                                    <form action="{{ route('services.destroy', $service) }}" id="delete-form-{{ $service->id }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
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
                                <div class="float-right">
                                    {{ $services->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
