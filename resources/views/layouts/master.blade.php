<html>
  <head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/all.css') }}">
  </head>
  <body>

    @include('layouts.header')

    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('/js/all.js') }}"></script>
  </body>
</html>
