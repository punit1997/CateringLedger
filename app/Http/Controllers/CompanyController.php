<?php

namespace App\Http\Controllers;

use App\Breakfast;
use App\Check;
use App\Company;
use App\Dinner;
use App\Lunch;
use Illuminate\Http\Request;

class CompanyController extends Controller
{


     public function lunchrate(){
//         dd("lunch");


         $rate=request()->lunch;
        $user=auth()->user();
        $companyId = $user->companyId;
        $company_list = Company::where(['id'=>$companyId])->get();
        $company=$company_list[0];

         $check = Check::where(['userId'=>$user->id])->first();
         $check->lunchRateId=1;
         $check->save();


        $today_lunch = Lunch::where(['id'=>$company->lunchId])->first();
        $old_rating = $today_lunch->rating;
        $count = $today_lunch->count;
        $count = $count + 1;
        $today_lunch->count = $count;
        $today_lunch->rating = ($old_rating * ($count-1) + $rate)/($count);
        $today_lunch->save();
        return redirect('/home');
     }

     public function breakfastrate(){
         $rate=request()->breakfast;
//         dd("Break");
        $user=auth()->user();
        $companyId = $user->companyId;
        $company_list = Company::where(['id'=>$companyId])->get();
        $company=$company_list[0];

         $check = Check::where(['userId'=>$user->id])->first();
         $check->breakfastRateId=1;
         $check->save();


         $today_breakfast = Breakfast::where(['id'=>$company->breakfastId])->first();
        $old_rating = $today_breakfast->rating;
        $count = $today_breakfast->count;
        $count = $count + 1;
        $today_breakfast->count = $count;
        $today_breakfast->rating = ($old_rating * ($count-1) + $rate)/($count*1.0);
        $today_breakfast->save();
        return redirect('/home');
     }


      public function dinnerrate(){
//         dd("dinner");
         $rate=request()->dinner;
        $user=auth()->user();
        $companyId = $user->companyId;
        $company_list = Company::where(['id'=>$companyId])->get();
        $company=$company_list[0];

          $check = Check::where(['userId'=>$user->id])->first();
          $check->dinnerRateId=1;
          $check->save();

        $today_dinner = Dinner::where(['id'=>$company->lunchId])->first();
        $old_rating = $today_dinner->rating;
        $count = $today_dinner->count;
        $count = $count + 1;
        $today_dinner->count = $count;
        $today_dinner->rating = ($old_rating * ($count-1) + $rate)/($count);
        $today_dinner->save();
        return redirect('/home');
     }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
