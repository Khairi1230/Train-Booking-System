<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'seat',
        'bus_id',
        'user_id'
    ];
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
