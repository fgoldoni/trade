<?php

namespace Modules\Carts\Jobs;

use App\Models\User;
use Darryldecode\Cart\Facades\CartFacade;
use HPWebdeveloper\LaravelPayPocket\Facades\LaravelPayPocket;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Str;
use Modules\Carts\Models\Cart;
use NotchPay\NotchPay;
use NotchPay\Payment;

class CheckCartJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public function __construct()
    {
        //
    }


    public function handle(): void
    {
        foreach (Cart::all() as $cart) {
            $reference = explode("-", Str::replace('_cart_items', '', $cart->id))[0];
            $userId = explode("-", Str::replace('_cart_items', '', $cart->id))[1];

            NotchPay::setApiKey(env('NOTCHPAY_ID'));

            try {
                $tranx = Payment::verify($reference);

                if ($tranx->transaction->status === 'complete') {
                    if ((int)$tranx->transaction->amount === (int)CartFacade::session($reference . '-' . $userId)->getTotal()) {
                        $user = User::find($userId);

                        if (CartFacade::session($reference . '-' . $userId)->getTotal() >= 5000) {
                            LaravelPayPocket::deposit($user, 'wallet_1', CartFacade::session($reference . '-' . $userId)->getTotal());
                        }

                        $cart->delete();
                    }
                }
            } catch (\NotchPay\Exceptions\ApiException $e) {
                print_r($e->errors);
                info($reference);
                info($e->getMessage());
            }
        }
    }
}
