<?php
    /**
    *   Nav Menus
    *
    *   @package Crunch
    *   @since 3.0.0
    */

    /**
     * Add custom Wordpress navigation
     */

    	if(function_exists('register_nav_menus')) {
    		register_nav_menus(
    			array(
    				'main_navigation' => 'Main Navigation'
    			)
    		);
    	}

?>
