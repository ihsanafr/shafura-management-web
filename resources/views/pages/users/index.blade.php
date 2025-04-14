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
                                <h3 class="mr-3">Users</h3>
                                <a href="{{ route('users.create') }}" type="button" class="btn btn-primary btn-sm">+ Add New User</a>
                            </div>

                            <div class="m-3">
                                <form method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search"
                                            placeholder="Search anything" value="">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="card-body">
                                @if ($request->filled('search'))
                                    <p><b>Result for "{{ $request->search }}"</b></p>
                                    <p>Showing {{ $users->total() }} results found</p>
                                @endif
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
                                        {{ $users->links() }}
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
@endsection
