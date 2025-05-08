@extends('layouts.app')

@section('main')
<div class="main-content container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Settings</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h5>User information</h5>
                    <table class="table table-borderless table-responsive">

                        <tr>
                            <th>Name</th>
                            <td>:</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>:</td>
                            <td>{{ __('roles.' . $user->role) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Footer dengan tombol -->
        <div class="card-footer">
            <a href="{{ route('settings.edit') }}" class="btn btn-primary">Edit User</a>
        </div>
    </div>
</div>
@endsection
