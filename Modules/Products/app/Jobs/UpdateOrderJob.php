<?php

namespace Modules\Products\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mattiasgeniar\Percentage\Percentage;
use Modules\Products\Models\ProductUser;

class UpdateOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        ProductUser::with(['user', 'product'])->whereDate('updated_at', now()->yesterday())->get()->each(function (ProductUser $productUser) {
            $productUser->increment('quantity');
            $productUser->user()->first()->deposit('wallet_1', Percentage::of(20, $productUser->product->price), "Revenue (". $productUser->product->name .") du " . now()->format('d M, Y H:i'));
        });
    }
}
