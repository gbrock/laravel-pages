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

    // Our styles
    mix.less('app.less', 'build/assets/css');

    // Our scripts
    mix.scripts([
        'code-editor.js',
    ], 'build/assets/js/code-editor.js');

    // CodeMirror via NPM
    mix.copy('node_modules/codemirror/lib', 'build/assets/codemirror');
    mix.copy('node_modules/codemirror/theme', 'build/assets/codemirror/theme');
    mix.copy('node_modules/codemirror/mode', 'build/assets/codemirror/mode');
    mix.copy('node_modules/codemirror/addon', 'build/assets/codemirror/addon');
    mix.copy('node_modules/codemirror/keymap', 'build/assets/codemirror/keymap');
});
