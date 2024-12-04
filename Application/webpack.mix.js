const mix = require("laravel-mix");
const path = require("path");

mix.js("resources/js/app.js", "public/js")
    .vue()
    .postCss("resources/css/app.css", "public/css", [])
    .webpackConfig({
        resolve: {
            alias: {
                "@": path.resolve("resources/js"),
                vue$: "vue/dist/vue.esm-bundler.js",
                "@bootstrap": path.resolve(
                    __dirname,
                    "node_modules/bootstrap/scss"
                ),
            },
        },
    })
    .sass("public/assets/css/login.scss", "public/css");

if (mix.inProduction()) {
    mix.version();
}

module.exports = {
    // Suas outras configurações...
    resolve: {
        fallback: {
            net: false,
            tls: false,
        },
    },
};
