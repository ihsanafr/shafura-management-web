@extends('layouts.app')

@section('main')
<div class="main-content container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail List</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Kiri: Informasi List -->
                <div class="col-12">
                    <h5>Informasi List</h5>
                    <table class="table table-borderless table-responsive">
                        
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td>List 1</td>
                        </tr>
                        <tr>
                            <th>Customer Code</th>
                            <td>:</td>
                            <td>dsjnvsdvjkndsnvjkndjkn</td>
                        </tr>
                        <tr>
                            <th>Website</th>
                            <td>:</td>
                            <td>www.youtube.com</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>:</td>
                            <td>086782344577</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Footer dengan tombol -->
        <div class="card-footer">
            <a href="{{ url('products') }}" class="btn btn-secondary">Kembali</a>
            <a href="#" class="btn btn-primary">Edit List</a>
        </div>
    </div>
</div>
@endsection
