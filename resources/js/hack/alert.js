/*global $*/

(function($, window, undefined) {
    "use strict";

    window.alertHack = function(message) {
        $("#ERROR-MODAL")
            .find(".modal-body")
            .text(message);
        $("#ERROR-MODAL")
            .modal({
                size: "md"
            });
    };

})($, window);

