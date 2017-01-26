const elixir = require('laravel-elixir');
const gulp = require('gulp');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const cleanCSS = require('gulp-clean-css');
const minify = require('gulp-minify');

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
    mix.less('app.less');
});

gulp.task('default', () => {

});

gulp.task('css', () => {
  gulp.src([
    'node_modules/bootstrap/dist/css/bootstrap.min.css'
  ])
  .pipe(concat('all.css'))
  .pipe(cleanCSS())
  .pipe(gulp.dest('./public/css'));
});

gulp.task('js', () => {
  gulp.src([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js'
  ])
  .pipe(concat('all.js'))
  .pipe(minify())
  .pipe(gulp.dest('./public/js'));
});
