<?php

namespace Modules\Deposits\Http\Controllers;

use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DepositsController extends Controller
{

    public function index()
    {
        SEOTools::setTitle('Dépôt sur votre compte', false);
        SEOTools::setDescription("Ajoutez des fonds pour investir facilement et rapidement.");
        SEOTools::opengraph()->setUrl(route('home'));
        SEOMeta::addKeyword(['Investissement', 'TradeRepublic']);
        SEOTools::setCanonical(route('home'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::opengraph()->addProperty('locale', app()->getLocale());
        SEOTools::opengraph()->addImage(asset('images/main.jpg'), ['height' => 300, 'width' => 300]);
        SEOTools::jsonLd()->addImage(asset('images/main.jpg'));

        return Inertia::render('Deposits/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deposits::create');
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
        return view('deposits::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('deposits::edit');
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
