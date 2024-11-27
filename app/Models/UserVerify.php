<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerify extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'token'
    ];

    /**
     * Defining the relationship to the user
     *
     * @return Void
     */
    public function user() {

        return $this->belongsTo(User::class);
    }
}
