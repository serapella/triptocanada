<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id',
        'name',
        'email',
        'number_of_people',
        'status',
    ];

    protected $casts = [
        'number_of_people' => 'integer',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
