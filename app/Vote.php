<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table='votes';
    protected $fillable = [
        'user_id',
        'organization_id',
        'canton',
         'parish',
         'enclosure',
         'gender',
         'meeting',
         'votes',
         'type_vote',
         'type_election'
        ];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}