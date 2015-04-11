@extends('juannjuan.default')

@section('content')
  <div id="view__viewport" data-ui-view>
    <h1 class="sr-only">{{ $view->title }}</h1>

    {{--<nav class="navbar navbar-default navbar-fixed-top">--}}
      {{--<h2 class="sr-only">Navigation</h2>--}}
      {{--<div class="container-fluid">--}}
        {{--<div class="navbar-header">--}}
          {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">--}}
            {{--<span class="sr-only">Toggle Navigation</span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
          {{--</button>--}}
          {{--<a class="navbar-brand" href="#">{{ $app->name }}</a>--}}
        {{--</div>--}}

        {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
          {{--<ul class="nav navbar-nav">--}}
            {{--<li><a href="{{ url('/') }}">Home</a></li>--}}
          {{--</ul>--}}

          {{--<ul class="nav navbar-nav navbar-right">--}}
            {{--@if (Auth::guest())--}}
              {{--<li><a href="{{ url('/auth/login') }}">Login</a></li>--}}
              {{--<li><a href="{{ url('/auth/register') }}">Register</a></li>--}}
            {{--@else--}}
              {{--<li class="dropdown">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>--}}
                {{--<ul class="dropdown-menu" role="menu">--}}
                  {{--<li><a href="{{ url('/auth/logout') }}">Logout</a></li>--}}
                {{--</ul>--}}
              {{--</li>--}}
            {{--@endif--}}
          {{--</ul>--}}
        {{--</div>--}}
      {{--</div>--}}
    {{--</nav>--}}

    @yield('body')
  </div>
@stop