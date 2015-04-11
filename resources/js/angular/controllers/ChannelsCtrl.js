/*global angular*/

(function(angular, undefined) {
    "use strict";

    var ChannelsCtrl = function(ApiService) {
        var ctrl = this;

        angular.element(function() {
            ApiService
                .getChannels()
                .then(function(response) {
                    if(!response.ok) {
                        throw new Error("Unable to obtain channel list.");
                    }

                    ctrl.channels = response.ok;
                });
        });
    };

    ChannelsCtrl.$inject = ["ApiService"];

    angular
        .module("jnj.controllers")
        .controller("ChannelsCtrl", ChannelsCtrl);
})(angular);
