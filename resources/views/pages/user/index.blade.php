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
                                <h3 class="mr-3">User</h3>
                                <button type="button" class="btn btn-primary btn-sm">+ Tambah</button>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table-striped table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="w-25">Nama</th>
                                                <th class="w-25">Email</th>
                                                <th class="w-25">Role</th>
                                                <th class="w-25">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                
                                                <td>Ihsan ahmad fakhriansy</td>
                                                <td>ihsan12345678@com</td>
                                                <td>Admin</td>
                                                <td>
                                                    <div class="btn-group">
                                                        
                                                        <a href="#" class="btn btn-primary">Edit</a>
                                                        <a href="#" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Vallian sayoga chandra</td>
                                                <td>wallian12345678@com</td>
                                                <td>staff</td>
                                                <td>
                                                    <div class="btn-group">
                                                        
                                                        <a href="#" class="btn btn-primary">Edit</a>
                                                        <a href="#" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Mawaldy Adha Majid</td>
                                                <td>Mawaldy12345678@com</td>
                                                <td>Admin</td>
                                                <td>
                                                    <div class="btn-group">
                                                        
                                                        <a href="#" class="btn btn-primary">Edit</a>
                                                        <a href="#" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </td>
                                            </tr>

                                            
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
