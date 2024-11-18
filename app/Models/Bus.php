<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'bus_name',
        'route_id',
        'seat',
        'price',
        'owner_id',
        'date',
        'time'

    ];
    function routes()
    {
        return $this->belongsTo(Routes::class, 'route_id');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'bus_id');
    }
}
