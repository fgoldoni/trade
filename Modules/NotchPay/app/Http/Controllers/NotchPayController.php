<?php

namespace Modules\NotchPay\Http\Controllers;

use App\Http\Controllers\Controller;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
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


    public function store(Request $request)
    {
        NotchPay::setApiKey(env('NOTCHPAY_ID'));

        $ref = $this->getStr($request);


        try {
            $product = Product::where('price', $request->amount)->first();
            $tranx = Payment::initialize([
                'amount'=>$request->amount,       // according to currency format
                'email'=> $request->user()->phone . "@email.com",         // unique to customers
                'callback'=>route("notchpay.index"),         // unique to customers
                'currency'=>'XAF',         // currency iso code
                'reference'=> $ref, // unique to transactions
            ]);

            CartFacade::session($ref)->clear();

            CartFacade::session($ref)->add(array(
                'id' => $product->id,
                'name' =>$product->name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => $product
            ));
        } catch(\NotchPay\Exceptions\ApiException $e){
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
