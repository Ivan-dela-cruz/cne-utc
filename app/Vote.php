<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table='votes';
    protected $fillable = [
        'user_id',
        'enclosure_id',
        'candidate_id',
         'election_id',
         'meeting',
         'gender',
         'type_vote'
        ];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }
}
