@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mr-3">Customer Contact</h3>
                                @cannot('staff')
                                <a href="{{ route('contacts.create') }}" class="btn btn-primary btn-sm">+ Add New Contact</a>  
                                @endcannot
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table-striped table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Company</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>PIC Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contacts as $contact)
                                                <tr>
                                                    <td>{{ $contact->company }}</td>
                                                    <td>{{ $contact->name }}</td>
                                                    <td>{{ $contact->position }}</td>
                                                    <td>{{ $contact->address }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>{{ $contact->pic_phone }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('contacts.show', $contact) }}"
                                                                class="btn btn-link text-info"><i
                                                                    class="fa-solid fa-eye"></i></a>

                                                            @cannot('staff')
                                                                <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-link text-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                                @cannot('sales')
                                                                    <a onclick="event.preventDefault(); document.getElementById('delete-form-{{ $contact->id }}').submit();"
                                                                        class="btn btn-link text-danger"><i class="fa-solid fa-trash"></i></a>
                                                                    <form action="{{ route('contacts.destroy', $contact) }}" id="delete-form-{{ $contact->id }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                @endcannot
                                                            @endcannot
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $contacts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
