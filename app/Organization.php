<?php

namespace App;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use Filterable;
    //
    protected $table = 'organizations';
    protected $fillable = [
        'name',
        'url_image',
        'list',
        'acronym',
        'representative',
        'assembly_members',
        'prefects',
        'mayors'
    ];
    public function candidates(){

        return $this->hasMany(Candidate::class,'organization_id');
    }
     public function votes(){

        return $this->hasMany(Vote::class,'organization_id');
    }
}
