<?php

namespace App\Http\Controllers;

use App\Models\HotelBooking;
use App\Models\Rewards;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HotelBookingController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (Auth::id() == null) {
            throw new \Exception("please login to book");
        }
        HotelBooking::create([
            'user_id' => Auth::id(),
            'check_in_date' => $request['checkInDate'],
            'check_out_date' => $request['checkOutDate'],
            'person_count' => $request['personCount'],
            'room_id' => $request['roomId']
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
        $userId = Auth::id() ?? null;

        if ($userId == null) {
            throw new \Exception("please login to view your bookings");
        }

        $userBookings = HotelBooking::join('hotel_rooms', function ($join) use ($userId) {
            $join->on('hotel_booking.room_id', '=', 'hotel_rooms.id')
                ->where(function ($query) use ($userId) {
                    $query->where('hotel_booking.user_id', '=', $userId);
                });
        })->get(array(
            'hotel_booking.id',
            'hotel_booking.created_at',
            'hotel_booking.user_id',
            'hotel_booking.check_in_date',
            'hotel_booking.check_out_date',
            'hotel_booking.room_id',
            'hotel_booking.person_count',
            'hotel_rooms.room_number',
            'hotel_rooms.person_capacity',
        ));

        return $userBookings;
    }


    /**
     * delete booking.
     */
    public function delete(Request $request)
    {
        if (Auth::id() == null) {
            throw new \Exception("please login to delete booking");
        }

        HotelBooking::where('id', $request['id'])->delete();
    }

    /**
     * update the form for creating a new resource.
     */
    public function update(Request $request)
    {
        if (Auth::id() == null) {
            throw new \Exception("please login to edit booking");
        }

        HotelBooking::where('id', $request['id'])->update([
            'check_in_date' => $request['checkInDate'],
            'check_out_date' => $request['checkOutDate'],
            'person_count' => $request['personCount'],
            'room_id' => $request['roomId']
        ]);
    }
}
