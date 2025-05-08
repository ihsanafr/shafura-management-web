@extends('layouts.app')

@section('main')
<div class="main-content container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Service</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h5>Service Information</h5>
                    <table class="table table-borderless table-responsive">

                        <tr>
                            <th>Type</th>
                            <td>:</td>
                            <td>{{ $service->type }}</td>
                        </tr>
                        <tr>
                            <th>Company</th>
                            <td>:</td>
                            <td>{{ $service->company_name }}</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>:</td>
                            <td>{{ $service->title }}</td>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <td>:</td>
                            <td>{{ $service->products }}</td>
                        </tr>
                        <tr>
                            <th>Start Date</th>
                            <td>:</td>
                            <td>{{ $service->start_date }}</td>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <td>:</td>
                            <td>{{ $service->end_date }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a href="{{ url('services') }}" class="btn btn-secondary">Back</a>
            @cannot('staff')
            <a href="{{ route('services.edit', $service) }}" class="btn btn-primary">Edit Service</a>
            @endcannot
        </div>
    </div>
</div>
@endsection
