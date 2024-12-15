<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use Darryldecode\Cart\Facades\CartFacade;
use Goldoni\CoreRepositories\Repositories\Criteria\EagerLoad;
use Goldoni\CoreRepositories\Repositories\Criteria\Where;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Modules\Products\Http\Requests\StoreProductRequest;
use Modules\Products\Models\Product;
use Modules\Products\Repositories\Contracts\ProductsRepository;
use Modules\Users\Repositories\Contracts\UsersRepository;
use NotchPay\Payment;

class ProductsController extends Controller
{
    public function __construct(private readonly UsersRepository $usersRepository, private readonly ProductsRepository $productsRepository)
    {
    }

    public function index()
    {
        return Inertia::render('Products/Index', ['products' => auth()->user()->products()->get()->all()]);
        return view('products::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products::create');
    }


    public function store(StoreProductRequest $request): \Illuminate\Http\JsonResponse
    {
        $product = null;

        try {
            $product = $this->productsRepository->find($request->id);

            $this->usersRepository->sync($request->id, 'products', [
                $product->id => [
                    'quantity' => 1,
                    'revenue' => $product->price,
                ]
            ], false);

            $request->user()->pay($product->price, 'Achat du ' . $product->name);
        } catch (\Exception $e) {
            logger($e->getMessage());
        }

        return response()->json($product);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('products::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('products::edit');
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
