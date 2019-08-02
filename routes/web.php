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


// to show cater
route::get('/cater',function(){

    $cater = cater::select('id','name','rating')->get();
    return view('voteCater', compact('cater'));

});

//to vote for cater
route::get('/vote/{id}',function($id){
    $user = auth()->user();
    $company_id = User::select('companyId')->where('id', $user)->get();
    $cater_id = $id;
    $vote = cater_voting::where('caterId', $cater_id)->where('companyId', $company_id)->first();
    $vote->vote = $vote->vote +1;
    cater_voting::where('caterId', $cater_id)->where('companyId', $company_id)->update(['vote'=>$vote->vote]);

    return redirect('/cater');

});

