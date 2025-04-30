@extends('layouts.app')

@section('main')
    {{-- Dashboard Info Boxes --}}
    <div class="row">
        {{-- Products Box --}}
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fa-solid fa-box"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Products</span>
                    <span class="info-box-number">Total: {{ $count['product'] }}</span>
                </div>
            </div>
        </div>

        {{-- Customers Box --}}
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fa-solid fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Customers</span>
                    <span class="info-box-number">Total: {{ $count['customer'] }}</span>
                </div>
            </div>
        </div>

        {{-- Services Box --}}
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="fa-solid fa-toolbox"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Services</span>
                    <span class="info-box-number">Total: {{ $count['service'] }}</span>
                </div>
            </div>
        </div>

        {{-- Contacts Box --}}
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

    {{-- New Products Section --}}
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="mr-3">New Products added</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-striped table table-hover">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Vendor Name</th>
                                    <th>Vendor URL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- Check if $products is not null --}}
                                    @if ($products)
                                        <td>{{ $products->id }}</td>
                                        <td>{{ $products->name }}</td>
                                        <td>{{ $products->vendor_name }}</td>
                                        <td><a href="{{ $products->vendor_url }}"
                                                target="_blank">{{ $products->vendor_url }}</a></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                        {{-- Show fallback message --}}
                        @if (!$products)
                            <p>No data inserted yet</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- New Customers Section --}}
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="mr-3">New Customers added</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-striped table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Client Code</th>
                                    <th>Website</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- Check if $customers is not null --}}
                                    @if ($customers)
                                        <td>{{ $customers->name }}</td>
                                        <td>{{ $customers->customer_code }}</td>
                                        <td><a href="{{ $customers->website_url }}"
                                                target="_blank">{{ $customers->website_url }}</a></td>
                                        <td>{{ $customers->phone }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                        {{-- Show fallback message --}}
                        @if (!$customers)
                            <p>No data inserted yet</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Agenda Events Section --}}
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="mr-3">Incoming agenda</h3>
            </div>

            <div class="card-body">
                {{-- Agenda list with collapse for description --}}
                <ul class="list-group list-group-horizontal-xxl">
                    @foreach ($events as $event)
                        <li class="list-group-item list-group-item-action">
                            <a style="text-decoration: none; color: inherit;" data-toggle="collapse"
                                href="#collapse{{ $event->id }}">
                                <div>
                                    {{-- Show relative date --}}
                                    @if ($event->start == date('Y-m-d'))
                                        <p>Today</p>
                                    @elseif ($event->start == date('Y-m-d', strtotime('tomorrow')))
                                        <p>Tomorrow</p>
                                    @else
                                        <p>{{ $event->start }}</p>
                                    @endif
                                    <span class="badge badge-pill badge-primary">{{ $event->type }}</span>
                                    <h5><b>{{ $event->title }}</b></h5>
                                </div>
                            </a>
                            <div class="collapse" id="collapse{{ $event->id }}">
                                <div class="">
                                    Description: {{ $event->description }}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    {{-- Send Mail Button (only in local env) --}}
    @env('local')
    <form action="{{ route('mail') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Send mail</button>
    </form>
    @endenv

@endsection
