@extends('layouts.master')

@section('content')
  @if(Session::has('success'))
    <p class="bg-success">{{Session::get('success')}}</p>
  @endif
  @if(Session::has('sql-error'))
    <p class="bg-danger">{{Session::get('sql-error')}}</p>
  @endif
  <h1>Lista de usuários</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>nome</th>
        <th>login</th>
        <th>email</th>
        <th>Ações</th>
      </tr>
    </thead>
    @foreach ($usuarios as $key => $usuario)
      <tr>
        <td>{{$usuario->id}}</td>
        <td>{{$usuario->nome}}</td>
        <td>{{$usuario->login}}</td>
        <td>{{$usuario->email}}</td>
        <td>
          <form action="{{action('UserController@destroy', $usuario->id)}}" method="delete">
            <div class="form-group">
              <button class="btn btn-danger">deletar</button>
            </div>
          </form>

        </td>
        <td>
          <form action="{{action('UserController@edit', $usuario->id)}}" method="get">
            <div class="form-group">
              <button class="btn btn-primary">editar</button>
            </div>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
@endsection
