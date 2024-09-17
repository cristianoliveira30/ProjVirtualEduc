const mix = require('laravel-mix');
const path = require('path');

mix.js('resources/js/app.js', 'public/js')
   .vue()
   .postCss('resources/css/app.css', 'public/css', [])
   .webpackConfig({
       resolve: {
           alias: {
               '@': path.resolve('resources/js'),
           },
       },
   });

if (mix.inProduction()) {
    mix.version();
}

mix.webpackConfig({
  resolve: {
      alias: {
          vue$: 'vue/dist/vue.runtime.esm-bundler.js'
      }
  }
});
