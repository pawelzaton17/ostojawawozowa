<?php
    /**
    *   Custom image sizes
    *
    *   @package Crunch
    *   @since 4.2.0
    */

    /**
     * Specific image dimensions
     */

    	// add_image_size( 'image-type-title', 'X', 'X', true);
        add_image_size( '1920-auto', 1920);
        add_image_size( '1920-auto-2x', 1920*2);


    /**
     * Set Post Thumbnail dimension
     */

    	set_post_thumbnail_size(250, 250, true);

?>
