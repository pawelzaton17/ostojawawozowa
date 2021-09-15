<?php

/**
 *   Enqueue scripts
 *
 *   @package Crunch
 *   @since 5.1.1
 */

/**
 * Enqueue for Wordpress Backend
 */

function admin_entry_content_for_wordpress_editor_script_uri()
{
    wp_enqueue_script('admin-entry-content-for-wordpress-editor-script', get_template_directory_uri() . '/dist/entry_content_for_wordpress_editor.bundle.js', false, '1.0');
}
add_action('admin_enqueue_scripts', 'admin_entry_content_for_wordpress_editor_script_uri');


function admin_entry_content_for_wordpress_editor_styles_uri()
{
    wp_enqueue_style('admin-entry-content-for-wordpress-editor-styles', get_theme_file_uri('/dist/entry_content_for_wordpress_editor.css'), false);
}
add_action('enqueue_block_editor_assets', 'admin_entry_content_for_wordpress_editor_styles_uri');


/**
 * Enqueue Crunch Styles and Scripts
 */

if (!function_exists('crunch_enqueue_scripts')) :
    function crunch_enqueue_scripts()
    {

        $in_footer = apply_filters('crunch_load_js_in_footer', true);

        /**
         * Update WordPress jQuery & jQuery Migrate
         */
        wp_deregister_script( 'jquery-core' );
        wp_enqueue_script( 'jquery-core', "https://code.jquery.com/jquery-3.5.0.min.js", array(), '3.5.0' );
        wp_deregister_script( 'jquery-migrate' );
        wp_enqueue_script( 'jquery-migrate', "https://code.jquery.com/jquery-migrate-3.2.0.min.js", array(), '3.2.0' );

        /**
         * Default Page
         */

        /**
         * Styles
         */

        $default_page_styles_uri = 'dist/default_page.css';

        if ((is_page() || is_front_page() || is_singular()) && file_exists(plugin_dir_path(__FILE__) . '../' . $default_page_styles_uri)) {
            $default_page_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $default_page_styles_uri));

            wp_enqueue_style('default-page-styles', get_template_directory_uri() . '/' . $default_page_styles_uri, false, $default_page_styles_ver);
        }


        /**
         * Scripts
         */

        $default_page_scripts_uri = 'dist/default_page.bundle.js';

        if ((is_page() || is_front_page() || is_singular()) && file_exists(plugin_dir_path(__FILE__) . '../' . $default_page_scripts_uri)) {
            $default_page_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $default_page_scripts_uri));

            wp_enqueue_script('default-page-scripts', get_template_directory_uri() . '/' . $default_page_scripts_uri, '', $default_page_scripts_ver, $in_footer);
        }

        /**
         * Vendors
         */

        /**
         * Styles
         */

        $vendor_styles_uri = 'dist/vendor.css';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $vendor_styles_uri)) {
            $vendor_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $vendor_styles_uri));

            wp_enqueue_style('vendor-styles', get_template_directory_uri() . '/' . $vendor_styles_uri, false, $vendor_styles_ver);
        }


        /**
         * Scripts
         */

        $vendors_scripts_uri = 'dist/vendor.bundle.js';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $vendors_scripts_uri)) {
            $vendor_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $vendors_scripts_uri));

            wp_enqueue_script('vendor-scripts', get_template_directory_uri() . '/' . $vendors_scripts_uri, '', $vendor_scripts_ver, $in_footer);
        }

        /**
         * Gravity Forms
         */

        /**
         * Styles
         */

        $gravity_forms_styles_uri = 'dist/gravity_forms.css';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $gravity_forms_styles_uri)) {
            $gravity_forms_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $gravity_forms_styles_uri));

            wp_enqueue_style('gravity-forms-styles', get_template_directory_uri() . '/' . $gravity_forms_styles_uri, false, $gravity_forms_styles_ver);
        }


        /**
         * Scripts
         */

        $gravity_forms_scripts_uri = 'dist/gravity_forms.bundle.js';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $gravity_forms_scripts_uri)) {
            $gravity_forms_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $gravity_forms_scripts_uri));

            wp_enqueue_script('gravity-forms-scripts', get_template_directory_uri() . '/' . $gravity_forms_scripts_uri, '', $gravity_forms_scripts_ver, $in_footer);
        }

        /**
         * ACF Block Cols
         */

        /**
         * Styles
         */

        $block_cols_styles_uri = 'dist/acf_block_cols.css';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $block_cols_styles_uri)) {
            $block_cols_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_cols_styles_uri));

            wp_enqueue_style('acf-block-cols', get_template_directory_uri() . '/' . $block_cols_styles_uri, false, $block_cols_styles_ver);
        }


        /**
         * ACF Block Content with image
         */

        /**
         * Styles
         */

        $block_content_with_image_styles_uri = 'dist/acf_block_content_with_image.css';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $block_content_with_image_styles_uri)) {
            $block_content_with_image_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_content_with_image_styles_uri));

            wp_enqueue_style('acf-block-content-with-image', get_template_directory_uri() . '/' . $block_content_with_image_styles_uri, false, $block_content_with_image_styles_ver);
        }

        /**
         * ACF Block Investments
         */

        /**
         * Styles
         */

        $block_investments_uri = 'dist/acf_block_investments.css';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $block_investments_uri)) {
            $block_investments_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_investments_uri));

            wp_enqueue_style('acf-block-investments', get_template_directory_uri() . '/' . $block_investments_uri, false, $block_investments_styles_ver);
        }

        /**
         * ACF Block Hero
         */

        /**
         * Styles
         */

        $block_hero_styles_uri = 'dist/acf_block_hero.css';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $block_hero_styles_uri)) {
            $block_hero_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_hero_styles_uri));

            wp_enqueue_style('acf-block-hero', get_template_directory_uri() . '/' . $block_hero_styles_uri, false, $block_hero_styles_ver);
        }

        /**
         * ACF Block about
         */

        /**
         * Styles
         */

        $block_about_styles_uri = 'dist/acf_block_about.css';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $block_about_styles_uri)) {
            $block_about_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_about_styles_uri));

            wp_enqueue_style('acf-block-about', get_template_directory_uri() . '/' . $block_about_styles_uri, false, $block_about_styles_ver);
        }

        /**
         * ACF Block Heading with content
         */

        /**
         * Styles
         */

        $block_heading_with_content_styles_uri = 'dist/acf_block_heading_with_content.css';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $block_heading_with_content_styles_uri)) {
            $block_heading_with_content_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_heading_with_content_styles_uri));

            wp_enqueue_style('acf-block-heading-with-content', get_template_directory_uri() . '/' . $block_heading_with_content_styles_uri, false, $block_heading_with_content_styles_ver);
        }

        /**
         * Scripts
         */

        $block_hero_scripts_uri = 'dist/acf_block_hero.bundle.js';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $block_hero_scripts_uri)) {
            $block_hero_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_hero_scripts_uri));

            wp_enqueue_script('acf-block-hero-scripts', get_template_directory_uri() . '/' . $block_hero_scripts_uri, '', $block_hero_scripts_ver);
        }

        /**
         * ACF Block Map
         */

        /**
         * Styles
         */

        $block_map_styles_uri = 'dist/acf_block_map.css';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $block_map_styles_uri)) {
            $block_map_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_map_styles_uri));

            wp_enqueue_style('acf-block-heading-with-content', get_template_directory_uri() . '/' . $block_map_styles_uri, false, $block_map_styles_ver);
        }

        /**
         * Scripts
         */

        $block_map_scripts_uri = 'dist/acf_block_map.bundle.js';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $block_map_scripts_uri)) {
            $block_map_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_map_scripts_uri));

            wp_enqueue_script('acf-block-map-scripts', get_template_directory_uri() . '/' . $block_map_scripts_uri, '', $block_map_scripts_ver);
        }

        /**
         * ACF Block List
         */

        /**
         * Styles
         */

        $block_list_uri = 'dist/acf_block_list.css';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $block_list_uri)) {
            $block_list_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_list_uri));

            wp_enqueue_style('acf-block-content-with-image', get_template_directory_uri() . '/' . $block_list_uri, false, $block_list_ver);
        }

        /**
         * ACF Block Numbers
         */

        /**
         * Styles
         */

        $block_numbers_uri = 'dist/acf_block_numbers.css';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $block_numbers_uri)) {
            $block_numbers_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_numbers_uri));

            wp_enqueue_style('acf-block-numbers', get_template_directory_uri() . '/' . $block_numbers_uri, false, $block_numbers_ver);
        }

        /**
         * ACF Block Variants
         */

        /**
         * Styles
         */

        $block_variants_uri = 'dist/acf_block_variants.css';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $block_variants_uri)) {
            $block_variants_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_variants_uri));

            wp_enqueue_style('acf-block-variants', get_template_directory_uri() . '/' . $block_variants_uri, false, $block_variants_ver);
        }

        /**
         * ACF Block Image with content
         */

        /**
         * Styles
         */

        $block_image_with_content_styles_uri = 'dist/acf_block_image_with_content.css';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $block_image_with_content_styles_uri)) {
            $block_image_with_content_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_image_with_content_styles_uri));

            wp_enqueue_style('acf-block-image_with_content', get_template_directory_uri() . '/' . $block_image_with_content_styles_uri, false, $block_image_with_content_styles_ver);
        }

        /**
         * ACF Block Calendar
         */

        /**
         * Styles
         */

        $block_calendar_styles_uri = 'dist/acf_block_calendar.css';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $block_calendar_styles_uri)) {
            $block_calendar_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_calendar_styles_uri));

            wp_enqueue_style('acf-block-calendar', get_template_directory_uri() . '/' . $block_calendar_styles_uri, false, $block_calendar_styles_ver);
        }


        /**
         * Scripts
         */

        $block_variants_scripts_uri = 'dist/acf_block_variants.bundle.js';

        if (file_exists(plugin_dir_path(__FILE__) . '../' . $block_variants_scripts_uri)) {
            $block_variants_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_variants_scripts_uri));

            wp_enqueue_script('acf-block-variants-scripts', get_template_directory_uri() . '/' . $block_variants_scripts_uri, '', $block_variants_scripts_ver);
        }


        /**
         * Error 404
         */

        /**
         * Styles
         */

        $error_404_styles_uri = 'dist/error_404.css';

        if (is_404() && file_exists(plugin_dir_path(__FILE__) . '../' . $error_404_styles_uri)) {
            $error_404_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $error_404_styles_uri));

            wp_enqueue_style('error-404-styles', get_template_directory_uri() . '/' . $error_404_styles_uri, false, $error_404_styles_ver);
        }


        /**
         * Scripts
         */

        $error_404_scripts_uri = 'dist/error_404.bundle.js';

        if (is_404() && file_exists(plugin_dir_path(__FILE__) . '../' . $error_404_scripts_uri)) {
            $error_404_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $error_404_scripts_uri));

            wp_enqueue_script('error-404-scripts', get_template_directory_uri() . '/' . $error_404_scripts_uri, '', $error_404_scripts_ver, $in_footer);
        }


        /**
         * Archive Default Post
         */

        /**
         * Styles
         */

        $archive_default_post_styles_uri = 'dist/archive_default_post.css';

        if ((is_home() || is_archive()) && file_exists(plugin_dir_path(__FILE__) . '../' . $archive_default_post_styles_uri)) {
            $archive_default_post_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $archive_default_post_styles_uri));

            wp_enqueue_style('archive-default-post-styles', get_template_directory_uri() . '/' . $archive_default_post_styles_uri, false, $archive_default_post_styles_ver);
        }


        /**
         * Scripts
         */

        $archive_default_post_scripts_uri = 'dist/archive_default_post.bundle.js';

        if ((is_home() || is_archive()) && file_exists(plugin_dir_path(__FILE__) . '../' . $archive_default_post_scripts_uri)) {
            $archive_default_post_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $archive_default_post_scripts_uri));

            wp_enqueue_script('archive-default-post-scripts', get_template_directory_uri() . '/' . $archive_default_post_scripts_uri, '', $archive_default_post_scripts_ver, $in_footer);
        }

        if (!is_user_logged_in()) wp_deregister_style('dashicons');
    }

    add_action('wp_enqueue_scripts', 'crunch_enqueue_scripts');
endif;
