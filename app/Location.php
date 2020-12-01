<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = [
        'code',
        'name',
        'long_name',
        'slug',
        'type',
        'type_id'
    ];

    public function enclosures()
    {
        return $this->hasMany(Enclosure::class, 'location_id');
    }
}
