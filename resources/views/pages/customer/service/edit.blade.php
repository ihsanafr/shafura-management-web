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
                        <form action="{{route('services.update'.$service->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" name="type" value="{{$service->type}}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" name="company_name" value="{{$service->company_name}}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{$service->title}}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product</label>
                                    <input type="number" name="products" value="{{$service->products}}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" name="created_at" value="{{$service->created_at}}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date" name="updated_at"value="{{$service->updated_at}}"
                                        class="form-control">
                                </div>
                                {{-- button--}}
                                    
                                    <div class="form-group d-flex justify-content-between">
                                        <a href="{{ url('customers/services') }}" class="btn btn-secondary">Kembali</a>
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