<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BreakfastController extends Controller
{
   public function vote()
  {
        $user = auth()->user();
        $company = $user->company;
        $cater = $company->cater;

        DB::table('breakfasts')->where([
        ['company_id', '=', $company->id],
        ['cater_id', '=', $cater->id],
         ])->increment('voting');

  }
}
