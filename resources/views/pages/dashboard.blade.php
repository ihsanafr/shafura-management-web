@extends('layouts.app')

@section('main')
    <div class="row">
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fa-solid fa-box"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Products</span>
                    <span class="info-box-number">Total: {{ $count['product'] }}</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fa-solid fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Customers</span>
                    <span class="info-box-number">Total: {{ $count['customer'] }}</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="fa-solid fa-toolbox"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Services</span>
                    <span class="info-box-number">Total: {{ $count['service'] }}</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fa-solid fa-phone"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Contacts</span>
                    <span class="info-box-number">Total: {{ $count['contact'] }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
