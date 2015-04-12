@extends('juannjuan.default.home')

@section('body')
  <div data-ng-controller="HomeCtrl as ctrl">
    <section class="section--splash">
      <h2 class="sr-only">Juan N Juan &mdash; Connected N _______.</h2>
      <div>
        <div class="jumbotron">
          <div class="container">
            <p class="h1">Juan <span class="brand--logo">N</span> Juan</p>
            <p class="h2">Free and fast one-on-one video calling with your peers and loved ones, here and abroad</p>
            <div class="view__cta">
              @if(Auth::check())
                <p class="lead">
                  Get Started
                </p>
                <a class="btn btn-primary btn-lg" href="{{ url('channels') }}">
                  <i class="fa fa-comments"></i>Find Channels
                </a><a class="btn btn-primary btn-lg" href="#" data-ng-click="ctrl.openNewChannelModal()">
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
  </div>

  <video autoplay loop poster="{{ asset('img/jnj.jpg') }}" id="bgvid">
    <source src="{{ asset('video/bg-movie.webm') }}" type="video/webm">
    <source src="{{ asset('video/bg-movie.mp4') }}" type="video/mp4">
  </video>

  <script type="text/ng-template" id="modal-new-channel.html">
    <form method="post">
      <div class="modal-header">
        <h2 class="modal-title h4">Create New Channel</h2>
      </div>
      <div class="modal-body">
        <input type="hidden" name="peer_key" data-ng-model="ctrl.newChannel.peer_key">
        <input type="hidden" name="latitude" data-ng-model="ctrl.newChannel.latitude">
        <input type="hidden" name="longitude" data-ng-model="ctrl.newChannel.longitude">

        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" data-ng-model="ctrl.newChannel.name">
        </div>

        <div class="form-group">
          <label>Description</label>
          <textarea class="form-control" name="desc" data-ng-model="ctrl.newChannel.desc"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" data-ng-click="$event.preventDefault(); ctrl.submitNewChannelForm();">Submit</button>
      </div>
    </form>
  </script>
@stop
