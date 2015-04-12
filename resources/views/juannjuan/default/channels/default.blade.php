@extends('juannjuan.default.channels')

@section('body')
  <div data-ng-controller="ChannelsCtrl as ctrl" class="paneling-container" id="view__channel-list">
    <header class="paneling-header">
      <div class="container">
        <h2>Channels</h2>
      </div>
    </header>
    <div class="paneling-body">
      <div class="container">
        <ul class="row">
          <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3" data-ng-repeat="channel in ctrl.channels">
            <a data-ng-href="/session/@{{ channel.id }}">
              <div class="media">
                <div class="media-left">
                  <img class="media-object" src="" data-ng-src="@{{ channel.user.user_profile.avatar }}" alt="@{{ channel.name }}">
                </div>
                <div class="media-body">
                  <p class="h3 media-heading" data-ng-bind="channel.name">Media heading</p>
                  <p data-ng-bind="channel.desc"></p>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
@stop