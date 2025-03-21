@extends('layouts.app')

@section('main')
<div class="main-content container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Services</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Kiri: Informasi Services -->
                <div class="col-12">
                    <h5>Services Information</h5>
                    <table class="table table-borderless table-responsive">
                        
                        <tr>
                            <th>Type</th>
                            <td>:</td>
                            <td>{{ $serviceCustomer->type }}</td>
                        </tr>
                        <tr>
                            <th>Company</th>
                            <td>:</td>
                            <td>{{ $serviceCustomer->company_name }}</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>:</td>
                            <td>{{ $serviceCustomer->title }}</td>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <td>:</td>
                            <td>{{ $serviceCustomer->products }}</td>
                        </tr>
                        <tr>
                            <th>Start Date</th>
                            <td>:</td>
                            <td>{{ $serviceCustomer->start_date }}</td>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <td>:</td>
                            <td>{{ $serviceCustomer->end_date }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Footer dengan tombol -->
        <div class="card-footer">
            <a href="{{ url('customers/services') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('services.edit', $serviceCustomer) }}" class="btn btn-primary">Edit Services</a>
        </div>
    </div>
</div>
@endsection
