<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Core\Traits\ReferralTrait;
use HPWebdeveloper\LaravelPayPocket\Facades\LaravelPayPocket;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    use ReferralTrait;
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        SEOTools::setTitle('Inscription sur Trade Republic - Commencez à investir facilement', false);
        SEOTools::setDescription("Acceptez l'invitation et recevez 600 FCFA de bonus !");
        SEOTools::opengraph()->setUrl(route('home'));
        SEOMeta::addKeyword(['Investissement', 'TradeRepublic']);
        SEOTools::setCanonical(route('home'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::opengraph()->addProperty('locale', app()->getLocale());
        SEOTools::opengraph()->addImage(asset('images/main.jpg'), ['height' => 300, 'width' => 300]);
        SEOTools::jsonLd()->addImage(asset('images/main.jpg'));

        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'phone' => 'required|numeric|digits:9|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $referredBy = null;

        if ($request->referral_code) {
            $referredBy = $this->getUserIdByReferralCodeAndIncrementCount($request->referral_code);
        }

        $user = User::create([
            'name' => $request->phone,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'referred_by' => $referredBy,
            'referral_code' => $this->generate(),
            'ip' => $request->ip()
        ]);

        LaravelPayPocket::deposit($user, 'wallet_1', 600, "Bonus de bienvenue à l'inscription");

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }
}
