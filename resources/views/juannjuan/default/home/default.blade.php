@extends('juannjuan.default.home')

@section('body')
  <div data-ng-controller="HomeCtrl as ctrl">
    <section class="section--splash">
      <h2 class="sr-only">Juan N Juan &mdash; Connected N _______.</h2>
      <div>
        <div class="jumbotron">
          <div class="container">
            <p class="h1">Juan <span class="brand--logo">N</span> Juan</p>
            <a class="btn btn-primary btn-lg" data-ui-sref="jnj.channels">Connect with Facebook</a>
          </div>
        </div>
      </div>
    </section>
  </div>

  <video autoplay loop poster="{{ asset('img/jnj.jpg') }}" id="bgvid">
    <source src="{{ asset('video/bg-movie.webm') }}" type="video/webm">
    <source src="{{ asset('video/bg-movie.mp4') }}" type="video/mp4">
  </video>
@stop
