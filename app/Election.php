<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $table = 'elections';
    protected $fillable = [
        'title',
        'description',
        'date_election',
        'year',
        'results'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'votes');
    }

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'votes');
    }
}
