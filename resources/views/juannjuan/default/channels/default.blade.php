@extends('juannjuan.default.channels')

@section('body')
  <div class="paneling-container" id="view__channel-list" data-ng-controller="HomeCtrl as homeCtrl">
    <header class="paneling-header">
      <div class="container">
        <h2 class="pull-left">Channels</h2>
        <div class="h2 pull-right">
          <button class="btn btn-default btn-large" data-ng-click="homeCtrl.openNewChannelModal()">Add Channel</button>
        </div>
      </div>
    </header>
    <div class="paneling-body">
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
    </div>
  </div>
@stop