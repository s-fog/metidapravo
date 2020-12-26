const { src, dest, parallel, watch } = require('gulp');
const gulp = require('gulp'),
    sourcemaps = require('gulp-sourcemaps');
    sass = require('gulp-sass'),
    browserSync = require('browser-sync'),
    imagemin = require('gulp-imagemin'),
    clone = require('gulp-clone'),
    clonesink = clone.sink(),
    plumber = require('gulp-plumber'),
    webp = require('gulp-webp'),
    cacheFiles = require('gulp-cache-files'),
    babel = require('gulp-babel'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify');

function imagesPng () {
    return src('images/**/*.png', {read: false})
        .pipe(cacheFiles.filter('manifest-png.json'))
        .pipe(plumber())
        .pipe(imagemin([
            imagemin.optipng({optimizationLevel: 5}),
        ]))
        .pipe(cacheFiles.manifest())
        .pipe(clonesink) // start stream
        .pipe(webp({quality: '90', lossless: true, method: 6})) // convert images to webp and save a copy of the original format
        .pipe(clonesink.tap()) // close stream and send both formats to dist
        .pipe(gulp.dest('img'));
}

function imagesJpg() {
    return src('images/**/*.jpg', {read: false})
        .pipe(cacheFiles.filter('manifest-jpg.json'))
        .pipe(plumber())
        .pipe(imagemin([
            imagemin.mozjpeg({quality: 90, progressive: true}),
        ]))
        .pipe(cacheFiles.manifest())
        .pipe(clonesink) // start stream
        .pipe(webp({quality: '90', method: 6})) // convert images to webp and save a copy of the original format
        .pipe(clonesink.tap()) // close stream and send both formats to dist
        .pipe(gulp.dest('img'));
}

exports.imagesPng = imagesPng;
exports.imagesJpg = imagesJpg;
