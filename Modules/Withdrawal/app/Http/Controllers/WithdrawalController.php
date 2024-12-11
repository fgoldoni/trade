<?php

namespace Modules\Withdrawal\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Modules\Withdrawal\Http\Requests\StoreWithdrawalRequest;

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
        //
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
