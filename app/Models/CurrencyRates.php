<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyRates extends Model
{
    use HasFactory;

    protected $fillable = ['currency_code', 'exchange_rate'];
}
