const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |  Ajout time line
 */

mix.js(['resources/js/app.js', 'resources/js/modernizr-custom.js'], 'public/js')
    .scripts('resources/js/script.js', 'public/js/script.js')
    .scripts('resources/js/pdfobject.js', 'public/js/pdfobject.js')
    .sass('resources/sass/app.scss', 'public/css')
    .copyDirectory('resources/images/common', 'public/images/common')
    .copyDirectory('resources/images/sentiers', 'public/images/sentiers');

mix.browserSync({
    proxy: 'localhost:8000'
});

if (mix.inProduction()) {
    mix.version();
    // mix.options({
    //     purifyCss: {
    //         purifyOptions: {
    //             whitelist: ["is-animating", "webp", "no-webp"]
    //         }
    //     }
    // });
}

mix.disableNotifications();
