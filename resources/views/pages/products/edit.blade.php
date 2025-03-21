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
                            <h4>Edit Products</h4>
                        </div>
                        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name"
                                        class="form-control" value="{{ old('name', $product->name) }}">
                                        @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Vendor Name</label>
                                    <input type="text" name="vendor_name"
                                        class="form-control" value="{{ old('vendor_name', $product->vendor_name) }}">
                                        @error('vendor_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Vendor URL</label>
                                    <input type="text" name="vendor_url"
                                        class="form-control" value="{{ old('vendor_url', $product->vendor_url) }}">
                                        @error('vendor_url')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- button submit --}}
                                <div class="form-group d-flex justify-content-between">
                                    <a href="{{ url('products') }}" class="btn btn-secondary">Back</a>
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