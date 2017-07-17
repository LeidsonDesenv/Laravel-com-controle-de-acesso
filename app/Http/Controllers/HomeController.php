<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notices;
use Illuminate\Support\Facades\Gate;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $news = $this->notice->all(); //pega todos registros
        //pega as notices do usuário atual
       // $news = $this->notice->where('user_id', auth()->user()->id)->get();
        
        
        return view('home', compact('news'));
    }
    
    public  function update($idNotice){
         $item = $this->notice->find($idNotice);
         //dd($item);
         if(Gate::denies('update-notice', $item))
             abort (403,' You are Unauthorized to Access');
         
         
         return view('notices_update', compact('item'));
    }
}
