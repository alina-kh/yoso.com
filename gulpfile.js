import gulp from 'gulp';
import plumber from 'gulp-plumber';
import sass from 'gulp-dart-sass';
import postcss from 'gulp-postcss';
import csso from 'postcss-csso';
import rename from 'gulp-rename';
import autoprefixer from 'autoprefixer';
import browser from 'browser-sync';

// Styles
export const styles = () => {
  return gulp.src('sass/style.scss', { sourcemaps: true })
    .pipe(plumber())
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([
      autoprefixer(),
      csso()
    ]))
    .pipe(rename('style.min.css'))
    .pipe(gulp.dest('templates/css', { sourcemaps: '.' }))
    .pipe(browser.stream());
}

// Watcher
const watcher = () => {
  gulp.watch('sass/**/*.scss', gulp.series(styles));
}

// build
export const build = gulp.series(
  styles
);

// default
export default gulp.series(
  styles,
  gulp.series(
    watcher
  )
);
