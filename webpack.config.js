var path = require('path');
var webpack = require('webpack');

module.exports = {
    cache: true,
    entry: {
        ExampleApp : './assets/js/Apps/JS/ExampleApp/index.js',
    },
    output: {
        path: path.join(__dirname, "assets/dist"),
        publicPath: "assets/dist/",
        filename: "[name].js",
        chunkFilename: "[chunkhash].js"
        // path: __dirname, filename: 'bundle.js'
    },
    resolve: {
        // Add '.ts' and '.tsx' as resolvable extensions.
        extensions: ["", ".webpack.js", ".web.js", ".ts", ".tsx", ".js"]
    },
    module: {
        loaders: [
            //https://stackoverflow.com/questions/36100108/requirefile-json-doesnt-work-in-webpack
            {
                test: /\.json$/,
                loader: 'json-loader'
            },
            {
                //https://stackoverflow.com/questions/39853646/how-to-import-a-css-file-in-a-react-component
                test: /\.css$/,
                loader: "style-loader!css-loader",
                options: {
                    minimize: true || {/* CSSNano Options */}
                }
            },
            {
                test: /\.ts$/,
                loader: 'ts-loader'
            },
            {
                test: /.jsx?$/,
                loader: 'babel-loader',
                exclude: /node_modules/,
                query: {
                    presets: ['es2015'],
                    //presets: ['es2015'],
                    cacheDirectory: true
                }
            }
        ]
    },
    externals: {
        //don't bundle the 'react' npm package with our bundle.js
        //but get it from a global 'React' variable
        'react': 'React',
        'react-dom': 'ReactDOM',
        'jquery': '$',
        'Router' : 'react-router-dom',
        'Route' : 'react-router-dom',
        'Link' : 'react-router-dom'
        //'ReactRedux' : 'redux',
    },
    plugins: [
        /*
        new webpack.ProvidePlugin({
            // Automtically detect jQuery and $ as free var in modules
            // and inject the jquery library
            // This is required by many jquery plugins
            jQuery: "jquery",
            $: "jquery"
        }),
        */
        new webpack.DefinePlugin({
            'process.env': {
                NODE_ENV: JSON.stringify('production')
            }
        }),
        //https://webpack.github.io/docs/list-of-plugins.html#uglifyjsplugin
        new webpack.optimize.UglifyJsPlugin({
            output: {
                comments: false
            },
            compress: {
                warnings: false,
                booleans: false,
                unused: false
            }
        })
    ]
};