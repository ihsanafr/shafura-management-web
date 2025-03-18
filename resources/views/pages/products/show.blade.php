@extends('layouts.app')

@section('main')
<div class="main-content container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Produk</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Kiri: Informasi Produk -->
                <div class="col-12">
                    <h5>Informasi Produk</h5>
                    <table class="table table-borderless table-responsive">
                        <tr>
                            <th>Code</th>
                            <td>:</td>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
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

        <!-- Footer dengan tombol -->
        <div class="card-footer">
            <a href="{{ url('products') }}" class="btn btn-secondary">Kembali</a>
            @cannot('staff')
            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Edit Produk</a> 
            @endcannot
        </div>
    </div>
</div>
@endsection
