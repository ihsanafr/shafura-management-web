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
                            <h4>Tambah User</h4>
                        </div>
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Vendor Name</label>
                                    <input type="email" name="vendor_name"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Vendor Url</label>
                                    <input type="password" name="vendor_url"
                                        class="form-control">
                                </div>
                                {{-- button submit --}}
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
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