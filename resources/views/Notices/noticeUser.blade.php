@extends('..layouts.app')

@section('content')
<div class="container">
    
    <div style="background-color: white" class="col-md-10 col-md-offset-1">
    @include('..layouts.nav')    
        
        
        <h1 style="background-color: #3b699e;; color:white; padding-left: 10px">Minhas Postagens</h1>
        @foreach($notices as $notice)
        <h3 class="title-notice">{{$notice->title}}</h3>
        <p class="body-notice">{{$notice->description}}</p>
        <hr/>
        @endforeach
    </div>

</div>
@endsection
