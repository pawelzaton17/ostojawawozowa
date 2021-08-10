<?php

/**
 *   Crunch ACF Blocks
 *
 *   @package Crunch
 *   @since 5.1.1
 */

add_action('acf/init', 'crunch_acf_inner_blocks');

function crunch_acf_inner_blocks()
{
    /*
     * Settings
     *
     * name string
     * icon string
     * keywords array
     * type BLOCK_TYPE_INNER|BLOCK_TYPE_FULL_WIDTH
     * enqueue_styles bool
     * enqueue_scripts bool
     * enable_assets_for_admin bool
     * mode BLOCK_MODE_AUTO|BLOCK_MODE_PREVIEW|BLOCK_MODE_EDIT
     * example bool
     * align bool
     * post_types array|false
     */

    crunch_register_blocks([

        [
            'name' => 'Blockquote',
            'icon' => 'format-quote',
            'keywords' => ['quote', 'blockquote'],
            'type' => BLOCK_TYPE_INNER,
            'enqueue_styles' => false,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => false,
            'example' => false,
        ],

        [
            'name' => 'Button',
            'icon' => 'admin-links',
            'keywords' => ['button', 'link', 'url'],
            'type' => BLOCK_TYPE_INNER,
            'enqueue_styles' => false,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => false,
            'example' => false,
        ],

        [
            'name' => 'Spacer',
            'icon' => 'minus',
            'keywords' => ['spacer', 'margin', 'padding'],
            'type' => BLOCK_TYPE_INNER,
            'enqueue_styles' => false,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => false,
            'example' => false,
        ],

        [
            'name' => 'Heading',
            'icon' => 'editor-textcolor',
            'keywords' => ['heading', 'headline', 'h'],
            'type' => BLOCK_TYPE_INNER,
            'enqueue_styles' => false,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => false,
            'example' => false,
        ],

        [
            'name' => 'Intro',
            'icon' => 'welcome-write-blog',
            'keywords' => ['intro', 'lead'],
            'type' => BLOCK_TYPE_INNER,
            'enqueue_styles' => false,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => false,
            'example' => false,
        ],

        [
            'name' => 'List Styles',
            'icon' => 'editor-ul',
            'keywords' => ['list-styles', 'list'],
            'type' => BLOCK_TYPE_INNER,
            'enqueue_styles' => false,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => false,
            'example' => false,
        ],

        [
            'name' => 'Panel',
            'icon' => 'schedule',
            'keywords' => ['panel'],
            'type' => BLOCK_TYPE_INNER,
            'enqueue_styles' => false,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => false,
            'example' => false,
        ],

        // example inner
        /*
        [
            'name' => 'Example inner',
            'icon' => 'welcome-widgets-menus',
            'keywords' => [],
            'type' => BLOCK_TYPE_INNER,
            'enqueue_styles' => false,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => false,
            'mode' => BLOCK_MODE_AUTO,
            'example' => false,
            'align' => false,
            'post_types' => false,
        ],
        */
    ]);
}
