// Load plugins

//npm install jshint gulp-jshint gulp-compass gulp-concat gulp-uglify gulp-rename gulp-autoprefixer gulp-notify gulp-livereload gulp-promise es6-promise gulp-clean gulp-cssnano gulp-copy gulp-bower gulp-sourcemaps gulp-image-optimization gulp-imagemin gulp-changed --save-dev

//bower install

// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var jshint = require('gulp-jshint');
var compass   = require('gulp-compass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var notify = require("gulp-notify");
var livereload = require('gulp-livereload');
var promise = require("gulp-promise");
var Promise = require('es6-promise').Promise;
var clean = require('gulp-clean');
var nano = require('gulp-cssnano');
var copy = require('gulp-copy');
var bower = require('gulp-bower');
var sourcemaps = require('gulp-sourcemaps');
var imageop = require('gulp-image-optimization');
var imagemin = require('gulp-imagemin');
var changed  = require('gulp-changed');



var config = {
    //JavaScript files that will be combined into a jquery bundle
    jquerysrc: [
        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/jquery-validation/dist/jquery.validate.min.js',
        'bower_components/jquery-validation-unobtrusive/jquery.validate.unobtrusive.min.js',
        'bower_components/jquery.scrollTo/jquery.scrollTo.min.js',
        'bower_components/jquery.localScroll/jquery.localScroll.min.js'
    ],
    jquerybundle: 'dist/js/jquery-bundle.min.js',

    //JavaScript files that will be combined into a Bootstrap bundle
    bootstrapsrc: [
        'bower_components/bootstrap/dist/js/bootstrap.min.js',
        'bower_components/respond/dest/respond.min.js'
    ],
    bootstrapbundle: 'dist/js/bootstrap-bundle.min.js',

    //Modernizr
    modernizrsrc: ['bower_components/modernizr/src/modernizr.js'],
    modernizrbundle: 'dist/js/modernizer.min.js',

    //Bootstrap CSS and Fonts
    bootstrapcss: 'bower_components/bootstrap/dist/css/bootstrap.css',
    boostrapfonts: 'bower_components/bootstrap/dist/fonts/*.*',

    scriptssrc: "src/scripts/*.js",
    sasssrc: 'src/styles/*.scss',
    fontssrc: 'src/fonts/*.*',
    imagessrc: ['src/images/**/*.png','src/images/**/*.jpg','src/images/**/*.gif','src/images/**/*.jpeg','src/images/**/*.svg'],
    fontsout: 'dist/fonts',
    cssout: 'dist/css',
    jsout: 'dist/js',
    imgsout: 'dist/imgs'
}


//Create a jquery bundled file
gulp.task('jquery-bundle', ['bower-restore'], function () {
    return gulp.src(config.jquerysrc)
     .pipe(concat('jquery-bundle.min.js'))
     .pipe(gulp.dest(config.jsout));
});

//Create a bootstrap bundled file
gulp.task('bootstrap-bundle', ['bower-restore'], function () {
    return gulp.src(config.bootstrapsrc)
     .pipe(sourcemaps.init())
     .pipe(concat('bootstrap-bundle.min.js'))
     .pipe(sourcemaps.write('maps'))
     .pipe(gulp.dest(config.jsout));
});

//Create a modernizr bundled file
gulp.task('modernizer', ['bower-restore'], function () {
    return gulp.src(config.modernizrsrc)
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat('modernizer-min.js'))
        .pipe(sourcemaps.write('maps'))
        .pipe(gulp.dest(config.jsout));
});

// Synchronously delete the output style files (css / js / images)
gulp.task('clean', function (cb) {
    return gulp.src(['dist/styles', 'dist/scripts', 'dist/images'], {read: false})
    .pipe(clean())
});

gulp.task('css', ['bower-restore'], function () {
    return gulp.src([config.bootstrapcss])
     .pipe(concat('app.css'))
     .pipe(gulp.dest(config.cssout))
     .pipe(nano())
     .pipe(concat('app.min.css'))
     .pipe(gulp.dest(config.cssout));
});

gulp.task('bootstrap-fonts', ['bower-restore'], function () {
    return gulp.src(config.boostrapfonts)
        .pipe(gulp.dest(config.fontsout));
});

gulp.task('fonts', ['bootstrap-fonts','bower-restore'], function () {
    return gulp.src(config.fontssrc)
        .pipe(gulp.dest(config.fontsout));
});

// Styles
gulp.task('styles', ['css', 'fonts'], function () {
    return gulp.src(config.sasssrc)
        .pipe(compass({ 
            sass: 'src/styles',
            css: 'dist/css'
        }))
        .pipe(autoprefixer('last 1 version', '> 4%', 'ie 8', 'ie 9'))
        .pipe(gulp.dest(config.cssout))
        .pipe(nano())
        .pipe(concat('main.min.css'))
        .pipe(gulp.dest(config.cssout))
        .pipe(notify({ message: 'Styles Generated!' }));
});

// Concatenate & Minify JS
gulp.task('scripts', ['jquery-bundle', 'bootstrap-bundle', 'modernizer'], function () {
    gulp.src(config.scriptssrc)
        .pipe(jshint())
        .pipe(jshint.reporter('default'))
        .pipe(concat('all.js'))
        .pipe(gulp.dest(config.jsout))
        .pipe(rename('all.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(config.jsout))
        .pipe(notify({ message: 'Scripts Generated!' }));
});

//images optimization
// gulp.task('images', function(cb) {
//     gulp.src(config.imagessrc)
//     .pipe(imageop({
//         optimizationLevel: 5,
//         progressive: true,
//         interlaced: true
//     }))
//     .pipe(gulp.dest(config.imgsout)).on('end', cb).on('error', cb)
//     .pipe(notify({ message: 'Images Optimazed!' }));
// });

gulp.task('images', function(cb) {
    gulp.src(config.imagessrc)
        //.pipe(changed('./dist/img/'))
        .pipe(imagemin({
            progressive: true
        }))
        .pipe(gulp.dest(config.imgsout)).on('end', cb).on('error', cb)
        .pipe(notify({ message: 'Images Optimazed!' }));
});

//Restore all bower packages
gulp.task('bower-restore', function () {
    return bower();
});

gulp.task('bower', function() {
  return bower({ cmd: 'update'});
});

// Watch Files For Changes/*
gulp.task('watch', function () {
    gulp.watch('src/scripts/*.js', ['scripts']);
    gulp.watch('src/styles/*.scss', ['styles']);
    gulp.watch('src/images/*.*', ['images']);

    // Create LiveReload server
    livereload.listen();
    // Watch any files in dist/, reload on change
    gulp.watch(['dist/**']).on('change', livereload.changed);
});

gulp.task('default', ['clean','styles', 'scripts', 'images', 'watch']);
