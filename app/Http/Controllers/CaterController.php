<?php

namespace App\Http\Controllers;

use App\Breakfast;
use App\cater;
use App\Company;
use App\Dinner;
use App\Lunch;
use Illuminate\Http\Request;

class CaterController extends Controller
{
    public function show($id)
    {
        $companies = Company::where(['caterId'=>$id])->get();

        $cater=cater::findorfail($id);
        $user=auth()->user();
        $companyId = $user->companyId;
        $company = Company::where(['id'=>$companyId])->first();

        $breakfastR=0.0;
        $lunchR=0.0;
        $dinnerR=0.0;
        $countR=0;

        $breakfast=Breakfast::where(['companyId'=>$company->id,'caterId'=>$cater->id])->get();
        $lunch=Lunch::where(['companyId'=>$company->id,'caterId'=>$cater->id])->get();
        $dinner=Dinner::where(['companyId'=>$company->id,'caterId'=>$cater->id])->get();

        foreach ($lunch as $item) {
            $lunchR= $lunchR + ($item->rating * $item->count);
            $countR=$countR+$item->count;
        }
        if($countR!=0)
        $lunchR=$lunchR/$countR;
        $lunchR = number_format((float)$lunchR, 2, '.', '');
        $countR=0;
        foreach ($breakfast as $item) {
            $breakfastR= $breakfastR + ($item->rating * $item->count);
            $countR=$countR+$item->count;
        }
        if($countR!=0)
        $breakfastR = $breakfastR/$countR;
        $breakfastR = number_format((float)$breakfastR, 2, '.', '');
        $countR=0;

        foreach ($dinner as $item) {
            $dinnerR= $dinnerR + ($item->rating * $item->count);
            $countR=$countR+$item->count;
        }
        if($countR!=0)
        $dinnerR=$dinnerR/$countR;
        $dinnerR = number_format((float)$dinnerR, 2, '.', '');



        return view('caterer',compact('companies','cater','breakfast','lunch','dinner','breakfastR','lunchR','dinnerR'));
    }
}
