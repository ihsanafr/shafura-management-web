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
                                </div>
                                <div class="form-group">
                                    <label>Vendor Name</label>
                                    <input type="text" name="vendor_name"
                                        class="form-control" value="{{ old('vendor_name', $product->vendor_name) }}">
                                </div>
                                <div class="form-group">
                                    <label>Vendor URL</label>
                                    <input type="text" name="vendor_url"
                                        class="form-control" value="{{ old('vendor_url', $product->vendor_url) }}">
                                </div>
                                {{-- button submit --}}
                                <div class="form-group text-right">
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