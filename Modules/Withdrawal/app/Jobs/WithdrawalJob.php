<?php

namespace Modules\Withdrawal\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;
use Modules\Withdrawal\Models\Withdrawal;

class WithdrawalJob implements ShouldQueue
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
        Withdrawal::where('status', 'pending')->orWhere('status', 'sent')->with(['user'])->get()->each(function (Withdrawal $withdrawal) {
            $response = Http::acceptJson()->withHeaders(
                [
                    'Authorization' => env('NOTCHPAY_ID'),
                    'X-Grant' => env('NOTCHPAY_X_GRANT'),
                ]
            )->get(env('NOTCHPAY_API_URL') . '/transfers/' . $withdrawal->reference);

            if ($response->object()->transfer->status === 'complete') {
                $withdrawal->status = $response->object()->transfer->status;
                $withdrawal->save();
            } else if($response->object()->transfer->status === 'failed' || $response->object()->transfer->status === 'rejected' || $response->object()->transfer->status === 'expired') {
                $withdrawal->user->deposit('wallet_1', $withdrawal->booking_amount, 'Retour de paiement : Motif ( ' . $response->object()->transfer->status . ' )');
                $withdrawal->status = $response->object()->transfer->status;
                $withdrawal->save();
            }
        });
    }
}
