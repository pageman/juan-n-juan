/*global angular*/

(function(angular, undefined) {
    "use strict";

    angular.module("jnj.services", []);
    angular.module("jnj.controllers", []);
    angular.module("jnj.filters", []);
    angular.module("jnj.directives", []);

    angular.module("jnj", [
        "restangular",
        "ui.bootstrap",

        "jnj.services",
        "jnj.controllers",
        "jnj.filters",
        "jnj.directives"
    ]);

})(angular);
