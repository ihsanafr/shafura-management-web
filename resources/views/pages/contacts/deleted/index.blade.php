@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">
            {{-- Deleted contacts Page --}}
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            {{-- Card Header with title and bulk delete button --}}
                            <div class="card-header">
                                <a href="{{ url('contacts') }}"><i class="fa-solid fa-arrow-left text-dark"></i></a>
                                <h3 class="mr-3">Deleted contacts</h3>
                                <div class="mb-3"></div>
                                <button data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm">
                                    Delete all contacts
                                </button>
                            </div>

                            {{-- Card Body containing table of deleted contacts --}}
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
                                            {{-- Loop through soft-deleted contacts --}}
                                            @foreach ($deletedContacts as $deletedContact)
                                                <tr>
                                                    <td>{{ $deletedContact->company }}</td>
                                                    <td>{{ $deletedContact->name }}</td>
                                                    <td>{{ $deletedContact->position }}</td>
                                                    <td>{{ $deletedContact->address }}</td>
                                                    <td>{{ $deletedContact->email }}</td>
                                                    <td>{{ $deletedContact->pic_phone }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            {{-- Restore button --}}
                                                            <a onclick="event.preventDefault(); document.getElementById('restore-form-{{ $deletedContact->id }}').submit();"
                                                                class="btn btn-link text-success">
                                                                <i class="fa-solid fa-trash-can-arrow-up"></i></i>
                                                            </a>
                                                            <form action="{{ route('contacts.deleted.restore', $deletedContact) }}"
                                                                id="restore-form-{{ $deletedContact->id }}" method="POST">
                                                                @csrf
                                                            </form>

                                                            {{-- View product detail --}}
                                                            <a href="{{ route('contacts.deleted.show', $deletedContact->id) }}"
                                                                class="btn btn-link text-info">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </a>

                                                            {{-- Permanently delete button --}}
                                                            <a onclick="event.preventDefault(); document.getElementById('delete-form-{{ $deletedContact->id }}').submit();"
                                                                class="btn btn-link text-danger">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </a>
                                                            <form action="{{ route('contacts.deleted.delete', $deletedContact) }}"
                                                                id="delete-form-{{ $deletedContact->id }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{-- End product loop --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- End Card Body --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- Modal for bulk delete confirmation --}}
    <form action="{{ route('contacts.deleted.deleteAll') }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Warning!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to permanently delete all soft-deleted contacts?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        {{-- Confirm bulk delete --}}
                        <button type="submit" class="btn btn-danger">Delete All</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
