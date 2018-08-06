let mix = require('laravel-mix');

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

//  Front js
mix.scripts([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
    'resources/assets/web/js/app.js'
],  'public/js/app.js')
    .version();

    mix.scripts([
    'node_modules/smartwizard/dist/js/jquery.smartWizard.min.js',
],  'public/js/smartwizard.js')
    .version();
    
    //  Main css
mix.sass('resources/assets/web/app.scss', 'public/css')
    .version();

    // Profile inf page css
mix.sass('resources/assets/web/components/_profile_info.scss', 'public/css')
    .version();


// Admin side
mix.scripts([
        'node_modules/jquery/dist/jquery.js',
        'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
        'resources/assets/bash/js/main.js',
    ], 'public/js/bash/app.js');

mix.sass('resources/assets/bash/style.scss', 'public/css/bash');