<?php

namespace ProDevign\BlockMeister\Pattern_Builder;


class BlockMeister_Pattern_Post_Meta_Fields {

    const POST_TYPE = "blockmeister_pattern";

    /**
     * CustomPostTypes constructor.
     */
    public function __construct() { }

    public function init() {
        add_action( 'init', function () {
            $this->register_pattern_block_post_meta_fields();
        } );
    }

    /**
     * Register meta fields
     */
    private function register_pattern_block_post_meta_fields() {

        // note: since v2 keywords and categories are handled by taxonomies

        $meta_field_names = [
            '_bm_viewport_width' => 1000, // base width used for scaling down preview
        ];

        foreach ( $meta_field_names as $meta_field_name => $default_value ) {
            register_post_meta( self::POST_TYPE, $meta_field_name, [
                'show_in_rest'  => true,
                'single'        => true,
                'type'          => is_numeric( $default_value ) ? 'number' : 'string',
                'default'       => $default_value,
                'sanitize_callback' => function ( $meta_value, $meta_key ) {
                    switch ( $meta_key ) {
                        case '_bm_viewport_width' :
                            return (int) $meta_value;
                        default :
                            return $meta_value;
                    }
                 }, 10, 2,
                'auth_callback' => function () { // limit who can update the field
                    return current_user_can( 'edit_blockmeister_patterns' );
                }
            ] );
        }

    }

}
