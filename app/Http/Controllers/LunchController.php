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
        ['company_id', '=', $company->id],
        ['cater_id', '=', $cater->id],
         ])->increment('voting');

  }

}
