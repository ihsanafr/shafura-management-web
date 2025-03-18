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
                            <h4>Edit Services</h4>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" name="name"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" 
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" 
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product</label>
                                    <input type="number" 
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" 
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date" 
                                        class="form-control">
                                </div>
                                {{-- button--}}
                                    
                                    <div class="form-group d-flex justify-content-between">
                                        <a href="{{ url('customers/services') }}" class="btn btn-secondary">Kembali</a>
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