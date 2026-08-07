<?php
/**
 * KSES component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.0
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
	 * @since    1.0.0
	 * @version  2.0.1
	 *
	 * @param  array  $data
	 * @param  string $context
	 *
	 * @return  array
	 */
	public static function tags( array $tags, string $context ): array {

		// Variables

			$output = array();
			$prefix = '#';


		// Processing

			switch ( $context ) {

				case $prefix . 'inline':
					$output = self::get_tags_inline();
					break;

				case $prefix . 'description':
					$output = array_merge(
						self::get_tags_inline(),
						self::get_tags_block()
					);
					break;

				case $prefix . 'post':
					$output = wp_kses_allowed_html( 'post' );
					break;

				case $prefix . 'form':
					$output = array_merge(
						self::get_tags_form(),
						self::get_tags_inline(),
						self::get_tags_block(),
						self::get_tags_table()
					);
					break;

				case $prefix . 'svg':
					$output = self::get_tags_svg();
					break;
			}

			if ( ! empty( $output ) ) {
				$tags = array_map( '_wp_add_global_attributes', $output );
			}


		// Output

			return $tags;

	} // /tags

	/**
	 * Form tags.
	 *
	 * @since  2.0.1
	 *
	 * @return  array
	 */
	public static function get_tags_form(): array {

		// Variables

			$atts = self::get_atts( 'form' );


		// Output

			return array(

				'form' => array(
					'accept'         => true,
					'accept-charset' => true,
					'action'         => true,
					'enctype'        => true,
					'method'         => true,
					'name'           => true,
					'target'         => true,
				),

				'button'   => $atts,
				'datalist' => array(),
				'input'    => $atts,
				'label'    => $atts,
				'optgroup' => $atts,
				'option'   => $atts,
				'select'   => $atts,
				'textarea' => $atts,
			);

	} // /get_tags_form

	/**
	 * Inline tags.
	 *
	 * @since  2.0.1
	 *
	 * @return  array
	 */
	public static function get_tags_inline(): array {

		// Output

			return array(

				'a'      => self::get_atts( 'a' ),
				'abbr'   => array(),
				'b'      => array(),
				'br'     => array(),
				'code'   => array(),
				'del'    => array( 'datetime' => true, ),
				'dfn'    => array(),
				'em'     => array(),
				'i'      => array(),
				'mark'   => array(),
				'q'      => array( 'cite' => true, ),
				'small'  => array(),
				'span'   => array(),
				'strike' => array(),
				'strong' => array(),
				'u'      => array(),

				'img' => array(
					'alt'    => true,
					'height' => true,
					'src'    => true,
					'width'  => true,
				),

				'figure'     => array(),
				'figcaption' => array(),
			);

	} // /get_tags_inline

	/**
	 * Basic block tags.
	 *
	 * @since  2.0.1
	 *
	 * @return  array
	 */
	public static function get_tags_block(): array {

		// Output

			return array(

				'div' => array(),
				'h1'  => array(),
				'h2'  => array(),
				'h3'  => array(),
				'h4'  => array(),
				'h5'  => array(),
				'h6'  => array(),
				'li'  => array(),
				'ol'  => array(),
				'p'   => array(),
				'ul'  => array(),
			);

	} // /get_tags_block

	/**
	 * Table tags.
	 *
	 * @since  2.0.1
	 *
	 * @return  array
	 */
	public static function get_tags_table(): array {

		// Output

			return array(

				'caption'  => array(),
				'col'      => array(),
				'colgroup' => array(),
				'table'    => array(),
				'tbody'    => array(),
				'tfoot'    => array(),
				'thead'    => array(),

				'tr' => array(),
				'th' => array( 'colspan' => true, ),
				'td' => array( 'colspan' => true, ),
			);

	} // /get_tags_table

	/**
	 * SVG tags.
	 *
	 * @since  2.0.1
	 *
	 * @return  array
	 */
	public static function get_tags_svg(): array {

		// Variables

			$atts = self::get_atts( 'svg' );


		// Output

			return array(

				'svg'      => $atts,

				'circle'   => $atts,
				'defs'     => array(),
				'ellipse'  => $atts,
				'g'        => $atts,
				'line'     => $atts,
				'mask'     => $atts,
				'path'     => $atts,
				'polygon'  => $atts,
				'polyline' => $atts,
				'rect'     => $atts,
				'symbol'   => $atts,
				'title'    => array(),
				'use'      => $atts,
			);

	} // /get_tags_svg

	/**
	 * Tag attributes.
	 *
	 * @since  2.0.1
	 *
	 * @param  string $context
	 *
	 * @return  array
	 */
	public static function get_atts( string $context ): array {

		// Processing

			switch ( $context ) {

				case 'a':
					return array(
						'href'   => true,
						'rel'    => true,
						'target' => true,
					);

				case 'form':
					return array(
						'autocomplete' => true,
						'autocorrect'  => true,
						'autofocus'    => true,
						'checked'      => true,
						'cols'         => true,
						'disabled'     => true,
						'for'          => true,
						'label'        => true,
						'list'         => true,
						'max'          => true,
						'maxlength'    => true,
						'min'          => true,
						'minlength'    => true,
						'multiple'     => true,
						'name'         => true,
						'pattern'      => true,
						'placeholder'  => true,
						'readonly'     => true,
						'required'     => true,
						'rows'         => true,
						'selected'     => true,
						'size'         => true,
						'spellcheck'   => true,
						'step'         => true,
						'type'         => true,
						'value'        => true,
					);

				case 'svg':
					return array(
						'color'               => true,
						'cx'                  => true,
						'cy'                  => true,
						'd'                   => true,
						'fill'                => true,
						'fill-opacity'        => true,
						'fill-rule'           => true,
						'focusable'           => true,
						'height'              => true,
						'href'                => true,
						'mask'                => true,
						'maskContentUnits'    => true,
						'maskUnits'           => true,
						'opacity'             => true,
						'points'              => true,
						'preserveAspectRatio' => true,
						'r'                   => true,
						'refX'                => true,
						'refY'                => true,
						'rx'                  => true,
						'ry'                  => true,
						'stroke'              => true,
						'stroke-dasharray'    => true,
						'stroke-dashoffset'   => true,
						'stroke-linecap'      => true,
						'stroke-linejoin'     => true,
						'stroke-miterlimit'   => true,
						'stroke-opacity'      => true,
						'stroke-width'        => true,
						'transform'           => true,
						'viewBox'             => true,
						'viewbox'             => true,
						'width'               => true,
						'x'                   => true,
						'x1'                  => true,
						'x2'                  => true,
						'xlink:href'          => true,
						'xml:space'           => true,
						'xmlns'               => true,
						'xmlns:xlink'         => true,
						'y'                   => true,
						'y1'                  => true,
						'y2'                  => true,
					);
			}

	} // /get_atts

}
