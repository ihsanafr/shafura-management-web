@extends('layouts.app')

{{--
    View: Users Index Page

    Description:
    - Lists all users in a paginated table.
    - Supports searching by query using GET method.
    - "Add New User" button allows creation of a new user.
    - Displays user name, email, and role.
    - Action buttons include edit and delete options.
    - Deletes are submitted via hidden POST forms with CSRF protection.
    - Pagination links are shown at the bottom-right of the table.
--}}

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mr-3">Users</h3>
                                <a href="{{ route('users.create') }}"
                                type="button" class="btn btn-primary btn-sm">+ Add new user</a>
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
                                @if (request()->filled('search'))
                                    <p><b>Result for "{{ request('search') }}"</b></p>
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
                                                            <a href="{{ route('users.edit', $user->id) }}"
                                                                class="btn btn-link text-primary" title="edit"><i
                                                                    class="fa-solid fa-pen-to-square"></i></a>
                                                            <a data-toggle="modal" data-target="#deleteModal"
                                                                class="btn btn-link text-danger" title="delete"><i
                                                                    class="fa-solid fa-trash"></i></a>
                                                            <form action="{{ route('users.destroy', $user->id) }}"
                                                                id="delete-form-{{ $user->id }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <!-- Modal Confimation -->
                                                                <div class="modal fade" id="deleteModal" tabindex="-1"
                                                                    aria-labelledby="editConfirmLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="editConfirmLabel">Confirmation!</h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                This action is irreversible! Are you sure
                                                                                you wanna delete this user?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Cancel</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-danger">Delete</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
@endsection
