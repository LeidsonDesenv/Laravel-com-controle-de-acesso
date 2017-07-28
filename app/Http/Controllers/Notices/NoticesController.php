<?php

namespace App\Http\Controllers\Notices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Notices;

class NoticesController extends Controller
{
    public function __construct(){
        $this->notice = new Notices;
    }
    public function index($num)
    {        
        $notices = $this->notice->where('user_id', $num)->get();
        return view('Notices.noticeUser', compact('notices'));
    }
    
    public function make()
    {
        factory(\App\Notices::class, 10)->create();
        return "Feito";
    }
}
