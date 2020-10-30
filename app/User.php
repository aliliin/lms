<?php

namespace App;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\UserAddress;
use App\Models\UserInfo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    protected $table = 'users';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'username', 'Openid', 'password', 'role_id', 'vender_type', 'mobile', 'status', 'login_ip'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userinfo($value = '')
    {
        return $this->hasOne(UserInfo::class);
    }

    /** 购物车 */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class,'user_id');
    }

    public function address()
    {
        return $this->hasMany(UserAddress::class);
    }
}
