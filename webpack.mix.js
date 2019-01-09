const mix = require('laravel-mix');

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
    .js('resources/js/agenda.js', 'public/js')
    .js('resources/js/map.js', 'public/js')
    .js('resources/js/speaker.js', 'public/js')
    .js('resources/js/function.js', 'public/js')
    .js('resources/js/auth/signIn.js', 'public/js')
    .js('resources/js/auth/signUp.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/index.scss', 'public/css')
    .sass('resources/sass/agenda.scss', 'public/css')
    .sass('resources/sass/map.scss', 'public/css')
    .sass('resources/sass/speaker.scss', 'public/css')
    .sass('resources/sass/contact.scss', 'public/css')
    .sass('resources/sass/function.scss', 'public/css')
    .sass('resources/sass/signIn.scss', 'public/css')
    .sass('resources/sass/signUp.scss', 'public/css');
