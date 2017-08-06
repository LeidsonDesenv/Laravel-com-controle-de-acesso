@extends('..layouts.app')

@section('content')
<div class="container">
    
    <div style="background-color: white" class="col-md-10 col-md-offset-1">
    @include('..layouts.nav') 
    
        @if(isset($notices))    
          <form method="post" action="{{ route("updatenotices" ) }}">
        @else
            <form method="post" action="{{route("savenotices")}}">
        @endif
        
            {{ csrf_field() }}
            <h1>Adicionar Notícia :</h1>
            <label>Titulo: </label>
            
            @if(isset($notices)) <input type="hidden" name="id" value="{{ $notices->id }}"/> @endif
                <input type="text" name="title" 
                       @if(isset($notices)) value="{{ $notices->title }}" 
                       @else value=" {{ old('title') }}" 
                       @endif
                       /> <br/>
            <label>Descrição: </label>
                <input size="80" type="text" name="description"
                       @if(isset($notices)) value="{{ $notices->description }}" 
                       @else value=" {{ old('description') }}" 
                       @endif
                       /> <br/>
                <input class="btn btn-primary" type="submit"
                       @if(isset($notices)) value="Atualizar"
                       @else value="Salvar"
                       @endif />
            </form>
            @if(isset($notices))
            <form action="{{ route("delnotices") }}" method="post" style="margin-top:10px">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $notices->id }}"/>
                <input class="btn btn-danger" type="submit" value="Deletar"/>
            </form>
            @endif
            
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
            @endif
       
    </div>
</div>


@endsection
