<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'check_in_date',
        'check_out_date',
        'person_count',
        'room_id'
    ];
    protected $table = 'hotel_booking';
}
