var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    //mix.copy(
    //    'node_modules/core-js/client/shim.min.js',
    //    'resources/assets/js/angular-libs'
    //).copy(
    //    'node_modules/zone.js/dist/zone.js',
    //    'resources/assets/js/angular-libs'
    //).copy(
    //    'node_modules/reflect-metadata/Reflect.js',
    //    'resources/assets/js/angular-libs'
    //).copy(
    //    'node_modules/rxjs/bundles/Rx.umd.js',
    //    'resources/assets/js/angular-libs'
    //).copy(
    //    'node_modules/@angular/core/bundles/core.umd.js',
    //    'resources/assets/js/angular-libs'
    //).copy(
    //    'node_modules/@angular/common/bundles/common.umd.js',
    //    'resources/assets/js/angular-libs'
    //).copy(
    //    'node_modules/@angular/compiler/bundles/compiler.umd.js',
    //    'resources/assets/js/angular-libs'
    //).copy(
    //    'node_modules/@angular/platform-browser/bundles/platform-browser.umd.js',
    //    'resources/assets/js/angular-libs'
    //).copy(
    //    'node_modules/@angular/platform-browser-dynamic/bundles/platform-browser-dynamic.umd.js',
    //    'resources/assets/js/angular-libs'
    //);

    mix.browserSync({
        proxy: "localhost:8000"
    });


    mix.sass('app.scss')
        .styles([
            'blog-post.css',
            'bootstrap.css',
            'bootstrap.min.css',
            'font-awesome.css',
            'metisMenu.css',
            'sb-admin-2.css',
            'styles.css',
            'timeline.css'
        ], './public/css/libs.css')

        .scripts([
            'jquery.js',
            'bootstrap.js',
            'bootstrap.min.js',
            'metisMenu.js',
            'sb-admin-2.js',
            'app.js'

        ], './public/js/libs.js')

        .scripts([
            'main.js'

        ], './public/js/main.js')

        .scripts([
            'ng-app.js'

        ], './public/js/ng-app.js');


        //.scripts([
        //    'angular-libs/shim.min.js',
        //    'angular-libs/zone.js',
        //    'angular-libs/Reflect.js',
        //    'angular-libs/Rx.umd.js',
        //    'angular-libs/core.umd.js',
        //    'angular-libs/common.umd.js',
        //    'angular-libs/compiler.umd.js',
        //    'angular-libs/platform-browser.umd.js',
        //    'angular-libs/platform-browser-dynamic.umd.js'
        //], './public/js/ng-libs.js')
        //
        //.scripts([
        //    'predictions/app.component.js',
        //    'predictions/app.module.js',
        //    'predictions/main.js'
        //], './public/js/ng-predict.js');
});
