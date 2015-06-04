/**
 * BEMpress
 */

'use strict';

// Include Gulp & Tools We'll Use
var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var del = require('del');
var minifyCSS = require('gulp-minify-css');
var rename = require('gulp-rename');
var composer = require('gulp-composer');
var csscomb = require('gulp-csscomb');
var runSequence = require('run-sequence');
var browserSync = require('browser-sync');
var reload = browserSync.reload;

var AUTOPREFIXER_BROWSERS = [
  'ie >= 9',
  'ie_mob >= 10',
  'ff >= 30',
  'chrome >= 34',
  'safari >= 7',
  'opera >= 23',
  'ios >= 6',
  'android >= 4.3',
  'bb >= 10'
];

gulp.task('composer', function () {
    composer({ cwd: './', bin: 'composer' });
});

// Optimize Images
gulp.task('images', function () {
  return gulp.src('src/images/**/*')
    .pipe($.imagemin({
      progressive: true,
      interlaced: true,
      removeUselessStrokeAndFill: true,
      removeEmptyAttrs: true
    }))
    .pipe($.if('*.svg', $.rename({
			prefix: 'svg-',
			extname: '.php'
		})))
    .pipe(gulp.dest('images'));
});

// Copy hybrid-core to extras
gulp.task('hybrid', function () {
  return gulp.src([
  	'src/composer/justintadlock/hybrid-core/**/*'
  	])
    .pipe(gulp.dest('hybrid-core'));
});

// Copy Flagship-Library to /inc/
gulp.task('flagship', function () {
  return gulp.src([
    'src/composer/flagshipwp/flagship-library/**/*'
    ])
    .pipe(gulp.dest('inc/flagship-library'));
});

// Copy tha to /inc/
gulp.task('tha', function () {
  return gulp.src([
  	'src/composer/zamoose/themehookalliance/tha-theme-hooks.php'
  	])
    .pipe(gulp.dest('inc'));
});

// Compile and Automatically Prefix Stylesheets
gulp.task('styles', function () {
  return gulp.src([
    'src/scss/style.scss'
  ])
    .pipe($.changed('styles', {extension: '.scss'}))
    .pipe($.sass({
      precision: 10
    }))
    .on('error', console.error.bind(console))
    .pipe($.autoprefixer({browsers: AUTOPREFIXER_BROWSERS}))
    .pipe(csscomb())
    .pipe(gulp.dest('./'))
    //Concatenate And Minify Styles
    .pipe(rename({ suffix: '.min' }))
    .pipe(minifyCSS())
    .pipe(gulp.dest('./'));
});

// Compile and Automatically Prefix Stylesheets
gulp.task('critical', function () {
  return gulp.src([
    'src/scss/critical.scss'
  ])
    .pipe($.changed('styles', {extension: '.scss'}))
    .pipe($.sass({
      precision: 10
    }))
    .on('error', console.error.bind(console))
    .pipe($.autoprefixer({browsers: AUTOPREFIXER_BROWSERS}))
    .pipe(csscomb())
    .pipe(gulp.dest('css'))
    //Concatenate And Minify Styles
    .pipe(rename({ extname: '.php' }))
    .pipe(minifyCSS())
    .pipe(gulp.dest('templates'));
});

// Compile and Automatically Prefix Stylesheets
gulp.task('wpeditor', function () {
  return gulp.src([
    'src/scss/editor-style.scss'
  ])
    .pipe($.changed('styles', {extension: '.scss'}))
    .pipe($.sass({
      precision: 10
    }))
    .on('error', console.error.bind(console))
    .pipe($.autoprefixer({browsers: AUTOPREFIXER_BROWSERS}))
    .pipe(minifyCSS())
    .pipe(gulp.dest('css'))
});

// Concatenate And Minify JavaScript
gulp.task('scripts', function() {
  return gulp.src([
  	'src/js/**/*.js'
  	])
    //.pipe($.concat('main.js'))
    .pipe(gulp.dest('js'))
    .pipe(rename({ suffix: '.min' }))
    .pipe($.uglify({preserveComments: 'some'}))
    // Output Files
    .pipe(gulp.dest('js'));
});

// Build and serve the output
gulp.task('serve', ['styles'], function () {
  browserSync({
    //proxy: "local.wordpress.dev"
    //proxy: "local.wordpress-trunk.dev"
    //proxy: "doc.dev"
    //proxy: "stmark.dev"
    proxy: "127.0.0.1:8080/wordpress/"
     });

  gulp.watch(['**/*.php'], reload);
  gulp.watch(['src/scss/**/*.{scss,css}'], ['styles', reload]);
  gulp.watch(['src/js/**/*.js'], reload);
  gulp.watch(['src/images/**/*'], reload);
});

// Build Production Files, the Default Task
gulp.task('default', function (cb) {
  runSequence('styles', ['composer', 'scripts', 'critical', 'wpeditor', 'images', 'hybrid', 'flagship', 'tha'], cb);
});
