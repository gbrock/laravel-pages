var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.copy('node_modules/codemirror/lib', 'public/assets/vendor/codemirror');
    mix.copy('node_modules/codemirror/theme', 'public/assets/vendor/codemirror/theme');
    mix.copy('node_modules/codemirror/mode', 'public/assets/vendor/codemirror/mode');
    mix.copy('node_modules/codemirror/addon', 'public/assets/vendor/codemirror/addon');
    mix.copy('node_modules/codemirror/keymap', 'public/assets/vendor/codemirror/keymap');
});
