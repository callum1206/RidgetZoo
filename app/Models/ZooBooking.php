<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZooBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'booking_time',
        'person_count',
        'educational_guide'
    ];
    protected $table = 'zoo_booking';
}
