/*global angular*/

(function(angular, undefined) {
    "use strict";

    var routerConfig = function($stateProvider, $urlRouterProvider, $locationProvider) {
        $stateProvider
            .state("jnj", {
                "url": "",
                "templateUrl": "html/home.html",
                "controller": "HomeCtrl",
                "controllerAs": "ctrl"
            })
            .state("jnj.channels", {
                "url": "/channels",
                "templateUrl": "html/channels.html",
                "controller": "ChannelsCtrl",
                "controllerAs": "ctrl"
            })
            .state("jnj.session", {
                "url": "/session/:sessionId",
                "templateUrl": "html/session.html",
                "controller": "SessionCtrl",
                "controllerAs": "ctrl"
            })
        ;

        $urlRouterProvider
            .otherwise("");

        $locationProvider
            .html5Mode(true);
    };

    routerConfig.$inject = ["$stateProvider", "$urlRouterProvider", "$locationProvider"];

    angular
        .module("jnj")
        .config(routerConfig);
})(angular);
