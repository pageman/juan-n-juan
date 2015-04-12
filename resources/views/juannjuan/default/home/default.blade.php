@extends('juannjuan.default.home')

@section('body')
  <div class="bgvid-append">
    <section class="section--splash">
      <h2 class="sr-only">Juan N Juan &mdash; Connected N _______.</h2>
      <div>
        <div class="jumbotron">
          <div class="container">
            <p class="h1">Juan <span class="brand--logo">N</span> Juan</p>
            <p class="h2">Free and fast one-on-one video calling with your peers and loved ones, here and abroad.</p>
            <div class="view__cta">
              @if(Auth::check())
                @if(\CoreProc\JuanNJuan\Channel::all()->count() > 0)
                <a class="btn btn-primary btn-lg" href="{{ url('channels') }}">
                  <i class="fa fa-comments"></i>Find Channels
                </a>@endif <a class="btn btn-primary btn-lg" href="#" data-ng-click="homeCtrl.openNewChannelModal()">
                  <i class="fa fa-comments"></i>Create Channel
                </a>
              @else
                <p class="lead">
                  Connect with
                </p>
                <a class="btn btn-primary" href="{{ url('oauth/facebook') }}">
                  <i class="fa fa-facebook-square"></i> Facebook
                </a><a class="btn btn-primary" href="{{ url('oauth/twitter') }}">
                  <i class="fa fa-twitter-square"></i> Twitter
                </a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>

    <video autoplay loop poster="{{ asset('img/jnj.jpg') }}" id="bgvid">
      <source src="{{ asset('video/bg-movie.webm') }}" type="video/webm">
      <source src="{{ asset('video/bg-movie.mp4') }}" type="video/mp4">
    </video>
  </div>
@stop
