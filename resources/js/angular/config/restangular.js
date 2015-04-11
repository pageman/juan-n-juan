/*global angular*/

(function(angular, undefined) {
    "use strict";

    var restangularConfig = function(RestangularProvider) {
        RestangularProvider
            .setBaseUrl("/api");
    };

    restangularConfig.$inject = ["RestangularProvider"];

    angular
        .module("jnj")
        .config(restangularConfig);
})(angular);
