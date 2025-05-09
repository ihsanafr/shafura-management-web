@extends('layouts.app')

@section('main')
<div class="main-content">
    <section class="section">

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add New Customer</h4>
                        </div>
                        <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name"
                                        class="form-control" placeholder="Customer Name">
                                        @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Customer Code</label>
                                    <input type="text" name="customer_code"
                                        class="form-control" placeholder="Customer Code">
                                        @error('customer_code')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="text" name="website_url"
                                        class="form-control" placeholder="Customer Website">
                                        @error('website_url')
                                    <div class="text-danger">{{ __('customer.regex') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone"
                                        class="form-control" placeholder="Customer Phone">
                                        @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                    <div class="form-group d-flex justify-content-between">
                                        <a href="{{ url('customers') }}" class="btn btn-secondary">Back</a>
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
