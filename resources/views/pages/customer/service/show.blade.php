@extends('layouts.app')

@section('main')
<div class="main-content container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Services</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Kiri: Informasi Services -->
                <div class="col-12">
                    <h5>Informasi Services</h5>
                    <table class="table table-borderless table-responsive">
                        
                        <tr>
                            <th>Type</th>
                            <td>:</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <th>Company</th>
                            <td>:</td>
                            <td>Shafura example</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>:</td>
                            <td>hello test</td>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <td>:</td>
                            <td>Produk 1</td>
                        </tr>
                        <tr>
                            <th>Start Date</th>
                            <td>:</td>
                            <td>12/12/20</td>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <td>:</td>
                            <td>12/10/24</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Footer dengan tombol -->
        <div class="card-footer">
            <a href="{{ url('customers/services') }}" class="btn btn-secondary">Kembali</a>
            <a href="#" class="btn btn-primary">Edit Services</a>
        </div>
    </div>
</div>
@endsection
