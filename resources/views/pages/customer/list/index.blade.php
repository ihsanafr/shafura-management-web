@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">
            
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mr-3">Customer Lists</h3>
                                @cannot('staff')
                                <a href="{{ route('lists.create') }}" class="btn btn-primary btn-sm">+ Add New</a>
                                @endcannot
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="card-body">

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
                                                <td>{{ $customer->website_url }}</td>
                                                <td>{{ $customer->phone }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('lists.show', $customer) }}" class="btn btn-link text-info"><i class="fa-solid fa-eye"></i></a>
                                                        @cannot('staff')
                                                        <a href="{{ route('lists.edit', $customer) }}" class="btn btn-link text-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        @cannot('sales')
                                                        <a onclick="event.preventDefault(); document.getElementById('delete-form-{{ $customer->id }}').submit();" class="btn btn-link text-danger"><i class="fa-solid fa-trash"></i></a>
                                                        <form action="{{ route('lists.destroy', $customer) }}" id="delete-form-{{ $customer->id }}" method="POST">
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
                                    <nav>
                                        {{ $customers->links() }}
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
