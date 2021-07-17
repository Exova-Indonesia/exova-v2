<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'provider',
        'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function banks()
    {
        return $this->hasOne(BankAccount::class, 'user_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'seller_id');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'seller_id');
    }

    public function contractSuccess()
    {
        return $this->hasMany(ContractSuccess::class, 'seller_id');
    }

    public function revenue()
    {
        return $this->hasMany(Revenue::class, 'user_id');
    }

    public function withdraw()
    {
        return $this->hasMany(Withdraw::class, 'user_id');
    }

    public function xpoints()
    {
        return $this->hasMany(Xpoint::class, 'user_id');
    }

    const IS_CUST = 1;
    const IS_PHOTO = 2;
    const IS_VIDEO = 3;
}
