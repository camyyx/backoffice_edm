const gulp   = require('gulp'),
      concat = require('gulp-concat'),
      terser = require('gulp-terser'),
      csso   = require('gulp-csso'),
      del    = require('del');

/**
 * CSS Tasks
 */
gulp.task('css', () => {
    // Delete files first
    del('./static/dist/css/*');

    return gulp.src([ './node_modules/bootstrap/dist/css/bootstrap.min.css', './static/css/*.css' ])
               .pipe(concat('app.css'))
               .pipe(csso({
                    restructure: true,
                    sourceMap: true
                }))
               .pipe(gulp.dest('./static/dist/css/'));
});

gulp.task('css:watch', () => {
   return gulp.watch('./static/css/*.css', gulp.series('css'));
});


/**
 * JS Tasks
 */
gulp.task('js', () => {
    // Delete files first
    del('./static/dist/js/*');

    return gulp.src([ './node_modules/jquery/dist/jquery.slim.min.js', './node_modules/bootstrap/dist/js/bootstrap.min.js', './static/js/*.js' ])
               .pipe(concat('app.js'))
               .pipe(terser())
               .pipe(gulp.dest('./static/dist/js/'));
});

gulp.task('js:watch', () => {
    return gulp.watch('./static/js/*.js', gulp.series('js'));
});

/**
 * General tasks
 */
gulp.task('all', gulp.parallel('css', 'js'));
gulp.task('all:watch', () => {
    return gulp.watch([
        './static/css/*.css',
        './static/js/*.js'
    ], gulp.parallel('css', 'js'));
});