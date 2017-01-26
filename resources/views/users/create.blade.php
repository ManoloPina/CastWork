@extends('layouts.master')

@section('content')

  @if(Session::has('success'))
    <p class="bg-success">{{Session::get('success')}}</p>
  @endif

  @if(Session::has('sql-error'))
    <p class="bg-danger">{{Session::get('sql-error')}}</p>
  @endif

  <h1>Cadastro de usuários</h1>
  <form method="post" action="{{action('UserController@store')}}">
    <div class="form-group">
      <label>Nome:</label>
      <input type="text" name="nome" class="form-control"/>
      <span class="text-danger">{{$errors->first('nome')}}</span>
    </div>
    <div class="form-group">
      <label>Login:</label>
      <input type="text" name="login" class="form-control"/>
      <span class="text-danger">{{$errors->first('login')}}</span>
    </div>
    <div class="form-group">
      <label>Email:</label>
      <input type="text" name="email" class="form-control"/>
      <span class="text-danger">{{$errors->first('email')}}</span>
    </div>
    <div class="form-group">
      <label>Senha:</label>
      <input type="password" name="senha" class="form-control"/>
      <span class="text-danger">{{$errors->first('senha')}}</span>
    </div>
    <div class="form-group">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button class="btn btn-primary">Cadastrar</button>
    </div>
  </form>


@endsection
