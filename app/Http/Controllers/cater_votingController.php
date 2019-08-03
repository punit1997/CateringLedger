<?php

namespace App\Http\Controllers;

use App\cater;
use App\cater_voting;
use App\Company;
use Illuminate\Http\Request;
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
        $caterers = cater::all();

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


        return view('voteCater',compact('caterers'));
    }

    public function increase()
    {
        $cid = request()->Cid;
        DB::table('cater_votings')->where([
            'id' =>$cid
        ])->increment('vote');
        return "Voting Done";
    }
}
