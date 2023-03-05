<?php

namespace App\Models;

use App\Traits\HasSettings;
use Dyrynda\Database\Support\CascadeSoftDeletes;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, CascadeSoftDeletes, HasSettings;

    protected array $cascadeDeletes = ['carts', 'products', 'phones'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'username',
        'email',
        'password',
        'fname',
        'surname',
        'is_admin',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getFullNameAttribute()
    {
        return Str::title($this->fname . ' ' . $this->surname);
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function cart(): HasOne
    {
        $cart = Cart::where('user_id', $this->id)->where('status', Cart::$PENDING)->first();
        if (!$cart) {
            $this->carts()->create([
                'status' => Cart::$PENDING,
            ]);
        }
        return $this->hasOne(Cart::class)->where('status', Cart::$PENDING)->latestOfMany();
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class);
    }
}
