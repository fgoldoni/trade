<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Carts\Models\Cart;

class CheckCart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-cart';

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
        foreach(Cart::all() as $cart){
            info($cart->id);
        }
    }
}
