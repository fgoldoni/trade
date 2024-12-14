<?php

namespace Modules\Transactions\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Modules\Withdrawal\Models\Withdrawal;

class TransactionsController extends Controller
{

    public function index(Request $request): \Inertia\Response
    {
//        dd(now()->format('d M, Y H:i'));
        $transactions = [];

        $wallet = $request->user()->wallets()->where('type', 'wallet_1')->first();
        $withdrawals = Withdrawal::where('user_id', $request->user()->id)->latest()->get();


        if ($wallet) {
            $transactions = $wallet->logs()->latest()->get();
        }

        return Inertia::render('Transactions/Index', compact('transactions', 'withdrawals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactions::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('transactions::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('transactions::edit');
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
