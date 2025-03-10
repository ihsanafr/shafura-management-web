@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">
            
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mr-3">Customer Services</h3>
                                <button type="button" class="btn btn-primary btn-sm">+ Tambah</button>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table-striped table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Company</th>
                                                <th>Title</th>
                                                <th>Product</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Type 123</td>
                                                <td>Perusahaan Donat Salju Indonesia</td>
                                                <td>Donat Title</td>
                                                <td>12/12/2024</td>
                                                <td>12/12/2025</td>
                                                <td>081234567890</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-info">Lihat</a>
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
