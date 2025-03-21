@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mr-3">Services</h3>
                                <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm">+ Tambah</a>
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
                                            @foreach ($services as $service)
                                                <tr>
                                                    <td>{{ $service->type }}</td>
                                                    <td>{{ $service->company_name }}</td>
                                                    <td>{{ $service->title }}</td>
                                                    <td>{{ $service->products }}</td>
                                                    <td>{{ $service->start_date }}</td>
                                                    <td>{{ $service->end_date }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('services.show', $service) }}"
                                                                class="btn btn-link text-info"><i
                                                                    class="fa-solid fa-eye"></i></a>
                                                            <a href="{{ route('services.edit', $service) }}"
                                                                class="btn btn-link text-primary"><i
                                                                    class="fa-solid fa-pen-to-square"></i></a>
                                                            <a href=""
                                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $service->id }}').submit();"
                                                                class="btn btn-link text-danger"><i
                                                                    class="fa-solid fa-trash"></i></a>
                                                            <form action="{{ route('services.destroy', $service->id) }}"
                                                                method="post" id="delete-form-{{ $service->id }}">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
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
