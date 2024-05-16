@extends('layouts.app')

@section('content')
<div class="row">
    @include('layouts.account_sidebar')
    <div class="col-lg-10 justify-content-center">
        <div class="container w-75">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row justify-content-center">
                        <div class="col d-flex justify-content-start">
                            <span>{{ __('My rewards') }}</span>
                        </div>
                        <div class="col d-flex justify-content-end">
                            Your Total Points: <span id="userTotalPoints" class="ms-1 fw-bold"></span>
                        </div>
                    </div>
                </div>

                <div class="card-body appCardColor">
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <div class="card">
                                <div class="card-header appCardHeaderSecondaryColor">
                                    Zoo Visits
                                </div>
                                <div class="card-body appCardSecondaryColor p-2 d-flex justify-content-center">
                                    <h1 id="zooVisits" class="p-0 m-0">0</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-header appCardHeaderSecondaryColor">
                                    Hotel Stays
                                </div>
                                <div class="card-body appCardSecondaryColor p-2 d-flex justify-content-center">
                                    <h1 id="hotelStays" class="p-0 m-0">0</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@vite(['resources/js/app.js'])
<script type="module">
    $(document).ready(function() {
        $(".accountSideBarLink").removeClass("active");
        $("#rewardsLink").addClass("active")

        $.ajax({
            type: "GET",
            url: 'rewards/get',
            data: {
                _token: "{{ csrf_token() }}"
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            alert(JSON.parse(jqXHR.responseText).message)
        }).done(function(data, textStatus, jqXHR) {
            console.log(data)
            $("#userTotalPoints").text(data.totalPoints)
            $("#zooVisits").text(data.totalZooBookings)
            $("#hotelStays").text(data.totalHotelBookings)
        })
    });
</script>