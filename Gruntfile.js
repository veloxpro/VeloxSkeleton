module.exports = function (grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        clean: {
            dist: ["public/dist/*"]
        },

        cssmin: {
            combine: {
                files: {
                    'public/dist/css/styles.min.css': [
                        'ui/bower_components/bootstrap/dist/css/bootstrap.css',
                        'ui/bower_components/fontawesome/css/font-awesome.min.css',
                        'ui/src/css/**/*.css'
                    ]
                }
            }
        },

        uglify: {
            options: {
                report: 'min',
                mangle: false
            },
            ui_src_js: {
                files: {
                    'ui/tmp/src_js.js': ['ui/src/initjs/**/*.js', 'ui/src/js/**/*.js']
                }
            }
        },

        concat: {
            options: {
                //separator: ';'
            },
            dist_dev: {
                src: [
                    'ui/bower_components/jquery/dist/jquery.js',
                    'ui/bower_components/bootstrap/dist/js/bootstrap.js',
                    'ui/tmp/src_js.js'
                ],
                dest: 'public/dist/js/main.js'
            },
            dist_prod: {
                src: [
                    'ui/bower_components/jquery/dist/jquery.min.js',
                    'ui/bower_components/bootstrap/dist/js/bootstrap.min.js',
                    'ui/tmp/src_js.js'
                ],
                dest: 'public/dist/js/main.js'
            },
            ui_src_js: {
                src: [
                    'ui/src/initjs/**/*.js',
                    'ui/src/js/**/*.js'
                ],
                dest: 'ui/tmp/src_js.js'
            }
        },

        copy: {
            bootstrap_fonts: {
                expand: true,
                cwd: 'ui/bower_components/bootstrap/dist/fonts/',
                src: ['**'],
                dest: 'public/dist/fonts/'
            },
            fontawesome_fonts: {
                expand: true,
                cwd: 'ui/bower_components/fontawesome/fonts/',
                src: ['**'],
                dest: 'public/dist/fonts/'
            }
        },

        watch: {
            configFiles: {
                files: [ 'Gruntfile.js', 'ui/src/**/*' ],
                tasks: ['build-dev'],
                options: {
                    interrupt: true
                }
            }
        }
    });



    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', [
        'watch'
    ]);

    grunt.registerTask('build-dev', [
        'clean:dist',
        'cssmin',
        'concat:ui_src_js',
        'concat:dist_dev',
        'copy'
    ]);
    grunt.registerTask('build-prod', [
        'clean:dist',
        'cssmin',
        'uglify:ui_src_js',
        'concat:dist_prod',
        'copy'
    ]);
};