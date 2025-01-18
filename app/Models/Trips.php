<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'airline',
        'ticket_type',
        'departure_date',
        'arrival_date',
        'baggage_allowance',
        'type',
        'cost',
        'depature',
        'destination',
        'seats',
        'status',
        'extra_comments'

    ];

    public function user() {

        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
