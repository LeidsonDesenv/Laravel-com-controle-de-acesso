<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Permission;

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
    
    public function roles(){
        //retorna todos os papeis do usuário como Publisher, Adm, Editor e etc
        return  $this->belongsToMany(\App\Role::class);
    }
    //pega uma instancia de uma permission, mas que no caso já está populada com
    // os dados de roles retornando role<->permission
    public function hasAnyRole($permissionRoleName){
        if(is_array($permissionRoleName) || is_object($permissionRoleName)){
            return !! $permissionRoleName->intersect($this->roles)->count();
        }
        return $this->roles->contains('name', $permissionRoleName);
         
        
        
    }
    
    public function hasPermission(Permission $permission){ 
        return $this->hasAnyRole($permission->roles);
    }
    
    
}
