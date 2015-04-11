@extends('juannjuan.default.home')

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
          <li class="col-xs-6 col-sm-4 col-md-3 col-lg-2" data-ng-repeat="channel in ctrl.channels">
            <a data-ng-href="/session/@{{ channel.id }}">
              <div class="media">
                <div class="media-left">
                  <img class="media-object" src="http://placehold.it/64" alt="@{{ channel.name }}">
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