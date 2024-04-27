<?php
/**
 * KSES component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Tool;

use WebManDesign\Zooey\Component_Interface;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class KSES implements Component_Interface {

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Filters

				add_filter( 'wp_kses_allowed_html', __CLASS__ . '::tags', 10, 2 );

	} // /init

	/**
	 * HTML tags allowed specific custom theme context.
	 *
	 * You can then use `wp_kses( $html, 'context' );`.
	 *
	 * No `break`s in the `switch` below as WordPress does not use them either.
	 * @link  https://developer.wordpress.org/reference/functions/wp_kses_allowed_html/
	 *
	 * @since  1.0.0
	 *
	 * @param  array  $data
	 * @param  string $context
	 *
	 * @return  array
	 */
	public static function tags( array $tags, string $context ): array {

		// Variables

			$atts = array(

				'a' => array(
					'href'   => true,
					'class'  => true,
					'rel'    => true,
					'title'  => true,
					'target' => true,
				),

				'class+id' => array(
					'class' => true,
					'id'    => true,
				),

				'class+style' => array(
					'class' => true,
					'style' => true,
				),

				'title' => array(
					'title' => true,
				),

				'svg:base' => array(
					'class'             => true,
					'fill'              => true,
					'fill-opacity'      => true,
					'fill-rule'         => true,
					'id'                => true,
					'mask'              => true,
					'opacity'           => true,
					'stroke'            => true,
					'stroke-dasharray'  => true,
					'stroke-dashoffset' => true,
					'stroke-linecap'    => true,
					'stroke-linejoin'   => true,
					'stroke-miterlimit' => true,
					'stroke-opacity'    => true,
					'stroke-width'      => true,
					'style'             => true,
					'transform'         => true,
				),
			);


		// Output

			switch ( $context ) {

				case 'inline':
					return array(

						'br'     => array(),
						'code'   => array(),
						'em'     => array(),
						'mark'   => array(),
						'strong' => array(),

						'a' => $atts['a'],

						'span' => $atts['class+style'],

						'abbr' => $atts['title'],
						'dfn'  => $atts['title'],
					);

				case 'option_description':
					return array(

						'big'  => array(),
						'br'   => array(),
						'code' => array(),
						'em'   => array(),
						'mark' => array(),

						'a' => $atts['a'],

						'h2' => $atts['class+id'],
						'h3' => $atts['class+id'],
						'h4' => $atts['class+id'],
						'p'  => $atts['class+id'],

						'span'   => $atts['class+style'],
						'strong' => $atts['class+style'],
					);

				case 'svg':
					return array(

						'svg' => array(
							'aria-hidden'     => true,
							'aria-label'      => true,
							'aria-labelledby' => true,
							'class'           => true,
							'focusable'       => true,
							'height'          => true,
							'role'            => true,
							'viewbox'         => true,
							'width'           => true,
							'xmlns'           => true,
						),

						'g' => $atts['svg:base'],

						'title' => $atts['title'],

						'path' => array_merge(
							$atts['svg:base'],
							array(
								'd' => true,
							)
						),

						'circle' => array_merge(
							$atts['svg:base'],
							array(
								'cx' => true,
								'cy' => true,
								'r'  => true,
							)
						),

						'ellipse' => array_merge(
							$atts['svg:base'],
							array(
								'cx' => true,
								'cy' => true,
								'rx' => true,
								'ry' => true,
							)
						),

						'line' => array_merge(
							$atts['svg:base'],
							array(
								'x1' => true,
								'x2' => true,
								'y1' => true,
								'y2' => true,
							)
						),

						'polygon' => array_merge(
							$atts['svg:base'],
							array(
								'points' => true,
							)
						),

						'polyline' => array_merge(
							$atts['svg:base'],
							array(
								'points' => true,
							)
						),

						'rect' => array_merge(
							$atts['svg:base'],
							array(
								'x'      => true,
								'y'      => true,
								'width'  => true,
								'height' => true,
								'rx'     => true,
								'ry'     => true,
							)
						),

						'symbol' => array_merge(
							$atts['svg:base'],
							array(
								'width'               => true,
								'height'              => true,
								'viewBox'             => true,
								'x'                   => true,
								'y'                   => true,
								'refX'                => true,
								'refY'                => true,
								'preserveAspectRatio' => true,
							)
						),

						'use' => array_merge(
							$atts['svg:base'],
							array(
								'href'   => true,
								'width'  => true,
								'height' => true,
								'x'      => true,
								'y'      => true,
							)
						),

						'mask' => array_merge(
							$atts['svg:base'],
							array(
								'maskUnits'        => true,
								'maskContentUnits' => true,
								'width'            => true,
								'height'           => true,
								'x'                => true,
								'y'                => true,
							)
						),
					);

				case 'user_description':
				case 'pre_user_description':
					return wp_kses_allowed_html( 'post' );

				default:
					return $tags;
			}

	} // /tags

}
