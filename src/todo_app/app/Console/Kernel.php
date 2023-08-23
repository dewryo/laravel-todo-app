<?php
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\CheckFailedJobs; // 追加

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // 以下の行をコメントアウトしているので、コメントを解除してスケジュール設定を追加
        // $schedule->command('inspire')->hourly();

        // 追加: CheckFailedJobs コマンドを10分ごとに実行する
        $schedule->command(CheckFailedJobs::class)->everyOneMinutes();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}