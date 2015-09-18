var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */



elixir(function(mix) {

 mix.copy('resources/img/**', 'public/images');

 // Fichier app.js a prendre en compte
 mix.scripts([
  "app.js",
  "main.js",
  "ajax.js",
  "realtime.js"
 ]);

 mix.scripts([
     "gmap.js"
 ], 'public/js/gmap.js');

 mix.styles([
  "main.css",
  "index.css"
 ]).stylesIn("public/css");


 mix.sass('footer.sass').stylesIn("public/css");
});