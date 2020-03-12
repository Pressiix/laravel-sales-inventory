<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    const GENERAL_TYPE = 0;
    const DEV_TYPE = 1;
    const AD_OP_TYPE = 2;
    const MANAGEMENT_TYPE = 3;
    const MARKETING_TYPE = 4;
    const SALE_MANAGER_TYPE = 5;
    const SALE_TYPE = 6;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password','username','role','status'
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

    public function isGeneral(){
        return $this->role === self::GENERAL_TYPE;
    }

    public function isDev(){
        return $this->role === self::DEV_TYPE;
    }

    public function isAdOp(){
        return $this->role === self::AD_OP_TYPE;
    }

    public function isManagement(){
        return $this->role === self::MANAGEMENT_TYPE;
    }

    public function isMarketing(){
        return $this->role === self::MARKETING_TYPE;
    }

    public function isSaleManagement(){
        return $this->role === self::SALE_MANAGER_TYPE;
    }

    public function isSale(){
        return $this->role === self::SALE_TYPE;
    }
}
