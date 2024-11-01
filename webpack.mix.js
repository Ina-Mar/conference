//const mix = require('laravel-mix');

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
let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js').
autoload({ jquery: ['$', 'window.jQuery', 'jQuery'] })
    .postCss('resources/assets/sass/app.css', 'public/css');
//mix.js('resources/assets/js/app.js', 'public/js')
    //.sass('resources/assets/sass/app.css', 'public/css')
    //.sourceMaps();

//if (mix.inProduction()) {
    //mix.version();
//}
mix.webpackConfig({
    stats: {
        children: true
    }
})
