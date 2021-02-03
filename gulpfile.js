var gulp = require( 'gulp' ),
    replace = require( 'gulp-replace' ),
    merge = require( 'merge-stream' ),
    concat = require( 'gulp-concat' ),
    sass = require( 'gulp-sass' );

function moveAndRenameFile( origin, name, destination ) {
    return gulp.src( origin )
        .pipe( concat( name ) )
        .pipe( gulp.dest( destination ) );
}

function moveFiles( origin, destination ) {
    return gulp.src( origin )
        .pipe( gulp.dest( destination ) );
}

function prepareStatics() {
    moveAndRenameFile(
        'node_modules/normalize.css/LICENSE.md',
        'LICENSE-NORMALIZE',
        'licenses/'
    );

    moveAndRenameFile(
        'node_modules/hack-font/LICENSE.md',
        'LICENSE-HACK',
        'licenses/'
    );

    moveFiles(
        'node_modules/hack-font/build/web/fonts/*',
        'fonts/hack/'
    );

    moveFiles(
        'node_modules/@openfonts/roboto-slab_all/files/*',
        'fonts/roboto-slab/'
    );

    moveAndRenameFile(
        'node_modules/@openfonts/roboto-slab_all/LICENSE.md',
        'LICENSE-ROBOTO-SLAB-ALL',
        'licenses/'
    );

    moveFiles(
        'node_modules/npm-font-open-sans/fonts/**/*',
        'fonts/opensans/'
    );

    moveAndRenameFile(
        'node_modules/npm-font-open-sans/LICENSE',
        'LICENSE-OPENSANS-AND-ROBOTO-SLAB',
        'licenses/'
    );

    return merge(
        merge(
            gulp.src( 'src/sass/open-sans-copyright.scss' ),
            gulp.src( 'node_modules/npm-font-open-sans/open-sans.scss' )
        ),
        merge(
            gulp.src( 'src/sass/roboto-slab-all-copyright.scss' ),
            gulp.src( 'node_modules/@openfonts/roboto-slab_all/index.css' )
        ),
        gulp.src( 'node_modules/hack-font/build/web/hack.css' )
    ).pipe( replace( 'fonts/hack', './fonts/hack/hack' ) )
        .pipe( replace( './files/roboto', './fonts/roboto-slab/roboto' ) )
        .pipe( replace( '#{$FontPathOpenSans}', './fonts/opensans' ) )
        .pipe( replace( 'font-family:', 'font-display: swap;\n\	font-family:' ) )
        .pipe( concat( 'fonts.scss' ) )
        .pipe( gulp.dest( 'src/sass/' ) );
}

function getThemeFiles() {
    return moveFiles(
        'src/theme/**/*',
        './'
    );
}

function getJSFiles() {
    return moveFiles(
        'src/js/**/*',
        './js/'
    );
}

gulp.task( 'getStatics', function () {
    return prepareStatics();
} );

gulp.task( 'updateThemeFiles', function () {
    return getThemeFiles();
} );

gulp.task( 'getJSFiles', function () {
    return getJSFiles();
} );

gulp.task( 'prepareDev', function () {
    return gulp.parallel(
        'getStatics',
        'updateThemeFiles'
    );
} );

gulp.task( 'compileSass', function () {
    gulp.src( 'src/sass/editor-styles.scss' )
        .pipe( sass( {outputStyle: 'compressed'} ) )
        .pipe( concat( 'editor-styles.css'))
        .pipe( gulp.dest( './' ) );
    return gulp.src( 'src/sass/main.scss' )
        .pipe( sass( {outputStyle: 'compressed'} ) )
        .pipe( concat( 'style.css' ) )
        .pipe( gulp.dest( './' ) );
} );

gulp.task( 'make', function () {
    moveFiles(
        'src/js/**/*',
        './dist/js/'
    );

    moveFiles(
        'src/theme/**/*',
        './dist/'
    );

    moveFiles(
        'fonts/**/*',
        './dist/fonts/'
    );

    moveFiles(
        './licenses/**/*',
        './dist/licenses/'
    );

    moveFiles(
        './style.css',
        './dist/'
    );

    moveFiles(
        './editor-styles.css',
        './dist/'
    );

    gulp.src( './editor-styles.css' )
        .pipe( sass( {outputStyle: 'nested'} ) )
        .pipe( concat( 'editor-styles.nested.css') )
        .pipe( gulp.dest( './dist') );
    return gulp.src( './style.css' )
        .pipe( sass( {outputStyle: 'nested'} ) )
        .pipe( concat( 'style.nested.css' ) )
        .pipe( gulp.dest( './dist' ) );
} );


gulp.task( 'dev', function () {
    gulp.watch(
        [
            'src/sass/**/*.scss',
            'src/js/**/*.js',
            'src/theme/**/*', 
        ],
        gulp.parallel(
            'updateThemeFiles',
            'compileSass',
            'getJSFiles'
        )
    );
} );