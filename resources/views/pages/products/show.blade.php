@extends('layouts.app')

@section('main')
<div class="main-content container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Product</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h5>Product Information</h5>
                    <table class="table table-borderless table-responsive">
                        <tr>
                            <th>Code</th>
                            <td>:</td>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>:</td>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>Vendor Name</th>
                            <td>:</td>
                            <td>{{ $product->vendor_name }}</td>
                        </tr>
                        <tr>
                            <th>Vendor URL</th>
                            <td>:</td>
                            <td><a href="{{ $product->vendor_url }}" target="_blank">{{ $product->vendor_url }}</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a href="{{ url('products') }}" class="btn btn-secondary">Back</a>
            @cannot('staff')
            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Edit Product</a>
            @endcannot
        </div>
    </div>
</div>
@endsection
