<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationModel extends Model
{
    use HasFactory;
    protected $table = 'reservation_models';
    protected $fillable = [
        'name',
        'mobile',
        'date',
        'passenger_no',
        'pickup',
        'destination',
        'duration_type',
        'comment'
    ];
}
