<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Readings extends Model
{
    use HasFactory;

    protected $fillable = [
        'temp', 
        'uscm',
        'ppm',
        'ph',
        'notes',
        'hydrophonic_id',
        'growth_session_id',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
