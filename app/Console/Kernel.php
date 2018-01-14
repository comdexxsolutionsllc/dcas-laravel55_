<?php

namespace App\Console;

use App\Console\Commands\AddUser;
use App\Console\Commands\DisableUser;
use App\Console\Commands\EnableUser;
use App\Console\Commands\MakeVueFile;
use App\Console\Commands\ResetPassword;
use Busatlic\ScheduleMonitor\MonitorsSchedule;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class Kernel extends ConsoleKernel
{
    use MonitorsSchedule;

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        MakeVueFile::class,
        AddUser::class,
        DisableUser::class,
        EnableUser::class,
        ResetPassword::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('sitemap:generate')->daily();

        $this->monitor($schedule);
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
