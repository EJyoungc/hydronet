<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadingPhoto extends Model
{
    use HasFactory;


    protected $fillable = [
        'image',
        'reading_id'
    ];

    public function reading(){
        return $this->belongsTo(Readings::class);
    }
}
