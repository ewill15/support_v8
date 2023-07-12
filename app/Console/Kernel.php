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
        Commands\next_delivery::class,
        Commands\update_status::class,
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
        $schedule->command('pasanaku:next_delivery')->everyMinute();//dailyAt('10:05'); // every monday
        $schedule->command('pasanaku:update_status')->weeklyOn(5, '23:00'); // every saturday
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
