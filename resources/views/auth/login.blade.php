@extends('layouts.auth')


@section('main')
    <div class="text-center mb-3">
        <a href="#!">
            <p>Shafura Digital Indonesia</p>
        </a>
    </div>
    <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter your details to Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row gy-2 overflow-hidden">

            <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                    <label for="email" class="form-label font-weight-normal">Email</label>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" value=""
                        placeholder="Password">
                    <label for="password" class="form-label font-weight-normal">Password</label>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <div class="d-grid my-3">
                    <button class="btn btn-primary btn-lg" type="submit">Login</button>
                </div>
            </div>
            <div class="col-12">
                <p class="m-0 text-secondary text-center">Not have an account? <a href="{{ route('register.store') }}"
                        class="link-primary text-decoration-none">Register</a></p>
            </div>
        </div>
    </form>
@endsection
