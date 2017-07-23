<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();        
        return view('Users.indexuser', compact('users'));
    }
}
