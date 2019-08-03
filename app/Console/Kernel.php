<?php

namespace App\Console;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Company;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

          $schedule->call(function () {
             $companies = Company::all();
            foreach ($companies as $company) {
             $vote = DB::table('lunches')->where(['companyId'=>$company->id, 'caterId'=>$company->caterId])->max('voting');
             $id = DB::table('lunches')->where(['companyId'=>$company->id, 'caterId'=>$company->caterId, 'voting'=>$vote])->first()->id;
             $company->update(['lunchId'=>$id]);
            }
          })->dailyAt('23:00');

          $schedule->call(function () {
             $companies = Company::all();
            foreach ($companies as $company) {
             $vote = DB::table('breakfasts')->where(['companyId'=>$company->id, 'caterId'=>$company->caterId])->max('voting');
             $id = DB::table('breakfasts')->where(['companyId'=>$company->id, 'caterId'=>$company->caterId, 'voting'=>$vote])->first()->id;
             $company->update(['breakfastId'=>$id]);
            }
      })->dailyAt('23:00');

          $schedule->call(function () {
             $companies = Company::all();
            foreach ($companies as $company) {
             $vote = DB::table('dinners')->where(['companyId'=>$company->id, 'caterId'=>$company->caterId])->max('voting');
             $id = DB::table('dinners')->where(['companyId'=>$company->id, 'caterId'=>$company->caterId, 'voting'=>$vote])->first()->id;
             $company->update(['dinnerId'=>$id]);
            }
        })->dailyAt('23:00');

           $schedule->call(function () {
             $companies = Company::all();
            foreach ($companies as $company) {
             $vote = DB::table('cater_votings')->where(['companyId'=>$company->id)->max('voting');
             $id = DB::table('catere_votings')->where(['companyId'=>$company->id, 'voting'=>$vote])->first()->caterId;
             $company->update(['caterId'=>$id]);
            }
          })->weeklyOn(6, '8:00');


          $schedule->call(function () {
          DB::table('lunches')->update(array('voting' => 0));
        })->dailyAt('23:30');

          $schedule->call(function () {
          DB::table('breakfasts')->update(array('voting' => 0));
          })->dailyAt('23:30');

          $schedule->call(function () {
          DB::table('dinners')->update(array('voting' => 0));
        })->dailyAt('23:30');

          $schedule->call(function () {
          DB::table('cater_votings')->update(array('voting' => 0));
        })->weeklyOn(6, '8:30');

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

}
