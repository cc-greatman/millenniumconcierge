<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hotel',
        'room_type',
        'room_qty',
        'cost',
        'check_in',
        'check_out',
        'details',
        'status',

    ];

    public function user() {

        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
