<?php
/**
 * PSR-4 autoloader.
 *
 * Via Composer or custom.
 *
 * @link  https://www.php-fig.org/psr/psr-4/
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( file_exists( ZOOEY_PATH_VENDOR . 'autoload.php' ) ) :
	require_once ZOOEY_PATH_VENDOR . 'autoload.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
else :

	class Zooey_Autoload {

		/**
		 * Theme PHP class namespace.
		 *
		 * @since   1.0.0
		 * @access  private
		 * @var     string
		 */
		private static $namespace = 'WebManDesign\Zooey';

		/**
		 * Directory to load PHP classes from.
		 *
		 * @since   1.0.0
		 * @access  private
		 * @var     string
		 */
		private static $directory = 'includes';

		/**
		 * Array of white-listed, allowed files for improved security.
		 *
		 * TIP: Get the list by searching for "namespace " in `zooey/includes/*.php` files.
		 *
		 * @since   1.0.0
		 * @access  private
		 * @var     array
		 */
		private static $allowed_files = array(

			'/Component_Interface.php',
			'/Theme.php',

			'/Accessibility/Component.php',

			'/Assets/Component.php',
			'/Assets/Editor.php',
			'/Assets/Factory.php',
			'/Assets/Icon.php',
			'/Assets/Scripts.php',
			'/Assets/Styles.php',

			'/Content/Block.php',
			'/Content/Block_Pattern.php',
			'/Content/Block_Style.php',
			'/Content/Block_Template_Part.php',
			'/Content/Component.php',
			'/Content/Container.php',
			'/Content/Starter.php',

			'/Customize/Colors.php',
			'/Customize/Component.php',
			'/Customize/Control.php',
			'/Customize/CSS_Variables.php',
			'/Customize/Mod.php',
			'/Customize/Options.php',
			'/Customize/Options_Conditional.php',
			'/Customize/Options_Partial_Refresh.php',
			'/Customize/Preview.php',
			'/Customize/RGBA.php',
			'/Customize/Sanitize.php',
			'/Customize/Styles.php',

				'/Customize/Control/HTML.php',
				'/Customize/Control/Multiselect.php',
				'/Customize/Control/Select.php',
				'/Customize/Control/Text.php',

			'/Entry/Component.php',
			'/Entry/Navigation.php',
			'/Entry/Page_Template.php',
			'/Entry/Summary.php',
			'/Entry/Taxonomy.php',

			'/Footer/Component.php',
			'/Footer/Container.php',

			'/Header/Body_Class.php',
			'/Header/Component.php',
			'/Header/Container.php',
			'/Header/Head.php',

			'/Loop/Component.php',
			'/Loop/Featured_Posts.php',
			'/Loop/Pagination.php',

			'/Menu/Component.php',

			'/Plugin/Component.php',

				'/Plugin/Abs/Component.php',

				'/Plugin/AMP/Component.php',

				'/Plugin/Beaver_Builder/Component.php',

				'/Plugin/Block_Visibility/Component.php',

			'/Setup/Component.php',
			'/Setup/Editor.php',
			'/Setup/Media.php',
			'/Setup/Site_Editor.php',
			'/Setup/Upgrade.php',

			'/Tool/Component.php',
			'/Tool/Google_Fonts.php',
			'/Tool/KSES.php',
			'/Tool/Page_Builder.php',
			'/Tool/Theme_Hook_Alliance.php',
			'/Tool/Wrapper.php',

			'/Welcome/Component.php',
		);

		/**
		 * Register custom autoload.
		 *
		 * @since  1.0.0
		 *
		 * @param  string $class_name  Class name to load.
		 *
		 * @return  bool  True if the class was loaded, false otherwise.
		 */
		public static function register( $class_name ) {

			// Requirements check

				if ( 0 !== strpos( $class_name, self::$namespace . '\\' ) ) {
					return false;
				}


			// Variables

				$path  = '';
				$parts = explode( '\\', substr( $class_name, strlen( self::$namespace . '\\' ) ) );


			// Processing

				foreach ( $parts as $part ) {
					$path .= '/' . $part;
				}
				$path .= '.php';

				if ( ! in_array( $path, self::$allowed_files ) ) {
					return false;
				}

				$path = get_template_directory() . '/' . self::$directory . $path;

				if ( ! file_exists( $path ) ) {
					return false;
				}

				require_once $path; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound


			// Output

				return true;

		} // /register

	}

	spl_autoload_register( 'Zooey_Autoload::register' );

endif;
