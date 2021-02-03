const argv         = require('minimist')(process.argv.slice(2));
const beeper       = require('beeper');
const browsersync  = require('browser-sync').create();
const flatten      = require('gulp-flatten');
const gulp         = require('gulp');
const del          = require('del');
const include 	   = require('gulp-include')
const gulpif       = require('gulp-if');
const imagemin     = require('gulp-imagemin');
const plumber      = require('gulp-plumber');
const sass         = require('gulp-sass');
const sourcemaps   = require('gulp-sourcemaps');
const uglify       = require('gulp-uglify');
const rename       = require('gulp-rename');
const svgstore     = require('gulp-svgstore');
const babel        = require('gulp-babel');
const postcss      = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano      = require('cssnano');


const path = {
    "base" : {
        "source": "assets/src/",
        "dist":   "assets/dist/",
    },
    "scripts" : {
        "base": "assets/src/js/",
        "files": [
            {
                "source": "assets/src/js/*.js",
                "dist": "assets/dist/js/"
            },
            {
                "source": "assets/src/js/pages/*.js",
                "dist": "assets/dist/js/pages/"
            },
			{
                "source": "assets/src/js/admin/*.js",
                "dist": "assets/dist/js/admin/"
            },
        ]
    },
    "styles" : {
        "base": "assets/src/scss/",
        "files": [
            {
                "source": "assets/src/scss/*.scss",
                "dist": "assets/dist/css/"
            },
            {
                "source": "assets/src/scss/pages/*.scss",
                "dist": "assets/dist/css/pages/"
			},
			{
                "source": "assets/src/scss/admin/*.scss",
                "dist": "assets/dist/css/admin/"
            },
        ]
    },
    "fonts" : {
        "source": "assets/src/fonts/",
        "dist":   "assets/dist/fonts/",
    },
    "images" : {
        "source": "assets/src/img/",
        "dist":   "assets/dist/img/",
    },
    "sprite" : {
        "source": "assets/src/svg/",
        "dist":   "assets/dist/svg/",
    },
    "favicon" : {
        "source": "assets/src/favicon/",
        "dist":   "assets/dist/favicon/",
    }
};


let production = argv.production;
let hostname = 'http://localhost';


gulp.task('styles', () => {
    let stream;

    path.styles.files.forEach(function (item) {

      stream = gulp.src(item.source)
		.pipe(gulpif(!production, plumber()))
		.pipe(gulpif(!production, sourcemaps.init()))
		.pipe(sass())
		.pipe(postcss([ autoprefixer(), cssnano() ]))
		.pipe(gulpif(!production, sourcemaps.write()))
		.pipe(gulp.dest(item.dist))
		.pipe(browsersync.stream({match: '**/*.css'}));

    });

    return stream;
});


gulp.task('scripts', () => {
    let stream;

    path.scripts.files.forEach(function (item) {

      stream = gulp.src(item.source)
			.pipe(gulpif(!production, sourcemaps.init()))
			.pipe(include())
			.pipe(babel({
				presets: ['@babel/env'],
				plugins: ['transform-react-jsx']
			}))
			.pipe(uglify())
			.on('error', function(err) {
				beeper();
				console.log(err);
			})
			.pipe(gulpif(!production, sourcemaps.write()))
			.pipe(gulp.dest(item.dist))
			.pipe(browsersync.stream({match: '**/*.js'}))
    });

    return stream;
});


gulp.task('fonts', () => {
    return gulp.src([path.fonts.source + '**/*'])
        .pipe(flatten())
        .pipe(gulp.dest(path.fonts.dist))
        .pipe(browsersync.stream());
});


gulp.task('images', () => {
    return gulp
		.src([path.images.source + '**/*'])
		.pipe(
			imagemin({
				progressive: true,
				interlaced: true,
				svgoPlugins: [
					{removeUnknownsAndDefaults: false},
					{cleanupIDs: false},
					{removeDimensions: true}
				]
			})
		)
		.pipe(gulp.dest(path.images.dist))
		.pipe(browsersync.stream());
});


gulp.task('svgstore', () => {
    return gulp.src(path.sprite.source + '**/*.svg')
		.pipe(rename({prefix: 'icon-'}))
		.pipe(imagemin([
			imagemin.svgo({
				plugins: [
					{
						removeViewBox: false,
						collapseGroups: true
					}
				]
			})
		]))
        .pipe(svgstore())
        .pipe(rename({
            basename: "sprite",
        }))
		.pipe(gulp.dest(path.sprite.dist))
		.pipe(browsersync.stream());
});


gulp.task('favicon', () => {
    return gulp.src([path.favicon.source + '**/*'])
        .pipe(imagemin({
            progressive: true,
            interlaced: true,
            svgoPlugins: [
                {removeUnknownsAndDefaults: false},
                {cleanupIDs: false},
                {removeDimensions: true}
            ]
        }))
        .pipe(gulp.dest(path.favicon.dist));
});


gulp.task('clean', () => {
    return del(path.base.dist);
});


gulp.task('watch', () => {
	browsersync.init({
        files: [
            '**/*.php', '*.php'
        ],
        proxy: hostname,
        open: false,
        reloadOnRestart: true,
    });

    gulp.watch(path.styles.base + '**/*', gulp.task('styles'));
    gulp.watch(path.scripts.base + '**/*', gulp.task('scripts'));
    gulp.watch(path.fonts.source + '**/*', gulp.task('fonts'));
    gulp.watch(path.images.source + '**/*', gulp.task('images'));
    gulp.watch(path.sprite.source + '*', gulp.task('svgstore'));
    gulp.watch(path.favicon.source + '*', gulp.task('favicon'));
});


gulp.task('build', gulp.series(
    gulp.parallel('scripts', 'styles', 'fonts', 'images', 'svgstore', 'favicon')
));


gulp.task('dev', gulp.series(
    gulp.parallel('build', 'watch')
));


gulp.task('default', gulp.series('clean', 'build'));
