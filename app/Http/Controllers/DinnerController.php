<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DinnerController extends Controller
{
      public function vote()
  {
        $user = auth()->user();
        $company = $user->company;
        $cater = $company->cater;

        DB::table('dinners')->where([
        ['company_id', '=', $company->id],
        ['cater_id', '=', $cater->id],
         ])->increment('voting');

  }

}
