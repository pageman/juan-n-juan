var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix
        .sass("style.sass", false, { indentedSyntax: true })
        .scripts([
            "../../vendor/bower_components/jquery/dist/jquery.js",
            "../../vendor/bower_components/lodash/lodash.js",
            "../../vendor/bower_components/modernizr/modernizr.js",
            "../../vendor/bower_components/bootstrap-sass/assets/javascripts/bootstrap.js",
            "../../vendor/bower_components/angular/angular.js",
            "../../vendor/bower_components/restangular/dist/restangular.js",
            "../../vendor/bower_components/peerjs/peer.js",

            "angular/pre.js",
            "angular/config/restangular.js",
            "angular/services/ApiService.js",
            "angular/controllers/ChannelsCtrl.js",
            "angular/controllers/HomeCtrl.js",
            "angular/controllers/SessionCtrl.js",
            "angular/post.js"
        ], "public/js/script.js")
        .version(["css/style.css", "js/script.js"]);
});
