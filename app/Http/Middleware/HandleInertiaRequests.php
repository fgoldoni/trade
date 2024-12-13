<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Modules\Products\Models\Product;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'app' => [
                'name' => env('APP_NAME', 'Laravel'),
                'description' => "Investissez aujourd'hui et recevez votre premier paiement en moins d'une heure",
                'content' => "Trade Republic est une plateforme financière européenne qui permet aux utilisateurs d'investir facilement et à moindre coût dans des actions, des ETF, des cryptomonnaies et d'autres produits financiers. C’est ce qu’on appelle un néo-courtier, connu pour ses faibles frais et son application conviviale.",
                'image' => asset('images/main.jpg'),
                'days' => 90,
                'phone' => "+4917647159315",
                'currency' => "XAF",
                'channels' => [
                    [
                        'value' => 'cm.mtn',
                        'name' => 'MTN Cameroon Mobile Money',
                    ],
                    [
                        'value' => 'cm.orange',
                        'name' => 'Orange Cameroon Cameroon',
                    ],
                ],
            ],
            'products' => Product::get(),
            'accounts' => ['Orange', 'Mtn'],
            'notchPayUrl' => config('system.notch_pay_url'),
            'flash' => [
                'error' => fn () => $request->session()->get('error'),
                'success' => fn () => $request->session()->get('success'),
            ],
        ];
    }
}
