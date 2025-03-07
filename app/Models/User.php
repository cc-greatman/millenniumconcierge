<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'phone',
        'google_id',
        'session_id',
        'first_name',
        'last_name',
        'referral_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
    * @return string
    */
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    protected $appends = ['referral_link'];

    /**
     * Get the user's referral link.
     *
     * @return string
     */
    public function getReferralLinkAttribute() {

        return $this->referral_link = route('auth.register.show', ['ref' => $this->referral_code]);
    }

    /**
     * Get email token associated with user
     */
    public function userVerify() {

        return $this->hasOne(UserVerify::class);
    }

    public function memberships() {

        return $this->hasOne(Membership::class, 'user_id', 'id');
    }

    public function getMembershipType() {

        $types = [
            0 => "Non Member",
            1 => "Silver Member",
            2 => "Gold Member",
            3 => "Millennium Society Member",
        ];

        // Using the optional() helper to avoid checking if the membership exists
        return $types[optional($this->memberships)->type] ?? "Non Member";

    }

    public function trips() {

        return $this->hasMany(Trips::class, 'user_id', 'id');
    }

    public function bookings() {

        return $this->hasMany(Bookings::class, 'user_id', 'id');
    }

    public function identification() {

        return $this->hasOne(Identification::class, 'user_id', 'id');
    }

    public function reports() {

        return $this->hasMany(Reports::class, 'user_id', 'id');
    }

    public function payments() {

        return $this->hasMany(Payments::class, 'user_id', 'id');
    }

}
