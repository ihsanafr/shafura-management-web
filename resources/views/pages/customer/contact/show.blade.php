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
                            <td>X6RgzCXbAuBVwynKjLZP5GMJjb5WqStjX6RgzCXbAuBVwynKjLZP5GMJjb5WqStj</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td>Produk 1</td>
                        </tr>
                        <tr>
                            <th>Vendor Name</th>
                            <td>:</td>
                            <td>BNI</td>
                        </tr>
                        <tr>
                            <th>Vendor URL</th>
                            <td>:</td>
                            <td><a href="#" target="_blank">https://indonesia.bni.co.id</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Footer dengan tombol -->
        <div class="card-footer">
            <a href="{{ url('products') }}" class="btn btn-secondary">Kembali</a>
            <a href="#" class="btn btn-primary">Edit Produk</a>
        </div>
    </div>
</div>
@endsection
