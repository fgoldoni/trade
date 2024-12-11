<?php

namespace Modules\NotchPay\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Darryldecode\Cart\Facades\CartFacade;
use HPWebdeveloper\LaravelPayPocket\Facades\LaravelPayPocket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Carts\Models\Cart;
use Modules\NotchPay\Http\Requests\StoreNotchPayRequest;
use Modules\Products\Models\Product;
use NotchPay\NotchPay;
use NotchPay\Payment;

class NotchPayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('notchpay::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notchpay::create');
    }


    public function store(StoreNotchPayRequest $request)
    {
        NotchPay::setApiKey(env('NOTCHPAY_ID'));

        $ref = $this->getStr($request);

        try {
            $product = Product::where('price', $request->amount)->first();
            $tranx = Payment::initialize([
                'amount' => $request->amount,       // according to currency format
                'email' => $request->user()->phone . "@email.com",         // unique to customers
                'callback' => route("notchpay.index"),         // unique to customers
                'currency' => 'XAF',         // currency iso code
                'reference' => $ref, // unique to transactions
            ]);

            CartFacade::session($tranx->transaction->reference . '-' . $request->user()->id)->clear();

            if ($product) {
                CartFacade::session($tranx->transaction->reference . '-' . $request->user()->id)->add(array(
                    'id' => $ref,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'attributes' => array(),
                    'associatedModel' => $product
                ));
            } else {
                CartFacade::session($tranx->transaction->reference . '-' . $request->user()->id)->add(array(
                    'id' => $ref,
                    'name' => $request->amount,
                    'price' => $request->amount,
                    'quantity' => 1,
                    'attributes' => array()
                ));
            }


        } catch (\NotchPay\Exceptions\ApiException $e) {
            print_r($e->errors);
            die($e->getMessage());
        }

        return response()->json($tranx);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('notchpay::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('notchpay::edit');
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

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    public function getStr(Request $request): string
    {
        return uniqid() . '-' . $request->user()->id;
    }
}
