@extends('layouts.app')

@section('main')
<div class="main-content container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Customer</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Kiri: Informasi List -->
                <div class="col-12">
                    <h5>Customer Information</h5>
                    <table class="table table-borderless table-responsive">
                        
                        <tr>
                            <th>Name</th>
                            <td>:</td>
                            <td>{{ $listCustomer->name }}</td>
                        </tr>
                        <tr>
                            <th>Customer Code</th>
                            <td>:</td>
                            <td>{{ $listCustomer->customer_code }}</td>
                        </tr>
                        <tr>
                            <th>Website</th>
                            <td>:</td>
                            <td>{{ $listCustomer->website_url }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>:</td>
                            <td>{{ $listCustomer->phone }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Footer dengan tombol -->
        <div class="card-footer">
            <a href="{{ url('customers/lists') }}" class="btn btn-secondary">Back</a>
            @cannot('staff')
            <a href="{{ route('lists.edit', $listCustomer) }}" class="btn btn-primary">Edit Customer</a>
            @endcannot
        </div>
    </div>
</div>
@endsection
