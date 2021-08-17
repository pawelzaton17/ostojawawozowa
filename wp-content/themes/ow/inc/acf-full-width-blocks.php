<?php

/**
 *   Crunch ACF Blocks
 *
 *   @package Crunch
 *   @since 5.1.1
 */

add_action('acf/init', 'crunch_acf_full_width_blocks');

function crunch_acf_full_width_blocks()
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
            'name' => 'Example',
            'icon' => 'editor-justify',
            'keywords' => ['example'],
            'type' => BLOCK_TYPE_FULL_WIDTH,
            'enqueue_styles' => false,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => false,
            'mode' => BLOCK_MODE_AUTO,
            'example' => true,
        ],

        [
            'name' => 'Cols',
            'icon' => 'editor-justify',
            'keywords' => ['cols', 'three', 'kolumny', 'trzy'],
            'type' => BLOCK_TYPE_FULL_WIDTH,
            'enqueue_styles' => true,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => false,
            'mode' => BLOCK_MODE_AUTO,
            'example' => true,
        ],


        [
            'name' => 'Content with image',
            'icon' => 'editor-justify',
            'keywords' => ['Content with image', 'Zdjecie', 'lokalizacja', 'deweloper'],
            'type' => BLOCK_TYPE_FULL_WIDTH,
            'enqueue_styles' => true,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => false,
            'mode' => BLOCK_MODE_AUTO,
            'example' => true,
        ],

        [
            'name' => 'Block numbers',
            'icon' => 'editor-justify',
            'keywords' => ['Block numbers',],
            'type' => BLOCK_TYPE_FULL_WIDTH,
            'enqueue_styles' => true,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => false,
            'mode' => BLOCK_MODE_AUTO,
            'example' => true,
         ],



        /*
        [
            'name' => 'Example',
            'icon' => 'welcome-widgets-menus',
            'keywords' => [],
            'type' => BLOCK_TYPE_FULL_WIDTH,
            'enqueue_styles' => false,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => false,
            'mode' => BLOCK_MODE_AUTO,
            'example' => true,
            'align' => false,
            'post_types' => false,
        ],
        */

    ]);
}
