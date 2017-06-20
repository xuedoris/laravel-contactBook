const elixir = require('laravel-elixir');
var gulp = require('gulp');
var responsive = require('gulp-responsive-images');
var imagemin = require('gulp-imagemin');

require('laravel-elixir-vue-2');
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

elixir(mix => {
    mix.sass('app.scss')
       .webpack('app.js')
        .webpack('welcome.js');
});

gulp.task('images', function () {
    //Using Globs for path matching
    gulp.src('resources/assets/images/*.+(png|jpg|gif|svg)')
        .pipe(responsive({
            'header-bg.jpg': [
                {
                    quality: 90
                },
                {
                    width: 900,
                    quality: 50,
                    suffix: '-900'
                },
                {
                    width: 700,
                    quality: 50,
                    suffix: '-700'
                }
            ],
            'browser*.jpg': [
                {
                    quality: 90
                },
                {
                    width: 750,
                    quality: 50,
                    suffix: '-750'
                },
                {
                    width: 400,
                    quality: 50,
                    suffix: '-400'
                }
            ]
        }))
        .pipe(imagemin())
        .pipe(gulp.dest('public/images/'));
});
