/*!
* gulp
* $ npm install jshint gulp-jshint gulp-sass gulp-concat gulp-uglify gulp-rename gulp-autoprefixer gulp-notify gulp-livereload gulp-cssmin es6-promise gulp-promise gulp-strip-css-comments gulp-image-optimization --save-dev
*/

// Load plugins

// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var jshint = require('gulp-jshint');
var sass   = require('gulp-sass');
var cssmin = require('gulp-cssmin');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var stripCssComments = require('gulp-strip-css-comments');
var notify = require("gulp-notify");
var livereload = require('gulp-livereload');
var promise = require("gulp-promise");
var Promise = require('es6-promise').Promise;
var imageop = require('gulp-image-optimization');

// Styles
gulp.task('styles', function () {
    gulp.src('src/styles/*.scss')
        .pipe(sass({style: 'compress'}))
        .pipe(autoprefixer('last 1 version','> 4%', 'ie 8', 'ie 9'))
        .pipe(stripCssComments({all: true}))
        .pipe(concat('main.css'))
        .pipe(gulp.dest('dist/css'))
        .pipe(rename('main.min.css'))
        .pipe(cssmin())
        .pipe(gulp.dest('dist/css'))
        .pipe(notify({ message: 'Styles Generated!' }));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    gulp.src('src/scripts/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'))
        .pipe(concat('all.js'))
        .pipe(gulp.dest('dist/js'))
        .pipe(rename('all.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist/js'))
        .pipe(notify({ message: 'Scripts Generated!' }));
});

//images optimization
gulp.task('images', function(cb) {
    //gulp.src(config.imagessrc)
    gulp.src(['src/images/**/*.png','src/images/**/*.jpg','src/images/**/*.gif','src/images/**/*.jpeg'])
    .pipe(imageop({
        optimizationLevel: 5,
        progressive: true,
        interlaced: true
    }))
    .pipe(gulp.dest('dist/imgs')).on('end', cb).on('error', cb)
    .pipe(notify({ message: 'Images Optimazed!' }));
});


// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('./src/scripts/*.js', ['scripts']);
    gulp.watch('./src/styles/*.scss', ['styles']);
    gulp.watch('./src/images/*.*', ['images']);

    // Create LiveReload server
    livereload.listen();
    // Watch any files in dist/, reload on change
     gulp.watch(['dist/**']).on('change', livereload.changed);
});

// Default Task
//gulp.task('default', ['styles', 'scripts', 'watch']);
gulp.task('default', ['styles', 'scripts', 'images', 'watch']);