<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rewards extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'points'
    ];
    protected $table = 'rewards';
}
