const path = require('path')
const webpack = require('webpack')
const { VueLoaderPlugin } = require('vue-loader')

module.exports = (env = {production: false}) => ({
  mode: env.production ? 'production' : 'development',
  devtool: env.production ? 'source-map' : 'eval-cheap-module-source-map',
  entry: path.resolve(__dirname, './assets/scripts/calculator-display.js'),
  output: {
    path: path.resolve(__dirname, './assets'),
    filename: 'calculator-display.min.js',
    publicPath: '/assets/'
  },
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'assets/scripts'),
    }
  },
  module: {
    rules: [
      {
        test: /\.vue$/,
        use: 'vue-loader'
      }
    ]
  },
  plugins: [
    new VueLoaderPlugin(),
    new webpack.DefinePlugin({
      __VUE_OPTIONS_API__: 'true',
      __VUE_PROD_DEVTOOLS__: 'false'
    })
  ],
  watchOptions: {
    ignored: ['node_modules/**']
  }
})
