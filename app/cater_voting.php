<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cater_voting extends Model
{
    //
    protected $fillable = [
        'cater_id', 'company_id', 'vote',
    ];

    public function cater()
    {
        return $this->belongsTo('App\caters','cater_id','id');
    }
}
