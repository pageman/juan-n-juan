/*global angular*/

(function(angular, undefined) {
    "use strict";

    var ChannelModalCtrl = function(ApiService) {
        var ctrl = this;

        ctrl.newChannel = {};
    };

    ChannelModalCtrl.$inject = ["ApiService"];

    angular
        .module("jnj.controllers")
        .controller("ChannelModalCtrl", ChannelModalCtrl);
})(angular);