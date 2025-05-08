@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">

            <div class="section-body">

                <div class="row">
                    <div class="col-12 ">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add New product</h4>
                            </div>
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Product Name">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Vendor Name</label>
                                        <input type="text" name="vendor_name" class="form-control"
                                            placeholder="Vendor Name">
                                        @error('vendor_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Vendor URL</label>
                                        <input type="text" name="vendor_url" class="form-control"
                                            placeholder="Vendor URL">
                                        @error('vendor_url')
                                            <div class="text-danger">{{ __('product.regex') }}</div>
                                        @enderror
                                    </div>
                                    {{-- button submit --}}
                                    <div class="form-group d-flex justify-content-between">
                                        <a href="{{ url('products') }}" class="btn btn-secondary">Back</a>
                                        <button type="submit" class="btn btn-primary">Add</button>
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
