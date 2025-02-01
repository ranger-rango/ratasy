<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyLedger extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'money_in',
        'expenses',
        'balance',
        'date'
    ];
}
