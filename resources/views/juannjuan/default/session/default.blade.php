@extends('juannjuan.default.session')

@section('body')
  @if(Auth::check())
  <div data-ng-controller="SessionCtrl as ctrl" data-ng-init="
    ctrl.you = {
      id: {{ Auth::id() }}
    };
    ctrl.channel = {
      peer_key: '{{ $channel->peer_key }}',
      owner: {
        id: {{ $channel->user->id }}
      }
    };
    ctrl.selectChannel({{ $session_id }})
  ">
    <div class="session__stream paneling-container" data-ng-class="{ 'list-visible': ctrl.listVisible }">
      <div class="paneling-sidebar paneling-sidebar--left" id="view__channel-list">
        <div class="paneling-container">
          <div class="paneling-header">
            <div class="container-fluid">
              <button class="close visible-smaller-16-by-9" data-ng-click="ctrl.listVisible = false"><i class="fa fa-fw fa-times"></i></button>
              <h2>Channels</h2>
            </div>
          </div>
          <div class="paneling-body">
            <a href="#" data-ng-click="$event.preventDefault(); ctrl.selectChannel(channel.id)" data-ng-repeat="channel in ctrl.channels">
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
          </div>
        </div>
      </div>
      <div class="paneling-body">
        <div class="paneling-container">
          <div class="paneling-header visible-smaller-16-by-9">
            <div class="container-fluid">
              <button class="btn btn-link" data-ng-class="{ 'active': ctrl.listVisible }" data-ng-click="ctrl.listVisible = true">
                <i class="fa fa-fw fa-list"></i>
              </button>
            </div>
          </div>
          <div class="paneling-body">
            <video id="session__peer-main" autoplay></video>
            <div class="inset">
              <div class="paneling-container">
                <div class="paneling-sidebar paneling-sidebar--left">
                  <button class="btn btn-link pull-left"
                          data-ng-style="{ 'color': ctrl.muted ? '#ff0000' : null }"
                          data-ng-click="ctrl.muted = !ctrl.muted">
                    <i class="fa fa-fw" data-ng-class="{ 'fa-volume-up': !ctrl.muted, 'fa-volume-off': ctrl.muted }"></i>
                  </button>
                </div>
                <div class="paneling-body">
                  <video id="session__you" autoplay data-ng-muted="ctrl.muted"></video>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{--<div class="paneling-sidebar paneling-sidebar--right">--}}
        {{--<ul id="session__peer-list">--}}
          {{--<li>--}}
            {{--<video></video>--}}
            {{--<a href="#">--}}
              {{--<span>SDFSDGSF</span>--}}
            {{--</a>--}}
          {{--</li><li>--}}
            {{--<video></video>--}}
            {{--<a href="#">--}}
              {{--<span>SDFSDGSF</span>--}}
            {{--</a>--}}
          {{--</li><li>--}}
            {{--<video></video>--}}
            {{--<a href="#">--}}
              {{--<span>SDFSDGSF</span>--}}
            {{--</a>--}}
          {{--</li><li>--}}
            {{--<video></video>--}}
            {{--<a href="#">--}}
              {{--<span>SDFSDGSF</span>--}}
            {{--</a>--}}
          {{--</li><li>--}}
            {{--<video></video>--}}
            {{--<a href="#">--}}
              {{--<span>SDFSDGSF</span>--}}
            {{--</a>--}}
          {{--</li><li>--}}
            {{--<video></video>--}}
            {{--<a href="#">--}}
              {{--<span>SDFSDGSF</span>--}}
            {{--</a>--}}
          {{--</li>--}}
        {{--</ul>--}}
      {{--</div>--}}
    </div>
  </div>
  @endif
@stop