<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
<<<<<<< HEAD
=======
=======
     */
    protected function schedule(Schedule $schedule): void
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
     *
     * @return void
     */
    protected function commands()
<<<<<<< HEAD
=======
=======
     */
    protected function commands(): void
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
