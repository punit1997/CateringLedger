<?php

namespace App\Http\Controllers;

use App\Breakfast;
use App\cater;
use App\cater_voting;
use App\Check;
use App\Company;
use App\Dinner;
use App\Lunch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class cater_votingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $catererss = cater::all();
        foreach ($catererss as $caterer)
        {
            $breakfast = Breakfast::where(['caterId'=>$caterer->id])->get();
            $lunch = Lunch::where(['caterId'=>$caterer->id])->get();
            $dinner = Dinner::where(['caterId'=>$caterer->id])->get();
            $countT=0;
            $tol=0;
            foreach ($breakfast as $break)
            {
                $tol =$tol + ($break->rating*$break->count);
                $countT = $countT + $break->count;
            }
            foreach ($lunch as $lun)
            {
                $tol =$tol + ($lun->rating*$lun->count);
                $countT = $countT + $lun->count;
            }
            foreach ($dinner as $din)
            {
                $tol =$tol + ($din->rating*$din->count);
                $countT = $countT + $din->count;
            }
            $caterer->rating=$tol/$countT;
            $caterer->save();
        }


        $caterers = cater::all();
        if(Auth::guest())
            return redirect('/login');
        $user=auth()->user();
        $companyId = $user->companyId;
        $company_list = Company::where(['id'=>$companyId])->get();
        $company=$company_list[0];
        $cater=cater_voting::where(['id'=>$company->caterId])->get();
        if($cater->isEmpty())
        {
            foreach ($caterers as $cat)
            {
                $caterVote = new cater_voting();
                $caterVote->caterId = $cat->id;
                $caterVote->companyId = $company->id;
                $caterVote->vote = 0;
                $caterVote->save();
            }
        }
        $checks = Check::where(['userId'=>$user->id])->first();

        return view('voteCater',compact('caterers','checks'));
    }

    public function increase()
    {
        $cid = request()->Cid;
        DB::table('cater_votings')->where([
            'id' =>$cid
        ])->increment('vote');

        $user=auth()->user();
        $check = Check::where(['userId'=>$user->id])->first();
        $check->caterId=$cid;
        $check->save();

        return "Voting Done";
    }

}
