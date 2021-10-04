<?php

namespace WPForms\Pro\Admin\Education\Builder;

use \WPForms\Admin\Education;

/**
 * Builder/Fields Education for Pro.
 *
 * @since 1.6.6
 */
class Fields extends Education\Builder\Fields {

	/**
	 * Hooks.
	 *
	 * @since 1.6.6
	 */
	public function hooks() {

		add_filter( 'wpforms_builder_fields_buttons', [ $this, 'add_fields' ], 500 );
		add_filter( 'wpforms_builder_field_button_attributes', [ $this, 'fields_attributes' ], 100, 2 );
	}

	/**
	 * Add fields.
	 *
	 * @since 1.6.6
	 *
	 * @param array $fields Form fields.
	 *
	 * @return array
	 */
	public function add_fields( $fields ) {

		$nonce = wp_create_nonce( 'wpforms-admin' );

		foreach ( $fields as $group => $group_data ) {
			$fields = $this->fields_add_group_fields( $fields, $group, $nonce );
		}

		return $fields;
	}

	/**
	 * Add education fields to the given fields group.
	 *
	 * @since 1.6.6
	 *
	 * @param array  $fields Fields.
	 * @param string $group  Fields group.
	 * @param string $nonce  Nonce.
	 *
	 * @return array
	 */
	private function fields_add_group_fields( $fields, $group, $nonce ) {

		$addons_slugs = array_column( $this->addons->get_available(), 'slug' );
		$group_fields = $fields[ $group ]['fields'];
		$edu_fields   = $this->fields->get_by_group( $group );
		$edu_fields   = $this->fields->set_values( $edu_fields, 'class', 'education-modal', 'empty' );

		foreach ( $edu_fields as $f => $edu_field ) {

			// Skip if in the current group already exist field of this type.
			if ( ! empty( wp_list_filter( $group_fields, [ 'type' => $edu_field['type'] ] ) ) ) {
				continue;
			}

			// Also skip if field is provided by addon which is not available.
			if ( ! empty( $edu_field['addon'] ) &&
				 ! in_array( $edu_field['addon'], $addons_slugs, true )
			) {
				continue;
			}

			$addon = ! empty( $edu_field['addon'] ) ? $this->addons->get_addon( $edu_field['addon'] ) : [];

			if ( ! empty( $addon ) ) {
				$edu_field['plugin']      = sprintf( '%1$s/%1$s.php', $addon['slug'] );
				$edu_field['plugin_name'] = isset( $addon['title'] ) ? $addon['title'] : '';
				$edu_field['action']      = isset( $addon['action'] ) ? $addon['action'] : '';
				$edu_field['url']         = isset( $addon['url'] ) && $edu_field['action'] === 'install' ? $addon['url'] : '';
				$edu_field['video']       = isset( $addon['video'] ) ? $addon['video'] : '';
				$edu_field['nonce']       = $nonce;
			}

			array_push( $fields[ $group ]['fields'], $edu_field );
		}

		return $fields;
	}

	/**
	 * Adjust attributes on field buttons.
	 *
	 * @since 1.6.6
	 *
	 * @param array $atts  Button attributes.
	 * @param array $field Button properties.
	 *
	 * @return array Attributes array.
	 */
	public function fields_attributes( $atts, $field ) {

		if ( empty( $field['action'] ) ) {
			return $atts;
		}

		/* translators: %s - field name. */
		$atts['data']['field-name']  = sprintf( esc_html__( '%s field', 'wpforms' ), $field['name'] );
		$atts['data']['action']      = $field['action'];
		$atts['data']['nonce']       = wp_create_nonce( 'wpforms-admin' );
		$atts['data']['utm-content'] = ! empty( $field['name_en'] ) ? $field['name_en'] : '';

		if ( ! empty( $field['plugin_name'] ) ) {
			$atts['data']['name'] = ! preg_match( '/addon$/i', $field['plugin_name'] ) ?
				/* translators: %s - addon name. */
				sprintf( esc_html__( '%s addon', 'wpforms' ), $field['plugin_name'] ) :
				$field['plugin_name'];
		}

		if ( ! empty( $field['plugin'] ) ) {
			$atts['data']['path'] = $field['plugin'];
		}

		if ( ! empty( $field['url'] ) ) {
			$atts['data']['url'] = $field['url'];
		}

		if ( ! empty( $field['video'] ) ) {
			$atts['data']['video'] = $field['video'];
		}

		return $atts;
	}
}
