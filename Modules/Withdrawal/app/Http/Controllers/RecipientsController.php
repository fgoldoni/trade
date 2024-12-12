<?php

namespace Modules\Withdrawal\Http\Controllers;

use App\Http\Controllers\Controller;
use Core\Responsable\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Modules\Carts\Repositories\Contracts\CartsRepository;
use Modules\Orders\Repositories\Contracts\OrdersRepository;
use Modules\Tickets\Repositories\Contracts\TicketsRepository;
use Modules\Withdrawal\Http\Requests\StoreRecipientRequest;
use Modules\Withdrawal\Repositories\Contracts\RecipientsRepository;
use function Pest\Laravel\json;

class RecipientsController extends Controller
{
    public function __construct(
        private readonly RecipientsRepository $recipientsRepository,
    )
    {

    }

    public function index(Request $request): \Inertia\Response
    {
        return Inertia::render('Recipients/Index', ['recipient' => $request->user()->recipient]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('withdrawal::create');
    }


    public function store(StoreRecipientRequest $request): JsonResponse
    {
        try {
            $recipient = $request->user()->recipient;
            $recipient->name = $request->get('name');
            $recipient->number = $request->get('number');
            $recipient->channel = 'cm.mobile';
            $recipient->email = uniqid() . uniqid() . '@gmail.com';
            $recipient->reference = uniqid() . uniqid();


            $response = Http::acceptJson()->withHeaders(
                [
                    'Authorization' => env('NOTCHPAY_ID'),
                    'X-Grant' => env('NOTCHPAY_X_GRANT'),
                ]
            )->post(env('NOTCHPAY_API_URL') . '/recipients', $recipient->only([
                'name',
                'reference',
                'channel',
                'number',
                'country',
                'email',
            ]));

            if ($response->successful()) {
                $recipient->rcp = $response->object()->recipient->id;
                $recipient->account = $response->object()->recipient->payment_method->issuer;
                $recipient->channel = $response->object()->recipient->payment_method->channel;
                $recipient->save();
            } else if ($response->failed()) {
                logger(self::class . ' - ' . json_encode($response->object()));
                throw new \Exception("Ce numéro a déjà été enregistré ou une erreur s'est produite lors de la création. Veuillez, s'il vous plaît, contacter le service client.");
            }

            return new JsonResponse(
                data: [
                    'data' => $recipient,
                    'message' => __('The item(s) has been successfully updated'),
                ]
            );
        } catch (\Exception $e) {
            logger(self::class . ' - ' . $e->getMessage());

            return new JsonResponse(
                data: [
                    'message' => $e->getMessage(),
                ],
                status: \JustSteveKing\StatusCode\Http::INTERNAL_SERVER_ERROR,
            );
        }
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
