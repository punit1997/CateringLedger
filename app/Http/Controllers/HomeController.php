<?php

namespace App\Http\Controllers;

use App\Breakfast;
use App\cater;
use App\Check;
use App\Company;
use App\Dinner;
use App\Lunch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=auth()->user();
        $companyId = $user->companyId;
        $company_list = Company::where(['id'=>$companyId])->get();
        $company=$company_list[0];

        $check=Check::where(['userId'=>$user->id])->get();
        if($check->isEmpty()){
            $ch = new Check();
            $ch->userId=$user->id;
            $ch->save();
        }
        $checks=Check::where(['userId'=>$user->id])->first();
        $today_breakfast=Breakfast::where(['id'=>$company->breakfastId])->get();
        $today_lunch = Lunch::where(['id'=>$company->lunchId])->get();
        $today_dinner = Dinner::where(['id'=>$company->dinnerId])->get();

        $breakfast_menu= Breakfast::where(['caterId'=>$company->caterId,'companyId'=>$company->id])->get();
        $lunch_menu= Lunch::where(['caterId'=>$company->caterId,'companyId'=>$company->id])->get();
        $dinner_menu= Dinner::where(['caterId'=>$company->caterId,'companyId'=>$company->id])->get();

        return view('home',compact(['today_breakfast','today_lunch','today_dinner','lunch_menu','breakfast_menu','dinner_menu','checks']));
    }

    public function vote()
    {
        $bid = request()->Bid;
        DB::table('breakfasts')->where([
            'id' =>$bid
        ])->increment('voting');

        $did = request()->Did;
        DB::table('dinners')->where([
            'id' =>$did
        ])->increment('voting');

        $lid = request()->Lid;
        DB::table('Lunches')->where([
            'id' =>$lid
        ])->increment('voting');
        $user=auth()->user();
        $check = Check::where(['userId'=>$user->id])->first();
        $check->voteMenuId=1;
        $check->save();
        return redirect('/home');
    }
}
