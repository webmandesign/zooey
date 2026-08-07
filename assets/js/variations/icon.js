export default null;
/**
 * Icons.
 *
 * @since  2.0.1
 */

const { __, _x } = wp.i18n;

// Default Icon block variation.
wp.blocks.registerBlockVariation( 'core/icon', {
	isDefault: true,
	name: 'icon-width-2em',
	title: __( 'Icon', 'zooey' ),
	keywords: [
		_x( 'svg', 'keyword', 'zooey' ),
		_x( 'symbol', 'keyword', 'zooey' ),
	],
	attributes: {
		icon: 'core/star-filled',
		style: {
			dimensions: {
				width: '2em'
			}
		}
	}
} );

// Rounded with background.
wp.blocks.registerBlockVariation( 'core/icon', {
	name: 'icon-round-primary-background',
	title: __( 'Rounded icon with primary background', 'zooey' ),
	keywords: [
		_x( 'svg', 'keyword', 'zooey' ),
		_x( 'symbol', 'keyword', 'zooey' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M 21 12 C 21 16.971 16.971 21 12 21 C 7.029 21 3 16.971 3 12 C 3 7.029 7.029 3 12 3 C 16.971 3 21 7.029 21 12 Z M 10.356 10.104 C 10.33 10.157 10.28 10.194 10.221 10.203 L 6.905 10.684 C 6.897 10.685 6.89 10.687 6.883 10.689 C 6.75 10.726 6.708 10.893 6.806 10.99 L 9.206 13.329 C 9.248 13.37 9.267 13.429 9.257 13.488 L 8.69 16.79 C 8.689 16.798 8.688 16.805 8.688 16.813 C 8.682 16.951 8.829 17.043 8.951 16.979 L 11.917 15.42 C 11.969 15.393 12.031 15.393 12.083 15.42 L 15.049 16.979 C 15.056 16.982 15.062 16.985 15.069 16.988 C 15.198 17.036 15.332 16.926 15.309 16.79 L 14.743 13.488 C 14.732 13.429 14.752 13.37 14.794 13.329 L 17.194 10.99 C 17.2 10.984 17.205 10.978 17.209 10.973 C 17.295 10.864 17.231 10.704 17.094 10.684 L 13.778 10.203 C 13.72 10.194 13.669 10.157 13.644 10.104 L 12.16 7.1 C 12.157 7.092 12.153 7.086 12.149 7.079 C 12.073 6.965 11.901 6.976 11.839 7.1 Z"/></svg>,
	scope: [
		'inserter',
		'transform',
	],
	attributes: {
		icon: 'core/star-filled',
		style: {
			dimensions: {
				width: '4em'
			},
			border: {
				radius: {
					topLeft:     '10em',
					topRight:    '10em',
					bottomLeft:  '10em',
					bottomRight: '10em',
				}
			},
			spacing: {
				padding: {
					top:    'var:preset|spacing|xs',
					bottom: 'var:preset|spacing|xs',
					left:   'var:preset|spacing|xs',
					right:  'var:preset|spacing|xs',
				}
			}
		},
		backgroundColor: 'primary'
	}
} );
