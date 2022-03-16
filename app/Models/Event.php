<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'start_time',
        'end_time',
        'time_meridiem',
        'start_date',
        'end_date',
        'images',
      
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'events_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'events_id');
    }
}
