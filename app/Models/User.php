<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Core\Traits\ReferralTrait;
use HPWebdeveloper\LaravelPayPocket\Interfaces\WalletOperations;
use HPWebdeveloper\LaravelPayPocket\Traits\ManagesWallet;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Number;

class User extends Authenticatable implements BannableContract, WalletOperations
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, ReferralTrait, Bannable, ManagesWallet;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'referred_by',
        'banned_at',
        'phone_verified_at',
        'referral_code',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'banned',
        'balance',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'banned_at' => 'datetime',
            'phone_verified_at' => 'datetime',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function hasVerifiedPhone()
    {
        return ! is_null($this->phone_verified_at);
    }

    public function markPhoneAsVerified()
    {
        return $this->forceFill([
            'phone_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function banned(): Attribute
    {
        return Attribute::get(fn (): string => $this->banned_at ? 'banned' : 'active');
    }

    public function balance(): Attribute
    {
        return Attribute::get(fn (): string => Number::format(
            $this->getWalletBalanceByType('wallet_1'),
            precision: 2,
            locale: app()->getLocale()
        ));
    }
}
