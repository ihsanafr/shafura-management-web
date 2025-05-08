@extends('layouts.app')

@section('main')
<div class="main-content container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Customer</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h5>Customer Information</h5>
                    <table class="table table-borderless table-responsive">

                        <tr>
                            <th>Name</th>
                            <td>:</td>
                            <td>{{ $customer->name }}</td>
                        </tr>
                        <tr>
                            <th>Customer Code</th>
                            <td>:</td>
                            <td>{{ $customer->customer_code }}</td>
                        </tr>
                        <tr>
                            <th>Website</th>
                            <td>:</td>
                            <td>{{ $customer->website_url }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>:</td>
                            <td>{{ $customer->phone }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Footer dengan tombol -->
        <div class="card-footer">
            <a href="{{ url('customers') }}" class="btn btn-secondary">Back</a>
            @cannot('staff')
            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary">Edit Customer</a>
            @endcannot
        </div>
    </div>
</div>
@endsection
