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
                                <a href="{{ route('users.create') }}" type="button" class="btn btn-primary btn-sm">+ Add New User</a>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table-striped table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="w-25">Name</th>
                                                <th class="w-25">Email</th>
                                                <th class="w-25">Role</th>
                                                <th class="w-25">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ __('roles.' . $user->role) }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-link text-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();" class="btn btn-link text-danger"><i class="fa-solid fa-trash"></i></a>
                                                        <form action="{{ route('users.destroy', $user->id) }}" id="delete-form-{{ $user->id }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr> 
                                            @endforeach
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
