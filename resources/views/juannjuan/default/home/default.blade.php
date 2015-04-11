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
@stop