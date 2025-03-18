@extends('layouts.app')

@section('main')
<div class="main-content container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Contact</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Kiri: Informasi Contact -->
                <div class="col-12">
                    <h5>Informasi Contact</h5>
                    <table class="table table-borderless table-responsive">
                        
                        <tr>
                            <th>Company</th>
                            <td>:</td>
                            <td>Perusahaan Donat Salju	</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>:</td>
                            <td>Ihsan Ahmad Fakhriansyah</td>
                        </tr>
                        <tr>
                            <th>Position</th>
                            <td>:</td>
                            <td>Admin</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>:</td>
                            <td>RT.005/RW.002, Jaticempaka, Kec. Pd. Gede, Kota Bks, Jawa Barat 13620</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td>ihsanahmadfakhriansyah@gmail.com</td>
                        </tr>
                        <tr>
                            <th>PIC Phone</th>
                            <td>:</td>
                            <td>08123456789j</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Footer dengan tombol -->
        <div class="card-footer">
            <a href="{{ url('products') }}" class="btn btn-secondary">Kembali</a>
            <a href="#" class="btn btn-primary">Edit Contact</a>
        </div>
    </div>
</div>
@endsection
