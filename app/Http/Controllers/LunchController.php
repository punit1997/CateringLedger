<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LunchController extends Controller
{
  public function vote()
  {
        $user = auth()->user();
        $company = $user->company;
        $cater = $company->cater;

        DB::table('lunches')->where([
        ['companyId', '=', $company->id],
        ['caterId', '=', $cater->id],
         ])->increment('voting');

  }

}
