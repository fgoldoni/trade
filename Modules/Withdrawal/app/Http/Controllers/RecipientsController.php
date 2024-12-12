<?php

namespace Modules\Withdrawal\Http\Controllers;

use App\Http\Controllers\Controller;
use Core\Responsable\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use JustSteveKing\StatusCode\Http;
use Modules\Carts\Repositories\Contracts\CartsRepository;
use Modules\Orders\Repositories\Contracts\OrdersRepository;
use Modules\Tickets\Repositories\Contracts\TicketsRepository;
use Modules\Withdrawal\Http\Requests\StoreRecipientRequest;
use Modules\Withdrawal\Repositories\Contracts\RecipientsRepository;

class RecipientsController extends Controller
{
    public function __construct(
        private readonly RecipientsRepository $recipientsRepository,
    ) {

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
            $recipient->account = $request->get('account');
            $recipient->number = $request->get('number');
            $recipient->email = $request->get('number') . '@gmail.com';
            $recipient->reference = uniqid();
            $recipient->save();

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
                status: Http::INTERNAL_SERVER_ERROR,
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
