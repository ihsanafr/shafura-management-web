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
                                <h4>Edit Service</h4>
                            </div>
                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Type</label>
                                        <input type="text" name="type" class="form-control"
                                            value="">
                                    </div>

                                    <div class="form-group">
                                        <label>Company</label>
                                        <input type="text" name="company" class="form-control"
                                            value="">
                                    </div>

                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" value="">
                                    </div>

                                    <div class="form-group">
                                        <label>Product</label>
                                        <input type="text" name="product" class="form-control" value="">
                                    </div>

                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input type="date" name="start" class="form-control" value="">
                                    </div>

                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input type="date" name="end" class="form-control" value="">
                                    </div>

                                    {{-- button submit --}}
                                    <div class="form-group text-right">
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
