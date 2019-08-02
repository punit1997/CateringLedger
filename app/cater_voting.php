<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cater_voting extends Model
{
    //
    protected $fillable = [
        'caterId', 'companyId', 'vote',
    ];

//    public function cater()
//    {
//        return $this->belongsTo('App\caters','caterId','id');
//    }
}
