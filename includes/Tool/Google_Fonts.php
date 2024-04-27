<?php
/**
 * Google fonts component.
 *
 * Retrieves and enqueues Google Fonts.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Tool;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Assets;
use WebManDesign\Zooey\Customize\Mod;
use WebManDesign\Zooey\Setup\Editor;
use WPTT_WebFont_Loader;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Google_Fonts implements Component_Interface {

	/**
	 * Google Fonts stylesheet URL.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     null|string
	 */
	private static $url = null;

	/**
	 * Array of web safe font families.
	 *
	 * List obtained from https://www.w3schools.com/cssref/css_websafe_fonts.asp
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string
	 */
	private static $web_safe_fonts = array(
		'Andalé Mono',
		'Arial Black',
		'Arial',
		'Baskerville',
		'Book Antiqua',
		'Bradley Hand',
		'Brush Script MT',
		'Charcoal',
		'Comic Sans MS',
		'Courier New',
		'Courier',
		'cursive',
		'fantasy',
		'Gadget',
		'Geneva',
		'Georgia',
		'Gill Sans',
		'Helvetica',
		'Impact',
		'Lucida Console',
		'Lucida Grande',
		'Lucida Sans Unicode',
		'Lucida',
		'Luminari',
		'Monaco',
		'monospace',
		'Palatino Linotype',
		'Palatino',
		'sans-serif',
		'serif',
		'Tahoma',
		'Times New Roman',
		'Times',
		'Trebuchet MS',
		'Verdana',
	);

	/**
	 * Suggested Google Fonts families.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     array
	 * @param   KEY   string  Font families context, such as "generic", "body", "headings".
	 * @param   VALUE array   An array of context related font family names.
	 */
	private static $suggestions = array(
		'generic' => array(
			'Abril Fatface',
			'Alegreya',
			'Alegreya Sans',
			'Anton',
			'Asap',
			'Barlow',
			'Barlow Condensed',
			'Be Vietnam Pro',
			'Bitter',
			'Bree Serif',
			'Cabin',
			'Cardo',
			'Catamaran',
			'Cinzel Decorative',
			'Crimson Text',
			'DM Sans',
			'DM Serif Display',
			'Domine',
			'Elsie',
			'Fira Sans',
			'Fira Sans Extra Condensed',
			'Fjalla One',
			'Heebo',
			'IBM Plex Sans',
			'IBM Plex Serif',
			'Inter',
			'Josefin Sans',
			'Josefin Slab',
			'Jost',
			'Kanit',
			'Kumbh Sans',
			'Lato',
			'Libre Baskerville',
			'Libre Franklin',
			'Literata',
			'Lora',
			'Manrope',
			'Merriweather',
			'Merriweather Sans',
			'Montagu Slab',
			'Montserrat',
			'Montserrat Alternates',
			'Muli',
			'Mukta',
			'Neuton',
			'Noto Sans',
			'Noto Serif',
			'Nunito',
			'Nunito Sans',
			'Old Standard TT',
			'Open Sans',
			'Oswald',
			'Outfit',
			'Patua One',
			'Peralta',
			'Playfair Display',
			'Plus Jakarta Sans',
			'Poppins',
			'Prata',
			'Public Sans',
			'PT Sans',
			'PT Sans Narrow',
			'PT Serif',
			'Quicksand',
			'Raleway',
			'Righteous',
			'Roboto',
			'Roboto Condensed',
			'Roboto Mono',
			'Roboto Slab',
			'Rubik',
			'Sen',
			'Source Sans 3',
			'Source Serif 4',
			'Staatliches',
			'Stint Ultra Condensed',
			'Titillium Web',
			'Trocchi',
			'Ubuntu',
			'Vollkorn',
			'Wix Madefor Display',
			'Work Sans',
			'Zilla Slab',
			'Zilla Slab Highlight',
		),
	);

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			/**
			 * Webfonts loader.
			 *
			 * Downloads webfonts (such as Google-Fonts) and hosts them locally.
			 * This increases privacy - since fonts get hosted locally on the site,
			 * there are no pings to a 3rd-party server and therefore no tracking.
			 *
			 * @link  https://github.com/webmandesign/webfont-loader/tree/fix/prevent-infinite-loop
			 * @link  https://github.com/WPTT/webfont-loader
			 *
			 * @since  1.0.0
			 *
			 * @param  bool $enabled  Default: true.
			 */
			if ( (bool) apply_filters( 'zooey/enable_webfont_loader', true ) ) {
				require ZOOEY_PATH_VENDOR . 'webfont-loader/wptt-webfont-loader.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

				add_filter( 'wptt_get_local_fonts_base_path', __CLASS__ . '::set_local_fonts_base_path' );
				add_filter( 'wptt_get_local_fonts_base_url', __CLASS__ . '::set_local_fonts_base_url' );

				add_filter( 'zooey/tool/google_fonts/get_url', __CLASS__ . '::set_local_fonts_url' );
			}

			// Actions

				add_action( 'wp_enqueue_scripts', __CLASS__ . '::enqueue', 5 );

				add_action( 'init', __CLASS__ . '::add_editor_style', 5 );

	} // /init

	/**
	 * Enqueue stylesheet.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function enqueue() {

		// Requirements check

			if ( empty( self::get_url() ) ) {
				return;
			}


		// Processing

			Assets\Factory::style_enqueue( array(
				'handle' => 'zooey-google-fonts',
				'src'    => self::get_url(),
			) );

	} // /enqueue

	/**
	 * Enqueue editor stylesheet editor.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function add_editor_style() {

		// Requirements check

			if ( empty( self::get_url() ) ) {
				return;
			}


		// Variables

			$stylesheet = esc_url_raw( add_query_arg(
				'ver',
				'v' . ZOOEY_THEME_VERSION,
				self::get_url()
			) );


		// Processing

			add_editor_style( str_replace( ',', '%2C', $stylesheet ) );

	} // /add_editor_style

	/**
	 * Gets stylesheet URL.
	 *
	 * @since  1.0.0
	 *
	 * @return  string
	 */
	public static function get_url(): string {

		// Processing

			if ( is_null( self::$url ) ) {

				/**
				 * Filters the Google Fonts URL.
				 *
				 * @since  1.0.0
				 *
				 * @param  string $url
				 */
				self::$url = (string) apply_filters( 'zooey/tool/google_fonts/get_url', self::set_url() );
			}


		// Output

			return (string) self::$url;

	} // /get_url

	/**
	 * Sets stylesheet URL.
	 *
	 * @since  1.0.0
	 *
	 * @return  string
	 */
	public static function set_url(): string {

		// Requirements check

			if ( ! Mod::get( 'typography_google_fonts' ) ) {
				return '';
			}


		// Variables

			$url = '';

			// Removing system and user defined fonts.
			$families = array_filter( array_unique( array_map(
				function( $value ) {

					$system_and_user = array_filter(
						array_merge(
							array( 'system', 'sans-serif', 'serif' ),
							Editor::get_user_font_families()
						)
					);

					if ( in_array( $value, $system_and_user ) ) {
						$value = '';
					}

					return $value;
				},
				array(
					(string) Mod::get( 'typography_font_family_alternative' ),
					(string) Mod::get( 'typography_font_family_supplemental' ),
					(string) Mod::get( 'typography_font_family_global' ),
				)
			) ) );


		// Processing

			if ( empty( $families ) ) {
				return '';
			}

			foreach ( $families as $context => $family ) {

				// Get the first font family only.
				if ( strpos( $family, ',' ) ) {
					$family = explode( ',', $family );
					$family = reset( $family );
				}
				$family = trim( $family, "\"' \t\n\r\0\x0B" );

				// Skip empty font family, or web safe one.
				if (
					empty( $family )
					|| false !== strpos( implode( ',', self::get_web_safe_fonts() ), $family )
				) {
					unset( $families[ $context ] );
					continue;
				}

				// Get the URL encoded family name.
				$families[ $context ] = self::get_urlencoded_family( $family, $context );
			}

			if ( ! empty( $families ) ) {

				// Set the URL base.
				$url  = ( is_ssl() ) ? ( 'https://' ) : ( 'http://' );
				$url .= 'fonts.googleapis.com/css2';

				// Set the URL args/parameters.
				$query_args = array(
					'family'  => implode( '&family=', $families ),
					'display' => 'swap',
				);

				// Build the URL.
				$url = esc_url_raw( add_query_arg( $query_args, $url ) );
			}


		// Output

			return $url;

	} // /set_url

	/**
	 * Returns a font family string encoded for URL.
	 *
	 * Also applies Google Fonts font family styles.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $font_family
	 * @param  string $context
	 *
	 * @return  string
	 */
	public static function get_urlencoded_family( string $font_family, string $context = 'generic' ): string {

		// Variables

			/**
			 * Filters the Google Fonts styles.
			 *
			 * Styles are appended to font family name in Google Fonts URL.
			 * The styles are global, applied to every font family. To customize
			 * them per font family, use this filter and check the `$font_family`
			 * and/or `$context` parameter value if needed.
			 *
			 * Using specific `:wght@300;400;500;600;700` instead of `:wght@200..900`
			 * is safer option. Although the later produces less files, not all
			 * Google Fonts are variable (such as popular Poppins font).
			 * @link  https://fonts.google.com/variablefonts
			 *
			 * @since  1.0.0
			 *
			 * @param  string $styles
			 * @param  string $font_family
			 * @param  string $context
			 */
			$styles = (string) apply_filters( 'zooey/tool/google_fonts/styles', ':wght@300;400;500;600;700', $font_family, $context );


		// Output

			return str_replace( ' ', '+', $font_family ) . $styles;

	} // /get_urlencoded_family

	/**
	 * Returns array of suggested fonts.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $context
	 *
	 * @return  array
	 */
	public static function get_suggested_fonts( string $context = 'generic' ): array {

		// Variables

			$output = array();


		// Processing

			if ( isset( self::$suggestions[ $context ] ) ) {
				$output = self::$suggestions[ $context ];
			} elseif ( isset( self::$suggestions['generic'] ) ) {
				$output = self::$suggestions['generic'];
			}


		// Output

			return array_filter(
				/**
				 * Filters the Google Fonts suggestions array.
				 *
				 * @since  1.0.0
				 *
				 * @param  array  $suggestions
				 * @param  string $context
				 */
				(array) apply_filters( 'zooey/tool/google_fonts/suggestions', $output, $context )
			);

	} // /get_suggested_fonts

	/**
	 * Returns web safe fonts array.
	 *
	 * @since  1.0.0
	 *
	 * @return  array
	 */
	public static function get_web_safe_fonts(): array {

		// Output

			return array_filter(
				/**
				 * Filters array of web safe fonts.
				 *
				 * @since  1.0.0
				 *
				 * @param  array $web_safe_fonts
				 */
				(array) apply_filters( 'zooey/tool/google_fonts/web_safe', self::$web_safe_fonts )
			);

	} // /get_web_safe_fonts

	/**
	 * Set local fonts base path.
	 *
	 * @since  1.0.0
	 *
	 * @return  string
	 */
	public static function set_local_fonts_base_path(): string {

		// Variables

			$wp_upload_dir = wp_upload_dir( null, false, false );


		// Output

			return $wp_upload_dir['basedir'];

	} // /set_local_fonts_base_path

	/**
	 * Set local fonts base URL.
	 *
	 * @since  1.0.0
	 *
	 * @return  string
	 */
	public static function set_local_fonts_base_url(): string {

		// Variables

			$wp_upload_dir = wp_upload_dir( null, false, false );


		// Output

			return trim( $wp_upload_dir['baseurl'] );

	} // /set_local_fonts_base_url

	/**
	 * Set local fonts URL.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $url
	 *
	 * @return  string
	 */
	public static function set_local_fonts_url( string $url ): string {

		// Requirements check

			if (
				empty( $url )
				|| ! function_exists( 'wptt_get_webfont_url' )
			) {
				return $url;
			}


		// Output

			return wptt_get_webfont_url( $url );

	} // /set_local_fonts_url

}
