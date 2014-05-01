module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		concat: {
			dist: {
				src:  ['assets/js/bootstrap.js', 'assets/js/custom.js'],
				dest: 'assets/js/build/production.js',
			}
		},
		uglify: {
			build: {
				src:  'assets/js/build/production.js',
				dest: 'assets/js/build/production.min.js'
			}
		},
		autoprefixer: {
			dist: {
				files: {
					'style.css': 'style.css'
				}
			}
		},
		cssmin: {
			combine : {
				files: {
					'assets/css/build/bootstrap-comb.min.css': ['assets/css/bootstrap.css', 'assets/css/bootstrap-theme.css']
				}
			},
			minify: {
				expand: true,
				cwd: 'assets/css/build/',
				src: ['*.css'],
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
		browser_sync: {
			files: {
				src: '/style.css'
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
				tasks: ['autoprefixer', 'cssmin', 'ftpush'],
			},
			js: {
				files: ['assets/js/*.js'],
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

	grunt.registerTask('default', ['concat', 'uglify', 'autoprefixer', 'cssmin', 'ftpush', 'watch']);

};