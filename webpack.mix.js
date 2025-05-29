const mix = require('laravel-mix');

mix.js('resources/assets/js/main.js', 'public/js')
    .sass('resources/assets/sass/main.scss', 'public/css')
    .sourceMaps();
