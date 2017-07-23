@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('layouts.nav')
            <div style="background-color: white ">
                
              
                <h1 style="background-color: #3b699e;; color:white; padding-left: 10px">Todas as Notícias</h1>
                @foreach($news as $notice)
                <h3 class="title-notice">{{$notice->title}}</h3>
                <p class="body-notice">
                    {{$notice->description}}<br>
                    <strong>
                        Escrito por :{{$notice->namewriter->name}}
                    </strong>
                </p>
                <hr/> 
                @endforeach
                
                <nav style="text-align: center">{{$news->links()}}</nav>
                    
               
            </div>
        </div>
    </div>
</div>
@endsection
