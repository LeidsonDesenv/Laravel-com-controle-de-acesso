@extends('..layouts.app')
@section('content')
<div class="container">
    
    <div style="background-color: white" class="col-md-10 col-md-offset-1">
    @include('..layouts.nav')
    <h2>Usuários do Sistema</h2>
    <table class="table">
    @foreach($users as $user)
    <tr>
        <td>Nome: {{$user->name}}</td>
        <td>Email: {{$user->email}}    </td>
        <td>
        @foreach($user->roles as $roles)
            Papel : {{$roles->name}}
        @endforeach
        </td>
    </tr>
    @endforeach
    </table>
    </div>
</div>

@endsection
