<div class="col-lg-2 sidebar appSidebar p-3 d-flex flex-column" style="margin-top: -1.5rem; margin-bottom: -3rem; min-height: 80vh; padding-bottom: 0;">

    <h4 class="ps-3 my-0">My Account</h3>

        <hr>
        <ul class="nav nav-pills flex-column ">
            <li class="nav-item">
                <a href="{{ url('/my_account') }}" class="nav-link active accountSideBarLink" id="homeLink">
                    <i class="bi bi-house-fill pe-2"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="{{ url('/my_rewards') }}" class="nav-link link-dark accountSideBarLink" id="rewardsLink">
                    <i class="bi bi-gift-fill pe-2"></i>
                    Rewards
                </a>
            </li>
            <li>
                <a href="{{ url('/my_bookings') }}" class="nav-link link-dark accountSideBarLink" id="bookingsLink">
                    <i class="bi bi-calendar-event-fill pe-2"></i>
                    Bookings
                </a>
            </li>
        </ul>
</div>

@vite(['resources/js/app.js'])
<script type="module">
    $(document).ready(function() {
        $(".accountSideBarLink").on("click", function() {
            $(".accountSideBarLink").removeClass("active");
            $("#" + this.id).addClass("active")
        });
    });
</script>