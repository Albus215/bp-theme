let mix = require('laravel-mix');

// -- SCSS
mix
    .sass('app/app.scss', 'static/app.css')
    // .sass('app/app-auth.scss', 'static/app-auth.css')
    .js('app/app.js', 'static/app.js');

mix
    .options({
        processCssUrls: false,
        autoprefixer: {
            flexbox: true,
            overrideBrowserslist: ['IE >= 11', 'Edge >= 12', 'Firefox >= 28', 'Chrome >= 21', 'Safari >= 6.1', 'Opera >= 12.1', 'iOS >= 8', ]
        },
    })
    .webpackConfig({
        externals: {
            jquery: 'jQuery'
        },
    })
    // .browserSync({
    //     // proxy: 'yourdomain.local',
    //     // injectChanges: false,
    //     files: [
    //         'app/{*,**/*}.scss',
    //         'app/{*,**/*}.js',
    //     ],
    // });