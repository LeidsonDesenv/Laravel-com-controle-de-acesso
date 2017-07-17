@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div style="background-color: white ">
              @foreach($news as $new)
              <article>
                <h3>{{$new->title}}</h3>
                <p>{{$new->description}} <br/>
                    <strong>Autor: {{$new->namewriter->name}}</strong>                    
                </p>
                @can('update-notice', $new )
                <p>                    
                    <a href="{{url("update/$new->id")}}">Editar</a>
                </p>
                @endcan
                
              </article>  
              @endforeach
              
            </div>
        </div>
    </div>
</div>
@endsection
