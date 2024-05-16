@extends('layouts.app')

@section('content')
<div>
    <div class="row justify-content-center px-4">
        <div class="col-md-5 col-sm-12">
            <div class="row" style="margin-top: 50%">
                <div class="col">
                    <div class="row justify-content-center">
                        <h1 class="w-auto appContrastBrown">
                            Ridget Zoo
                        </h1>
                    </div>
                    <div class="row pt-2 justify-content-center">
                        <div class="col d-flex justify-content-end">
                            <a class="btn btn-lg btn-primary" href="{{ url('/zoo_booking') }}">{{ __('Zoo Booking 
') }}</a>
                        </div>
                        <div class="col d-flex justify-content-start">
                            <a class="btn btn-lg btn-primary" href="{{ url('/hotel_booking') }}">{{ __('Hotel Booking 
') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-sm-12">
            <img src="{{ asset("/assets/clothedSeal.jpg")}}" alt="clothedSeal" style="width: 100%; height:auto">
        </div>
    </div>
</div>
@endsection