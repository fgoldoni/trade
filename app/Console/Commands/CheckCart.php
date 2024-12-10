<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Carts\Jobs\CheckCartJob;
use Modules\Carts\Models\Cart;

class CheckCart extends Command
{

    protected $signature = 'app:check-cart';


    protected $description = 'Command description';


    public function handle()
    {
        CheckCartJob::dispatch();
    }
}
