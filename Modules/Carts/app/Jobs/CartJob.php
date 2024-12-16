<?php

namespace Modules\Carts\Jobs;

use App\Models\User;
use Core\Traits\ReferralTrait;
use Darryldecode\Cart\Facades\CartFacade;
use HPWebdeveloper\LaravelPayPocket\Facades\LaravelPayPocket;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Str;
use Mattiasgeniar\Percentage\Percentage;
use Modules\Carts\Models\Cart;
use NotchPay\NotchPay;
use NotchPay\Payment;

class CartJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private readonly string $reference, private readonly string $userId)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        NotchPay::setApiKey(env('NOTCHPAY_ID'));

        try {
            $tranx = Payment::verify($this->reference);
            $cart = Cart::find($this->reference . '-' . $this->userId . '_cart_items');

            if ($tranx->transaction->status === 'complete' && $cart) {
                $originalAmount = (int)CartFacade::session($this->reference . '-' . $this->userId)->getTotal();

                if ((int)$tranx->transaction->amount === $originalAmount) {
                    $user = User::find($this->userId);

                    if (CartFacade::session($this->reference . '-' . $this->userId)->getTotal() >= 2000) {
                        $user->deposit('wallet_1', $originalAmount, 'Dépôt');
                    }

                    $cart->delete();
                }
            }
        } catch (\NotchPay\Exceptions\ApiException $e) {
            print_r($e->errors);
            info($this->reference);
            info($e->getMessage());
        }
    }
}
