@extends('layouts.app')

@section('main')
<div class="main-content container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Contact</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h5>Contact Information</h5>
                    <table class="table table-borderless table-responsive">

                        <tr>
                            <th>Company</th>
                            <td>:</td>
                            <td>{{ $contact->company }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>:</td>
                            <td>{{ $contact->name }}</td>
                        </tr>
                        <tr>
                            <th>Position</th>
                            <td>:</td>
                            <td>{{ $contact->position }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>:</td>
                            <td>{{ $contact->address }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th>PIC Phone</th>
                            <td>:</td>
                            <td>{{ $contact->pic_phone }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a href="{{ url('contacts') }}" class="btn btn-secondary">Back</a>
            @cannot('staff')
            <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-primary">Edit Contact</a>
            @endcannot
        </div>
    </div>
</div>
@endsection
