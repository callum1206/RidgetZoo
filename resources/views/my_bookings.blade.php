@extends('layouts.app')

@section('content')
<div class="modal fade" id="editZooBookingModal" aria-labelledby="editZooBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editZooBookingModalLabel">Edit Booking #<span id="editZooBookingId"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="editZooBookingDate" class="col-md-4 col-form-label text-md-end">Date</label>
                    <div class="col-md-6">
                        <input id="editZooBookingDate" name="editZooBookingDate" type="date" placeholder="click to select date" class="form-control bg-white" autofocus>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="editZooBookingPersonCount" class="col-md-4 col-form-label text-md-end">How many people?</label>
                    <div class="col-md-6">
                        <input id="editZooBookingPersonCount" name="editZooBookingPersonCount" type="number" placeholder="enter a number" class="form-control bg-white" autofocus>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" style="border-color: black;" type="checkbox" name="editZooBookingEdGuide" id="editZooBookingEdGuide">
                            <label class="form-check-label" for="editZooBookingEdGuide">
                                Educational guide?
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="saveZooBookingEdit" type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editHotelBookingModal" aria-labelledby="editHotelBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editHotelBookingModalLabel">Edit Booking #<span id="editHotelBookingId"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="editHotelCheckInDate" class="col-md-4 col-form-label text-md-end">Check In Date</label>
                    <div class="col-md-6">
                        <input id="editHotelCheckInDate" name="editHotelCheckInDate" type="date" placeholder="click to select date" class="form-control bg-white" autofocus>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="editHotelCheckOutDate" class="col-md-4 col-form-label text-md-end">Check Out Date</label>
                    <div class="col-md-6">
                        <input id="editHotelCheckOutDate" name="editHotelCheckOutDate" type="date" placeholder="click to select date" class="form-control bg-white" autofocus>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="editHotelBookingPersonCount" class="col-md-4 col-form-label text-md-end">How many people?</label>
                    <div class="col-md-6">
                        <input id="editHotelBookingPersonCount" name="editHotelBookingPersonCount" type="number" placeholder="enter a number" class="form-control bg-white" autofocus>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="editHotelBookingRoom" class="col-md-4 col-form-label text-md-end">Room</label>
                    <div class="col-md-6">
                        <select class="form-select bg-white" id="editHotelBookingRoom" disabled="true">
                            <!--  -->
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="saveHotelBookingEdit" type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @include('layouts.account_sidebar')
    <div class="col-lg-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row mb-4">
                    <div class="container">
                        <div class="card">
                            <div class="card-header bg-white">
                                {{ __('Zoo Bookings') }}
                            </div>

                            <div class="card-body appCardColor p-1">
                                <table id="zooBookings" class="table table-borderless m-0">
                                    <thead>
                                        <tr>
                                            <td scope="col">#</td>
                                            <td scope="col">Date Created</td>
                                            <td scope="col">Booked Date</td>
                                            <td scope="col">People</td>
                                            <td scope="col">Educational Guide</td>
                                            <td scope="col"></td>
                                            <td scope="col"></td>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="card">
                            <div class="card-header bg-white">
                                {{ __('Hotel Bookings') }}
                            </div>

                            <div class="card-body appCardColor p-1">
                                <table id="hotelBookings" class="table table-borderless m-0">
                                    <thead>
                                        <tr>
                                            <td scope="col">#</td>
                                            <td scope="col">Date Created</td>
                                            <td scope="col">Check In Date</td>
                                            <td scope="col">Check Out Date</td>
                                            <td scope="col">People</td>
                                            <td scope="col">Room</td>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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
    let userZooBookings = []
    let currentZooBookingIndex = null

    let userHotelBookings = []
    let currentHotelBookingIndex = null

    $(document).ready(function() {
        $(".accountSideBarLink").removeClass("active");
        $("#bookingsLink").addClass("active")

        $.ajax({
            type: "GET",
            url: 'zooBooking/get',
            data: {
                _token: "{{ csrf_token() }}"
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            alert(JSON.parse(jqXHR.responseText).message)
        }).done(function(data, textStatus, jqXHR) {
            let bookings = ""
            userZooBookings = data
            $.each(data, function(_, booking) {
                let edGuide = booking.educational_guide == 1 ? "<i class='bi bi-check'></i>" : ""
                bookings += `
                    <tr>
                        <td scope="row">${booking.id}</td>
                        <td>${moment(booking.created_at).format("MMMM Do YYYY, h:mm a")}</td>
                        <td>${moment(booking.booking_time).format("MMMM Do YYYY")}</td>
                        <td class="">${booking.person_count}</td>
                        <td class="fs-2 p-0 m-0">${edGuide}</td>
                        <td>
                            <button class="btn btn-primary editZooBooking" value="${booking.id}" 
                            data-bs-toggle="modal" data-bs-target="#editZooBookingModal">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger deleteZooBooking" value="${booking.id}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    `
            });
            $("#zooBookings > tbody").append(bookings)
        })

        $.ajax({
            type: "GET",
            url: 'hotelBooking/get',
            data: {
                _token: "{{ csrf_token() }}"
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            alert(JSON.parse(jqXHR.responseText).message)
        }).done(function(data, textStatus, jqXHR) {
            userHotelBookings = data
            let bookings = ""
            $.each(data, function(_, booking) {
                bookings += `
                    <tr>
                        <td scope="row">${booking.id}</td>
                        <td>${moment(booking.created_at).format("MMMM Do YYYY, h:mm a")}</td>
                        <td>${moment(booking.check_in_date).format("MMMM Do YYYY, h:mm a")}</td>
                        <td>${moment(booking.check_out_date).format("MMMM Do YYYY, h:mm a")}</td>
                        <td class="">${booking.person_count}</td>
                        <td class="">${booking.room_id}</td>
                        <td>
                            <button class="btn btn-primary editHotelBooking" value="${booking.id}" 
                            data-bs-toggle="modal" data-bs-target="#editHotelBookingModal">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger deleteHotelBooking" value="${booking.id}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    `
            });
            $("#hotelBookings > tbody").append(bookings)
        })

        $(document).on('click', ".editZooBooking", function() {
            let bookingId = parseInt(this.value)
            currentZooBookingIndex = userZooBookings.findIndex(x => x.id === bookingId)
            let booking = userZooBookings[currentZooBookingIndex]
            console.log(booking)
            $("#editZooBookingId").text(bookingId)
            $("#editZooBookingDate").val(moment(booking.booking_time).format("YYYY-MM-DD"))
            $("#editZooBookingPersonCount").val(booking.person_count)

            $('#editZooBookingEdGuide').prop('checked', false);
            if ((parseInt(booking.educational_guide)) == 1) {
                $('#editZooBookingEdGuide').prop('checked', true)
            }
        });

        $(document).on('click', "#saveZooBookingEdit", function() {
            let x = {
                _token: "{{ csrf_token() }}",
                id: userZooBookings[currentZooBookingIndex].id,
                date: $("#editZooBookingDate").val(),
                personCount: $("#editZooBookingPersonCount").val(),
                edGuide: $("#editZooBookingEdGuide").is(":checked")
            }

            if (x.date.length == 0) {
                alert("enter a date")
                return false
            } else if (x.personCount.length == 0) {
                alert("enter number of people")
                return false
            }

            console.log(x)

            $.ajax({
                type: "POST",
                url: 'zooBooking/update',
                data: x
            }).fail(function(jqXHR, textStatus, errorThrown) {
                alert(JSON.parse(jqXHR.responseText).message)
            }).done(function(data, textStatus, jqXHR) {
                alert("booking updated")
                location.href = location.href
            })
        });

        $(document).on('click', ".deleteZooBooking", function() {
            let bookingId = this.value

            if (!confirm('are you sure you want delete this booking')) {
                return false
            }
            let x = {
                _token: "{{ csrf_token() }}",
                id: bookingId
            }
            $.ajax({
                type: "POST",
                url: 'zooBooking/delete',
                data: x
            }).fail(function(jqXHR, textStatus, errorThrown) {
                alert(JSON.parse(jqXHR.responseText).message)
            }).done(function(data, textStatus, jqXHR) {
                alert("booking deleted")
                location.href = location.href
            })
        });

        $(document).on('click', ".deleteHotelBooking", function() {
            let bookingId = this.value

            if (!confirm('are you sure you want delete this booking')) {
                return false
            }
            let x = {
                _token: "{{ csrf_token() }}",
                id: bookingId
            }
            $.ajax({
                type: "POST",
                url: 'hotelBooking/delete',
                data: x
            }).fail(function(jqXHR, textStatus, errorThrown) {
                alert(JSON.parse(jqXHR.responseText).message)
            }).done(function(data, textStatus, jqXHR) {
                alert("booking deleted")
                location.href = location.href
            })
        });

        $(document).on('click', ".editHotelBooking", function() {
            let bookingId = parseInt(this.value)
            currentHotelBookingIndex = userHotelBookings.findIndex(x => x.id === bookingId)
            let booking = userHotelBookings[currentHotelBookingIndex]
            console.log(booking)
            $("#editHotelBookingId").text(bookingId)
            $("#editHotelCheckInDate").val(moment(booking.check_in_date).format("YYYY-MM-DD"))
            $("#editHotelCheckOutDate").val(moment(booking.check_out_date).format("YYYY-MM-DD"))
            $("#editHotelBookingPersonCount").val(booking.person_count)
            $("#editHotelBookingRoom").empty().append(`<option selected value="${booking.room_id}">room: ${booking.room_number}</option>`)
        });

        $(document).on('click', "#saveHotelBookingEdit", function() {
            let x = {
                _token: "{{ csrf_token() }}",
                id: userHotelBookings[currentHotelBookingIndex].id,
                checkInDate: $("#editHotelCheckInDate").val(),
                checkOutDate: $("#editHotelCheckOutDate").val(),
                personCount: $("#editHotelBookingPersonCount").val(),
                roomId: $("#editHotelBookingRoom").val()
            }

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

            console.log(x)

            $.ajax({
                type: "POST",
                url: 'hotelBooking/update',
                data: x
            }).fail(function(jqXHR, textStatus, errorThrown) {
                alert(JSON.parse(jqXHR.responseText).message)
            }).done(function(data, textStatus, jqXHR) {
                alert("booking updated")
                location.href = location.href
            })
        });

    });
</script>