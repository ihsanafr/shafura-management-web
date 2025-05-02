@extends('layouts.app')

{{--
    View: Products Index Page

    Description:
    - Lists all products with pagination.
    - Includes search functionality using GET method.
    - Shows product details: code (ID), name, vendor name, vendor URL.
    - Action buttons: show, edit, delete (with role-based access control).
    - Restore deleted products button visible for authorized users.
--}}

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mr-3">Products</h3>
                                @cannot('staff')
                                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">+ Add new product</a>
                                @endcannot
                                <a href="{{ route('products.deleted') }}" class="btn btn-danger btn-sm">Restore deleted
                                    products</a>
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
                                    <p>Showing {{ $products->total() }} results found</p>
                                @endif
                                <div class="table-responsive">
                                    <table class="table-striped table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Vendor Name</th>
                                                <th>Vendor URL</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->vendor_name }}</td>
                                                    <td><a href="{{ $product->vendor_url }}" rel="noopener noreferrer"
                                                            target="_blank">{{ $product->vendor_url }}</a></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('products.show', $product) }}"
                                                                class="btn btn-link text-info"><i
                                                                    class="fa-solid fa-eye"></i></a>
                                                            @cannot('staff')
                                                                <a href="{{ route('products.edit', $product) }}"
                                                                    class="btn btn-link text-primary"><i
                                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                                @cannot('sales')
                                                                    <a onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();"
                                                                        class="btn btn-link text-danger"><i
                                                                            class="fa-solid fa-trash"></i></a>
                                                                    <form action="{{ route('products.destroy', $product) }}"
                                                                        id="delete-form-{{ $product->id }}" method="POST">
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
                                @if ($products->hasPages())
                                    <div class="float-right">
                                        <nav>
                                            {{ $products->links() }}
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
