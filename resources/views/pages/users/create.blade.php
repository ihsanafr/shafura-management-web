@extends('layouts.app')

@section('main')
<div class="main-content">
    <section class="section">

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add New User</h4>
                        </div>
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name"
                                        class="form-control" placeholder="Enter Name">
                                        @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email"
                                        class="form-control" placeholder="Enter Email">
                                        @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-control">
                                        <option selected value="">Select Role :</option>
                                        <option value="admin">Admin</option>
                                        <option value="sales">Sales</option>
                                        <option value="staff_engineer">Staff Engineer</option>
                                        <option value="lead_engineer">Lead Engineer</option>
                                        <option value="finance">Finance</option>
                                    </select>
                                    @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password"
                                        class="form-control" placeholder="Enter Password">
                                        @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- button submit --}}
                                <div class="form-group d-flex justify-content-between">
                                    <a href="{{ url('users') }}" class="btn btn-secondary">Back</a>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
