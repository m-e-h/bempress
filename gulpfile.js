/**
 * MEH gulp
 */

var gulp = require('gulp'),
    del = require('del'),
    imagemin = require('gulp-imagemin'),
    gulpif = require('gulp-if'),
    minifyCSS = require('gulp-minify-css'),
    rename = require('gulp-rename'),
    changed = require('gulp-changed'),
    sass = require('gulp-sass'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat');
    csscomb = require('gulp-csscomb'),
    runSequence = require('run-sequence'),
    browserSync = require('browser-sync').create('meh'),
    reload = browserSync.reload,
    autoprefixer = require('gulp-autoprefixer');

// Optimize Images
gulp.task('images', function () {
  return gulp.src('src/images/**/*')
    .pipe(imagemin({
      progressive: true,
      interlaced: true,
      removeUselessStrokeAndFill: true,
      removeEmptyAttrs: true,
      svgoPlugins: [{removeViewBox: false}],
    }))
    .pipe(gulpif('*.svg', rename({
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

// Compile and Automatically Prefix Stylesheets
gulp.task('styles', function () {
  return gulp.src([
    'src/styles/style.scss'
  ])
    .pipe(changed('styles', {extension: '.scss'}))
    .pipe(sass())
    .on('error', swallowError)
    .pipe(autoprefixer({browsers: ['> 1%', 'last 2 versions']}))
    .pipe(csscomb())
    .pipe(gulp.dest('./'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(minifyCSS())
    .pipe(gulp.dest('./'))
    .pipe(reload({stream: true}));
});

// Compile and Automatically Prefix Stylesheets
gulp.task('critical', function () {
  return gulp.src([
    'src/styles/critical.scss'
  ])
    .pipe(changed('styles', {extension: '.scss'}))
    .pipe(sass())
    .on('error', swallowError)
    .pipe(autoprefixer({browsers: ['> 1%', 'last 2 versions']}))
    .pipe(csscomb())
    .pipe(rename({ extname: '.php' }))
    .pipe(minifyCSS())
    .pipe(gulp.dest('css'));
});

// Compile and Automatically Prefix Stylesheets
gulp.task('wpeditor', function () {
  return gulp.src([
    'src/styles/editor-style.scss'
  ])
    .pipe(changed('styles', {extension: '.scss'}))
    .pipe(sass())
    .on('error', swallowError)
    .pipe(autoprefixer({browsers: ['> 1%', 'last 2 versions']}))
    .pipe(minifyCSS())
    .pipe(gulp.dest('css'))
});

// Allows gulp to not break after a sass error.
// Spits error out to console
function swallowError(error) {
  console.log(error.toString());
  this.emit('end');
}

// Concatenate And Minify JavaScript
gulp.task('scripts', function() {
  return gulp.src([
    'src/scripts/**/*.js'
    ])
    //.pipe(concat('main.js'))
    .pipe(gulp.dest('js'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(uglify({preserveComments: 'some'}))
    .pipe(gulp.dest('js'));
});

// Build and serve the output
gulp.task('serve', ['styles'], function () {
  browserSync.init({
    //proxy: "local.wordpress.dev"
    //proxy: "local.wordpress-trunk.dev"
    proxy: "june.dev"
    //proxy: "stmark.dev"
    //proxy: "127.0.0.1:8080/wordpress/"
  });

  gulp.watch(['src/styles/**/*.{scss,css}'], ['styles', reload]);
  gulp.watch(['src/scripts/**/*.js'], reload);
  gulp.watch(['src/images/**/*'], reload);
  gulp.watch(['*.php'], reload);
});

// Build Production Files, the Default Task
gulp.task('default', function (cb) {
  runSequence('styles', ['hybrid', 'scripts', 'critical', 'wpeditor', 'images'], cb);
});
