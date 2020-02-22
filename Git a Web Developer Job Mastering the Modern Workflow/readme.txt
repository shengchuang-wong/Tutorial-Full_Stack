Git
===
1.) git init
2.) git status
3.) git add -A | git add .
4.) git commit -m "Commit Message"
5.) git push
6.) git checkout -- . <<< back to previous commit
7.) git pull origin master <<< get the latest commit version of the repo
8.) git clone [repo .git]
9.) git remote -v <<< check current repo origin 
10.) git remote set-url origin [repo .git] <<< set new origin for repo
11.) git push origin master

git config --global user.name "Name"
git config --global user.email "youremail@address.com"
^^^ setup git info to let it know who is commit the repo

Git Branch
----------
> git branch <<< list all the branches for the repo, the repo with * is the current working repo
> git branch [branch name] <<< create new branch
> git checkout [branch name] <<< switch to branch, after git commit, you can freely switch between branch to modify it
> git checkout [master branch name], > git merge [branch to merge with master] <<< merge branch with master
> git push origin [branch name]
> git branch -d [branch name] <<< delete repo branch
> git checkout -b [branch name] <<< create branch and switch over it


Gulp <<< Automation
====
> npm install gulp-cli -g
> gulp -v
> npm install gulp --save-dev
- create gulpfile.js
gulp.src()
gulp.dest()
pipe()
plugins
> npm install gulp-watch --save-dev <<< watch files changes
> npm install gulp-postcss --save-dev
> npm install autoprefixer --save-dev
> npm install postcss-simple-vars --save-dev
> npm install postcss-nested --saved-dev
> npm install postcss-import --save-dev
> npm install browser-sync --save-dev

var watch = require('gulp-watch');
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var cssvars = require('postcss-simple-vars');
var nested = require('postcss-nested');
var cssImport = require('postcss-import');
var browserSync = require('browser-sync').create();

gulp.task('watch', function() {
  watch('./app/index.css', function() {
    gulp.start('cssInject');
  });

  watch('./app/index.html', function() {
    browserSync.reload();
  });

  browserSync.inti({
    notify: false,
    server: {
      baseDir: 'app'
    }
  });
});

gulp.task('cssInject', ['style'], function() {
  return gulp.src('[css file]')
  .pipe(browserSync.stream());
});

gulp.task('style', function() {
  return gulp.src([source file])
	.pipe(postcss([cssImport, cssvars, nested, autoprefixer]))
        .on('error', function(errorInfo) {
	  console.log(errorInfo.toString());
	  this.emit('end');
	})
	.pipe(gulp.dest([dest file]));
});

> gulp watch

cssImport is to combine the @import [filename] into one file only. Noted that @import [filename] is native css module

Webpack
=======
> npm install babel-core babel-loader babel-preset-es2015 --save-dev
- createa file name "webpack.config.js"

var path = require('path');

module.exports = {
	entry: "./app/assets/scripts/App.js",
	output: {
		path: path.resolve(__dirname, "./app/temp/scripts");
		filename: "App.js"
	},
	module: {
		loaders: [
			loader: 'babel-loader',
			query: {
				presets: ['es2015']
			},
			test: /\.js$/,
			exclude: /node_modules/
		]
	}
}

> webpack