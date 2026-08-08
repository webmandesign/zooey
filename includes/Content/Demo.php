<?php
/**
 * Demo content component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    2.0.0
 * @version  2.0.5
 */

namespace WebManDesign\Zooey\Content;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Customize\Colors;
use WebManDesign\Zooey\Customize\Mod;
use WebManDesign\Zooey\Editor\Component as Editor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Demo implements Component_Interface {

	/**
	 * Name of cached data transient for values from JSON/global styles.
	 *
	 * @since   2.0.0
	 * @access  public
	 * @var     string
	 */
	public static $transient_cache_key = 'zooey_cache_demo_values';

	/**
	 * Helper: soft cache for `get_value()` method.
	 *
	 * @since   2.0.0
	 * @access  private
	 * @var     array
	 */
	private static $value = array(
		'_colors' => null,
		'_layout' => null,
	);

	/**
	 * Helper: Pattern being processed.
	 *
	 * @since   2.0.0
	 * @access  public
	 * @var     string
	 */
	public static $processing_pattern = '';

	/**
	 * Helper: Text iteration number within the pattern.
	 *
	 * Gets reset for each pattern being rendered/processed.
	 *
	 * @since   2.0.0
	 * @access  public
	 * @var     int
	 */
	public static $i = 0;

	/**
	 * Initialization.
	 *
	 * @since    2.0.0
	 * @version  2.0.5
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Actions

				add_action( 'after_setup_theme', __CLASS__ . '::set_variables', 20 );

				add_action( 'customize_save_after',            __CLASS__ . '::transient_cache_flush' );
				add_action( 'save_post_' . 'wp_global_styles', __CLASS__ . '::transient_cache_flush' );
				add_action( 'switch_theme',                    __CLASS__ . '::transient_cache_flush' );
				add_action( 'zooey/upgrade', __CLASS__ . '::transient_cache_flush' );

	} // /init

	/**
	 * Setting class variables.
	 *
	 * Hooking this onto `after_setup_theme` action
	 * to allow possible modifications.
	 *
	 * @since  2.0.0
	 *
	 * @return  void
	 */
	public static function set_variables() {

		// Variables

			// Get (transient) cached data.
			$demo_values = get_transient( self::$transient_cache_key );


		// Processing

			self::$value['_colors'] = $demo_values['_colors'] ?? false;
			self::$value['_layout'] = $demo_values['_layout'] ?? false;

	} // /set_variables

	/**
	 * Get starter content assets URL.
	 *
	 * @since  2.0.0
	 *
	 * @param  string $type
	 * @param  string $filename
	 * @param  string $context
	 *
	 * @return  string
	 */
	public static function get_url( string $type = 'image', string $filename = '', string $context = '' ): string {

		// Variables

			$extension = '.webp';
			if ( 'video' === $type ) {
				$extension = '.mp4';
			}

			if ( false === stripos( $filename, '.' ) ) {
				$filename .= $extension;
			}


		// Output

			/**
			 * Filters URL of demo asset based on the context string provided.
			 *
			 * @since  2.0.0
			 *
			 * @param  string $url
			 * @param  string $context
			 */
			return (string) apply_filters(
				'zooey/demo_' . $type,
				add_query_arg(
					'ver',
					'v' . ZOOEY_THEME_VERSION,
					get_theme_file_uri( 'assets/' . $type . 's/demo/' . $filename )
				),
				$context
			);

	} // /get_url

	/**
	 * Get starter content image URL.
	 *
	 * @since  2.0.0
	 *
	 * @param  string $filename
	 * @param  string $context
	 *
	 * @return  string
	 */
	public static function get_image_url( string $filename = '', string $context = '' ): string {

		// Output

			return self::get_url( 'image', $filename, $context );

	} // /get_image_url

	/**
	 * Get starter content video URL.
	 *
	 * @since  2.0.0
	 *
	 * @param  string $filename
	 * @param  string $context
	 *
	 * @return  string
	 */
	public static function get_video_url( string $filename = '', string $context = '' ): string {

		// Output

			return self::get_url( 'video', $filename, $context );

	} // /get_video_url

	/**
	 * Get starter content texts.
	 *
	 * @since    2.0.0
	 * @version  2.0.4
	 *
	 * @param  string $scope
	 *
	 * @return  string
	 */
	public static function get_text( string $scope ): string {

		// Variables

			$output = '---';
			$scope  = explode( '/', $scope );

			/**
			 * Filters array of demo texts used in block patterns and starter content.
			 *
			 * @since  2.0.0
			 *
			 * @param  array $texts
			 */
			$texts = (array) apply_filters( 'zooey/demo_texts', array(

				// Basic texts:
				'xs' => _x( 'Some text', 'Demo text.', 'zooey' ),
				's'  => _x( 'Just a short sentence', 'Demo text.', 'zooey' ),
				'm'  => _x( 'Write your own copy text here', 'Demo text.', 'zooey' ),
				'l'  => _x( 'This is just a demo text you should overwrite', 'Demo text.', 'zooey' ),

				'title' => array(
					'xs' => _x( 'Title', 'Demo text.', 'zooey' ),
					's'  => _x( 'This is title', 'Demo text.', 'zooey' ),
					'm'  => _x( 'Write some title text here', 'Demo text.', 'zooey' ),
					'l'  => _x( 'This is title text and it may be a bit long', 'Demo text.', 'zooey' ),
					'xl' => _x( 'The ideal length of the title text in here should be maybe a bit longer', 'Demo text.', 'zooey' ),
				),

				'contact' => array(
					'address'        => _x( '123 Street Name<br>Cityname 56789<br>COUNTRY', 'Demo text.', 'zooey' ),
					'address_inline' => _x( '123 Street Name, Cityname 56789, COUNTRY', 'Demo text.', 'zooey' ),
					'email'          => _x( 'info@example.com', 'Demo text.', 'zooey' ),
					'phone'          => _x( '+1 (900) 123-4567', 'Demo text.', 'zooey' ),
				),

				'date' => array(
					'day'     => str_replace( '{Y}', date('Y'), _x( 'July 1, {Y}', 'Demo text. Keep "{Y}" as it gets replaced with current year.', 'zooey' ) ),
					'event'   => str_replace( '{Y}', date('Y'), _x( 'Monday, July 1, {Y}, 10:30', 'Demo text. Keep "{Y}" as it gets replaced with current year.', 'zooey' ) ),
					'weekday' => _x( 'Mon - Fri', 'Demo text. Week days.', 'zooey' ),
					'weekend' => _x( 'Sat - Sun', 'Demo text. Weekend days.', 'zooey' ),
					'mon'     => _x( 'Monday', 'Demo text.', 'zooey' ),
					'tue'     => _x( 'Tuesday', 'Demo text.', 'zooey' ),
					'wed'     => _x( 'Wednesday', 'Demo text.', 'zooey' ),
					'thu'     => _x( 'Thursday', 'Demo text.', 'zooey' ),
					'fri'     => _x( 'Friday', 'Demo text.', 'zooey' ),
					'sat'     => _x( 'Saturday', 'Demo text.', 'zooey' ),
					'sun'     => _x( 'Sunday', 'Demo text.', 'zooey' ),
				),

				'people' => array(
					'name' => array(
						_x( 'Vincent van Gogh', 'Demo text. Name of a person.', 'zooey' ),
						_x( 'Edward Hopper', 'Demo text. Name of a person.', 'zooey' ),
						_x( 'Pablo Picasso', 'Demo text. Name of a person.', 'zooey' ),
						_x( 'Mary Cassatt', 'Demo text. Name of a person.', 'zooey' ),
						_x( 'Frida Kahlo', 'Demo text. Name of a person.', 'zooey' ),
						_x( 'Berthe Morisot', 'Demo text. Name of a person.', 'zooey' ),
					),
					'job'  => _x( 'Founder', 'Demo text. Occupation, job title.', 'zooey' ),
				),

				// Others:
				'alt'    => _x( 'Image alternative description text', 'Demo text. Image alt text.', 'zooey' ),
				'button' => _x( 'Click here', 'Demo text. Button label.', 'zooey' ),
				'more'   => _x( 'Read more &rarr;', 'Demo text. Button label.', 'zooey' ),
				'change' => _x( 'Change this text', 'Demo text. Button label.', 'zooey' ),
				'watch'  => _x( 'Watch video &rarr;', 'Demo text. Button label.', 'zooey' ),
				'price'  => _x( '$19', 'Demo text. Price.', 'zooey' ),
				// @link  https://icon-sets.iconify.design/ph/potted-plant-duotone/
				'icon'   => 'data:image/svg+xml,%3Csvg xmlns="http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg" width="100" height="100" viewBox="0 0 256 256"%3E%3Cg fill="currentColor"%3E%3Cpath d="m184 152l-14.61 65.74a8 8 0 0 1-7.81 6.26H94.42a8 8 0 0 1-7.81-6.26L72 152Z" opacity=".2"%2F%3E%3Cpath d="M200 144h-76.7l2.35-2.35l20.06-20.06a59.55 59.55 0 0 0 26.1 6.36a49.56 49.56 0 0 0 25.89-7.22c23.72-14.36 36.43-47.6 34-88.92a8 8 0 0 0-7.52-7.52c-41.32-2.42-74.56 10.28-88.93 34c-9.35 15.45-9.59 34.11-.86 52L120 124.68l-12.21-12.21c6-13.25 5.57-27-1.39-38.48C95.53 56 70.6 46.4 39.73 48.22a8 8 0 0 0-7.51 7.51C30.4 86.6 40 111.52 58 122.4a38.22 38.22 0 0 0 20 5.6a45 45 0 0 0 18.52-4.19L108.69 136l-8 8H56a8 8 0 0 0 0 16h9.59l13.21 59.47A15.89 15.89 0 0 0 94.42 232h67.17a15.91 15.91 0 0 0 15.62-12.53L190.42 160H200a8 8 0 0 0 0-16m-51-77.42c10.46-17.26 35.23-27 67-26.57c.41 31.81-9.31 56.58-26.57 67c-11.51 7-25.4 6.54-39.28-1.18C142.42 92 142 78.09 149 66.58m-56.89 41.53c-9.2 4.92-18.31 5.15-25.83.6C54.78 101.74 48.15 85.31 48 64c21.31.15 37.75 6.78 44.71 18.28c4.56 7.52 4.29 16.63-.6 25.83M161.59 216H94.42L82 160h92Z"%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E',
				'form'   =>
					'<a href="' . esc_attr_x( 'https://wordpress.org/plugins/search/form+block/', 'Demo text. Form block plugin URL.', 'zooey' ) . '">'
					. _x( 'Use a form block here ↗', 'Demo text.', 'zooey' )
					. '</a>',
				'form_contact' =>
					'<form>'
					. '<p class="has-s-font-size">' . esc_html__( 'This is just a demo placeholder form.', 'zooey' ) . '</p>'
					. '<p style="width:48%;float:left;"><label for="field1">' . esc_html_x( 'Name', 'Form field label', 'zooey' ) . '</label><br /><input id="field1" style="width:100%;background:var(--wp--preset--color--base);color:var(--wp--preset--color--contrast);" type="text" /></p>'
					. '<p style="width:48%;float:right;"><label for="field2">' . esc_html_x( 'Email', 'Form field label', 'zooey' ) . '</label><br /><input id="field2" style="width:100%;background:var(--wp--preset--color--base);color:var(--wp--preset--color--contrast);" type="email" /></p>'
					. '<p style="clear:both;padding-top:1em;margin-top:0;"><label for="field3">' . esc_html_x( 'Message', 'Form field label', 'zooey' ) . '</label><br /><textarea id="field3" style="width:100%;background:var(--wp--preset--color--base);color:var(--wp--preset--color--contrast);" rows="2"></textarea></p>'
					. '<p><button class="is-style-button-outline" title="' . esc_html__( 'This is just a demo placeholder form.', 'zooey' ) . '">' . esc_html_x( 'Submit', 'Form field label', 'zooey' ) . '</button></p>'
					. '</form>',
				'form_subscription' =>
					'<form class="is-layout-flex" style="display:flex;gap:.5em;align-items:stretch;margin:0;" title="' . esc_html__( 'This is just a demo placeholder form.', 'zooey' ) . '">'
					. '<label for="field1" class="screen-reader-text">' . esc_html_x( 'Email', 'Form field label', 'zooey' ) . '</label>'
					. '<input id="field1" style="flex:1;width:100%;max-width:14em;background:var(--wp--preset--color--base);color:var(--wp--preset--color--contrast);" type="email" placeholder="example@example.com" />'
					. '<button class="is-style-button-outline" style="padding:0 1em;">' . esc_html_x( 'Submit', 'Form field label', 'zooey' ) . '</button>'
					. '</form>',
			) );


		// Processing

			foreach ( $scope as $category ) {

				if ( isset( $texts[ $category ] ) ) {
					$texts = $texts[ $category ];

				} elseif ( 0 === stripos( $category, 'icon' ) ) {

					// Removes `icon.`, where `.` can be any character followed with a number.
					$size  = substr( $category, 5 );
					$texts = str_replace(
						'width="100" height="100"',
						'width="' . absint( $size ) . '" height="' . absint( $size ) . '"',
						$texts['icon']
					);
				}
			}

			if ( is_array( $texts ) ) {
				$texts = $texts[ array_rand( $texts ) ];
			}

			if ( is_string( $texts ) ) {
				$output = $texts;
			}


		// Output

			return $output;

	} // /get_text

	/**
	 * Echos (or returns) the starter content text(s).
	 *
	 * @since    2.0.0
	 * @version  2.0.1
	 *
	 * @param  int|string|array $scope
	 * @param  string           $suffix
	 * @param  bool             $echo
	 *
	 * @return  void
	 */
	public static function the_text( $scope, string $suffix = '', bool $echo = true ) {

		// Variables

			$output = array();
			$kses   = ( is_string( $scope ) && 0 === stripos( $scope, 'form' ) ) ? ( '#form' ) : ( '#inline' );


		// Processing

			if ( is_array( $scope ) ) {
			// $scope = [ 'l', 's', 'people/name' ]

				// Get all texts defined with multiple scopes in an array.
				foreach ( $scope as $text ) {
					$output[] = self::get_text( $text ) . $suffix;
				}

			} elseif ( intval( $scope ) ) {
			// $scope = 5 -> 5 sentences from sequence
			// $scope = '32' -> max 32 characters long string from sequence

				$sequence = array(
					's','l','m','l','m',
					's','l','m','l','m',
					's','l','m','l','m',
					's','l','m','l','m',
				);

				if (
					is_string( $scope )
					&& empty( $suffix )
				) {
					$suffix = '.';
				}

				// Get specific number of various length sentences.
				$sentences = array_slice(
					$sequence,
					0,
					min( absint( $scope ), count( $sequence ) )
				);
				foreach ( $sentences as $text ) {
					$output[] = self::get_text( $text ) . $suffix;
				}

				// Get specific number of characters, but don't cut words.
				if ( is_string( $scope ) ) {
					$string = implode( ' ', $output );
					$output = array(
						substr(
							$string,
							0,
							strpos( wordwrap( $string, absint( $scope ) - 1, PHP_EOL ), PHP_EOL )
						)
						. '…'
					);
				}

			} elseif ( is_string( $scope ) ) {
			// $scope = 'people/name'

				// Get direct text defined with string scope.
				$output = array( self::get_text( $scope ) . $suffix );
			}

			/**
			 * Filters array of starter text by context.
			 *
			 * @since  2.0.0
			 *
			 * @param  array            $output
			 * @param  int|array|string $scope
			 * @param  string           $context  By default this is set to block pattern ID being rendered.
			 * @param  int              $i        Iteration number in scope of the current `$context`.
			 */
			$output = (array) apply_filters( 'zooey/demo_text', $output, $scope, self::$processing_pattern, ++self::$i );


		// Output

			if ( $echo ) {
				echo wp_kses( trim( implode( ' ', $output ) ), $kses );
			} else {
				return wp_kses( trim( implode( ' ', $output ) ), $kses );
			}

	} // /the_text

	/**
	 * Get value of theme option (based on condition).
	 *
	 * @since    2.0.0
	 * @version  2.0.1
	 *
	 * @param  string $option
	 * @param  string $condition
	 * @param  string $value_true
	 * @param  string $value_false
	 *
	 * @return  int|string
	 */
	public static function get_value( string $option, string $condition = '', string $value_true = '', string $value_false = '' ) {

		// Variables

			$output = null;

			if ( in_array( self::$value['_colors'], array( null, false ), true ) ) {

				self::$value['_colors'] = Colors::get_palette();
				self::$value['_colors'] = self::$value['_colors']['theme'];
				self::$value['_layout'] = (array) Editor::get_global_style( 'settings.layout' );

				// Cache.
				// If transient is not altered with a filter hook, we can cache the data.
				if ( ! has_filter( 'pre_transient_' . self::$transient_cache_key ) ) {
					set_transient(
						self::$transient_cache_key,
						array(
							'_colors' => (array) self::$value['_colors'],
							'_layout' => (array) self::$value['_layout'],
						)
					);
				}
			}


		// Requirements check

			// Return cached value if we have one.
			if ( ! empty( $condition ) ) {

				if ( isset( self::$value['_cache'][ $option . '.' . $condition . '.' . $value_true . '.' . $value_false ] ) ) {
					return self::$value['_cache'][ $option . '.' . $condition . '.' . $value_true . '.' . $value_false ];
				} elseif ( isset( self::$value['_cache'][ $option . '.' . $condition ] ) ) {

					$evaluation = self::$value['_cache'][ $option . '.' . $condition ];

					if ( $evaluation ) {
						return $value_true;
					} else {
						return $value_false;
					}
				}
			} else {

				if ( isset( self::$value['_cache'][ $option ] ) ) {
					return self::$value['_cache'][ $option ];
				}
			}


		// Processing

			// Get the option value.

				// First get the value from theme JSON.
				if ( 'color' === substr( $option, 0, 5 ) ) {

					$key = str_replace( [ 'color/', 'color_', '_' ], [ '', '', '-' ], $option );

					if ( ! empty( self::$value['_colors'][ $key ] ) ) {
						$output = self::$value['_colors'][ $key ];
					}

				} elseif (
					'layout/wideSize' === $option
					|| 'layout_width_wide' === $option
				) {

					if ( ! empty( self::$value['_layout']['wideSize'] ) ) {

						$output = self::$value['_layout']['wideSize'];

						if ( ! stripos( $output, '--theme--mod--' ) ) {
							$output = absint( $output );
						}
					}
				}

				// If we have no option value, get it from theme mods.
				if (
					null === $output
					|| stripos( $output, '--theme--mod--' )
				) {

					if ( 'color_base' === $option ) {
						$output = maybe_hash_hex_color( get_background_color() );
					} else {
						$output = Mod::get( $option );
					}
				}

			// Process the option value.

				if ( ! empty( $condition ) ) {

					// Default presumed state of condition.
					$evaluation = true;

					switch ( $condition ) {

						case 'is_dark':
							$evaluation = Colors::is_dark( $output );
							break;

						case 'is_light':
							$evaluation = Colors::is_light( $output );
							break;
					}

					if ( $evaluation ) {
						$output = $value_true;
					} else {
						$output = $value_false;
					}
				}

			// Preparing the output.

				if ( ! is_int( $output ) ) {
					$output = (string) $output;
				}

			// Cache the output.

				if ( ! empty( $condition ) ) {
					self::$value['_cache'][ $option . '.' . $condition ] = $evaluation;
					self::$value['_cache'][ $option . '.' . $condition . '.' . $value_true . '.' . $value_false ] = $output;
				} else {
					self::$value['_cache'][ $option ] = $output;
				}


		// Output

			return $output;

	} // /get_value

	/**
	 * Flush the transient of cached demo values.
	 *
	 * @since    2.0.0
	 * @version  2.0.5
	 *
	 * @return  void
	 */
	public static function transient_cache_flush() {

		// Processing

			delete_transient( self::$transient_cache_key );

	} // /transient_cache_flush

}
