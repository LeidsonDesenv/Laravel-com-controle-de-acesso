@extends('..layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
            @include('layouts.nav')
            <div style="background-color: white "> 
                @foreach($roles as $role)
                <p>
                    {{$role->name}}<br/>
                    {{$role->description}}
                </p> 
                <hr/>
                @endforeach
            </div>
</div>

@endsection

