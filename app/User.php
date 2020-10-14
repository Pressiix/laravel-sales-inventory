<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password','username','status','team_id'
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

    public static function findUserById($id)
    {
        return self::where('id',$id)->first();
    }

    public static function getUserRoleById($id)
    {
        $role = self::where('id',$id)->first()->getRoleNames();
        return (count($role) !== 0 ? $role[0] : '');
    }

    public static function getUserPermissionById($id)
    {
        $user = self::where('id',$id)->first();
        if(!is_null($user))
        {
            $permission =  $user->getAllPermissions();
            return count($permission) !== 0 ? (array) json_decode($permission,true) : [];
        }else{
            return [];
        } 
    }

}
