@extends('..layouts.app')

@section('content')
<div class="container">
    
    <div style="background-color: white" class="col-md-10 col-md-offset-1">
    @include('..layouts.nav') 
        <form method="post" action="{{route("savenotices")}}">
            {{ csrf_field() }}
            <h1>Adicionar Notícia :</h1>
            <label>Titulo: </label>
                <input type="text" name="title"  value=""      /> <br/>
            <label>Descrição: </label>
                <input type="text" name="description" value=""/> <br/>
            <input type="submit" value="Salvar"/>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
            @endif
        </form>
    </div>
</div>


@endsection
