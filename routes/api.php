<?php

use Illuminate\Http\Request;
use App\cater;
use App\cater_voting;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|---------------------------------
|Cater api
|---------------------------------
 */

// to show cater
route::get('/cater',function(){

    $cater = cater::select('name','rating')->get();
    return $cater;

});



//to vote for cater
route::put('/vote',function(){
    $user = auth()->user();
    dd($user);
    $company_id = User::select('companyId')->where('id', $user)->get();
    $cater_id = request('cater_id');
    $vote = cater_voting::select('vote')->where('cater_id', $cater_id)->where('companyId', $company_id)->first();
    $vote = $vote +1;
    cater_voting::where('cater_id', $cater_id)->where('companyId', $company_id)->update(['vote'=>$vote]);
    return "good";

});

// to create cater
route::post('/create', function(Request $request){

    $cater = new cater();
    $cater->name = request('name');
    $cater->rating = request('rating');
    $cater->count = request('count');

    $cater->save();

});

// to create user

route::post('/user', function(Request $request){

    $user = new User();

    $user->name	= request('name');
    $user->email = request('email');
    $user->password	= request('password');
    $user->companyId = request('comp_id');

    $user->save();
    return "good";
});

// to create cater vote
route::post('/vote', function(Request $request){

    $catervote = new cater_voting();
    $catervote->cater_id = request('cater_id');
    $catervote->company_id = request('comp_id');
    $catervote->vote = request('vote');

    $catervote->save();

});
