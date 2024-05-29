<?php
/**
 * Theme options component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.0
 */

namespace WebManDesign\Zooey\Customize;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Tool\Google_Fonts;
use WebManDesign\Zooey\Setup\Editor;
use WebManDesign\Zooey\Setup\Site_Editor;
use WP_Customize_Manager;
use WP_Theme_JSON_Resolver;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Options implements Component_Interface {

	/**
	 * Theme mods values for easier setup.
	 *
	 * @see  assets/scss/_setup/_customize-options.scss
	 *
	 * @since    1.0.0
	 * @version  1.0.2
	 * @access   public
	 * @var      array
	 */
	public static $theme_mods = array(

		// Colors.

			'color_base'         => '#f7fff7', // = background_color
			'color_base_alt'     => '#e7efe7',
			'color_contrast'     => '#474f47',
			'color_contrast_alt' => '#171f17',
			'color_primary'      => '#5f1a37',
			'color_secondary'    => '#ff6b6b',

			'color_primary_mixed'   => '#e4e2df',
			'color_secondary_mixed' => '#fac6c2',

			'color_black' => '#000000',
			'color_white' => '#ffffff',

		// Gradients. (Just numeric values.)

			'gradient_stop_hard' => 50,
			'gradient_stop_soft' => 10,

		// Layout. (Just numeric values.)

			'layout_width_content' => 640,
			'layout_width_wide'    => 1440,

		// Typography.

			'typography_font_size'                => 20,
			'typography_modular_scale'            => 1.2,
			'typography_desktop_multiply'         => 1.75,
			'typography_font_family_global'       => "'Ubuntu Sans', sans-serif",
			'typography_font_family_supplemental' => "'Unica One', sans-serif",
			'typography_font_family_alternative'  => "'Ubuntu Sans', sans-serif",
	);

	/**
	 * User font families.
	 *
	 * IMPORTANT:
	 * This has to be set in `self::init()`, not in `self::get/set()` to prevent infinite loop.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     array
	 */
	public static $user_font_families = array();

	/**
	 * Theme and core JSON data soft cache.
	 *
	 * @since   1.0.7
	 * @access  public
	 * @var     array
	 */
	public static $json_data = array(

		'core' => array(
			'palette' => array(),
		),

		'theme' => array(
			'palette' => array(),
		),
	);

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  1.0.7
	 *
	 * @return  void
	 */
	public static function init() {

		// Variables

			/**
			 * IMPORTANT!:
			 * Can not use `Editor::get_user_font_families()` in `self::get/set()`
			 * as it causes infinite loop in `Editor::duotones()` via `Mod::get()`!
			 */
			self::$user_font_families = Editor::get_user_font_families();


		// Processing

			self::get_json_data();

			// Actions

				add_action( 'customize_register', __CLASS__ . '::modify', 100 );

			// Filters

				add_filter( 'zooey/customize/options/get', __CLASS__ . '::set', 5 );

	} // /init

	/**
	 * Get theme options setup array.
	 *
	 * @since  1.0.0
	 *
	 * @return  array
	 */
	public static function get(): array {

		// Output

			/**
			 * Filters customizer theme options setup array.
			 *
			 * @since  1.0.0
			 *
			 * @param  array $options
			 */
			return (array) apply_filters( 'zooey/customize/options/get', array() );

	} // /get

	/**
	 * Modify native WordPress options and setup partial refresh pointers.
	 *
	 * @since  1.0.0
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 *
	 * @return  void
	 */
	public static function modify( WP_Customize_Manager $wp_customize ) {

		// Processing

			// Change options.
			$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

			// Custom background options.
			$cb_options = array(
				'color',
				'image',
				'preset',
				'position',
				'position_x',
				'position_y',
				'size',
				'repeat',
				'attachment',
			);
			foreach ( $cb_options as $prop ) {
				if ( ! in_array( $prop, [ 'position_x', 'position_y' ] ) ) {
					$wp_customize->get_control( 'background_' . $prop )->section  = 'colors_general';
					$wp_customize->get_control( 'background_' . $prop )->priority = 5;
				}
			}
			$wp_customize->get_control( 'background_color' )->label           = esc_html__( 'Base color', 'zooey' );
			$wp_customize->get_control( 'background_color' )->description     = esc_html__( 'By default applied as website background.', 'zooey' );
			$wp_customize->get_control( 'background_color' )->active_callback = __NAMESPACE__ . '\Options_Conditional::is_site_editor_disabled';

			// Option pointers only:

				// Search results posts count.
				$wp_customize->selective_refresh->add_partial( 'search_per_page', array(
					'selector' => '.search-generic .wp-block-query',
				) );

				// Archive page posts count.
				$wp_customize->selective_refresh->add_partial( 'archive_per_page', array(
					'selector' => '.archive .wp-block-query',
				) );

				// Blog category selector.
				$wp_customize->selective_refresh->add_partial( 'category_selector', array(
					'selector' => '.is-style-category-selector > .wp-block-group:first-child',
				) );

				// Blog layout.
				$wp_customize->selective_refresh->add_partial( 'layout_blog', array(
					'selector' => '.blog .wp-site-blocks > main > :not(.is-style-featured-posts) .wp-block-query',
				) );

				// Custom header.
				$wp_customize->selective_refresh->add_partial( 'header_image', array(
					'selector' => '[class*="is-style-use-header-image"]',
				) );

	} // /modify

	/**
	 * Sets theme options array.
	 *
	 * @since    1.0.0
	 * @version  1.1.0
	 *
	 * @param  array $options
	 *
	 * @return  array
	 */
	public static function set( array $options = array() ): array {

		// Variables

			// Default panel.
			$in_panel = esc_html_x( 'Theme Options', 'Customizer panel title.', 'zooey' );

			// Overriding WP global styles.
			$css_selector_root = CSS_Variables::get_root(); // Reference: CSS selector root.

			// Predefined font families.
			$font_families = array_filter( array_merge(
				self::$user_font_families,
				array(
					'system',
					'sans-serif',
					'serif',
				),
				Google_Fonts::get_suggested_fonts()
			) );

			// Google Fonts note.
			$google_fonts_note = esc_html__( 'NOTE: The theme loads Google Fonts from your website, not from 3rd party servers. This improves privacy and compliance with GDPR.', 'zooey' );

			// Color options.
			$choices_palette = array_merge(
				array(
					'optgroup:palette-theme'  => esc_html__( 'Theme palette', 'zooey' ),
				),
				self::$json_data['theme']['palette'],
				array(
					'/optgroup:palette-theme' => '',
					'optgroup:palette-wp'     => esc_html__( 'WordPress default palette', 'zooey' ),
				),
				self::$json_data['core']['palette'],
				array(
					'/optgroup:palette-wp' => '',
				)
			);

			// HTML control args displaying Site Editor info.
			$site_editor_info = array(
				'type'    => 'html',
				'content' =>
					'<p class="notice notice-info site-editor-info">'
					. '<strong>' . esc_html__( 'Looking for additional options?', 'zooey' ) . '</strong>'
					. '<br>'
					. esc_html__( 'Site editor is enabled and allows you to set up colors and layout to your needs.', 'zooey' )
					. ' '
					. sprintf(
						'<a href="%1$s">%2$s</a>',
						esc_attr__( 'https://webmandesign.github.io/docs/zooey/#site-editor', 'zooey' ),
						esc_html__( 'Find out more ↗', 'zooey' )
					)
					. '<br>'
					. Site_Editor::get_link( array( 'class' => 'button' ) )
					. '</p>',
				'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_enabled',
			);


		// Processing

			$options = array(

				/**
				 * Theme credits.
				 */
				'0' . 90 . 'placeholder' => array(
					'id'                   => 'placeholder',
					'type'                 => 'section',
					'create_section'       => '',
					'in_panel'             => $in_panel,
					'in_panel-description' => '<h3>' . esc_html__( 'Theme Credits', 'zooey' ) . '</h3>'
						. '<p class="description">'
						. sprintf(
							/* translators: 1: linked theme name, 2: theme author name. */
							esc_html__( '%1$s is a WordPress theme developed by %2$s.', 'zooey' ),
							'<a href="' . esc_url( wp_get_theme( 'zooey' )->get( 'ThemeURI' ) ) . '"><strong>' . esc_html( wp_get_theme( 'zooey' )->get( 'Name' ) ) . '</strong></a>',
							'<strong><a href="' . esc_url( wp_get_theme( 'zooey' )->get( 'AuthorURI' ) ) . '">' . esc_html( wp_get_theme( 'zooey' )->get( 'Author' ) ) . '</a></strong>'
						)
						. '</p>',
				),

				/**
				 * Colors: General colors.
				 */
				100 . 'colors' => array(
					'id'             => 'colors_general',
					'type'           => 'section',
					'create_section' => esc_html_x( 'Colors & Background', 'Customizer section title.', 'zooey' ),
					'in_panel'       => $in_panel,
				),

					/**
					 * Theme palette.
					 */
					100 . 'colors' . 100 => array(
						'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_disabled',
						'type'            => 'html',
						'content'         => '<h3>' . esc_html__( 'Theme color palette', 'zooey' ) . '</h3>',
						'priority'        => 0,
					),
					100 . 'colors' . 101 => array(
						'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_enabled',
						'type'            => 'html',
						'content'         => '<h3 class="has-no-border">' . esc_html__( 'Site background', 'zooey' ) . '</h3>',
						'priority'        => 0,
					),

						// For "Base color" (`color_base`) see `background_color`.

						/**
						 * Notice.
						 */
						100 . 'colors' . 105 => array(
							'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_enabled',
							'type'            => 'html',
							'content'         =>
								'<p class="notice notice-info">'
								. '<strong>'
								. esc_html__( 'Site background color', 'zooey' )
								. '</strong>'
								. '<br>'
								. esc_html__( 'Tweak theme colors in Site Editor → Styles section.', 'zooey' )
								. ' '
								. esc_html__( '"Base" color is used as the site background color.', 'zooey' )
								. '<br>'
								. Site_Editor::get_link()
								. '</p>',
						),

						100 . 'colors' . 110 => array(
							'type'    => 'color',
							'id'      => 'color_base_alt',
							'label'   => esc_html__( 'Base alternative color', 'zooey' ),
							'default' => self::$theme_mods['color_base_alt'],
							'css_var' => array(
								'name'  => '--wp--preset--color--base-alt',
								'value' => 'maybe_hash_hex_color',
							),
							'preview_js' => array(
								'css' => array(
									$css_selector_root => array(
										'--wp--preset--color--base-alt',
									),
								),
							),
							'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_disabled',
						),
						100 . 'colors' . 120 => array(
							'type'        => 'color',
							'id'          => 'color_contrast',
							'label'       => esc_html__( 'Contrast color', 'zooey' ),
							'description' =>
								esc_html__( 'By default applied on text.', 'zooey' )
								. ' '
								. esc_html__( 'Set this for an appropriate contrast against "Base" color.', 'zooey' ),
							'default'     => self::$theme_mods['color_contrast'],
							'css_var'     => array(
								'name'  => '--wp--preset--color--contrast',
								'value' => 'maybe_hash_hex_color',
							),
							'preview_js'  => array(
								'css' => array(
									$css_selector_root => array(
										'--wp--preset--color--contrast',
									),
								),
							),
							'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_disabled',
						),
						100 . 'colors' . 125 => array(
							'type'        => 'color',
							'id'          => 'color_contrast_alt',
							'label'       => esc_html__( 'Contrast alternative color', 'zooey' ),
							'description' =>
								esc_html__( 'By default applied on headings.', 'zooey' )
								. ' '
								. esc_html__( 'Set this for an appropriate contrast against "Base" color.', 'zooey' ),
							'default'     => self::$theme_mods['color_contrast_alt'],
							'css_var'     => array(
								'name'  => '--wp--preset--color--contrast-alt',
								'value' => 'maybe_hash_hex_color',
							),
							'preview_js'  => array(
								'css' => array(
									$css_selector_root => array(
										'--wp--preset--color--contrast-alt',
									),
								),
							),
							'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_disabled',
						),
						100 . 'colors' . 130 => array(
							'type'        => 'color',
							'id'          => 'color_primary',
							'label'       => esc_html__( 'Primary color', 'zooey' ),
							'description' =>
								esc_html__( 'By default applied as link color.', 'zooey' )
								. ' '
								. esc_html__( 'Set this for an appropriate contrast against "Base" color.', 'zooey' ),
							'default'     => self::$theme_mods['color_primary'],
							'css_var'     => array(
								'name'  => '--wp--preset--color--primary',
								'value' => 'maybe_hash_hex_color',
							),
							'preview_js'  => array(
								'css' => array(
									$css_selector_root => array(
										'--wp--preset--color--primary',
									),
								),
							),
							'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_disabled',
						),
						100 . 'colors' . 135 => array(
							'type'        => 'color',
							'id'          => 'color_primary_mixed',
							'label'       => esc_html__( 'Primary mixed color', 'zooey' ),
							'description' => esc_html__( 'By default it is set as a blend of "Base" and "Primary" color.', 'zooey' ),
							'default'     => self::$theme_mods['color_primary_mixed'],
							'css_var'     => array(
								'name'  => '--wp--preset--color--primary-mixed',
								'value' => 'maybe_hash_hex_color',
							),
							'preview_js'  => array(
								'css' => array(
									$css_selector_root => array(
										'--wp--preset--color--primary-mixed',
									),
								),
							),
							'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_disabled',
						),
						100 . 'colors' . 140 => array(
							'type'        => 'color',
							'id'          => 'color_secondary',
							'label'       => esc_html__( 'Secondary color', 'zooey' ),
							'description' => esc_html__( 'By default applied as button color.', 'zooey' ),
							'default'     => self::$theme_mods['color_secondary'],
							'css_var'     => array(
								'name'  => '--wp--preset--color--secondary',
								'value' => 'maybe_hash_hex_color',
							),
							'preview_js'  => array(
								'css' => array(
									$css_selector_root => array(
										'--wp--preset--color--secondary',
									),
								),
							),
							'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_disabled',
						),
						100 . 'colors' . 145 => array(
							'type'        => 'color',
							'id'          => 'color_secondary_mixed',
							'label'       => esc_html__( 'Secondary mixed color', 'zooey' ),
							'description' => esc_html__( 'By default it is set as a blend of "Base" and "Secondary" color.', 'zooey' ),
							'default'     => self::$theme_mods['color_secondary_mixed'],
							'css_var'     => array(
								'name'  => '--wp--preset--color--secondary-mixed',
								'value' => 'maybe_hash_hex_color',
							),
							'preview_js'  => array(
								'css' => array(
									$css_selector_root => array(
										'--wp--preset--color--secondary-mixed',
									),
								),
							),
							'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_disabled',
						),

						100 . 'colors' . 300 => array(
							'type'        => 'select',
							'id'          => 'color_button',
							'label'       => esc_html__( 'Button color', 'zooey' ),
							'description' => esc_html__( 'Choose which predefined color applies on buttons.', 'zooey' ),
							'default'     => 'primary',
							'choices'     => $choices_palette,
							'preview_js'  => array(
								'css' => array(
									$css_selector_root => array(
										array(
											'property' => '--theme--css--button--color--background',
											'prefix'   => 'var(--wp--preset--color--',
											'suffix'   => ')',
										),
										array(
											'property' => '--theme--css--button--color--text',
											'prefix'   => 'var(--wp--preset--color--',
											'suffix'   => '--bg-text)',
										),
										// array(
										// 	'property' => '--theme--css--button--color--border',
										// 	'prefix'   => 'var(--wp--preset--color--',
										// 	'suffix'   => '--bg-border)',
										// ),
									),
								),
							),
						),

						/**
						 * Notice.
						 */
						100 . 'colors' . 699 => array(
							'type'    => 'html',
							'content' =>
								'<p class="notice notice-warning">'
								. '<strong>'
								. esc_html__( 'Styling theme sections', 'zooey' )
								. '</strong>'
								. '<br>'
								. esc_html__( 'Colors and layout of theme sections (such as site header or footer) can be customized by editing template parts in Site Editor.', 'zooey' )
								. '<br>'
								. Site_Editor::get_link( array( 'url_args' => array(
									'postType' => 'wp_template_part',
									'path'     => '/wp_template_part/all',
								) ) )
								. '</p>',
						),

						/**
						 * Gradient options.
						 */
						100 . 'colors' . 700 => array(
							'type'    => 'html',
							'content' => '<h3>' . esc_html__( 'Gradients', 'zooey' ) . '</h3>',
						),

							100 . 'colors' . 710 => array(
								'type'              => 'range',
								'id'                => 'gradient_stop_hard',
								'label'             => esc_html__( 'Hard gradient stop', 'zooey' ),
								'description'       =>
									esc_html__( 'Default value:', 'zooey' ) . ' ' . self::$theme_mods['gradient_stop_hard']
									. '<br>'
									. esc_html__( 'Sets the stop position for automatically generated hard cut gradient presets.', 'zooey' ),
								'default'           => self::$theme_mods['gradient_stop_hard'],
								'min'               => 1,
								'max'               => 99,
								'step'              => 1,
								'suffix'            => '%',
								'sanitize_callback' => 'absint',
								'css_var'           => array(
									'name'  => '--theme--mod--gradient_stop_hard',
									'value' => __NAMESPACE__ . '\Sanitize::css_percent',
								),
								'preview_js'        => array(
									'css' => array(
										$css_selector_root => array(
											array(
												'property' => '--theme--mod--gradient_stop_hard',
												'suffix'   => '%',
											),
										),
									),
								),
							),
							100 . 'colors' . 720 => array(
								'type'              => 'range',
								'id'                => 'gradient_stop_soft',
								'label'             => esc_html__( 'Soft gradient stop', 'zooey' ),
								'description'       =>
									esc_html__( 'Default value:', 'zooey' ) . ' ' . self::$theme_mods['gradient_stop_soft']
									. '<br>'
									. esc_html__( 'Sets the stop position for automatically generated soft gradual gradient presets.', 'zooey' ),
								'default'           => self::$theme_mods['gradient_stop_soft'],
								'min'               => 1,
								'max'               => 99,
								'step'              => 1,
								'suffix'            => '%',
								'sanitize_callback' => 'absint',
								'css_var'           => array(
									'name'  => '--theme--mod--gradient_stop_soft',
									'value' => __NAMESPACE__ . '\Sanitize::css_percent',
								),
								'preview_js'        => array(
									'css' => array(
										$css_selector_root => array(
											array(
												'property' => '--theme--mod--gradient_stop_soft',
												'suffix'   => '%',
											),
										),
									),
								),
							),

					/**
					 * Editor palette.
					 */
					100 . 'colors' . 800 => array(
						'type'    => 'html',
						'content' => '<h3>' . esc_html__( 'Editor palette', 'zooey' ) . '</h3>',
					),

						100 . 'colors' . 801 => array(
							'type'        => 'checkbox',
							'id'          => 'enable_wp_palette',
							'label'       => esc_html__( 'WordPress default color palette', 'zooey' ),
							'description' => esc_html__( 'Should this be enabled in block editor?', 'zooey' ),
							'default'     => true,
							'preview_js'  => false, // This is to prevent customizer preview reload.
						),
						100 . 'colors' . 802 => array(
							'type'        => 'checkbox',
							'id'          => 'enable_wp_gradients',
							'label'       => esc_html__( 'WordPress default gradients', 'zooey' ),
							'description' => esc_html__( 'Should this be enabled in block editor?', 'zooey' ),
							'default'     => false,
							'preview_js'  => false, // This is to prevent customizer preview reload.
						),
						100 . 'colors' . 803 => array(
							'type'        => 'checkbox',
							'id'          => 'enable_wp_duotone',
							'label'       => esc_html__( 'WordPress default duotone presets', 'zooey' ),
							'description' => esc_html__( 'Should this be enabled in block editor?', 'zooey' ),
							'default'     => false,
							'preview_js'  => false, // This is to prevent customizer preview reload.
						),

						100 . 'colors' . 810 => array(
							'type'        => 'color',
							'id'          => 'color_black',
							'label'       => esc_html__( 'Black color', 'zooey' ),
							'default'     => self::$theme_mods['color_black'],
							'css_var'     => array(
								'name'  => '--wp--preset--color--black',
								'value' => 'maybe_hash_hex_color',
							),
							'preview_js'  => array(
								'css' => array(
									$css_selector_root => array(
										'--wp--preset--color--black',
									),
								),
							),
							'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_disabled',
						),
						100 . 'colors' . 820 => array(
							'type'        => 'color',
							'id'          => 'color_white',
							'label'       => esc_html__( 'White color', 'zooey' ),
							'default'     => self::$theme_mods['color_white'],
							'css_var'     => array(
								'name'  => '--wp--preset--color--white',
								'value' => 'maybe_hash_hex_color',
							),
							'preview_js'  => array(
								'css' => array(
									$css_selector_root => array(
										'--wp--preset--color--white',
									),
								),
							),
							'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_disabled',
						),

					/**
					 * Notice.
					 */
					100 . 'colors' . 999 => $site_editor_info,

				/**
				 * Layout.
				 */
				200 . 'layout' => array(
					'id'             => 'layout',
					'type'           => 'section',
					'create_section' => esc_html_x( 'Layout', 'Customizer section title.', 'zooey' ),
					'in_panel'       => $in_panel,
				),

					/**
					 * Full site editing.
					 */
					200 . 'layout' . '000' => array(
						'type'    => 'html',
						'content' => '<h3>' . esc_html_x( 'Site editing', 'WordPress full site editing functionality.', 'zooey' ) . '</h3>',
					),

						200 . 'layout' . '010' => array(
							'type'        => 'checkbox',
							'id'          => Site_Editor::$theme_mod_id,
							'label'       => esc_html__( 'Enable template editor', 'zooey' ),
							'description' =>
								esc_html__( 'Enables WordPress full site editing experience.', 'zooey' )
								. '<br><br>'
								. esc_html__( 'When enabled, you can edit all theme template layouts visually without using code.', 'zooey' )
								. '<br><br>'
								. esc_html__( 'When disabled, only site template parts (such as header, footer, page intro,&hellip;) are customizable via Site Editor.', 'zooey' )
								. ' '
								. esc_html__( 'You can still modify the theme using PHP code (known practice from "classic" WordPress themes).', 'zooey' ),
							'default'     => true,
						),

					/**
					 * Content layout.
					 */
					200 . 'layout' . 100 => array(
						'type'            => 'html',
						'content'         => '<h3>' . esc_html__( 'Content', 'zooey' ) . '</h3>',
						'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_disabled',
					),

						200 . 'layout' . 110 => array(
							'type'              => 'range',
							'id'                => 'layout_width_content',
							'label'             => esc_html__( 'Content width', 'zooey' ),
							'description'       =>
								esc_html__( 'Default value:', 'zooey' ) . ' ' . self::$theme_mods['layout_width_content']
								. '<br>'
								. esc_html__( 'This is a default width for your blocks.', 'zooey' )
								. ' '
								. esc_html__( 'Set this cautiously for the best readability, depending on your typography setup.', 'zooey' )
								. ' '
								. esc_html__( 'The optimal text line length is considered to be between 50 and 75 characters, including spaces.', 'zooey' ),
							'default'           => self::$theme_mods['layout_width_content'],
							'min'               => 400,
							'max'               => 1000,
							'step'              => 1,
							'suffix'            => 'px',
							'sanitize_callback' => 'absint',
							'css_var'           => array(
								'name'  => '--theme--mod--layout_width_content',
								'value' => __NAMESPACE__ . '\Sanitize::css_px',
							),
							'preview_js'        => array(
								'css' => array(
									$css_selector_root => array(
										array(
											'property' => '--theme--mod--layout_width_content',
											'suffix'   => 'px',
										),
									),
								),
							),
							'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_disabled',
						),
						200 . 'layout' . 120 => array(
							'type'              => 'range',
							'id'                => 'layout_width_wide',
							'label'             => esc_html__( 'Wide width', 'zooey' ),
							'description'       =>
								esc_html__( 'Default value:', 'zooey' ) . ' ' . self::$theme_mods['layout_width_wide']
								. '<br>'
								. esc_html__( 'This width is applied on wide-aligned blocks.', 'zooey' ),
							'default'           => self::$theme_mods['layout_width_wide'],
							'min'               => 800,
							'max'               => 1920,
							'step'              => 1,
							'suffix'            => 'px',
							'sanitize_callback' => 'absint',
							'css_var'           => array(
								'name'  => '--theme--mod--layout_width_wide',
								'value' => __NAMESPACE__ . '\Sanitize::css_px',
							),
							'preview_js'        => array(
								'css' => array(
									$css_selector_root => array(
										array(
											'property' => '--theme--mod--layout_width_wide',
											'suffix'   => 'px',
										),
									),
								),
							),
							'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_disabled',
						),

					/**
					 * Responsive layout.
					 */
					200 . 'layout' . 200 => array(
						'type'    => 'html',
						'content' => '<h3>' . esc_html__( 'Responsiveness', 'zooey' ) . '</h3>',
					),

						200 . 'layout' . 210 => array(
							'type'              => 'range',
							'id'                => 'layout_breakpoint_mobile',
							'label'             => esc_html__( 'Small screen breakpoint', 'zooey' ),
							'description'       =>
								esc_html__( 'Default value:', 'zooey' ) . ' ' . 1024
								. '<br>'
								. esc_html__( 'Sets the screen width (viewport) value for responsive breakpoint.', 'zooey' )
								. ' '
								. sprintf(
									/* translators: %1$s, %2$s: block style names. */
									esc_html__( 'This affects responsive block styles, such as "%1$s" or "%2$s".', 'zooey' ),
									// @see  Block_Style::get_styles()
									_x( 'Hide on small screens', 'Block style label.', 'zooey' ),
									_x( 'Only on small screens', 'Block style label.', 'zooey' )
								),
							'default'           => 1024,
							'min'               => 640,
							'max'               => 1280,
							'step'              => 1,
							'suffix'            => 'px',
							'sanitize_callback' => 'absint',
						),

					/**
					 * Notice.
					 */
					200 . 'layout' . 999 => $site_editor_info,

				/**
				 * Typography.
				 */
				300 . 'typography' => array(
					'id'             => 'typography',
					'type'           => 'section',
					'create_section' => esc_html_x( 'Typography', 'Customizer section title.', 'zooey' ),
					'in_panel'       => $in_panel,
				),

					300 . 'typography' . '000' => array(
						'type'    => 'html',
						'content' =>
							'<p>'
							. esc_html__( 'These options provide great flexibility such as setting up a custom font family and affect also Global Styles in Site Editor.', 'zooey' )
							. '</p>',
					),

					300 . 'typography' . 100 => array(
						'type'    => 'html',
						'content' => '<h3>' . esc_html__( 'Font size', 'zooey' ) . '</h3>',
					),

						300 . 'typography' . 110 => array(
							'type'              => 'range',
							'id'                => 'typography_font_size',
							'label'             => esc_html__( 'Global font size in px', 'zooey' ),
							'description'       =>
								esc_html__( 'Global text font size used as a base for automatic calculation of additional font sizes.', 'zooey' )
								. ' '
								. esc_html__( 'This size is applied on large screens only.', 'zooey' )
								. '<br>'
								. esc_html__( 'Default value:', 'zooey' ) . ' ' . self::$theme_mods['typography_font_size'],
							'default'           => self::$theme_mods['typography_font_size'],
							'min'               => 16,
							'max'               => 28,
							'step'              => 1,
							// 'suffix'            => 'px', // Do not use suffix here! CSS var should only have numeric value!
							'sanitize_callback' => 'absint',
							'css_var'           => array(
								'name'  => '--theme--mod--typography_font_size',
								'value' => 'absint',
							),
							'preview_js'        => array(
								'css' => array(
									':root' => array(
										array(
											'property' => '--theme--mod--typography_font_size',
										),
									),
								),
							),
						),

					300 . 'typography' . 200 => array(
						'type'    => 'html',
						'content' =>
							'<h3>'
							. esc_html__( 'Typography ratio', 'zooey' )
							. '</h3>'
							. '<p class="description">'
							. esc_html__( 'Ratios for automatic harmonious typography font size calculation.', 'zooey' )
							. '</p>',
					),

						300 . 'typography' . 210 => array(
							'type'              => 'range',
							'id'                => 'typography_modular_scale',
							'label'             => esc_html__( 'Modular scale ratio', 'zooey' ),
							'description'       =>
								esc_html__( 'This ratio is used for calculating heading sizes.', 'zooey' )
								. ' '
								. '<a href="https://www.modularscale.com/?1&em&' . self::$theme_mods['typography_modular_scale'] . '" title="' . esc_attr__( 'Open link in new window', 'zooey' ) . '" target="_blank" rel="noopener noreferrer">' . esc_html__( 'Open Modular Scale calculator in a new window ↗', 'zooey' ) . '</a>'
								. '<br>'
								. esc_html__( 'Default value:', 'zooey' ) . ' ' . self::$theme_mods['typography_modular_scale'],
							'default'           => self::$theme_mods['typography_modular_scale'],
							'min'               => 1,
							'max'               => 2,
							'step'              => .01,
							'decimal_places'    => 2,
							'sanitize_callback' => __NAMESPACE__ . '\Sanitize::float',
							'css_var'           => array(
								'name'  => '--theme--mod--typography_modular_scale',
								'value' => __NAMESPACE__ . '\Sanitize::float',
							),
							'preview_js'        => array(
								'css' => array(
									':root' => array(
										array(
											'property' => '--theme--mod--typography_modular_scale',
										),
									),
								),
							),
						),
						300 . 'typography' . 220 => array(
							'type'              => 'range',
							'id'                => 'typography_desktop_multiply',
							'label'             => esc_html__( 'Large screen headings scale', 'zooey' ),
							'description'       =>
								esc_html__( 'Additional ratio for scaling heading sizes on large screens.', 'zooey' )
								. '<br>'
								. esc_html__( 'Default value:', 'zooey' ) . ' ' . self::$theme_mods['typography_desktop_multiply'],
							'default'           => self::$theme_mods['typography_desktop_multiply'],
							'min'               => 1,
							'max'               => 3,
							'step'              => .01,
							'decimal_places'    => 2,
							'sanitize_callback' => __NAMESPACE__ . '\Sanitize::float',
							'css_var'           => array(
								'name'  => '--theme--mod--typography_desktop_multiply',
								'value' => __NAMESPACE__ . '\Sanitize::float',
							),
							'preview_js'        => array(
								'css' => array(
									':root' => array(
										array(
											'property' => '--theme--mod--typography_desktop_multiply',
										),
									),
								),
							),
						),

					300 . 'typography' . 300 => array(
						'type'    => 'html',
						'content' =>
							'<h3>'
							. esc_html__( 'Font families', 'zooey' )
							. '</h3>'
							. '<p class="description">'
							. sprintf(
								/* translators: %s: customizer option values. */
								esc_html__( 'Values of %s set web safe system font families.', 'zooey' ),
								'<code>system</code>, <code>serif</code>, <code>sans-serif</code>'
							)
							. '</p>'
							. '<p class="description">'
							. esc_html__( 'You can use any Google Fonts with this theme.', 'zooey' )
							. ' '
							. esc_html__( 'Just input the Google Fonts font family name into the fields below, save the options, and you are done!', 'zooey' )
							. '</p>'
							. '<p class="description">'
							. $google_fonts_note
							. '</p>',
					),

						300 . 'typography' . 301 => array(
							'type'    => 'html',
							'content' =>
								'<p>'
								. sprintf(
									/* translators: %s: CSS style `font-family` property with link to more information (international). */
									esc_html__( 'Use a value valid for CSS %s property in the fields below.', 'zooey' ),
									'<a href="https://developer.mozilla.org/docs/Web/CSS/font-family"><code>font-family</code></a>'
								)
								. '</p>',
						),

						300 . 'typography' . 310 => array(
							'type'              => 'text',
							'id'                => 'typography_font_family_global',
							'label'             => esc_html__( 'Main font', 'zooey' ),
							'description'       => esc_html__( 'By default applied as main, global website font.', 'zooey' )
								. ' '
								. esc_html__( 'Default value:', 'zooey' )
								. ' <code>' . self::$theme_mods['typography_font_family_global'] . '</code>',
							'default'           => self::$theme_mods['typography_font_family_global'],
							'datalist'          => array_merge(
								array(
									array(
										'value' => self::$theme_mods['typography_font_family_global'],
										'label' => __( 'Default value', 'zooey' ),
									),
								),
								$font_families
							),
							'sanitize_callback' => __NAMESPACE__ . '\Sanitize::fonts',
							'css_var'           => array(
								'name'  => '--theme--mod--typography_font_family_global',
								'value' => __NAMESPACE__ . '\Sanitize::css_fonts',
							),
							'input_attrs'       => array(
								'placeholder' => 'sans-serif',
							),
						),
						300 . 'typography' . 320 => array(
							'type'              => 'text',
							'id'                => 'typography_font_family_supplemental',
							'label'             => esc_html__( 'Heading font', 'zooey' ),
							'description'       => esc_html__( 'By default applied on headings.', 'zooey' )
								. ' '
								. esc_html__( 'Default value:', 'zooey' )
								. ' <code>' . self::$theme_mods['typography_font_family_supplemental'] . '</code>',
							'default'           => self::$theme_mods['typography_font_family_supplemental'],
							'datalist'          => array_merge(
								array(
									array(
										'value' => self::$theme_mods['typography_font_family_supplemental'],
										'label' => __( 'Default value', 'zooey' ),
									),
								),
								$font_families
							),
							'sanitize_callback' => __NAMESPACE__ . '\Sanitize::fonts',
							'css_var'           => array(
								'name'  => '--theme--mod--typography_font_family_supplemental',
								'value' => __NAMESPACE__ . '\Sanitize::css_fonts',
							),
							'input_attrs'       => array(
								'placeholder' => 'sans-serif',
							),
						),
						300 . 'typography' . 330 => array(
							'type'              => 'text',
							'id'                => 'typography_font_family_alternative',
							'label'             => esc_html__( 'Alternative font', 'zooey' ),
							'description'       => esc_html__( 'By default applied on site title (logo).', 'zooey' )
								. ' '
								. esc_html__( 'Default value:', 'zooey' )
								. ' <code>' . self::$theme_mods['typography_font_family_alternative'] . '</code>',
							'default'           => self::$theme_mods['typography_font_family_alternative'],
							'datalist'          => array_merge(
								array(
									array(
										'value' => self::$theme_mods['typography_font_family_alternative'],
										'label' => __( 'Default value', 'zooey' ),
									),
								),
								$font_families
							),
							'sanitize_callback' => __NAMESPACE__ . '\Sanitize::fonts',
							'css_var'           => array(
								'name'  => '--theme--mod--typography_font_family_alternative',
								'value' => __NAMESPACE__ . '\Sanitize::css_fonts',
							),
							'input_attrs'       => array(
								'placeholder' => 'serif',
							),
						),

						300 . 'typography' . 350 => array(
							'type'        => 'checkbox',
							'id'          => 'typography_google_fonts',
							'label'       => esc_html__( 'Enable theme Google Fonts loading', 'zooey' ),
							'description' => esc_html__( 'In case you are loading fonts with a plugin or other way, disable this option.', 'zooey' )
								. '<br>'
								. $google_fonts_note,
							'default'     => true,
						),

					/**
					 * Notice.
					 */
					300 . 'typography' . 999 => array(
						'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_enabled',
						'type'            => 'html',
						'content'         =>
							'<p class="notice notice-info">'
							. '<strong>'
							. esc_html__( 'More typography options', 'zooey' )
							. '</strong>'
							. '<br>'
							. esc_html__( 'In case you need to modify typography more precisely, you can do so in Site Editor → Styles section.', 'zooey' )
							. '<br>'
							. Site_Editor::get_link()
							. '</p>',
					),

				/**
				 * Posts.
				 */
				400 . 'posts' => array(
					'id'             => 'posts',
					'type'           => 'section',
					'create_section' => esc_html_x( 'Posts', 'Customizer section title.', 'zooey' ),
					'in_panel'       => $in_panel,
				),

					/**
					 * Blog page.
					 */
					400 . 'posts' . 100 => array(
						'type'    => 'html',
						'content' => '<h3>' . esc_html__( 'Blog', 'zooey' ) . '</h3>',
					),

						400 . 'posts' . 110 => array(
							'type'        => 'radio',
							'id'          => 'layout_blog',
							'label'       => esc_html__( 'Blog posts layout', 'zooey' ),
							'default'     => 'with-sidebar',
							'choices'     => array(
								''             => esc_html_x( 'Columns without sidebar', 'Posts list layout.', 'zooey' ),
								'with-sidebar' => esc_html_x( 'List with sidebar', 'Posts list layout.', 'zooey' ),
							),
							'preview_url' => get_post_type_archive_link( 'post' ),
							// No `preview_js` as we need to load correct image sizes too.
						),

						400 . 'posts' . 210 => array(
							'type'        => 'checkbox',
							'id'          => 'category_selector',
							'label'       => esc_html__( 'Enable category selector', 'zooey' ),
							'description' => esc_html__( 'Displays a section with category selector on blog page.', 'zooey' ),
							'default'     => (bool) get_option( 'page_for_posts' ),
							'preview_url' => get_post_type_archive_link( 'post' ),
						),

						/**
						 * Notice.
						 */
						400 . 'posts' . 290 => array(
							'type'    => 'html',
							'content' =>
								'<p class="notice notice-info">'
								. esc_html__( 'You can further customize blog page layout in Site Editor.', 'zooey' )
								. ' '
								. Site_Editor::get_link( array( 'url_args' => array(
									'postType' => 'wp_template',
									'postId'   => 'zooey//home',
								) ) )
								. '</p>',
							'active_callback' => __NAMESPACE__ . '\Options_Conditional::is_site_editor_enabled',
						),

					/**
					 * Posts count.
					 */
					400 . 'posts' . 900 => array(
						'type'    => 'html',
						'content' => '<h3>' . esc_html__( 'Posts count', 'zooey' ) . '</h3>'
							. '<p class="description">'
							. esc_html__( 'Max number of entries displayed in list of posts.', 'zooey' )
							. '</p>',
					),

						400 . 'posts' . 910 => array(
							'type'              => 'range',
							'id'                => 'search_per_page',
							'label'             => esc_html__( 'Search results', 'zooey' ),
							'default'           => 10,
							'min'               => 1,
							'max'               => 99,
							'step'              => 1,
							'sanitize_callback' => 'absint',
							'preview_url'       => home_url( '?s=' ), // Do not use `get_search_link()` here.
						),

						400 . 'posts' . 920 => array(
							'type'              => 'range',
							'id'                => 'archive_per_page',
							'label'             => esc_html__( 'Archive page', 'zooey' ),
							'default'           => 8, // 2 columns layout.
							'min'               => 1,
							'max'               => 99,
							'step'              => 1,
							'sanitize_callback' => 'absint',
							'preview_url'       => get_category_link( get_option( 'default_category' ) ),
						),

				/**
				 * Others.
				 */
				900 . 'others' => array(
					'id'             => 'others',
					'type'           => 'section',
					'create_section' => esc_html_x( 'Others', 'Customizer section title.', 'zooey' ),
					'in_panel'       => esc_html_x( 'Theme Options', 'Customizer panel title.', 'zooey' ),
				),

					900 . 'others' . 100 => array(
						'type'        => 'checkbox',
						'id'          => 'core_block_patterns',
						'label'       => esc_html__( 'Enable core block patterns', 'zooey' ),
						'description' => esc_html__( 'Allows WordPress core block patterns in block editor.', 'zooey' ),
						'default'     => false,
						'preview_js'  => false, // This is to prevent customizer preview reload.
					),

					900 . 'others' . 900 => array(
						'section'     => 'title_tagline',
						'type'        => 'checkbox',
						'id'          => 'link_homepage_logo',
						'label'       => esc_html__( 'Link homepage logo', 'zooey' ),
						'description' =>
							esc_html__( 'When disabled, logo image will no longer link to the homepage when visitor is on the homepage.', 'zooey' )
							. ' '
							. esc_html__( 'It also removes the logo image alt text attribute on the homepage.', 'zooey' ),
						'default'     => false,
						'preview_js'  => false, // This is to prevent customizer preview reload.
					),

					/**
					 * Notice.
					 * In custom header section.
					 */
					900 . 'others' . 910 => array(
						'section' => 'header_image',
						'type'    => 'html',
						'content' => '<p class="notice notice-info is-theme-notice">'
							. '<strong>'
							. esc_html__( 'Header image usage', 'zooey' )
							. '</strong>'
							. '<br>'
							. esc_html__( 'These header images will be used in Image blocks with "Use header image" block style assigned.', 'zooey' )
							. '</p>',
					),
			);


		// Output

			return (array) $options;

	} // /set

	/**
	 * Get JSON data.
	 *
	 * @since  1.0.7
	 *
	 * @return  void
	 */
	public static function get_json_data() {

		// Processing

			// Core JSON data.
			$json_data = WP_Theme_JSON_Resolver::get_core_data()->get_raw_data();
			self::$json_data['core']['palette'] = array_combine(
				array_column( $json_data['settings']['color']['palette']['default'], 'slug' ),
				array_column( $json_data['settings']['color']['palette']['default'], 'name' )
			);

			// Theme JSON data.
			$json_data = WP_Theme_JSON_Resolver::get_theme_data()->get_data();
			self::$json_data['theme']['palette'] = array_combine(
				array_column( $json_data['settings']['color']['palette'], 'slug' ),
				array_column( $json_data['settings']['color']['palette'], 'name' )
			);

	} // /get_json_data

}
