<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


//use App\Notices;

use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
     //   \App\Notices::class => \App\Policies\NoticePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
       Gate::define('update-notice', function(  $user ,  $notice){
           return  $notice->user_id === $user->id;
       }); 
      
      $permissions = Permission::with('roles')->get(); //retorna permission->name
      
      foreach($permissions as $permission){
          Gate::define($permission->name,function(User $user) use ($permission){
                return $user->hasPermission($permission); //compara roles com user
            });          
      }
      
      
      
    
        
    }
}
