@extends('layouts.auth')


@section('main')
    <div class="text-center mb-3">
        <a href="#!">
            <p>Shafura Digital Indonesia</p>
        </a>
    </div>
    <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter your details to register</h2>
    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <div class="row gy-2 overflow-hidden">
            <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Username">
                    <label for="name" class="form-label font-weight-normal">Username</label>
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                    <label for="email" class="form-label font-weight-normal">Email</label>
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <label for="password" class="form-label font-weight-normal">Password</label>
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                        placeholder="Confirm Password">
                    <label for="password_confirmation" class="form-label font-weight-normal">Confirm Password</label>
                </div>
            </div>

            <div class="col-12">
                <div class="d-grid my-3">
                    <button class="btn btn-primary btn-lg" type="submit">Register</button>
                </div>
            </div>
            <div class="col-12">
                <p class="m-0 text-secondary text-center">Already have an account? <a href="{{ route('login.store')}}"
                        class="link-primary text-decoration-none">Login</a></p>
            </div>
        </div>
    </form>
@endsection
