@extends('juannjuan.default.session')

@section('body')
  @if(Auth::check())
  <div data-ng-controller="SessionCtrl as ctrl" data-ng-init="
    ctrl.you = {
      id: {{ Auth::id() }}
    };
    ctrl.selectChannel({{ $session_id }})
  ">
    <div class="session__stream paneling-container">
      <div class="paneling-sidebar paneling-sidebar--left">
        <a href="#" data-ng-click="$event.preventDefault(); ctrl.selectChannel(channel.id)" data-ng-repeat="channel in ctrl.channels">
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
      </div>
      <div class="paneling-body">
        <video id="session__peer-main"></video>
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
      <div class="paneling-footer">
        <div class="paneling-container">
          <div class="paneling-body">
            <ul class="list-inline">
              <li>
                <button class="btn btn-default"
                        data-ng-bind="ctrl.muted ? 'Unmute' : 'Mute'"
                        data-ng-click="ctrl.muted = !ctrl.muted"></button>
              </li>
            </ul>
          </div>
          <div class="paneling-sidebar paneling-sidebar--right">
            <video id="session__you" autoplay data-ng-muted="ctrl.muted"></video>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
@stop