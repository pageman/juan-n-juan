/*global Peer*/

(function(Peer, undefined) {
    "use strict";

    var peer = new Peer({key: 'iotmf53jop1iqkt9'});

    peer.on("open", function(id) {
        console.log(id);
    })
})(Peer);
