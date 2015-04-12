/*global angular*/
/*global Peer*/

(function(angular, Peer, undefined) {
    "use strict";

    var SessionCtrl = function(ApiService, $timeout) {
        var ctrl = this;

        var peer = {};

        ctrl.muted = false;
        ctrl.listVisible = false;
        ctrl.isStreamReady = false;

        navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

        ctrl.connect = function(thatId) {
            var isYourChannel = ctrl.channel.owner.id === ctrl.you.id;

            if(isYourChannel) {
                //console.log("This is your channel!");
                peer = new Peer(ctrl.channel.peer_key, {
                    key: 'iotmf53jop1iqkt9',
                    debug: 3,
                    //host: "yui-chan",
                    //port: 9001
                });

                peer.on("open", function() {
                    loadStream(function(stream) {
                        //console.log(ctrl);

                        ctrl.isStreamReady = true;

                        angular.element('#session__you')
                            .prop('src', URL.createObjectURL(stream));

                        peer.on('call', function(call) {
                            call.answer(stream);

                            call.on('stream', function(stream) {
                                angular.element('#session__peer-main')
                                    .prop('src', URL.createObjectURL(stream));
                            });
                        });
                    });
                });
            }
            else {
                //console.log("This is not your channel!");
                peer = new Peer({
                    key: 'iotmf53jop1iqkt9',
                    debug: 3,
                    //host: "yui-chan",
                    //port: 9001
                });

                peer.on("open", function() {
                    loadStream(function(stream) {
                        //console.log(ctrl);
                        ctrl.isStreamReady = true;

                        angular.element('#session__you')
                            .prop('src', URL.createObjectURL(stream));

                        var call = peer.call(ctrl.channel.peer_key, stream);

                        call.on('stream', function(stream) {
                            angular.element('#session__peer-main')
                                .prop('src', URL.createObjectURL(stream));
                        });
                        //
                        peer.on('call', function(call) {
                            call.answer(window.localStream);

                            call.on('stream', function(stream) {
                                angular.element('#session__peer-main')
                                    .prop('src', URL.createObjectURL(stream));
                            });
                        });
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

        var loadStream = function(cb) {
            navigator.getUserMedia({video: true, audio: true}, cb, function(err) {
                console.log('Failed to get local stream', err);
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

            ctrl.connect();
        });
    };

    SessionCtrl.$inject = ["ApiService", "$timeout"];

    angular
        .module("jnj.controllers")
        .controller("SessionCtrl", SessionCtrl);
})(angular, Peer);
