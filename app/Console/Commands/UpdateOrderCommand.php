<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Products\Jobs\UpdateOrderJob;

class UpdateOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-order-command';

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
        UpdateOrderJob::dispatch();
    }
}
