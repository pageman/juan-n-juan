/*global angular*/

(function(angular, undefined) {
    "use strict";

    var HomeCtrl = function($scope, $modal, ApiService, geolocation) {
        var ctrl = this;

        ctrl.newChannel = {};

        ctrl.openNewChannelModal = function(ApiService) {
            $modal.open({
                templateUrl: "modal-new-channel.html",
                size: "md",
                scope: $scope
            });
        };

        ctrl.submitNewChannelForm = function() {
            ApiService
                .createChannel(ctrl.newChannel)
                .then(function(response) {
                    if(!response.ok) {
                        throw new Error("Cannot create channel");
                    }

                    location.href = "/session/" + response.ok.id;
                });
        };

        angular.element(function() {
            geolocation
                .getLocation()
                .then(function(response) {
                    ctrl.newChannel.latitude = response.coords.latitude;
                    ctrl.newChannel.longitude = response.coords.longitude;

                    console.log(ctrl.newChannel);
                });
        });
    };

    HomeCtrl.$inject = ["$scope", "$modal", "ApiService", "geolocation"];

    angular
        .module("jnj.controllers")
        .controller("HomeCtrl", HomeCtrl);
})(angular);
