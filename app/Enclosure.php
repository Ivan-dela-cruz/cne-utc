<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enclosure extends Model
{
    protected $table = 'enclosures';
    protected $fillable = [
        'name',
        'meeting_fem',
        'meeting_mas',
        'meeting_total',
        'voters',
        'zone',
        'location_id'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

}
