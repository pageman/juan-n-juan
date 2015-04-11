/*global angular*/

(function(angular, undefined) {
    "use strict";

    var SessionCtrl = function(ApiService) {
        var ctrl = this;

        ctrl.selectChannel = function(id) {
        };

        ApiService
            .getChannels()
            .then(function(response) {
                if(!response.ok) {
                    throw new Error("Unable to obtain channel list.");
                }

                ctrl.channels = response.ok;
            });
    };

    SessionCtrl.$inject = ["ApiService"];

    angular
        .module("jnj.controllers")
        .controller("SessionCtrl", SessionCtrl);
})(angular);
