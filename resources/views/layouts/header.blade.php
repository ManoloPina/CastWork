<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img alt="Brand" src="{{asset('/images/logo.png')}}" class="img-responsive">
      </a>
      <ul class="nav navbar-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{action('UserController@create')}}">Cadastrar</a></li>
              <li><a href="{{action('UserController@index')}}">Lista</a></li>
            </ul>
          </li>
   </ul>
    </div>
  </div>
</nav>
