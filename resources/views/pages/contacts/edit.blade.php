@extends('layouts.app')

@section('main')
<div class="main-content">
    <section class="section">

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Contact</h4>
                        </div>
                        <form action="{{route('contacts.update', $contact)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" name="company" value="{{ old('company', $contact->company )}}"
                                        class="form-control">
                                        @error('company')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name', $contact->name )}}"
                                        class="form-control">
                                        @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Position</label>
                                    <input type="text" name="position" value="{{ old('position', $contact->position )}}"
                                        class="form-control">
                                        @error('position')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" value="{{ old('address', $contact->address )}}"
                                        class="form-control">
                                        @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ old('email', $contact->email) }}"
                                        class="form-control">
                                        @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>PIC Phone</label>
                                    <input type="number" name="pic_phone" value="{{ old('pic_phone', $contact->pic_phone )}}"
                                        class="form-control">
                                        @error('pic_phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                    <div class="form-group d-flex justify-content-between">
                                        <a href="{{ url('contacts') }}" class="btn btn-secondary">Back</a>
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
