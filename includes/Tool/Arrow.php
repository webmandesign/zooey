<?php
/**
 * Arrow.
 *
 * Replaces text arrow with SVG icon
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.7
 */

namespace WebManDesign\Zooey\Tool;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Arrow {

	/**
	 * Replacing text arrows and chevron with SVG icons.
	 *
	 * @since  1.0.7
	 *
	 * @param  string $text
	 *
	 * @return  string
	 */
	public static function replace( string $text ): string {

		// Variables

			$svg = array(

				'→' => '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="m224.49 136.49l-72 72a12 12 0 0 1-17-17L187 140H40a12 12 0 0 1 0-24h147l-51.49-51.52a12 12 0 0 1 17-17l72 72a12 12 0 0 1-.02 17.01"/></svg>',

				'←' => '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M228 128a12 12 0 0 1-12 12H69l51.52 51.51a12 12 0 0 1-17 17l-72-72a12 12 0 0 1 0-17l72-72a12 12 0 0 1 17 17L69 116h147a12 12 0 0 1 12 12"/></svg>',

				'»' => '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="m144.49 136.49l-80 80a12 12 0 0 1-17-17L119 128L47.51 56.49a12 12 0 0 1 17-17l80 80a12 12 0 0 1-.02 17m80-17l-80-80a12 12 0 1 0-17 17L199 128l-71.52 71.51a12 12 0 0 0 17 17l80-80a12 12 0 0 0 .01-17Z"/></svg>',

				'«' => '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M208.49 199.51a12 12 0 0 1-17 17l-80-80a12 12 0 0 1 0-17l80-80a12 12 0 0 1 17 17L137 128ZM57 128l71.52-71.51a12 12 0 0 0-17-17l-80 80a12 12 0 0 0 0 17l80 80a12 12 0 0 0 17-17Z"/></svg>',
			);


		// Output

			return str_replace(
				array(
					'→', '&rarr;',
					'←', '&larr;',
					'»', '&raquo;',
					'«', '&laquo;',
				),
				array(
					$svg['→'], $svg['→'],
					$svg['←'], $svg['←'],
					$svg['»'], $svg['»'],
					$svg['«'], $svg['«'],
				),
				$text
			);

	} // /replace

}
