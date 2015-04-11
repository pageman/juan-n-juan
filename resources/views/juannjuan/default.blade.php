@extends('juannjuan')

<!DOCTYPE html>
<html lang="en-PH"
      data-ng-app="jnj"
      class="group--{{ $view->group }} layout--{{ $view->layout }}"
      id="view--{{ $view->id }}">
<head>
  <meta charset="utf-8">
  <title>{{ $view->title }}</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://fonts.googleapis.com/css?family=Roboto:300,500" rel="stylesheet" type="text/css">
  <link href="{{ elixir('css/style.css') }}" rel="stylesheet">
  <base href="{{ url() }}">
</head>
<body>

@yield('content')

<script src="{{ elixir('js/script.js') }}"></script>
</body>
</html>
