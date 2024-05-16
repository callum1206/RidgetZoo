@extends('layouts.app')

@section('content')
<div class="row">
    @include('layouts.account_sidebar')
    <div class="col-lg-10 justify-content-center">
        <div class="container w-75">
            <div class="card">
                <div class="card-header bg-white">{{ __('My account') }}</div>

                <div class="card-body appCardColor">
                    <h4 class="pb-3">Hey, {{ Auth::user()->name }}</h4>
                    <h5>Email:</h5>
                    <p>{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection