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
            'enable_assets_for_admin' => true,
            'mode' => BLOCK_MODE_AUTO,
            'example' => false,
        ],

        [
            'name' => 'Cols',
            'icon' => 'editor-justify',
            'keywords' => ['cols', 'three', 'kolumny', 'trzy'],
            'type' => BLOCK_TYPE_FULL_WIDTH,
            'enqueue_styles' => true,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => true,
            'mode' => BLOCK_MODE_AUTO,
            'example' => false,
        ],

        [
            'name' => 'Content with image',
            'icon' => 'editor-justify',
            'keywords' => ['Content with image', 'Zdjecie', 'lokalizacja', 'deweloper'],
            'type' => BLOCK_TYPE_FULL_WIDTH,
            'enqueue_styles' => true,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => true,
            'mode' => BLOCK_MODE_AUTO,
            'example' => true,
        ],

        [
            'name' => 'List',
            'icon' => 'editor-justify',
            'keywords' => ['List', 'Lista lokali'],
            'type' => BLOCK_TYPE_FULL_WIDTH,
            'enqueue_styles' => true,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => true,
            'mode' => BLOCK_MODE_AUTO,
            'example' => false,
        ],

        [
            'name' => 'Numbers',
            'icon' => 'editor-justify',
            'keywords' => ['Numbers', 'Istotne wartości osiedla', 'Standard wykonania', 'Wartosci osiedla'],
            'type' => BLOCK_TYPE_FULL_WIDTH,
            'enqueue_styles' => true,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => true,
            'mode' => BLOCK_MODE_AUTO,
            'example' => false,
        ],

        [
            'name' => 'Hero',
            'icon' => 'editor-justify',
            'keywords' => ['Hero'],
            'type' => BLOCK_TYPE_FULL_WIDTH,
            'enqueue_styles' => true,
            'enqueue_scripts' => true,
            'enable_assets_for_admin' => true,
            'mode' => BLOCK_MODE_AUTO,
            'example' => false,
        ],

        [
            'name' => 'Variants',
            'icon' => 'editor-justify',
            'keywords' => ['Variants', 'Warianty', 'Aranżacje'],
            'type' => BLOCK_TYPE_FULL_WIDTH,
            'enqueue_styles' => true,
            'enqueue_scripts' => true,
            'enable_assets_for_admin' => true,
            'mode' => BLOCK_MODE_AUTO,
            'example' => false,
        ],

        [
            'name' => 'Investments',
            'icon' => 'editor-justify',
            'keywords' => ['Investments', 'Inwestycje'],
            'type' => BLOCK_TYPE_FULL_WIDTH,
            'enqueue_styles' => true,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => true,
            'mode' => BLOCK_MODE_AUTO,
            'example' => false,
        ],

        [
            'name' => 'CTA',
            'icon' => 'editor-justify',
            'keywords' => ['CTA', 'Call-to-action', 'Finansowanie'],
            'type' => BLOCK_TYPE_FULL_WIDTH,
            'enqueue_styles' => false,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => true,
            'mode' => BLOCK_MODE_AUTO,
            'example' => false,
        ],

        [
            'name' => 'About',
            'icon' => 'editor-justify',
            'keywords' => ['About', 'O nas', 'O developerze'],
            'type' => BLOCK_TYPE_FULL_WIDTH,
            'enqueue_styles' => true,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => true,
            'mode' => BLOCK_MODE_AUTO,
            'example' => false,
        ],

        [
            'name' => 'Heading with content',
            'icon' => 'editor-justify',
            'keywords' => ['Heading with content', 'Arrangement', 'Heading', 'Content'],
            'type' => BLOCK_TYPE_FULL_WIDTH,
            'enqueue_styles' => true,
            'enqueue_scripts' => false,
            'enable_assets_for_admin' => true,
            'mode' => BLOCK_MODE_AUTO,
            'example' => false,
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
