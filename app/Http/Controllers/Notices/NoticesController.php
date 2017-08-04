<?php

namespace App\Http\Controllers\Notices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Notices;
use App\User;

class NoticesController extends Controller
{
    public function __construct(){
        $this->notice = new Notices;
    }
    public function index($num)
    {        
        
        $notices = $this->notice->where('user_id', $num)->get(); 
        //vo consultar todos os valores e filtrar na view usando a diretiva @can do blade
        //$notices = $this->notice->all();
        return view('Notices.noticeUser', compact('notices'));        
        
    }
    
    public function writeNotice(){
        return view('Notices.writeNotices');
    }   
    
   
    
    public function create(Request $request)
    {
       $this->validate($request,$this->notice->rules);
       $result = $this->notice->create([
                     'user_id' => auth()->user()->id,
                     'title' => $request->title,
                     'description' => $request->description                
                     ]);
        if($result){
                echo "Dados cadastrados com sucesso.";
                echo '<a href ="'. route("addnotices").'">Voltar</a>' ;
        }
        // dd($result);
            
         else{             
             echo "Erro ao cadastrar.";
             echo '<a href ="'. route("addnotices").'">Voltar</a>' ;
         }             
    }
    
    public function searchByName(Request $request)
    {
        /*
         * assim se usa where com and só usar outro where
         * quando tem 2 parametros é comparado se é igual se precisar ver se é maior
         * menor ou outro operador deve colocar 3 parametro e o operador no meio 
         * igual na matemática.
         */
        $select = $this->notice->where('title', 'like',  $request->txtSearch.'%')
                               ->where('user_id', auth()->user()->id)
                               ->get();
        //dd($select);
        return view('Notices.noticeUser', compact('select'));
    }
    
    public function make()
    {
        factory(\App\Notices::class, 10)->create();
        return "Feito";
    }
}
