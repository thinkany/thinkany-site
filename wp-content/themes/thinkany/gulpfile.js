require('dotenv').config();

var gulp = require('gulp');
var babel = require('gulp-babel');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var jshint = require('gulp-jshint');
var livereload = require('gulp-livereload');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();

const jsFiles = [
  "assets/js/main.js",
  //"assets/js/vendor/slick.js",
  //"assets/js/vendor/micromodal.min.js",
  "assets/js/header.js",
  "assets/js/lazy.js"
]

gulp.task('global-js', function () {
  return gulp.src(jsFiles)
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(concat("thinkany.min.js"))
    .pipe(babel({ presets: ['@babel/env'] }))
    .pipe(gulp.dest('assets/js/_dist/'))
    .pipe(livereload()).pipe(browserSync.stream());
});

gulp.task('global-scss', function () {
  return gulp.src(['assets/css/*.scss','assets/css/*/*.scss'])
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(autoprefixer({ cascade: false }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('assets/css/_dist/'))
    .pipe(livereload()).pipe(browserSync.stream());
});

gulp.task('global-php', function () {
  return gulp.src('*.php').pipe(livereload()).pipe(browserSync.stream());
});

gulp.task('block-scss', function () {
  return gulp.src('blocks/*/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(autoprefixer({ cascade: false }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('blocks/_dist/'))
    .pipe(livereload()).pipe(browserSync.stream());
});

gulp.task('blocks-js', function () {
  return gulp.src('blocks/*/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(babel({ presets: ['@babel/env'] }))
    .pipe(gulp.dest('blocks/_dist/'))
    .pipe(livereload()).pipe(browserSync.stream());
});

gulp.task('blocks-php', function () {
  return gulp.src(['blocks/*/*.php'])
    .pipe(gulp.dest('blocks/_dist/'))
    .pipe(livereload()).pipe(browserSync.stream());
});

gulp.task('watch', function () {
  livereload.listen({
  });

  browserSync.init({
    proxy: {
      target: process.env.GULP_PROXY,
    }
  });

  gulp.watch('assets/js/*.js', gulp.series('global-js'));
  gulp.watch(['assets/css/*.scss', 'assets/css/parts/*.scss', 'assets/css/parts/*/*.scss'], gulp.series('global-scss'));
  gulp.watch(['./*.php', './*/*.php', './*/*/*.php'], gulp.series('global-php'));
  gulp.watch('blocks/*/*.scss', gulp.series('block-scss'));
  gulp.watch('blocks/*/*.js', gulp.series('blocks-js'));

});

gulp.task('default', gulp.series('global-js', 'global-scss', 'global-php', 'block-scss', 'blocks-js', 'blocks-php', 'watch'));