<?php
    /**
    *   Options Page
    *
    *   @package Crunch
    *   @since 4.2.0
    */


    /**
     * Add options page to Wordpress with ACF
     */

	if( function_exists('acf_add_options_page') ) {
	    acf_add_options_page(array(
	        'page_title'    => 'Options',
	        'menu_title'    => 'Options',
	        'menu_slug'     => 'theme-general-settings',
	        'capability'    => 'edit_posts',
	        'redirect'      => false
	    ));

        acf_add_options_sub_page(array(
            'page_title'    => 'Header',
            'menu_title'    => 'Header',
            'parent_slug'   => 'theme-general-settings',
        ));

        acf_add_options_sub_page(array(
            'page_title'    => 'Additional Code',
            'menu_title'    => 'Additional Code',
            'parent_slug'   => 'theme-general-settings',
        ));

	    acf_add_options_sub_page(array(
	        'page_title'    => 'Error 404',
	        'menu_title'    => 'Error 404',
	        'parent_slug'   => 'theme-general-settings',
	    ));

	    acf_add_options_sub_page(array(
	        'page_title'    => 'CTA',
	        'menu_title'    => 'CTA',
	        'parent_slug'   => 'theme-general-settings',
	    ));

        acf_add_options_sub_page(array(
            'page_title'    => 'Footer',
            'menu_title'    => 'Footer',
            'parent_slug'   => 'theme-general-settings',
        ));
	}

?>
