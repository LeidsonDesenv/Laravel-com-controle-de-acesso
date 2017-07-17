<?php

namespace App\Policies;


use Illuminate\Auth\Access\HandlesAuthorization;

use App\Notices;
use App\User;

class NoticePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    //essa função é usada através do facade Gate::denies('udpate-notice', $notice) 
    //$valor igual a algo a ser checado pelo Gate no caso a instância de Notices
    public function updateNotice(User $user, Notices $notice){
          return (($user->id === $notice->user_id) or ($user->access_id == 1));         
    }
    
}
