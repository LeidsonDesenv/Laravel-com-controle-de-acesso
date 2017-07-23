<?php

namespace App\Http\Controllers\Permissions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Permission;

class PermissionsController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        return view('Permissions.indexpermission', compact('permissions'));
    }
}
