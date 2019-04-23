const
    gulp = require('gulp'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    del = require('del'),
    babel = require('gulp-babel')

gulp.task('js', async () => {
    await del('./js/ugly_app.js')

    return gulp.src('./js/*.js')
        .pipe(babel({ presets: ['@babel/env'] }))
        .pipe(concat('ugly_app.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./js/'))
})

gulp.task('js:watch', () => {
	return gulp.watch('./js/*js', gulp.series('js'))
})
