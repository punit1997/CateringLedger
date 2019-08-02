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
        ['companyId', '=', $company->id],
        ['caterId', '=', $cater->id],
         ])->increment('voting');

  }

}
