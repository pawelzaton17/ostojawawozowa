<?php
/**
 * Default template builder for Crunch.
 * Create gutenberg template as custom post and choose post type in which it should be displayed
 *
 * @package Crunch
 * @since 5.1.1
 */

/**
 * Register default post type for template builder
 */
add_action( 'init', 'defaults_custom_post_type' );

function defaults_custom_post_type() {

    register_post_type( 'defaults',

        array(
            'labels' => array(
                'name' => __( 'Templates' ),
                'singular_name' => __( 'Template' )
            ),
            'public' => true,
            'public_queryable' => false,
            'has_archive' => false,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-media-document',

        )
    );
}

/**
 * Register default ACF Field for template builder
 */
if( function_exists("acf_add_local_field_group") ) {
    acf_add_local_field_group(array(
        'key' => 'group_5f1e9925dfb57',
        'title' => 'Custom post type',
        'fields' => array(
            array(
                'key' => 'field_5f1e9974a96ae',
                'label' => 'Select post type',
                'name' => 'post_type',
                'type' => 'post_type_selector',
                'instructions' => 'Select post type to set default template',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'select_type' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'defaults',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
}

?>
