@extends('layouts.app')

@section('main')
<div class="main-content">
    <section class="section">
        {{-- <div class="section-header">
            <h1>Tambah User</h1>
            
        </div> --}}

        <div class="section-body">
            
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah User</h4>
                        </div>
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="sales">Sales</option>
                                        <option value="staff_engineer">Staff Engineer</option>
                                        <option value="lead_engineer">Lead Engineer</option>
                                        <option value="finance">Finance</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password"
                                        class="form-control">
                                </div>
                                
                                {{-- button submit --}}
                                <div class="form-group d-flex justify-content-between">
                                    <a href="{{ url('users') }}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
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