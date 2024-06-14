const mix = require('laravel-mix');
const path = require('path');

mix.js('resources/js/agoraLogic.js', 'public/js')
   .webpackConfig({
       output: {
           filename: 'bundledAgoraLogic.js',
           path: path.resolve(__dirname, 'public/js'),
       },
       module: {
           rules: [
               {
                   test: /\.js$/,
                   exclude: /node_modules/,
                   use: {
                       loader: 'babel-loader',
                       options: {
                           presets: ['@babel/preset-env']
                       }
                   }
               }
           ]
       }
   });

module.exports = mix;
