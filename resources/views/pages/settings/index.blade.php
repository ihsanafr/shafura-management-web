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
                        <form action="{{ route('settings.update', $users) }}" method="POST"
                            enctype="multipart/form-data">
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
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Input Password">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- button submit --}}
                                <div class="form-group text-right">
                                    <button type="button" id="editBtn" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<!-- Modal Konfirmasi Edit -->
<div class="modal fade" id="editConfirmModal" tabindex="-1" aria-labelledby="editConfirmLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editConfirmLabel">Confirmation!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to save changes to your profile?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="confirmEdit">Yes, Save Changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const originalName = "{{ $users->name }}";
        const originalEmail = "{{ $users->email }}";

        const nameInput = document.querySelector('input[name="name"]');
        const emailInput = document.querySelector('input[name="email"]');
        const passwordInput = document.querySelector('input[name="password"]');
        const editBtn = document.getElementById('editBtn');
        const confirmEdit = document.getElementById('confirmEdit');

        editBtn.addEventListener('click', function () {
            const nameChanged = nameInput.value !== originalName;
            const emailChanged = emailInput.value !== originalEmail;
            const passwordChanged = passwordInput.value !== "";

            if (nameChanged || emailChanged || passwordChanged) {
                $('#editConfirmModal').modal('show');
            } else {
                alert("No changes detected.");
            }
        });

        confirmEdit.addEventListener('click', function () {
            // Kirim form secara manual setelah konfirmasi
            nameInput.form.submit();
        });
    });
</script>

@endsection
