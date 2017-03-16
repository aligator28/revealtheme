var gulp         	 = require('gulp'),
		sass         = require('gulp-sass'),
		autoprefixer = require('gulp-autoprefixer'),
		cleanCSS     = require('gulp-clean-css'),
		rename       = require('gulp-rename'),
		concat       = require('gulp-concat'),
		uglify       = require('gulp-uglify');


gulp.task('styles', function () {
	return gulp.src('sass/*.sass')
	.pipe(sass({
	// 	includePaths: require('node-bourbon').includePaths
	}).on('error', sass.logError))
	// .pipe(rename({suffix: '.min', prefix : ''}))
	.pipe(concat('css/custom-reveal-theme.css'))
	.pipe(autoprefixer({browsers: ['last 15 versions'], cascade: false}))
	.pipe(cleanCSS())
	.pipe(gulp.dest(''))
});

// gulp.task('styles_css', function () {
// 	return gulp.src('css/*.css')
// 	.pipe(concat('css/custom-reveal-theme-css.css'))
// 	.pipe(autoprefixer({browsers: ['last 15 versions'], cascade: false}))
// 	.pipe(cleanCSS())
// 	.pipe(gulp.dest(''))
// });

// gulp.task('scripts', function() {
// 	return gulp.src([
// 		'./app/libs/modernizr/modernizr.js',
// 		'./app/libs/jquery/jquery-1.11.2.min.js',
// 		'./app/libs/waypoints/waypoints.min.js',
// 		'./app/libs/animate/animate-css.js',
// 		])
// 		.pipe(concat('libs.js'))
// 		.pipe(uglify()) //Minify libs.js
// 		.pipe(gulp.dest('./app/js/'));
// });

gulp.task('watch', function () {
	gulp.watch('sass/*.sass', ['styles']);
	// gulp.watch('css/*.css', ['styles_css']);
	//gulp.watch('app/libs/**/*.js', ['scripts']);
});

gulp.task('default', ['watch']);
