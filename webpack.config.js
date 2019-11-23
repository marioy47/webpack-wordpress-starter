// webpack.config.js
const path = require("path")
const MiniCssExtractPlugin = require('mini-css-extract-plugin')

module.exports = {
  entry: {
    frontend: "./src/js/frontend.js",
    admin: "./src/js/admin.js",
  },
  output: {
    filename: "[name].js",
    path: path.resolve(__dirname, "js"),
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: "babel-loader",
      },
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              hmr: process.env.NODE_ENV == 'development'
            }
          },
          'css-loader',
          {
            loader: 'postcss-loader',
            options: {
              map: false,
              plugins: (loader) => [
                require('postcss-import')({ root: loader.resourcePath }),
                require('pixrem')(),
                require('autoprefixer')(),
                require('cssnano')()
              ]
            }
          },
          'sass-loader' // loading order is inverse
        ]
      },
      {
        test: /\.(gif|png|jpe?g|svg)$/i,
        use: [
          {
            loader: 'url-loader',
            options: {
              limit: 8192,
              name: '[name].[ext]',
              outputPath: '../images'
            }
          },
          {
            loader: 'image-webpack-loader',
            options: {
              disable: process.env.NODE_ENV == 'development',
              mozjpeg: { quality: 50 },
              pngquant: { quality: [0.50, 0.70] }
            }
          },
        ]
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '../css/[name].min.css', // Relative to output path.
      chunkFilename: '[id].css',
    }),
  ]
}

// vim: ts=2 sw=2 et
