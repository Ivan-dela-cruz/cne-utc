<?php

namespace App;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class Enclosure extends Model
{
    use Filterable;
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
