@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">
            {{-- Deleted services Page --}}
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            {{-- Card Header with title and bulk delete button --}}
                            <div class="card-header">
                                <a href="{{ url('services') }}"><i class="fa-solid fa-arrow-left text-dark"></i></a>
                                <h3 class="mr-3">Deleted services</h3>
                                <div class="mb-3"></div>
                                <button data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm">
                                    Delete all services
                                </button>
                            </div>

                            {{-- Card Body containing table of deleted services --}}
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Company</th>
                                                <th>Title</th>
                                                <th>Product</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Loop through soft-deleted services --}}
                                            @foreach ($deletedServices as $deletedService)
                                                <tr>
                                                    <td>{{ $deletedService->type }}</td>
                                                    <td>{{ $deletedService->company_name }}</td>
                                                    <td>{{ $deletedService->title }}</td>
                                                    <td>{{ $deletedService->products }}</td>
                                                    <td>{{ $deletedService->start_date }}</td>
                                                    <td>{{ $deletedService->end_date }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            {{-- Restore button --}}
                                                            <a onclick="event.preventDefault(); document.getElementById('restore-form-{{ $deletedService->id }}').submit();"
                                                                class="btn btn-link text-success">
                                                                <i class="fa-solid fa-trash-can-arrow-up"></i></i>
                                                            </a>
                                                            <form action="{{ route('services.deleted.restore', $deletedService) }}"
                                                                id="restore-form-{{ $deletedService->id }}" method="POST">
                                                                @csrf
                                                            </form>

                                                            {{-- View product detail --}}
                                                            <a href="{{ route('services.deleted.show', $deletedService->id) }}"
                                                                class="btn btn-link text-info" title="show">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </a>

                                                            {{-- Permanently delete button --}}
                                                            <a onclick="event.preventDefault(); document.getElementById('delete-form-{{ $deletedService->id }}').submit();"
                                                                class="btn btn-link text-danger" title="delete">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </a>
                                                            <form action="{{ route('services.deleted.delete', $deletedService) }}"
                                                                id="delete-form-{{ $deletedService->id }}" method="POST">
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
    <form action="{{ route('services.deleted.deleteAll') }}" method="POST">
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
                        Are you sure you want to permanently delete all soft-deleted services?
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
