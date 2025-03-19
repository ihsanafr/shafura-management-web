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
                                <h4>Edit List</h4>
                            </div>
                            <form action="{{ route('lists.update', $listCustomer) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $listCustomer->name) }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Customer Code</label>
                                        <input type="text" name="customer_code" class="form-control"
                                            value="{{ old('customer_code', $listCustomer->customer_code) }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" name="website_url" class="form-control" 
                                        value="{{ old('website_url', $listCustomer->website_url) }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control" 
                                        value="{{ old('phone', $listCustomer->phone) }}">
                                    </div>

                                    {{-- button  --}}
                                    <div class="form-group d-flex justify-content-between">
                                        <a href="{{ url('customers/lists') }}" class="btn btn-secondary">Kembali</a>
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
