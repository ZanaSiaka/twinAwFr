<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use EsperoSoft\Artisan\Console\Commands\MakeCrudCommand;
use EsperoSoft\Artisan\Console\Commands\MakeServiceCommand;
use EsperoSoft\Artisan\Console\Commands\MakeEntityCommand;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

            $this->getArtisan()->add( new MakeEntityCommand() );
            $this->getArtisan()->add( new MakeCrudCommand() );
            $this->getArtisan()->add( new MakeServiceCommand() );

        require base_path('routes/console.php');
    }
}
