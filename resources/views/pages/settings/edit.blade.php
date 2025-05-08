@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">

            <div class="section-body">

                <div class="row">
                    <div class="col-12 ">
                        <div class="card">
                            <div class="card-header row-auto d-flex justify-content-between">
                                <h4>Settings Account</h4>
                            </div>
                            <form action="{{ route('settings.update', $user) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $user->name) }}" placeholder="Input name">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', $user->email) }}" placeholder="Input Email">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>Role:</label><br>
                                        <label>{{ __('roles.' . $user->role) }}</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Password &#40;Optional&#41;</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Input Password">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group d-flex justify-content-between">
                                        <a href="{{ url('settings') }}" type="button" class="btn btn-secondary">Back</a>
                                        <button type="button" data-toggle="modal" data-target="#editConfirmModal"
                                            class="btn btn-primary">Edit</button>
                                    </div>

                                </div>

                                <!-- Modal Konfirmasi Edit -->
                                <div class="modal fade" id="editConfirmModal" tabindex="-1"
                                    aria-labelledby="editConfirmLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editConfirmLabel">Confirmation!</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to save changes to your profile?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </div>
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
