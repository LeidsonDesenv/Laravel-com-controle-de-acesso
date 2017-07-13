@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div style="background-color: white ">
                <article>
                <h3>{{$item->title}}</h3>
                <p>{{$item->description}} <br/>
                    <strong>Autor: {{$item->namewriter->name}}</strong>                    
                </p>
                </article>
            </div>
        </div>
    </div>
</div>
@endsection