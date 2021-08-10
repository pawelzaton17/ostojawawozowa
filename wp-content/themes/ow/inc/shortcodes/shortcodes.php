<?php
/**
*   Shortcodes
*
*   @package Crunch
*   @since 3.0.0
*/

/**
* Enqueue scripts
*/

if ( ! function_exists( 'crunch_add_mce_button' ) ) {

    /**
    * Hooks your functions into the correct filters
    * @return array
    */

    function crunch_add_mce_button() {
        if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
            return;
        }

        if ( 'true' === get_user_option( 'rich_editing' ) ) {
            add_filter( 'mce_external_plugins', 'crunch_add_tinymce_plugin' );
            add_filter( 'mce_buttons', 'crunch_register_mce_button' );
        }
    }

    add_action( 'admin_init', 'crunch_add_mce_button' );
}

if ( ! function_exists( 'crunch_add_tinymce_plugin' ) ) {

    /**
    * Register new button in the editor
    * @return array
    */

    function crunch_add_tinymce_plugin( $plugin_array ) {
        $plugin_array['crunch_mce_button'] = get_template_directory_uri() . '/inc/shortcodes/mce-button.js';

        return $plugin_array;
    }
}

if ( ! function_exists( 'crunch_register_mce_button' ) ) {

    /**
    * Register new button in the editor
    * @return array
    */

    function crunch_register_mce_button( $buttons ) {
        array_push( $buttons, 'crunch_mce_button' );

        return $buttons;
    }
}

?>