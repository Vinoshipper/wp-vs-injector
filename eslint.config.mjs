import wordpress from '@wordpress/eslint-plugin';

export default [
	...wordpress.configs.recommended,
	{
		rules: {
			'import/no-unresolved': [ 'error', { ignore: [ '^@wordpress/' ] } ],
		},
	},
];
