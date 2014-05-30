module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		concat: {
			plugins: {
				src: ['assets/js/plugins/isotope.js', 'assets/js/plugins/imagesloaded.pkgd.min.js', 'assets/js/plugins/wow.min.js', 'assets/js/plugins/jquery.fancybox.pack.js'],
				dest: 'assets/js/plugins/plugins.js',
			},
			custom: {
				src:  'assets/js/custom.js',
				dest: 'assets/js/build/production.js',
			}
		},
		uglify: {
			plugins: {
				src: 'assets/js/plugins/plugins.js',
				dest: 'assets/js/build/plugins.min.js'
			},
			bootstrap: {
				src: 'assets/js/bootstrap.js',
				dest: 'assets/js/build/bootstrap.min.js'
			},
			custom: {
				src:  'assets/js/build/production.js',
				dest: 'assets/js/build/production.min.js'
			}
		},
		cssmin: {
			combine : {
				files: {
					'assets/css/build/bootstrap-comb.css': ['assets/css/bootstrap.css', 'assets/css/bootstrap-theme.css']
				}
			},
			minify: {
				expand: true,
				cwd: 'assets/css/build/',
				src: ['bootstrap-comb.css'],
				dest: 'assets/css/build/',
				ext: '.min.css'
			}
		},
		ftpush: {
			build: {
				auth: {
					host: 'arthur-middleton.dreamhost.com',
					port: '21',
					authKey: 'key1'
				},
				src: './',
				dest: 'aaronschlegel.com/wp-content/themes/finecreations',
				exclusions: ['.git', 'assets/img', 'node_modules', '.ftppass', '.gitignore'],
				simple: true
			}
		},
		watch: {
			php: {
				files: ['./*.php', 'global/*.php'],
				tasks: ['ftpush'],
			},
			gruntfile: {
				files: ['Gruntfile.js'],
				tasks: ['ftpush'],
			},
			src: {
				files: ['assets/css/*.css', 'style.css'],
				tasks: ['cssmin', 'ftpush'],
			},
			js: {
				files: ['assets/js/bootstrap.js', 'assets/js/custom.js'],
				tasks: ['concat', 'uglify', 'ftpush'],
			},
			options: {
				spawn: false,
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-browser-sync');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-ftpush');
	grunt.loadNpmTasks('grunt-uncss');

	grunt.registerTask('default', ['concat', 'uglify', 'cssmin', 'ftpush', 'watch']);

};