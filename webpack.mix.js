const mix = require('laravel-mix');

mix.js('src/js/*.js', 'assets/js/app.js')
    .setPublicPath('assets');