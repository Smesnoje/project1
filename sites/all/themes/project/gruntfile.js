'use strict';

// # Globbing
// for performance reasons we're only matching one level down:
// 'test/spec/{,*/}*.js'
// use this if you want to recursively match all subfolders:
// 'test/spec/**/*.js'

module.exports = function (grunt) {

 // Load grunt tasks automatically
  require('load-grunt-tasks')(grunt);



 // Define the configuration for all the tasks
  grunt.initConfig({
// OVDE
        imagemin :{
            png: {
                options:{
                          optimizationLevel:5

               },
                files:[
                  {
                    expand:true,
                    cwd: '/var/www/html/project/sites/all/themes/proba/',
                    src:  ['**/*.png'],
                    dest:'./',
                    ext: '.jpg'
                  }
                ]
              },
           jpg:{
             options:{
               progresive:true
             },
             files:[
               {
                 expand:true,
                 cwd: '/var/www/html/project/sites/all/themes/proba/',
                 src:['**/*.jpg'],
                 dest:'./',
                 ext:'.png'
               }
             ]
           }
    },
    watch: {
      styles: {
        files: ['less/{,*/}*.less'],
        tasks: ['less'],
        options: {
          spawn: false
        }
      },
      icons: {
        files: ['./images/glyphs/*.svg'],
        tasks: ['font']
      },
      images:{
        files:['./images/*.png','./images/*.png'],
        tasks:['imagemin']
      }
  },

 // compile LESS files into style.css
  less: {
      options: {
        sourceMap: true
    },
      development: {
          files: {
              'css/style.css': ['less/bootstrap.less']
          }
      }
  }

});


grunt.registerTask('patka',['imagemin']);

grunt.registerTask('default',[
'less',
'watch'
]
);

};
