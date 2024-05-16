@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">{{ __('Hotel Booking') }}</div>

                <div class="card-body appCardColor">
                    <div class="row mb-3">
                        <label for="checkInDate" class="col-md-4 col-form-label text-md-end">Check In Date</label>

                        <div class="col-md-6">
                            <input id="checkInDate" name="checkInDate" type="date" placeholder="click to select date" class="form-control bg-white" autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="checkOutDate" class="col-md-4 col-form-label text-md-end">Check Out Date</label>

                        <div class="col-md-6">
                            <input id="checkOutDate" name="checkOutDate" type="date" placeholder="click to select date" class="form-control bg-white" autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="personCount" class="col-md-4 col-form-label text-md-end">How many people?</label>

                        <div class="col-md-6 col">
                            <div class="input-group ">
                                <input type="number" class="form-control bg-white" name="personCount" id="personCount" placeholder="number of people" aria-describedby="searchRooms">
                                <span class="input-group-text" id="searchRooms" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                    </svg>
                                    <span class="ms-1">Find Rooms</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="room" class="col-md-4 col-form-label text-md-end">Select Room</label>

                        <div class="col-md-6">
                            <select class="form-select bg-white" id="room">
                                <option selected>enter number of people and search</option>
                            </select>
                        </div>

                    </div>

                    <div class="row mb-0">
                        <div class="col d-flex justify-content-center">
                            <button type="submit" id="submit" class="btn btn-primary">
                                Submit
                            </button>
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
        $("#submit").on("click", function() {
            let x = {
                _token: "{{ csrf_token() }}",
                checkInDate: $("#checkInDate").val(),
                checkOutDate: $("#checkOutDate").val(),
                personCount: $("#personCount").val(),
                roomId: $("#room").val()
            }
            console.log(x)
            if (x.checkInDate.length == 0) {
                alert("enter check in date")
                return false
            } else if (x.checkOutDate.length == 0) {
                alert("enter check out date")
                return false
            } else if (x.personCount.length == 0) {
                alert("enter number of people")
                return false
            } else if (!($.isNumeric(x.roomId))) {
                alert("select a room")
                return false
            }

            $.ajax({
                type: "POST",
                url: 'hotelBooking/book',
                data: x
            }).fail(function(jqXHR, textStatus, errorThrown) {
                alert(JSON.parse(jqXHR.responseText).message)
            }).done(function(data, textStatus, jqXHR) {
                alert("booking created")
            })
        });

        $("#searchRooms").on("click", function() {
            $("#room").empty()
            let x = {
                personCount: $("#personCount").val(),
                checkInDate: moment($("#checkInDate").val()).format("YYYY-MM-DD hh:mm:ss"),
                checkOutDate: moment($("#checkOutDate").val()).format("YYYY-MM-DD hh:mm:ss")
            }
            console.log(x.personCount)

            if (!(x.personCount.length > 0)) {
                alert("please first enter number of people")
                return false
            }

            $.ajax({
                type: "GET",
                url: 'rooms/get',
                data: x
            }).fail(function(jqXHR, textStatus, errorThrown) {
                alert(JSON.parse(jqXHR.responseText).message)
            }).done(function(data, textStatus, jqXHR) {
                console.log(data)
                let roomOptions = ""
                $.each(data, function(_, room) {
                    console.log(room)
                    roomOptions += `<option value="${room.id}">room: ${room.room_number} | capacity: ${room.person_capacity}</option>`
                });
                $("#room").append(roomOptions)
            })
        })

    });
</script>