const path = require("path");
const webpack = require("webpack");
const TerserPlugin = require("terser-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const CleanWebpackPlugin = require("clean-webpack-plugin");
const StyleLintPlugin = require("stylelint-webpack-plugin");
const WebpackNotifierPlugin = require("webpack-notifier");
const FaviconsWebpackPlugin = require("favicons-webpack-plugin");

/**
 * Set environment
 *
 * @type {string}
 */
const devMode = process.env.NODE_ENV !== "production";

/**
 * Check if current environment is development mode
 *
 * @type {boolean}
 */
const isDevMode = !!devMode;

module.exports = [
    {
        /**
         * Tells webpack to use its built-in optimizations accordingly
         *
         * @type {string}
         */
        mode: devMode ? "development" : "production",

        /**
         * Define stats type
         *
         * @type {string}
         */
        stats: "minimal",

        /**
         * Set application entry files for building.
         *
         * @type {Object}
         */
        entry: {
            /** Pages */
            default_page: path.resolve(
                __dirname,
                "src/components/page-templates/default-page/index"
            ),
            error_404: path.resolve(__dirname, "src/components/page-templates/error-404/index"),

            /** Archives */
            archive_default_post: path.resolve(
                __dirname,
                "src/components/archives/default-post/index"
            ),

            /** Singles */

            /** Template Parts */
            entry_content_for_wordpress_editor: path.resolve(
                __dirname,
                "src/components/template-parts/entry-content-for-wordpress-editor/index"
            ),
            crunch_button: path.resolve(
                __dirname,
                "src/components/template-parts/crunch-button/index"
            ),
            list_styles: path.resolve(__dirname, "src/components/template-parts/list-styles/index"),
            blockquote: path.resolve(__dirname, "src/components/template-parts/blockquote/index"),
            gravity_forms: path.resolve(__dirname, "src/components/template-parts/gravity-forms/index"),

            /** ACF Blocks */
            acf_block_cols: path.resolve(
                __dirname,
                "src/components/template-parts/blocks/full-width/cols/index"
            ),
            acf_block_content_with_image: path.resolve(
                __dirname,
                "src/components/template-parts/blocks/full-width/content-with-image/index"
            ),
            acf_block_list: path.resolve(
                __dirname,
                "src/components/template-parts/blocks/full-width/list/index"
            ),
            acf_block_numbers: path.resolve(
                __dirname,
                "src/components/template-parts/blocks/full-width/block-numbers/index"
            ),
        },

        /**
         * Output settings for application scripts.
         *
         * @type {Object}
         */
        output: {
            publicPath: "dist",
            path: path.resolve(__dirname, "dist"),
            filename: "[name].bundle.js",
        },

        /**
         * This option controls if and how source maps are generated.
         *
         * @type {String|false}
         */
        devtool: isDevMode ? "eval-cheap-source-map" : false,

        /**
         * Optimizations options for building.
         *
         * @type {Object}
         */
        optimization: {
            minimize: !isDevMode,
            minimizer: [
                new TerserPlugin({
                    extractComments: true,
                    terserOptions: {
                        parallel: true,
                        cache: true,
                        ecma: 2016,
                        warnings: false,
                    },
                }),
                new OptimizeCSSAssetsPlugin({}),
            ],
            splitChunks: {
                cacheGroups: {
                    vendors: {
                        test: /[\\/]node_modules[\\/]/,
                        name: "vendor",
                        chunks: "all",
                    },
                },
            },
        },

        /**
         * Common plugins which should run on every build.
         *
         * @type {Array}
         */
        plugins: [
            new webpack.LoaderOptionsPlugin({ minimize: isDevMode }),
            new CleanWebpackPlugin("dist"),
            new StyleLintPlugin({
                // cares about quality of CSS
                context: "src",
                syntax: "scss",
            }),
            new MiniCssExtractPlugin({
                // extracts CSS into separate files
                filename: "[name].css",
            }),
            new BrowserSyncPlugin(
                {
                    // BrowserSync Configuration
                    host: "crunch.loc",
                    port: 3000,
                    proxy: "http://crunch.loc",
                    files: [
                        {
                            match: ["**/*.php", "src/**/*.js", "src/**/*.{sass,scss}"],
                            fn: (event, file) => {
                                if (event === "change") {
                                    // eslint-disable-next-line global-require
                                    const bs = require("browser-sync").get("bs-webpack-plugin");
                                    if (
                                        file.split(".").pop() === "js" ||
                                        file.split(".").pop() === "php"
                                    ) {
                                        bs.reload();
                                    } else {
                                        bs.reload("*.css");
                                    }
                                }
                            },
                        },
                    ],
                    injectCss: true,
                    notify: false,
                },
                {
                    reload: false,
                    name: "bs-webpack-plugin",
                }
            ),
            new WebpackNotifierPlugin({
                title: "Crunch",
            }),
            new FaviconsWebpackPlugin({
                logo: "./images/favicon.png",
                outputPath: "../images/favicon",
                prefix: "./../../favicon/",
            }),
        ],
        /**
         * Performance settings to speed up build times.
         *
         * @type {Object}
         */
        performance: {
            hints: false,
        },
        /**
         * Build rules to handle application assset files.
         *
         * @type {Object}
         */
        module: {
            rules: [
                {
                    enforce: "pre",
                    test: /\.js$/,
                    exclude: /node_modules/,
                    loader: "eslint-loader",
                },
                {
                    test: /\.js$/,
                    loader: "babel-loader",
                    exclude: [
                        /node_modules\/(?!(mmenu-js)\/).*/, // For the Jarallax replace this line with: exclude: /node_modules\/(?!(mmenu-js|jarallax|video-worker))/,
                        // path.resolve(__dirname, "src/scripts/plugins/mixitup-pagination.js"),
                    ],
                    include: [
                        path.resolve(__dirname, "src"),
                        path.resolve(__dirname, "node_modules/mmenu-js"),
                        // path.resolve(__dirname, "node_modules/jarallax"),
                        // path.resolve(__dirname, "node_modules/video-worker"),
                    ],
                },
                {
                    test: /\.(sa|sc|c)ss$/,
                    use: [
                        {
                            loader: MiniCssExtractPlugin.loader, // extracts CSS into separate files
                        },
                        {
                            loader: "css-loader", // translates CSS into CommonJS modules
                        },
                        {
                            loader: "postcss-loader", // Run post css actions
                            options: {
                                plugins() {
                                    // post css plugins, can be exported to postcss.config.js
                                    return [
                                        // eslint-disable-next-line global-require
                                        require("autoprefixer"),
                                    ];
                                },
                            },
                        },
                        {
                            loader: "sass-loader", // compiles Sass to CSS
                        },
                        {
                            loader: "sass-resources-loader",
                            options: {
                                resources: [
                                    "node_modules/bootstrap/scss/_functions.scss",
                                    "node_modules/bootstrap/scss/_variables.scss",
                                    "src/styles/base/_bootstrap-variables.scss",
                                    "node_modules/bootstrap/scss/_mixins.scss",
                                    "src/styles/helpers/_variables.scss",
                                    "src/styles/helpers/_mixins.scss",
                                    "src/styles/helpers/_placeholders.scss",
                                ],
                            },
                        },
                    ],
                },
                {
                    test: /\.(png|jpg|gif|svg)$/i,
                    use: {
                        loader: "url-loader", // transforms files into base64 URIs
                        options: {
                            limit: 8192,
                            name: "[path][name].[ext]",
                            publicPath: "../",
                            emitFile: false,
                        },
                    },
                },
                {
                    test: /\.(eot|ttf|woff|woff2)$/i,
                    use: {
                        loader: "url-loader", // transforms files into base64 URIs
                        options: {
                            limit: 8192,
                            name: "[path][name].[ext]",
                            publicPath: "../",
                            emitFile: false,
                        },
                    },
                },
                {
                    test: /\.(js|jsx)$/,
                    // test: /\.js$/,
                    exclude: /node_modules/,
                    use: {
                        loader: "babel-loader",
                    },
                },
            ],
        },

        /**
         * These options change how modules are resolved.
         *
         * @type {Object}
         */
        resolve: {
            alias: {
                helpers: path.resolve(__dirname, "src/scripts/helpers"),
                images: path.resolve(__dirname, "images"),
                partials: path.resolve(__dirname, "src/components/template-parts"),
                blocks: path.resolve(__dirname, "src/components/template-parts/blocks"),
            },
            extensions: [".js", ".scss"],
        },
    },
];
