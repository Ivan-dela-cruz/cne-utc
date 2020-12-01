<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
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
}
