/*global angular*/

(function(angular, undefined) {
    "use strict";

    var ApiService = function(Restangular) {
        this.getChannels = function() {
            return Restangular
                .one("channels")
                .get();
        };

        this.createChannel = function(params) {
            return Restangular
                .all("channels")
                .post(params);
        };

        this.getCountries = function() {
            return Restangular
                .one("countries")
                .get();
        };

        this.deleteChannel = function(id) {
            return Restangular
                .one("channels", id)
                .remove();
        };
    };

    ApiService.$inject = ["Restangular"];

    angular
        .module("jnj.services")
        .service("ApiService", ApiService);
})(angular);
