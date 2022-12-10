<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected $command = [
        'App\Console\Commands\ExpiredCommand',
        'App\Console\Commands\MulaiCommand',
        'App\Console\Commands\SelesaiCommand',
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('sewa:expired')->everyMinute();
        $schedule->command('sewa:mulai')->everyMinute();
        $schedule->command('sewa:selesai')->everyMinute();
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
