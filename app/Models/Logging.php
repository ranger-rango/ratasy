<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logging extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "category",
        "unit_price",
        "total_weight",
        "total_price"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
