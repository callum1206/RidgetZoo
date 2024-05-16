@extends('layouts.app')

@section('content')
<div>
    <div class="row justify-content-center px-4">
        <div class="row">
            <div class="col-lg-5 col-sm-12">
                <img src="{{ asset("/assets/meeakat.png")}}" alt="clothedSeal" style="width: 100%; height:auto">
            </div>
            <div class="col-lg-7 col-sm-12 d-flex align-items-center">
                <p class="lead">
                    Welcome to the bustling world of the meerkats at our zoo's Meerkat Manor! Step into their sandy habitat and
                    witness these adorable creatures in their natural element. As you approach, you'll be greeted by the
                    curious faces of these small mammals, their eyes scanning the horizon for potential predators.
                    Watch as they scurry about, digging burrows, foraging for food, and keeping a vigilant watch over
                    their surroundings. Our specially designed exhibit allows visitors to observe these social animals as
                    they engage in their intricate group dynamics, with some standing sentry while others playfully interact
                    with one another. With informative signage detailing their behaviours and habitats, guests can gain a
                    deeper understanding of the meerkat's fascinating lifestyle and the importance of conservation efforts to
                    protect them in the wild. So come immerse yourself in the lively world of the meerkats, where every moment
                    is filled with charm and excitement!
                </p>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-lg-8 col-sm-12 d-flex align-items-center">
                <p class="lead">
                    Welcome to Penguin Paradise, where the wonders of the Antarctic come alive! Step into our immersive exhibit
                    and be greeted by our colony of sleek, black-and-white penguins. Watch as they gracefully glide through the
                    water and waddle playfully on land. Learn about their unique adaptations and the conservation efforts to protect
                    them. Experience the magic of Penguin Paradise, where these charming birds will capture your heart
                </p>
            </div>
            <div class="col-lg-4 col-sm-12">
                <img src="{{ asset("/assets/penguin.png")}}" alt="clothedSeal" style="width: 100%; height:auto">
            </div>
        </div>
    </div>
</div>
@endsection