/*global angular*/

(function(angular, undefined) {
    "use strict";

    var jnj = function() {
        //angular.element(function() {
        //    if(!(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) {
        //        var $video = $("<video>")
        //            .attr("autoplay", "autoplay")
        //            .attr("loop", "loop")
        //            .attr("poster", "/img/jnj.jpg")
        //            .attr("id", "bgvid");
        //
        //        var $sourceWebm = $("<source>")
        //            .attr("type", "video/webm")
        //            .attr("src", "/video/bg-movie.mebm")
        //            .appendTo($video);
        //
        //        var $sourceMp4 = $("<source>")
        //            .attr("type", "video/mp4")
        //            .attr("src", "/video/bg-movie.mp4")
        //            .appendTo($video);
        //
        //        angular
        //            .element(".bgvid-append")
        //            .append($video);
        //
        //        $video[0].play();
        //    }
        //});
    };

    jnj.$inject = [];

    angular.module("jnj")
        .run(jnj);
})(angular);