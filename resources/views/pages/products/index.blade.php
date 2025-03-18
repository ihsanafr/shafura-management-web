@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">
            {{-- <div class="section-header">
            <h1>Products Management</h1>
        </div> --}}
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mr-3">Products</h3>
                                @cannot('staff')
                                <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">+ Tambah</a>
                                @endcannot
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table-striped table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Nama</th>
                                                <th>Vendor Name</th>
                                                <th>Vendor URL</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                            <tr>
                                                <td class="text-truncate" style="max-width: 300px;">{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->vendor_name }}</td>
                                                <td><a href="{{ $product->vendor_url }}" target="_blank">{{ $product->vendor_url }}</a></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('products.show', $product) }}" class="btn btn-link text-info"><i class="fa-solid fa-eye"></i></a>
                                                        @cannot('staff')
                                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-link text-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        @cannot('sales')
                                                        <a onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();" class="btn btn-link text-danger"><i class="fa-solid fa-trash"></i></a>
                                                        <form action="{{ route('products.destroy', $product) }}" id="delete-form-{{ $product->id }}" method="POST">
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
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
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
