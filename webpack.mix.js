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
    .js('resources/js/trendingController.js', 'public/js')
    .js('resources/js/uploadController.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/styleVideos.scss', 'public/css')
   .sass('resources/sass/rating.scss', 'public/css')
   .sass('resources/sass/registration.scss', 'public/css')
   .sass('resources/sass/styleHome.scss', 'public/css')
   .sass('resources/sass/signin.scss', 'public/css')
   .sass('resources/sass/upload.scss', 'public/css');
