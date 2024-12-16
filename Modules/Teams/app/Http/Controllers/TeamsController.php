<?php

namespace Modules\Teams\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Mattiasgeniar\Percentage\Percentage;
use Modules\Products\Models\Product;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $referrals = User::with(['products'])->where('referred_by', auth()->id())
            ->get();
        $total = $referrals->map(fn (User $user) => $user->products()->get())
            ->flatten()
            ->map(fn (Product $product) => $product->price)
            ->sum();
        $revenue= Percentage::of(30, $total);

        return Inertia::render('Teams/Index', ['total' => $total, 'revenue' => $revenue, 'referrals' => $referrals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teams::create');
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
        return view('teams::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('teams::edit');
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
