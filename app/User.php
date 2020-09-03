<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Model\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
    
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    public function checkPermission($permission){
        $roles = $this->roles->load('permissions');
        foreach ($roles as $role) {
            $permissions = $role->permissions;
            if ($permissions->contains('name',$permission)) {
                return true;
            }
        }
        return false;
    }
}
