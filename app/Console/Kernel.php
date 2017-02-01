<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
use Mail;
use App\Mail\BirthdayNotification;
use Carbon\Carbon;

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
            $users = DB::table('users')->get();
            foreach ($users as $user) {
                $bdays = DB::table('contacts')->select('contactname', 'bday')
                    ->where('user_id', $user->id)
                    ->whereNotNull('bday')
                    ->get();

                $filtered = $bdays->filter(function ($value, $key) {
                    $comingDay = Carbon::parse('+1 week');
                    $carbonDate = Carbon::createFromFormat('Y-m-d', $value->bday);
                    return $carbonDate->isBirthday($comingDay);
                });
                if (count($filtered) != 0) {
                    Mail::to($user)->send(new BirthdayNotification($filtered));
                }
            }
        })->daily();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
