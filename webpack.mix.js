const mix = require('laravel-mix');

mix.js(['resources/js/test1.js',
        'resources/js/test2.js'], 'public/js/common.js')
    .postCss('resources/css/example1.css', 'public/css/common.css')
    .postCss('resources/css/example2.css', 'public/css/common.css');