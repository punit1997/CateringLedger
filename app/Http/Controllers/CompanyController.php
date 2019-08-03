<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{


     public function lunchrate($rate){
        $user=auth()->user();
        $companyId = $user->companyId;
        $company_list = Company::where(['id'=>$companyId])->get();
        $company=$company_list[0];

        $today_lunch = Lunch::where(['id'=>$company->lunchId])->get();
        $old_rating = $today_lunch->rating;
        $count = $today_lunch->count;
        $count = $count + 1;
        $today_lunch->count = $count;
        $today_lunch->rating = ($old_rating * $count + $rate)/($count);
        $today_lunch->save();
        redirect('home');
     }

     public function breakfastrate($rate){
        $user=auth()->user();
        $companyId = $user->companyId;
        $company_list = Company::where(['id'=>$companyId])->get();
        $company=$company_list[0];

        $today_breakfast = Breakfast::where(['id'=>$company->breakfastId])->get();
        $old_rating = $today_breakfast->rating;
        $count = $today_breakfast->count;
        $count = $count + 1;
        $today_breakfast->count = $count;
        $today_breakfast->rating = ($old_rating * $count + $rate)/($count);
        $today_breakfast->save();
        redirect('home');
     }


      public function dinnerrate($rate){
        $user=auth()->user();
        $companyId = $user->companyId;
        $company_list = Company::where(['id'=>$companyId])->get();
        $company=$company_list[0];

        $today_lunch = Dinner::where(['id'=>$company->lunchId])->get();
        $old_rating = $today_dinner->rating;
        $count = $today_dinner->count;
        $count = $count + 1;
        $today_dinner->count = $count;
        $today_dinner->rating = ($old_rating * $count + $rate)/($count);
        $today_dinner->save();
        redirect('home');
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
