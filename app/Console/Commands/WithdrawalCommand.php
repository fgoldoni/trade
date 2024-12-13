<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Withdrawal\Jobs\WithdrawalJob;

class WithdrawalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:withdrawal-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        WithdrawalJob::dispatch();
    }
}
