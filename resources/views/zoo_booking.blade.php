@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">{{ __('Booking') }}</div>

                <div class="card-body appCardColor">
                    <div class="row mb-3">
                        <label for="date" class="col-md-4 col-form-label text-md-end">Date</label>

                        <div class="col-md-6">
                            <input id="date" name="date" type="date" placeholder="click to select date" class="form-control bg-white" autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="personCount" class="col-md-4 col-form-label text-md-end">How many people?</label>

                        <div class="col-md-6">
                            <input id="personCount" name="personCount" type="number" placeholder="enter a number" class="form-control bg-white" autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" style="border-color: black;" type="checkbox" name="edGuide" id="edGuide">

                                <label class="form-check-label" for="edGuide">
                                    Educational guide?
                                </label>
                            </div>
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
                date: $("#date").val(),
                personCount: $("#personCount").val(),
                edGuide: $("#edGuide").is(":checked")
            }
            
            if (x.date.length == 0) {
                alert("enter a date")
                return false
            } else if (x.personCount.length == 0) {
                alert("enter number of people")
                return false
            } 

            $.ajax({
                type: "POST",
                url: 'zooBooking/book',
                data: x
            }).fail(function(jqXHR, textStatus, errorThrown) {
                alert(JSON.parse(jqXHR.responseText).message)
            }).done(function(data, textStatus, jqXHR) {
                alert("booking created")
            })
        });

    });
</script>