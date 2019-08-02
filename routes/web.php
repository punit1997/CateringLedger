<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\cater;
use App\cater_voting;
use App\User;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::patch('lunch/vote', 'LunchController@vote');
Route::patch('dinner/vote', 'DinnerController@vote');
Route::patch('breakfast/vote', 'BreakfastController@vote');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


    Route::patch('/vote','HomeController@vote')->middleware('auth', 'throttle:1,1');


route::get('/vote',function(){
    $user = auth()->user();
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
    return "good";
});
