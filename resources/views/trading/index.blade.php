@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row"> <!-- justify-content-center -->
            <div class="col-md-3">
                @include('trading._oder-form')
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        @include('trading._open-orders')
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-8">
                        @include('trading.order-book._order-book')
                    </div>
                    <div class="col-md-4">
                        @include('trading._trade-history')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
