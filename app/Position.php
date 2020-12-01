<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    protected $table = 'positions';
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
    ];
    public function candidate(){
    
       return $this->belongsTo(Candidate::class,"position_id");

    }
}
