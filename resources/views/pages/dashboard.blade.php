@extends('layouts.app')

@section('main')
    <div class="row">
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fa-solid fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">User</span>
                    <span class="info-box-number">1,410</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fa-solid fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Customer</span>
                    <span class="info-box-number">1,410</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fa-solid fa-toolbox"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Service</span>
                    <span class="info-box-number">1,410</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Contact</span>
                    <span class="info-box-number">1,410</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    </div>
    <div class="small-box bg-info">
        <div class="inner">
            <h3>150</h3>
            <p>Products</p>
        </div>
        <div class="icon">
            <i class="fa-solid fa-box"></i>
        </div>
        <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
@endsection
