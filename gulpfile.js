const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const browserSync = require('browser-sync').create();
const sourcemaps = require('gulp-sourcemaps');
const glob = require('glob');
const path = require('path');

// Paths
const paths = {
	styles: {
		src: 'assets/scss/**/*.scss', // Your Sass files
		dest: 'assets/css' // Output folder for compiled CSS
	},
	scripts: {
		src: 'assets/js/src/**/*.js', // Your JS files
		dest: 'assets/js/dist' // Output folder for minified JS
	}
};

// Dynamic Block Styles Path using Glob
function getBlockStylesPaths() {
  return glob.sync('parts/block/**/*.scss'); // Find all style.scss in block folders
}

// Compile general Sass
function compileSass(done) {
  	return gulp.src(paths.styles.src)
		.pipe(sourcemaps.init())
		.pipe(sass({
			"silenceDeprecations": ["mixed-decls", "color-functions", "global-builtin", "import"]
		}).on('error', sass.logError))
		.pipe(autoprefixer())
		.pipe(cleanCSS())
		.pipe(rename({ suffix: '.min' }))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(paths.styles.dest))
		.pipe(browserSync.stream()); // Inject CSS into the browser
}

// Compile dynamic block-specific Sass
function compileBlockSass() {
	const blockStyles = getBlockStylesPaths(); // Get all block styles dynamically

	return gulp.src(blockStyles)
		.pipe(sourcemaps.init())
		.pipe(sass({
			"silenceDeprecations": ["mixed-decls", "color-functions", "global-builtin", "import"]
		}).on('error', sass.logError))
		.pipe(autoprefixer())
		.pipe(cleanCSS())
		.pipe(rename({ suffix: '.min' }))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(function (file) {
			// Save the compiled CSS in the same folder as the block's style.scss file
			return path.dirname(file.path); // The directory where the style.scss file is located
		}))
		.pipe(browserSync.stream()); // Inject CSS into the browser
}

// Minify and Concatenate JS
function minifyJS(done) {
	return gulp.src(paths.scripts.src)
		.pipe(sourcemaps.init())
		.pipe(concat('main.js'))
		.pipe(uglify())
		.pipe(rename({ suffix: '.min' }))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(paths.scripts.dest))
		.pipe(browserSync.stream()); // Inject JS into the browser
}

// Watch files for changes
function watchFiles(done) {
	browserSync.init({
		proxy: "http://starter-theme.local", // Replace with your local WordPress URL
		open: false, // Prevents BrowserSync from automatically opening a new tab
  		notify: false // Optional: hides the BrowserSync notification in the browser
	});

	gulp.watch(paths.styles.src, compileSass);
	gulp.watch('parts/block/**/*.scss', compileBlockSass);
	gulp.watch(paths.scripts.src, minifyJS);
	gulp.watch('**/*.php').on('change', browserSync.reload);
	done();
}

// Export tasks
exports.compileSass = compileSass;
exports.compileBlockSass = compileBlockSass;
exports.minifyJS = minifyJS;
exports.watch = watchFiles;
exports.default = gulp.series(compileSass, minifyJS, watchFiles);