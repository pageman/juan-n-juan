/*global angular*/

(function(angular, undefined) {
    "use strict";

    var ngMuted = function() {
        return {
            restrict: "A",
            scope: {
                "ngMuted": "="
            },
            link: function($scope, $element, $attrs) {
                $scope.$watch("ngMuted", function(muted) {
                    $element.prop("volume", muted ? 0 : 1);
                });
            }
        }
    };

    ngMuted.$inject = [];

    angular
        .module("jnj.directives")
        .directive("ngMuted", ngMuted);

})(angular);
