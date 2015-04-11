@extends('juannjuan.default.home')

@section('body')
  <div data-ng-controller="HomeCtrl as ctrl">
    <section class="section--splash">
      <h2 class="sr-only">Juan N Juan &mdash; Connected N _______.</h2>
      <div>
        <div class="jumbotron">
          <div class="container">
            <div class="row">
                <span class="h1 juan">Juan</span> <span class="h1 brand--logo">N</span> <span class="h1 juan">Juan</span>
            </div>
              <br>
            <div class="row btn-group">
                <a class="btn btn-primary btn-lg" data-ui-sref="jnj.channels" href="oauth/facebook">
                    <span class="fa fa-facebook-square"></span>&nbsp;&nbsp; Facebook
                </a>
                <a class="btn btn-primary btn-lg" data-ui-sref="jnj.channels" href="oauth/twitter">
                    <span class="fa fa-twitter-square"></span>&nbsp;&nbsp; Twitter
                </a>
            </div>
              <p><span class="container-fluid" id="home--menu">Free and fast one-on-one video calling with your peers and loved ones, here and abroad</span></p>
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
