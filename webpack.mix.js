const mix = require('laravel-mix');
let productionSourceMaps = false;

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .combine(['public/css/app.css', 'resources/css/app.css'], 'public/css/app.css')
    .sourceMaps(productionSourceMaps, 'source-map')
    .mix.browserSync('127.0.0.1:8000');
