/*global angular*/

(function(angular, undefined) {
    "use strict";

    var ChannelsCtrl = function(ApiService) {
        ApiService
            .getChannels()
            .then(function(response) {

            });
    };

    ChannelsCtrl.$inject = ["ApiService"];

    angular
        .module("jnj.controllers")
        .controller("ChannelsCtrl", ChannelsCtrl);
})(angular);
