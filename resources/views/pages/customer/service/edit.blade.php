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
                            <h4>Edit Services</h4>
                        </div>
                        <form action="{{ route('services.update', $serviceCustomer) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" name="type" value="{{ old('type', $serviceCustomer->type ) }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" name="company_name" value="{{ old('company_name', $serviceCustomer->company_name )}}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ old('title', $serviceCustomer->title) }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product</label>
                                    <input type="text" name="products" value="{{ old('products', $serviceCustomer->products) }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" name="start_date" value="{{ old('created_at', $serviceCustomer->start_date ) }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date" name="end_date"value="{{ old('updated_at', $serviceCustomer->end_date) }}"
                                        class="form-control">
                                </div>
                                {{-- button--}}
                                    
                                    <div class="form-group d-flex justify-content-between">
                                        <a href="{{ url('customers/services') }}" class="btn btn-secondary">Back</a>
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