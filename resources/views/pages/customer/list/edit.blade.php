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
                                <h4>Edit List</h4>
                            </div>
                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="">
                                    </div>

                                    <div class="form-group">
                                        <label>Customer Code</label>
                                        <input type="name" name="code" class="form-control"
                                            value="">
                                    </div>

                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" name="website" class="form-control" value="">
                                    </div>

                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" name="phone" class="form-control" value="">
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
