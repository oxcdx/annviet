const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const path = require('path');

module.exports = {
  ...defaultConfig,
  entry: {
    gallery: path.resolve(__dirname, 'src', 'gallery.js'),
    view: path.resolve(__dirname, 'src', 'view.js'),
    editor: path.resolve(__dirname, 'src', 'editor.js'), // Add this line
  },
  output: {
    path: path.resolve(__dirname, 'build'),
    filename: '[name].js',
  },
  externals: {
    jquery: 'jQuery', // Ensure jQuery is loaded as an external dependency
  },
};