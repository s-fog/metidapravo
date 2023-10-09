const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require("tailwindcss"),
    ])
    .postCss('node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.css', 'public/css/fancybox.css')
    .postCss('node_modules/tiny-slider/dist/tiny-slider.css', 'public/css/tiny-slider.css')
    .version()
    .browserSync('meti.local')
    .copy('resources/img', 'public/images')
    .copy('resources/svg', 'public/svg');
