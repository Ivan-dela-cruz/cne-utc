<?php

namespace App;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use Filterable;
    //
    protected $table = 'candidates';
    protected $fillable = [
        'name',
        'last_name',
        'url_image',
        'organization_id',
        'position_id',
        'start_date',
        'end_date',
        'indent'
    ];

    public function organization()
    {

        return $this->belongsTo(Organization::class, "organization_id");
    }

    public function position()
    {

        return $this->belongsTo(Position::class, "position_id");
    }

    public function elections()
    {
        return $this->belongsToMany(Election::class, 'votes');
    }
}
