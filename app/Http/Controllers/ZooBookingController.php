<?php

namespace App\Http\Controllers;

use App\Models\ZooBooking;
use App\Models\Rewards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Throw_;

class ZooBookingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (Auth::id() == null) {
            throw new \Exception("please login to book");
        }
        $edGuide = json_decode($request['edGuide']) ? 1 : 0;

        ZooBooking::create([
            'user_id' => Auth::id(),
            'booking_time' => $request['date'],
            'person_count' => $request['personCount'],
            'educational_guide' => $edGuide
        ]);

        Rewards::create([
            'user_id' => Auth::id(),
            'points' => 1
        ]);
    }

    /**
     * get the specified resource.
     */
    public function get(Request $request)
    {
        if (Auth::id() == null) {
            throw new \Exception("please login to view your bookings");
        }

        $userBookings = ZooBooking::where([
            ['user_id', '=', Auth::id()]
        ])->get();

        return $userBookings;
    }

    /**
     * update the form for creating a new resource.
     */
    public function update(Request $request)
    {
        if (Auth::id() == null) {
            throw new \Exception("please login to edit booking");
        }
        $edGuide = json_decode($request['edGuide']) ? 1 : 0;

        ZooBooking::where('id', $request['id'])->update([
            'booking_time' => $request['date'],
            'person_count' => $request['personCount'],
            'educational_guide' => $edGuide
        ]);
    }

    /**
     * delete booking.
     */
    public function delete(Request $request)
    {
        if (Auth::id() == null) {
            throw new \Exception("please login to delete booking");
        }

        ZooBooking::where('id', $request['id'])->delete();
    }
}
