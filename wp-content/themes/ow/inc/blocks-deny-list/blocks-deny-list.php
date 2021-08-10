<?php

/**
 * Disable default Gutenberg Blocks that Crunch don't support
 * Tags: ACF Blocks, Blocks, Inner Block, Full Width Block, Gutenberg Block
 */

function crunch_deny_list_blocks() {
    if (is_admin()) {
        wp_enqueue_script(
            'crunch-deny-list-blocks',
            get_theme_file_uri( '/inc/blocks-deny-list/blocks-deny-list.js' ),
            array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' )
        );
    }
}
add_action( 'enqueue_block_editor_assets', 'crunch_deny_list_blocks' );
