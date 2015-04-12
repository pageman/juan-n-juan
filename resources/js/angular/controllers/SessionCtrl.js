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
            var isYourChannel = ctrl.channel.owner.id === ctrl.you.id;

            if(isYourChannel) {
                console.log("This is your channel!");
                peer = new Peer(ctrl.channel.peer_key, {
                    key: 'iotmf53jop1iqkt9'
                    //host: "yui-chan",
                    //port: 9001
                });

                peer.on("open", function() {
                    peer.on('call', function(call) {

                        console.log(call);

                        call.answer(window.localStream);

                        call.on('stream', function(stream) {
                            angular.element('#session__peer-main')
                                .prop('src', URL.createObjectURL(stream));
                        });
                    });
                });
            }
            else {
                console.log("This is not your channel!");
                peer = new Peer({
                    key: 'iotmf53jop1iqkt9'
                    //host: "yui-chan",
                    //port: 9001
                });

                peer.on("open", function() {
                    var call = peer.call(ctrl.channel.peer_key, window.localStream);

                    console.log(call);

                    call.on('stream', function(stream) {
                        angular.element('#session__peer-main')
                            .prop('src', URL.createObjectURL(stream));
                    });
                });
            }

            /*
            ApiService
                .sendChannel({
                    peer: peer.id,
                    user: ctrl.you.id,
                    channel: thatId
                });
                */
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
