<?php

namespace App\Http\Controllers;

use App\Models\HotelBooking;
use App\Models\Rewards;
use App\Models\ZooBooking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RewardsController extends Controller
{
    /**
     * get a newly created resource in storage.
     */
    public function get(Request $request)
    {
        if (Auth::id() == null) {
            throw new \Exception("please login to view your rewards");
        }

        $userRewards = Rewards::where([
            ['user_id', '=', Auth::id()]
        ])->get();

        $userZooTickets = ZooBooking::where([
            ['user_id', '=', Auth::id()]
        ])->get()->count();

        $userHotelBookings = HotelBooking::where([
            ['user_id', '=', Auth::id()]
        ])->get()->count();

        $response = [
            "totalPoints" => $userRewards->sum('points'),
            "totalZooBookings" => $userZooTickets,
            "totalHotelBookings" => $userHotelBookings
        ];

        return $response;
    }
}
