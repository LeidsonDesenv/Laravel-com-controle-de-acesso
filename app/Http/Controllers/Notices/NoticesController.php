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
        
        $notices = $this->notice->where('user_id', $num)->paginate(8); 
        
        //vo consultar  os valores e filtrar na view usando a diretiva @can do blade
        //poderia solicitar todos os valores e filtrar na view, mas por performance usei a opção acima.
        //$notices = $this->notice->all();
        return view('Notices.noticeUser', compact('notices'));        
        
    }
    
    public function editNotice($id)
    {

       $notices = $this->notice->find($id);      
        
        return view('Notices.writeNotices' , compact('notices') );
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
    
    public function updateNotice(Request $request)
    {
        
        $update = $this->notice->find($request->id)
                ->update([
                    'title' => $request->title,
                    'description' => $request->description
                ]);
        if($update){
            return  "Atualização realizada com sucesso.<br/> <a href=". route("notices",['num' => auth()->user()->id]) .
                    "> Tela de Notícias </a>";
        }   
        else{
            return  "Erro ao atualizar.<br/> <a href=". route("notices") .
                    "> Tela de Notícias </a>";
        }
        
            
       // dd($update);
    }
    
    public function delNotice(Request $request)
    {
        
        
        $del =  $this->notice->find($request->id)->delete();
        if($del){        
            return  "Remoção realizada com sucesso.<br/> <a href=". route("notices",['num' => auth()->user()->id]) .
                    "> Tela de Notícias </a>";
        }
        else {
            return  "Erro ao remover notícia.<br/> <a href=". route("notices",['num' => auth()->user()->id]) .
                    "> Tela de Notícias </a>";
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
