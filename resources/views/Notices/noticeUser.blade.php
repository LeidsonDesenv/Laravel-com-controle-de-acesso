@extends('..layouts.app')

@section('content')
<div class="container">
    
    <div style="background-color: white" class="col-md-10 col-md-offset-1">
    @include('..layouts.nav')    
    
    <div style="margin-top:15px" class="btn-group" role="group" aria-label="add-edit-remove">
        <a href="{{route("addnotices")}}" class="btn btn-md btn-primary">Adicionar</a>
        <a href="#" class="btn btn-md btn-primary">Editar</a>
        <a href="#" class="btn btn-md btn-primary">Remover</a>
        <form style="margin-top:0" class="navbar-form navbar-left" method="post" 
              action="{{ route("search") }}">
            {{ csrf_field()}}
            
            <div class="form-group">
              <input type="text" class="form-control" name="txtSearch" placeholder="Pesquisa">
            </div>
            <button type="submit" class="btn btn-default">Procurar</button>
        </form>
    </div>
    
       
     
        
        
        <h1 style="background-color: #3b699e;; color:white; padding-left: 10px">Minhas Postagens</h1>
     
            @if(isset($notices))            
                @foreach($notices as $notice)
                    @can('update-notice', $notice) 
                    <!--can funciona em um registro não funciona no select completo -->
                    <h3 class="title-notice">{{$notice->title}}</h3>
                    <p class="body-notice">{{$notice->description}}</p>
                    <p><strong>Autor: {{ $notice->namewriter->name }}</strong></p>
                    <hr/>
                    @endcan
                @endforeach            
            @endif
        
            @if(isset($select))
                @foreach($select as $item)
                <h3 class="title-notice">{{$item->title}}</h3>
                <p class="body-notice">{{$item->description}}</p>
                <p><strong>Autor: {{ $item->namewriter->name }}</strong></p>
                <hr/>
                @endforeach
            @endif
        
    </div>

</div>
@endsection
