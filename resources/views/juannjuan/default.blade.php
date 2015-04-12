@extends('juannjuan')

<!DOCTYPE html>
<html lang="en-PH"
      data-ng-app="jnj"
      class="group--{{ $view->group }} layout--{{ $view->layout }}"
      id="view--{{ $view->id }}">
<head>
  <meta charset="utf-8">
  <title>{{ $view->title }} | {{ $app->name }}</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://fonts.googleapis.com/css?family=Roboto:300,500" rel="stylesheet" type="text/css">
  <link href="{{ elixir('css/style.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/angular-csp.css') }}" rel="stylesheet" type="text/css">
</head>
<body>

@yield('content')

@section('modals')
  <script type="text/ng-template" id="modal-new-channel.html">
    <form method="post">
      <div class="modal-header">
        <h2 class="modal-title h4">Create New Channel</h2>
      </div>
      <div class="modal-body">
        <input type="hidden" name="peer_key" data-ng-model="homeCtrl.newChannel.peer_key">
        <input type="hidden" name="latitude" data-ng-model="homeCtrl.newChannel.latitude">
        <input type="hidden" name="longitude" data-ng-model="homeCtrl.newChannel.longitude">

        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" data-ng-model="homeCtrl.newChannel.name">
        </div>

        <div class="form-group">
          <label>Description</label>
          <textarea class="form-control" name="desc" data-ng-model="homeCtrl.newChannel.desc"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" data-ng-click="$event.preventDefault(); homeCtrl.submitNewChannelForm();">Submit</button>
      </div>
    </form>
  </script>

  <div class="modal fade" role="dialog" id="ERROR-MODAL" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="gridSystemModalLabel">Error</h4>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
@show

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
