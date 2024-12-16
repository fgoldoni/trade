<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        SEOTools::setTitle('Connexion à votre compte Trade Republic', false);
        SEOTools::setDescription("Accédez à votre compte Trade Republic pour gérer vos investissements en toute simplicité. Connectez-vous dès maintenant pour suivre vos actions, ETF et crypto-monnaies, et profitez de notre plateforme de courtage sans frais cachés.");
        SEOTools::opengraph()->setUrl(route('home'));
        SEOMeta::addKeyword(['Investissement', 'TradeRepublic']);
        SEOTools::setCanonical(route('home'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::opengraph()->addProperty('locale', app()->getLocale());
        SEOTools::opengraph()->addImage(asset('images/main.jpg'), ['height' => 300, 'width' => 300]);
        SEOTools::jsonLd()->addImage(asset('images/main.jpg'));

        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
