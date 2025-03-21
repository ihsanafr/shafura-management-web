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
                            <h4>Edit Contact</h4>
                        </div>
                        <form action="{{route('contacts.update', $contactCustomer)}}" method="PUT" enctype="multipart/form-data">
                            @csrf
                            @method("POST")
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" name="company" value="{{ old('company', $contactCustomer->company )}}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name', $contactCustomer->name )}}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Position</label>
                                    <input type="text" name="position" value="{{ old('position', $contactCustomer->position )}}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" value="{{ old('address', $contactCustomer->address )}}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ old('email', $contactCustomer->email) }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>PIC Phone</label>
                                    <input type="number" name="pic_phone" value="{{ old('pic_phone', $contactCustomer->pic_phone )}}"
                                        class="form-control">
                                </div>
                                {{-- button--}}
                                    
                                    <div class="form-group d-flex justify-content-between">
                                        <a href="{{ url('customers/contacts') }}" class="btn btn-secondary">Kembali</a>
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