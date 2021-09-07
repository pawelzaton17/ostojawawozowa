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
        add_image_size( '335-450', 335, 450, false);
        add_image_size( '335-450-2x', 335*2, 450, false);
        add_image_size( '19-19', 19, 19, false);
        add_image_size( '19-19-2x', 19*2, 19, false);

    /**
     * Set Post Thumbnail dimension
     */

    	set_post_thumbnail_size(250, 250, true);

?>
