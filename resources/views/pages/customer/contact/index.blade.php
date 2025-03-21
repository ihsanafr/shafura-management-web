@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">
            
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mr-3">Customer Contact</h3>
                                <a href="{{ route('contacts.create') }}" class="btn btn-primary btn-sm">+ Tambah</a>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table-striped table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Company</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>PIC Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contact as $item)
                                                <tr>

                                                    <td>{{$item->company}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->position}}</td>
                                                    <td>{{$item->address}}</td>
                                                    <td>{{$item->email}}</td>
                                                    <td>{{$item->pic_phone}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{route('contacts.show')}}" class="btn btn-link text-info"><i class="fa-solid fa-eye"></i></a>

                                                            <a href="{{route('contacts.edit')}}" class="btn btn-link text-primary"><i class="fa-solid fa-pen-to-square"></i></a>


                                                            <a href=""
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{$item->id}}').submit();"
                                                         class="btn btn-link text-danger"><i class="fa-solid fa-trash"></i></a>
                                                         <form action="{{route('contacts.destroy', $item->id)}}" method="post" id="delete-form-{{$item->id}}">
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
