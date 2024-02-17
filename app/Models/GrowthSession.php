<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrowthSession extends Model
{
    use HasFactory;


    protected $fillable = [
        'session_date','hydrophonic_id'
    ];

    protected $casts = [
        'session_date' => 'datetime'
    ];
}
