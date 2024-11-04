<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\update_hash::class,
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->command('next_delivery:pasanaku')->cron('0 1 * * *');
        //0 => sunday 1=>monday 2=>tuesday 3=>wednesday 4=>thursday 5=>friday 6=>saturday
        $schedule->command('support:update_hash')->everyMinute();//dailyAt('10:05'); // every monday
        // $schedule->command('next_delivery:pasanaku')->cron('0 1 * * *');
        //0 => sunday 1=>monday 2=>tuesday 3=>wednesday 4=>thursday 5=>friday 6=>saturday
        // $schedule->command('pasanaku:next_delivery')->everyMinute();//weeklyOn(1, '9:55'); // every monday at 9:30
        // $schedule->command('pasanaku:update_status')->everyMinute();//weeklyOn(1, '9:55'); // every monday at 9:30
        // $schedule->command('pasanaku:next_event')->everyMinute();//weeklyOn(1, '9:55'); // every monday at 9:30
        $schedule->command('pasanaku:automatic_advance')->everyMinute();//weeklyOn(1, '9:55'); // every monday at 9:30
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
