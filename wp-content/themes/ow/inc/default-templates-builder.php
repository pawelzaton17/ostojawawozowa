<?php
/**
 * Default template builder for Crunch. 
 * Create gutenberg template as custom post and choose post type in which it should be displayed
 *
 * @package Crunch
 * @since 5.1.1
 */


/**
 * Include parts of register default ACF Fields and Custom post type for default templates
 */
require_once( "default-templates-builder/register-defaults.php" );

/**
 * Include new field type for possibility to choose post type
 */
add_action( "acf/include_fields", "acf_post_type_selector" );

if(!function_exists("acf_post_type_selector")) {
    function acf_post_type_selector() {
        include_once( "default-templates-builder/acf-post-type-selector.php" );
    }
}

/**
 * Main function getting content of default template and update default content of new post
 */
add_filter( "default_content", function( $content, $post ) {

    $the_query = new WP_Query(array(
            "post_type" => "defaults"
        )
    );
 
    if ( $the_query->have_posts() ) {

        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $template = get_post();
            $template_post_type = get_field("post_type", $template->ID);

            if ( ! empty( $post->post_type ) && $template_post_type === $post->post_type ) {

                $screen = function_exists( "get_current_screen" ) ? get_current_screen() : null;
                $is_block_editor = $screen ? $screen->is_block_editor() : false;

                if ( $is_block_editor ) {
                    $content = get_the_content($template->ID);
                }

            }

        }

        wp_reset_postdata();

    }

    return $content;

}, 10, 2 );
