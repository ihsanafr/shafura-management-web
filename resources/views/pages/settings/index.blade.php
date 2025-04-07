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
                            <div class="card-header row-auto d-flex justify-content-between">
                                <h4>Settings Account</h4>
                                {{-- <a href="{{ route('logout') }}" class="btn btn-danger ml-auto">Logout</a> --}}
                            </div>
                            <form action="{{ route('settings.update', $users) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $users->name) }}" placeholder="Input name">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', $users->email) }}" placeholder="Input Email">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>Password &#40;Optional&#41;</label>
                                        <input type="password" name="password" class="form-control" placeholder="Input Password">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- button submit --}}
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">Edit</button>
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
