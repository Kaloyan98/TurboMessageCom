const path = require('path');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const { ProvidePlugin } = require('webpack');

const babelLoader = {
	loader: 'babel-loader',
	options: {
		comments: false,
		presets: [
			'stage-2'
		]
	}
};


const plugins = [
	new ProvidePlugin({
		$: 'jquery',
		jQuery: 'jquery',
	})
];

// when going to push to production
// set to uglify js
if (false) {
	plugins.push(
		new UglifyJSPlugin()
	);
}


module.exports = {
	entry: './resources/js/main.js',

	output: {
		filename: 'bundle.js'
	},

	resolve: {
		modules: ['node_modules'],
		alias: {
			masonry: 'masonry-layout',
			isotope: 'isotope-layout',
			'jquery-ui': 'jquery-ui-distjquery-ui.js',
			'vue$': 'vue/dist/vue.esm.js'
		}
	},

	externals: {
		jquery: 'jQuery'
	},


	module: {
		rules: [
			{
				test: /.js$/,
				exclude: /node_modules/,
				use: [babelLoader]
			}
		],
	},


	plugins,
};
