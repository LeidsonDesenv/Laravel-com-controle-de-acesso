<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Notices;
 

class HomeController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
        $this->notice = new Notices;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = $this->notice->paginate(8); //pega todos registros       
        
        
        return view('home', compact('news'));
    }
    
    public  function update($idNotice){
        
    }
}
