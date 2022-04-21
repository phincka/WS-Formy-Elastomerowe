const ExtractTextPlugin = require('extract-text-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const ErrorOverlayPlugin = require('error-overlay-webpack-plugin')

const getPlugins = () => {
    const plugins = [
        new CleanWebpackPlugin('dist', {
            root: __dirname + '/../'
        }),
        new CopyWebpackPlugin([
            {
                from: __dirname + '/../src/packages',
                to: __dirname + '/../dist/packages'
            }
        ]),
        new ExtractTextPlugin({
            filename: './css/app.css',
            allChunks: true
        }),
        new ErrorOverlayPlugin()
    ];
    return plugins;
};

module.exports = {
    entry: [
        './src/js/app.js',
        './src/css/app.scss'
    ],
    output: {
        filename: './js/app.js',
    },
    plugins: getPlugins(),
    module: {
        rules: [
            {
                test: /\.(js)$/,
                exclude: /node_modules/,
                use: ['babel-loader'],
            },
            {
                test: /\.(css|scss)$/,
                exclude: /node_modules/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: [
                        {
                            loader: "css-loader",
                            options: {

                                url: false
                            }
                        }, {
                            loader: "postcss-loader",
                            options: {
                                ident: 'postcss',
                                plugins: () => [
                                    require('autoprefixer')(),
                                    require('cssnano')()
                                ]
                            }
                        },
                        'sass-loader'
                    ]
                })
            },
        ],
    },
    "target": "node",
    resolve: {
        extensions: ['.js', '.jpg', '.html', '.scss'],
    },
    devtool: 'cheap-module-source-map',
};
