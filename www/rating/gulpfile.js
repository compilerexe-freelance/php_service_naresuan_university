var gulp = require('gulp');
var connect = require('gulp-connect-php');
var browserSync = require('browser-sync');

gulp.task('connect-sync', function() {
    connect.server({}, function (){
        browserSync({
            proxy: 'rating:8888'
        });
    });

    gulp.watch('**/*.php').on('change', function () {
        browserSync.reload();
    });

});

gulp.task('default', ['connect-sync']);
