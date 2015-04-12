@extends('juannjuan.default.channels')

@section('body')
  <div class="paneling-container" id="view__channel-list" data-ng-controller="HomeCtrl as homeCtrl">
    <header class="paneling-header">
      <div class="container">
        <h2 class="pull-left">Channels</h2>
        <div class="h2 pull-right">
          <a href="{{ url('auth/logout') }}" class="btn btn-default">Log out</a>
        </div>
      </div>
    </header>
    <div class="paneling-body">
      @if(\CoreProc\JuanNJuan\Channel::where('user_id', '<>', Auth::id())->count() > 0)
        <div class="container">
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
      </div>
      @else
        <div class="centerbox">
          <div>
            <div>
              @if(\CoreProc\JuanNJuan\Channel::whereUserId(Auth::id())->exists())
                There isn't any channels for now except yours. Click on <a class="btn btn-primary btn-lg" href="{{ url('session/' . \CoreProc\JuanNJuan\Channel::whereUserId(Auth::id())->first()->id) }}">Go to Channel</a> to connect.
              @else
                No channels! Click on <button class="btn btn-primary btn-lg" data-ng-click="homeCtrl.openNewChannelModal()">Add Channel</button>.
              @endif
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>

  <video autoplay loop poster="{{ asset('img/jnj.jpg') }}" id="bgvid">
    <source src="{{ asset('video/bg-movie.webm') }}" type="video/webm">
    <source src="{{ asset('video/bg-movie.mp4') }}" type="video/mp4">
  </video>
@stop