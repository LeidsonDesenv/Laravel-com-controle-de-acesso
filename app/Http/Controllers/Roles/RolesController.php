<?php

namespace App\Http\Controllers\Roles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Role;

class RolesController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('Roles.indexroles', compact('roles'));
    }
            
}
