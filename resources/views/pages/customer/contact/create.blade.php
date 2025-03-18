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
                            <h4>Tambah Contact</h4>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" name="name"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" 
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Position</label>
                                    <select name="role" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="sales">Sales</option>
                                        <option value="staff_engineer">Staff Engineer</option>
                                        <option value="lead_engineer">Lead Engineer</option>
                                        <option value="finance">Finance</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" 
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" 
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>PIC Phone</label>
                                    <input type="number" 
                                        class="form-control">
                                </div>
                                {{-- button--}}
                                    
                                    <div class="form-group d-flex justify-content-between">
                                        <a href="{{ url('customers/contacts') }}" class="btn btn-secondary">Kembali</a>
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