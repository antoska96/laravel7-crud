
<!doctype html>
<html lang="ru">
  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">

      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <title>@yield('title')</title>

  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success mb-3">
        <div class="container">
        <a class="navbar-brand" href="{{ route('posts.index') }}">Список Всех Задач</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Категорий
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item bg-danger text-white" href="{{ route('posts.first') }}">Обязательно</a>
                <a class="dropdown-item bg-warning text-dark" href="{{ route('posts.second') }}">Нужно</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item bg-light text-dark" href="{{ route('posts.third') }}">Не плохо бы</a>
              </div>
            </li>
          </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav mr-sm-2 ">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                                       document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            <a class="navbar-brand" href="help">Помощь</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
{{--        <a href="#">{{Auth::user()->name}}</a>--}}

{{--        <a class="navbar-brand" href="{{ auth::logout() }}">Выход</a>--}}
      </nav>

<div class="container">
@yield('content')

</div>

  <script src="{{ asset('js/app.js') }}"></script>
<script>
$(function() {
  $('.alert-success').fadeOut(3000);
});
</script>
</body>
</html>
