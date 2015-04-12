@extends('juannjuan.default.channels')

@section('body')
  <div class="paneling-container" id="view__channel-list" data-ng-controller="HomeCtrl as homeCtrl">
    <header class="paneling-header">
      <div class="container">
        <h2 class="pull-left">Channels</h2>
        <div class="h2 pull-right">
          @if(\CoreProc\JuanNJuan\Channel::whereUserId(Auth::id())->exists())
            <a class="btn btn-primary btn-large" href="{{ url('session/' . \CoreProc\JuanNJuan\Channel::whereUserId(Auth::id())->first()->id) }}">Go to Channel</a>
          @else
            <button class="btn btn-primary btn-large" data-ng-click="homeCtrl.openNewChannelModal()">Add Channel</button>
          @endif
        </div>
      </div>
    </header>
    <div class="paneling-body">
      <div class="container">
        @if(\CoreProc\JuanNJuan\Channel::where('user_id', '<>', Auth::id())->count() > 0)
          <ul class="row" data-ng-cloak>
            <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3" data-ng-repeat="channel in ctrl.channels">
              <a data-ng-href="/session/@{{ channel.id }}">
                <div class="media">
                  <div class="media-left">
                    <img class="media-object" src="" data-ng-src="@{{ channel.user.user_profile.avatar }}" alt="@{{ channel.name }}">
                  </div>
                  <div class="media-body">
                    <p data-ng-bind="channel.country.name" class="hidden-lg pull-right text-muted"></p>
                    <p class="h3 media-heading" data-ng-bind="channel.name">Media heading</p>
                    <p data-ng-bind="channel.desc"></p>
                    <p data-ng-bind="channel.country.name" class="visible-lg text-muted"></p>
                  </div>
                </div>
              </a>
            </li>
          </ul>
        @else
          <p class="h2 text-center">
            @if(\CoreProc\JuanNJuan\Channel::whereUserId(Auth::id())->exists())
              No channels! Click on <strong>Go to Channel</strong> to connect.
            @else
              No channels! Click on <strong>Add Channel</strong> in the upper-right corner of the screen.
            @endif
          </p>
        @endif
      </div>
    </div>
  </div>

  <video autoplay loop poster="{{ asset('img/jnj.jpg') }}" id="bgvid">
    <source src="{{ asset('video/bg-movie.webm') }}" type="video/webm">
    <source src="{{ asset('video/bg-movie.mp4') }}" type="video/mp4">
  </video>
@stop