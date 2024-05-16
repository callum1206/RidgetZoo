<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\HotelBooking;

use Illuminate\Http\Request;

class RoomsController extends Controller
{
    /**
     * Get the specified resource.
     */
    public function get(Request $request)
    {
        $rooms = Rooms::where([
            ['person_capacity', '>=', $request['personCount']]
        ])->get()->toArray();

        $start = $request['checkInDate'];
        $end = $request['checkOutDate'];
        $overlappingBookings = HotelBooking::join('hotel_rooms', function ($join) use ($start, $end) {
            $join->on('hotel_booking.room_id', '=', 'hotel_rooms.id')
                ->where(function ($query) use ($start) {
                    $query->where('check_in_date', '<=', $start);
                    $query->where('check_out_date', '>=', $start);
                })->orWhere(function ($query) use ($end) {
                    $query->where('check_in_date', '<=', $end);
                    $query->where('check_out_date', '>=', $end);
                });
        })->get()->toArray();

        $avaliableRooms = [];
        foreach ($rooms as $room) {
            $res = array_filter($overlappingBookings, function ($booking) use ($room) {
                return $booking["room_id"] == $room['id'];
            });

            if (!$res) {
                array_push($avaliableRooms, [
                    "id" => $room['id'],
                    "room_number" => $room['room_number'],
                    "person_capacity" => $room['person_capacity']
                ]);
            }
        }

        return $avaliableRooms;
    }
}
