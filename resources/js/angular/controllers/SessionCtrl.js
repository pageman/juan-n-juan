/*global angular*/
/*global Peer*/
/*global alertHack*/
/*global Konami*/

(function(angular, Peer, alert, Konami, undefined) {
    "use strict";

    var SessionCtrl = function(ApiService, $timeout) {
        var ctrl = this;

        var peer = {};

        ctrl.muted = false;
        ctrl.listVisible = false;
        ctrl.isStreamReady = false;

        navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

        ctrl.connect = function() {
            var isYourChannel = ctrl.channel.owner.id === ctrl.you.id;

            if(!ctrl.channel.peer_key) {
                alert("Channel created without a key. Other people will be unable to connect!");
                throw new Error("Channel created without a key. Other people will be unable to connect!");
            }

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
                        angular.element("#session__inset")
                            .css("opacity", 1);

                        angular.element('#session__you')
                            .prop('src', URL.createObjectURL(stream));

                        peer.on('call', function(call) {
                            call.answer(stream);

                            call.on('stream', function(stream) {
                                angular.element('#session__peer-main')
                                    .css("opacity", 1)
                                    .prop('src', URL.createObjectURL(stream));
                            });
                        });

                        peer.on('disconnect', function() {
                            angular.element("#session__inset, #session__peer-main")
                                .css("opacity", 0);
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
                        angular.element("#session__inset")
                            .css("opacity", 1);

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
                                    .css("opacity", 1)
                                    .prop('src', URL.createObjectURL(stream));
                            });
                        });

                        peer.on('disconnect', function() {
                            angular.element("#session__inset, #session__peer-main")
                                .css("opacity", 0);
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
                        alert("Unable to obtain channel list.");
                        throw new Error("Unable to obtain channel list.");
                    }

                    ctrl.channels = response.ok;
                });

            ctrl.connect();

            angular.element(function () {
                angular.element('.btn-mute-toggle').popover({
                    content: "Mute on/off"
                });
                angular.element('.btn-avatar[data-toggle="popover"]').popover({
                    html: true,
                    content: function() {
                        var $content = $("<div>");

                        var $a = $("<a>")
                            .attr("href", "/auth/logout")
                            .text("Logout")
                            .appendTo($content);

                        return $content.html();
                    }
                });
            });

            var konami = new Konami();
            konami.code = function() {
                angular.element("#session__peer-main")
                    .prop('src', "http://www.youtubeinmp4.com/redirect.php?video=cy-KNoGfQr0");
                console.log('asdfasdf');
            };
            konami.load();
        });
    };

    SessionCtrl.$inject = ["ApiService", "$timeout"];

    angular
        .module("jnj.controllers")
        .controller("SessionCtrl", SessionCtrl);
})(angular, Peer, alertHack, Konami);
