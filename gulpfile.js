const
    gulp = require('gulp'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    del = require('del'),
    babel = require('gulp-babel')

gulp.task('build', () => {

    return gulp.src('./js/*.js')
        .pipe(babel({ presets: ['@babel/env'] }))
        .pipe(concat('ugly_app.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./dist/js/'))
})

gulp.task('js', () => {

    del('./dist/*.js')

    return gulp.src('./js/*.js')
        .pipe(babel({ presets: ['@babel/env'], plugins: ['@babel/plugin-proposal-class-properties'] }))
        .pipe(concat('ugly_app.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./dist/js/'))
})

gulp.task('default', () => {
    return gulp.watch('./js/*js', gulp.series('js'))
})
