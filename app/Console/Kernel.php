<?php

namespace App\Console;

use App\Http\Controllers\ScheduleChangeName;
use App\Http\Controllers\ScheduledMessage;
use App\Http\Controllers\ScheduleHideMessage;
use App\Http\Controllers\ScheduleResponse;
use App\Http\Controllers\ScheduleUnreadMessage;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use PhpParser\Node\Expr\New_;

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
        // $schedule->command('inspire')->hourly();

        $schedule->call(new ScheduledMessage())->everyMinute();
        $schedule->call(new ScheduleUnreadMessage())->everyTwoHours();
        $schedule->call(new ScheduleHideMessage())->everyMinute();
        $schedule->call(new ScheduleResponse())->everyMinute();
//        $schedule->call(new ScheduleChangeName())->monthly(); //Run the task on the first day of every month at 00:00
//        $schedule->call(new NotRespondedMessageController())->everyMinute();
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
