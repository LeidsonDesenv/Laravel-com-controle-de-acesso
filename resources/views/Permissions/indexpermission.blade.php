@extends('..layouts.app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        @include('..layouts.nav')
        <div style="background-color: white">
            @foreach($permissions as $permission)
            <p>
                {{$permission->name}}<br/>
                {{$permission->description}}<br/>
            </p>
            <hr/>
            @endforeach
            
        </div>
    </div>
</div>

@endsection


