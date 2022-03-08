const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
    //context: path.resolve(__dirname, './www'),
    entry: {
        front: './js/front.js',
        style: './less/front.less',
    },
    output: {
        path: path.resolve(__dirname, 'www/dist/'),
        filename: '[name].js',
        publicPath: '/dist/'
    },
    module:
        {
            loaders: [
                {
                    test: [ path.join(__dirname, 'js') ],
                    loader: 'babel-loader'
                },
                {
                    test: /\.(png|jpg|gif|svg|ttf|eot|woff|woff2)$/,
                    loader: 'url-loader',
                    options: {
                        esModule: false,
                        name: 'assets/[name].[ext]?[hash]',
                        limit: 1
                    }
                },
                {
                    test: /\.less$/,
                    use: ExtractTextPlugin.extract({
                        fallback: 'style-loader',
                        use: [
                            'css-loader',
                            'postcss-loader',
                            'less-loader',
                        ]
                    })
                },
            ]
        },
    plugins: [
        new ExtractTextPlugin("[name].css"),
    ],
};

