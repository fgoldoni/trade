<?php

use App\Http\Controllers\ProfileController;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    SEOTools::setTitle('Investissez simplement et à moindre coût', false);
    SEOTools::setDescription("Découvrez Trade Republic, la plateforme d'investissement moderne qui vous permet d'acheter des actions, ETF et crypto-monnaies en toute simplicité. Profitez de frais réduits, d'une interface intuitive et d'un accès 24h/24 à vos investissements. Faites fructifier votre argent dès aujourd'hui !");
    SEOTools::opengraph()->setUrl(route('home'));
    SEOMeta::addKeyword(['Investissement', 'TradeRepublic']);
    SEOTools::setCanonical(route('home'));
    SEOTools::opengraph()->addProperty('type', 'website');
    SEOTools::opengraph()->addProperty('locale', app()->getLocale());
    SEOTools::opengraph()->addImage(asset('images/main.jpg'), ['height' => 300, 'width' => 300]);
    SEOTools::jsonLd()->addImage(asset('images/main.jpg'));

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->middleware(['auth', 'verified', 'logs-out-banned-user'])->name('home');

Route::redirect('/dashboard', '/')->middleware(['auth', 'verified', 'logs-out-banned-user'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::webhooks('webhook-endpoint');

require __DIR__.'/auth.php';
