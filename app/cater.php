<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cater extends Model
{
    //
    protected $fillable = [
        'name', 'rating', 'count',
    ];

    public function cater_vote(){
        return $this->hasmany('App\cater_votings','cater_id','id');
    }
}
