<?php

namespace App;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use Filterable;
    protected $table = 'locations';
    protected $fillable = [
        'code',
        'name',
        'long_name',
        'slug',
        'type',
        'type_id'
    ];
    public function father()
    {
        return $this->belongsTo(Location::class, 'type_id');
    }
    
    public function enclosures()
    {
        return $this->hasMany(Enclosure::class, 'location_id');
    }
}
