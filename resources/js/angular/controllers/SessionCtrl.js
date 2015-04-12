/*global angular*/
/*global Peer*/

(function(angular, Peer, undefined) {
    "use strict";

    var SessionCtrl = function(ApiService, $timeout) {
        var ctrl = this;

        var peer = {};

        ctrl.muted = false;
        ctrl.listVisible = false;

        navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

        ctrl.selectChannel = function(thatId) {
            ApiService
                .sendChannel({
                    peer: peer.id,
                    user: ctrl.you.id,
                    channel: thatId
                });

            var call = peer.call(thatId, window.localStream);

            call.on('stream', function(stream) {
                angular.element('#session__peer-main')
                    .prop('src', URL.createObjectURL(stream));
            });

            peer.on('call', function(c) {
                console.log(c);
            });
        };

        angular.element(function() {
            ApiService
                .getChannels()
                .then(function(response) {
                    if(!response.ok) {
                        throw new Error("Unable to obtain channel list.");
                    }

                    ctrl.channels = response.ok;
                });

            peer = new Peer(ctrl.you.id, {
                key: 'iotmf53jop1iqkt9',
                host: "yui-chan",
                port: 9001
            });

            navigator.getUserMedia({video: true, audio: true}, function(stream) {
                angular.element('#session__you')
                    .prop('src', URL.createObjectURL(stream));

                window.localStream = stream;
            }, function(err) {
                console.log('Failed to get local stream' ,err);
            });
        });
    };

    SessionCtrl.$inject = ["ApiService", "$timeout"];

    angular
        .module("jnj.controllers")
        .controller("SessionCtrl", SessionCtrl);
})(angular, Peer);
