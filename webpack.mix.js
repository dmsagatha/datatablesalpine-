const mix = require('laravel-mix');

mix.setPublicPath('public');
mix.setResourceRoot('../');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
      postCss: [
        require('postcss-import'),
        require('tailwindcss'),
        require("autoprefixer")
      ],
    })
    .copy(
      'node_modules/@fortawesome/fontawesome-free/webfonts',
      'public/webfonts'
    );

if (mix.inProduction()) {
    mix.version();
}

mix.browserSync({
  proxy: "http://datatablesalpine.test/",
  browser: "Google Chrome",
  open: false,});

mix.disableNotifications();