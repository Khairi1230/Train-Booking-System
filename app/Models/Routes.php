<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    use HasFactory;
    public function buses()
    {
        return $this->hasMany(Bus::class);
    }
    protected $table = 'routes';
    protected $fillable = ['pickup', 'destination'];
}
