'use strict';

var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var del = require('del');
var gulp = require('gulp');
var header = require('gulp-header');
var htmlmin = require('gulp-htmlmin');
var jshint = require('gulp-jshint');
var minifyCss = require('gulp-minify-css');
var modernizr = require('gulp-modernizr');
var moment = require('moment');
var rename = require('gulp-rename');
var replace = require('gulp-replace-task');
var rev = require('gulp-rev');
var run = require('gulp-run');
var runSequence = require('run-sequence');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var svg2png = require('gulp-svg2png');
var svgmin = require('gulp-svgmin');
var svgstore = require('gulp-svgstore');
var template = require('gulp-template');
var uglify = require('gulp-uglify');
var usemin = require('gulp-usemin');

var sassParams = {
	includePaths: [
		'bower_components/normalize-scss/',
		'bower_components/bourbon/app/assets/stylesheets/',
		'bower_components/compass-mixins/lib/',
		'bower_components/compass-breakpoint/stylesheets/',
		'bower_components/singularity/stylesheets/',
		'src/sass/'
	],
	errLogToConsole: true
};

var pkg = require('./package.json');
var banner = '/* <%= pkg.name %> <%= pkg.version %> (build <%= moment().toISOString() %>) */\n';

gulp.task('modernizr', function (cb) {
	gulp.src(['src/index.html'])
			.pipe(modernizr({
				'cache': false,
				'crawl': false,
				'options': [
					'setClasses',
					'addTest',
					'html5printshiv',
					'testProp',
					'fnBind'
				],
				'tests': [
					'bgsizecover'
				]
			}))
			.pipe(gulp.dest('src/vendor/modernizr'))
			.on('end', cb);
});

gulp.task('sass:prod', function (cb) {
	gulp.src('src/sass/**/*.scss')
			.pipe(sass(sassParams).on('error', sass.logError))
			.pipe(autoprefixer({
				browsers: ['last 2 versions', 'ie >= 8', 'ff >= 5', 'chrome >= 20', 'opera >= 12', 'safari >= 4', 'ios >= 6', 'android >= 2', 'bb >= 6']
			}))
			.pipe(gulp.dest('tmp/css'))
			.on('end', cb);
});

gulp.task('sass:dev', function (cb) {
	gulp.src('src/sass/**/*.scss')
			.pipe(sourcemaps.init())
			.pipe(sass(sassParams).on('error', sass.logError))
			.pipe(autoprefixer({
				browsers: ['last 2 versions', 'ie >= 8', 'ff >= 5', 'chrome >= 20', 'opera >= 12', 'safari >= 4', 'ios >= 6', 'android >= 2', 'bb >= 6']
			}))
			.pipe(sourcemaps.write('.'))
			.pipe(gulp.dest('tmp/css'))
			.on('end', cb);
});

gulp.task('usemin', function (cb) {
	gulp.src('src/**/*.html')
			.pipe(usemin({
				css: [minifyCss({advanced: false}), rev()],
				js: [uglify(), rev()]
			}))
			.pipe(gulp.dest('build'))
			.on('end', cb);
});

gulp.task('svg', function (cb) {
	gulp.src('src/svg/**/*.svg')
			.pipe(svgmin({
				plugins: [
					{
						removeDesc: true
					},
					{
						removeTitle: true
					}
				]
			}))
			.pipe(svgstore())
			.pipe(replace({
				patterns: [
					{
						match: /<\?xml.*?\?>/gi,
						replace: ''
					},
					{
						match: /<\!doctype.*?>/gi,
						replace: ''
					}
				]
			}))
			.pipe(rename('icon.svg'))
			.pipe(gulp.dest('svg'))
			.on('end', cb);
});

gulp.task('svg2png', function (cb) {
	gulp.src('src/svg/**/*.svg')
			.pipe(svg2png())
			.pipe(gulp.dest('img'))
			.on('end', cb);
});

gulp.task('move', function (cb) {
	gulp.src(['build/**/*.*'])
			.pipe(gulp.dest('.'))
			.on('end', cb);
});

gulp.task('clean:init', function (cb) {
	del(['css', 'img/icon', 'js', 'svg'], cb);
});

gulp.task('clean:exit', function (cb) {
	del(['build', 'tmp'], cb);
});

gulp.task('sync', function (cb) {
	run('bash sync.sh css 1').exec(cb);
});

gulp.task('build:dev', function (cb) {
	runSequence('clean:init', 'sass:dev', 'usemin', 'svg', 'svg2png', 'move', 'sync', 'clean:exit', cb);
});

gulp.task('build:prod', function (cb) {
	runSequence('clean:init', 'sass:prod', 'usemin', 'svg', 'svg2png', 'move', 'clean:exit', cb);
});

gulp.task('watch', function () {
	gulp.watch(['!tmp', 'src/sass/**/*.scss', 'src/js/**/*.js', 'src/svg/**/*.svg', 'src/**/*.html'], ['build:dev']);
});

gulp.task('default', ['build:dev', 'watch']);
