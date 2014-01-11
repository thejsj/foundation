module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		uglify: {
			my_target: {
				files: {
					'static/js/header.js': ['static/js/libs/Modernizr-2.7.1.js'],
					'static/js/footer.js': ['static/js/libs/jquery-1.10.2.js', 'static/js/app/app.js'],
				}
			}
		},
		compass: {
			dist: {
				options: {
					sassDir: 'static/sass',
					cssDir: 'static/css',
				}
			}
		},
		watch: {
			css: {
				files: ['**/*.scss','**/*.js'],
				tasks: ['uglify', 'compass'],
			}
		},	
	});

	// Load the plugin that provides the "uglify" task.
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-watch');

	// Default task(s).
	grunt.registerTask('default', ['uglify', 'compass']);

};