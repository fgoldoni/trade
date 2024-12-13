<?php

namespace Modules\Withdrawal\Http\Controllers;

use App\Http\Controllers\Controller;
use HPWebdeveloper\LaravelPayPocket\Facades\LaravelPayPocket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Mattiasgeniar\Percentage\Percentage;
use Modules\Withdrawal\Http\Requests\StoreWithdrawalRequest;
use Modules\Withdrawal\Models\Withdrawal;

class WithdrawalController extends Controller
{

    public function index(Request $request): \Inertia\Response
    {
        return Inertia::render('Withdrawal/Index', ['recipient' => $request->user()->recipient]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('withdrawal::create');
    }


    public function store(StoreWithdrawalRequest $request)
    {
        try {
            if ($request->amount > $request->user()->getWalletBalanceByType('wallet_1')) {
                throw new \Exception("Nous vous prions de bien vouloir vérifier que le montant du retrait soit inférieur au solde disponible.");
            }

            if (($request->amount % 100) != 0) {
                throw new \Exception("Nous vous prions de bien vouloir vérifier que le montant du retrait soit un multiple de 100.");
            }

            if ($request->user()->recipient) {
                if (!$request->user()->recipient?->rcp) {
                    throw new \Exception("Nous vous informons que le compte de retrait indiqué n'existe pas.");
                }

                if (!$request->user()->recipient?->number) {
                    throw new \Exception("Nous vous informons que le compte de retrait indiqué ne comporte pas de numéro.");
                }
            }

            $recipient = $request->user()->recipient?->rcp;
            $reference = uniqid() . uniqid();
            $amount = (int) ($request->amount - Percentage::of(15, $request->amount));


            $response = Http::acceptJson()->withHeaders(
                [
                    'Authorization' => env('NOTCHPAY_ID'),
                    'X-Grant' => env('NOTCHPAY_X_GRANT'),
                ]
            )->post(env('NOTCHPAY_API_URL') . '/transfers', [
                'recipient' => $recipient,
                'reference' => $reference,
                'amount' => $amount,
                'description' => 'Retrait du ' . now(),
                'currency' => 'XAF',
            ]);

            if ($response->successful()) {
                $withdrawal = new Withdrawal();
                $withdrawal->amount = $response->object()->transfer->amount;
                $withdrawal->booking_amount = $request->amount;
                $withdrawal->amount_total = $response->object()->transfer->amount_total;
                $withdrawal->number = $request->user()->recipient?->number;
                $withdrawal->fee = $response->object()->transfer->fee;
                $withdrawal->beneficiary = $response->object()->transfer->beneficiary;
                $withdrawal->description = $response->object()->transfer->description;
                $withdrawal->reference = $response->object()->transfer->reference;
                $withdrawal->status = $response->object()->transfer->status;
                $withdrawal->currency = $response->object()->transfer->currency;
                $withdrawal->geo = $response->object()->transfer->geo;
                $withdrawal->user_id = $request->user()->id;
                $withdrawal->save();

                if ($response->object()->transfer->status === 'complete') {
                    $request->user()->pay($request->amount, 'Retrait');
                }
            } else if ($response->failed()) {
                logger(self::class . ' - ' . json_encode($response->object()));
                throw new \Exception("Une erreur s'est produite lors du retrait. Nous vous invitons à réessayer ou à contacter le service client pour assistance.");
            }
        } catch (\Exception $e) {
            logger(self::class . ' - ' . $e->getMessage());
            return redirect(route('withdrawal.index', absolute: false))->with('error', $e->getMessage());
        }

        return redirect(route('withdrawal.index', absolute: false))->with('success', 'Félicitations ! Votre compte de retrait a été créé avec succès.');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('withdrawal::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('withdrawal::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
