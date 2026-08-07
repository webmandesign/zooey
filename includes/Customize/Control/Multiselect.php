<?php
/**
 * Customizer custom control: Multi-select field.
 *
 * Related script is already included within `assets/js/customize-controls.js`.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.1
 */

namespace WebManDesign\Zooey\Customize\Control;

use WP_Customize_Control;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Multiselect extends WP_Customize_Control {

	/**
	 * Renders the control wrapper and calls $this->render_content() for the internals.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public function render_content() {

		// Requirements check

			if (
				empty( $this->choices )
				|| ! is_array( $this->choices )
			) {
				return;
			}


		// Output

			if ( 'multicheckbox' === $this->type ) {
				$this->render_content_checkbox();
			} else {
				$this->render_content_select();
			}

	} // /render_content

	/**
	 * Get value as array.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public function get_value_array() {

		// Output

			return ( is_string( $this->value() ) ) ? ( explode( ',', $this->value() ) ) : ( (array) $this->value() );

	} // /get_value_array

	/**
	 * Renders the checkbox control.
	 *
	 * @since    1.0.0
	 * @version  2.0.1
	 *
	 * @return  void
	 */
	public function render_content_checkbox() {

		// Variables

			$value_array = $this->get_value_array();


		// Output

			?>

			<span class="customize-control-title"><?php
				echo esc_html( $this->label );
			?></span>

			<?php if ( $this->description ) : ?>
			<span class="description customize-control-description"><?php
				echo wp_kses( $this->description, '#description' );
			?></span>
			<?php endif; ?>

			<?php

			$ul      = '<ul' . ( ( ! empty( $this->input_attrs['class'] ) ) ? ( ' class="' . esc_attr( $this->input_attrs['class'] ) . '"' ) : ( '' ) ) . '>';
			$ul_open = false;

			foreach ( $this->choices as $value => $label ) {

				if ( 0 === strpos( $value, 'optgroup' ) ) {

					if ( true === $ul_open ) {
						echo '</ul>';
					}

					echo
						'<details>'
						. '<summary>' . esc_attr( $label ) . '</summary>'
						. $ul;

					$ul_open = true;

				} elseif ( 0 === strpos( $value, '/optgroup' ) ) {

					echo
						'</ul>'
						. '</details>';

					$ul_open = false;

				} else {

					if ( false === $ul_open ) {
						echo $ul; // phpcs:ignore -- escaped above
						$ul_open = true;
					}

					echo
						'<li><label>'
						. '<input
							type="checkbox"
							value="' . esc_attr( $value ) . '"
							name="' . esc_attr( $this->id ) . '[]"'
						. checked( in_array( $value, $value_array ), true, false ) // Return, do not echo.
						. '>'
						. wp_kses( $label, '#description' )
						. '</label></li>';

				}
			}

			if ( true === $ul_open ) {
				echo '</ul>';
				$ul_open = false;
			}

			?>

			<input
				type="hidden"
				<?php $this->link(); ?>
				value="<?php echo esc_attr( implode( ',', $value_array ) ); ?>"
			/>

			<?php

	} // /render_content_checkbox

	/**
	 * Renders the select control.
	 *
	 * @since    1.0.0
	 * @version  2.0.1
	 *
	 * @return  void
	 */
	public function render_content_select() {

		// Output

			?>

			<label>
				<span class="customize-control-title"><?php
					echo esc_html( $this->label );
				?></span>

				<?php if ( $this->description ) : ?>
				<span class="description customize-control-description"><?php
					echo wp_kses( $this->description, '#description' );
				?></span>
				<?php endif; ?>

				<select
					name="<?php echo esc_attr( $this->id ); ?>"
					<?php $this->input_attrs(); ?>
					multiple="multiple"
					<?php $this->link(); ?>
				>
					<?php

					foreach ( $this->choices as $value => $label ) {
						if ( 0 === strpos( $value, 'optgroup' ) ) {
							echo '<optgroup label="' . esc_attr( $label ) . '">';
						} elseif ( 0 === strpos( $value, '/optgroup' ) ) {
							echo '</optgroup>';
						} else {
							echo
								'<option
									value="' . esc_attr( $value ) . '"
									title="' . esc_attr( $label ) . '" '
								. selected( in_array( $value, $this->get_value_array() ), true, false ) // Return, do not echo.
								. '>'
								. esc_html( $label )
								. '</option>';
						}
					}

					?>
				</select>

				<em><?php esc_html_e( 'Press CTRL key for multiple selection.', 'zooey' ); ?></em>
			</label>

			<?php

	} // /render_content_select

}
