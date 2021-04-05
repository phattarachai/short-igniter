let mix = require('laravel-mix');

mix
    .setPublicPath('public')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('@tailwindcss/jit'),
    ])
    .version()
    .disableNotifications();
