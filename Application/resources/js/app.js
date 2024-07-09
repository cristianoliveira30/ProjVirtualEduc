module.exports = {
  chainWebpack: (config) => {
    config.plugin('define').tap((args) => {
      args[0]['__VUE_PROD_HYDRATION_MISMATCH_DETAILS__'] = true;
      return args;
    });
  },
};

const mix = require('laravel-mix');
const path = require('path');

mix.js('resources/js/app.js', 'public/js')
   .vue()
   .postCss('resources/css/app.css', 'public/css', [
       //
   ])
   .webpackConfig({
       resolve: {
           alias: {
               '@': path.resolve('resources/js'),
           },
       },
       module: {
           rules: [
               {
                   test: /\.vue$/,
                   loader: 'vue-loader'
               }
           ],
       },
   });

if (mix.inProduction()) {
    mix.version();
}
