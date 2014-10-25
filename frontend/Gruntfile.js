module.exports = function (grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        clean: {
            dist: ["dist/*"]
        },
        less: {
            dev: {
                options: {
                    cleancss: true
                },
                files: {
                    'dist/css/build.css': [
                        'bower_components/bootstrap/less/bootstrap.less',
                        'bower_components/fontawesome/less/font-awesome.less',
                        'less/app.less'
                    ]
                }
            },
            prod: {
                options: {
                    cleancss: true
                },
                files: {
                    'dist/css/build.css': [
                        'bower_components/bootstrap/less/bootstrap.less',
                        'bower_components/fontawesome/less/font-awesome.less',
                        'less/app.less'
                    ]
                }
            }
        },
        coffee: {
            dev: {
                files: {
                    'tmp/build.js' : ['Velox.ClassLoader.coffee', 'coffee/**/*.coffee']
                }
            },
            prod: {
                files: {
                    'tmp/build.js' : ['Velox.ClassLoader.coffee', 'coffee/**/*.coffee']
                }
            }
        },
        concat: {
            dev: {
                src: [
                    'bower_components/jquery/dist/jquery.js',
                    'bower_components/bootstrap/dist/js/bootstrap.js',
                    'tmp/build.js'
                ],
                dest: 'dist/js/build.js'
            },
            prod: {
                src: [
                    'bower_components/jquery/dist/jquery.min.js',
                    'bower_components/bootstrap/dist/js/bootstrap.min.js',
                    'tmp/build.js'
                ],
                dest: 'dist/js/build.js'
            }
        },
        copy: {
            bootstrap_fonts: {
                expand: true,
                cwd: 'bower_components/bootstrap/dist/fonts/',
                src: ['**'],
                dest: 'dist/fonts/'
            },
            fontawesome_fonts: {
                expand: true,
                cwd: 'bower_components/fontawesome/fonts/',
                src: ['**'],
                dest: 'dist/fonts/'
            }
        },
        watch: {
            configFiles: {
                files: ['Gruntfile.js', 'Velox.ClassLoader.coffee', 'coffee/**/*', 'less/**/*'],
                tasks: ['build-dev'],
                options: {
                    interrupt: true
                }
            }
        }
    });



    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-less');

    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-coffee');

    grunt.registerTask('default', [
        'watch'
    ]);

    grunt.registerTask('build-dev', [
        'clean:dist',
        'less:dev',
        'coffee:dev',
        'concat:dev',
        'copy'
    ]);
    grunt.registerTask('build-prod', [
        'clean:dist',
        'less:prod',
        'coffee:prod',
        'concat:prod',
        'copy'
    ]);
};