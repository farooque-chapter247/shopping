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

mix.js('resources/js/app.js', 'public/js/laravel.app.js')
    .copy('resources/js/codebase/codebase.app.min.js', 'public/js/codebase/codebase.app.js')
    .copy('resources/js/codebase/codebase.core.min.js', 'public/js/codebase/codebase.core.js')
    .copy('resources/js/validation/parsley.js', 'public/js/validation/parsley-validation.js')
    .copy('resources/js/croppie.js', 'public/js/croppie.js')
    .js('resources/js/table_datatables.js', 'public/js/')
    .js('resources/js/pay.js', 'public/js/pay.js')
    .js('resources/js/my-order.js', 'public/js/my-order.js')



// pugins

.copy('resources/plugins/', 'public/plugins/')



.copy('resources/css/codebase/codebase.css', 'public/css/codebase/')
    .copy('resources/css/themes', 'public/css/themes/')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('resources/sass/custom.css', 'public/css')
    .copy('resources/css/front.css', 'public/css')
    .copy('resources/css/croppie.css', 'public/css')
    .copy('resources/css/product-detail.css', 'public/css')
    .copy('resources/css/header.css', 'public/css')
    .sass('resources/sass/my-order.scss', 'public/css/my-order.css')
    .sass('resources/sass/order-detail.scss', 'public/css/front-order-detail.css')
    .sass('resources/sass/loader.scss', 'public/css/loader.css')


.copy('resources/css/fonts/', 'public/css/fonts/')
    .copy('resources/media/', 'public/media/');