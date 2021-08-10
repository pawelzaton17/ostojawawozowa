<?php

/**
 *   Crunch WordPress Actions
 *
 *   @package Crunch
 *   @since 4.1.0
 */

/**
 * Widget areas
 */

// if ( ! function_exists( 'crunch_sidebar_widgets' ) ) {

// 	function crunch_sidebar_widgets() {
// 		register_sidebar(array(
// 	  		'id' => 'sidebar-widgets',
// 	  		'name' => __( 'Sidebar widgets', 'crunch' ),
// 	  		'description' => __( 'Drag widgets to this sidebar container.', 'crunch' ),
// 	  		'before_widget' => '<div class="col-md-3"><section id="%1$s" class="widget %2$s">',
// 	  		'after_widget' => '</section></div>',
// 	  		'before_title' => '<h3 class="widget__title">',
// 	  		'after_title' => '</h3>',
// 		));

// 		register_sidebar(array(
// 	  		'id' => 'footer-widgets',
// 	  		'name' => __( 'Footer widgets', 'crunch' ),
// 	  		'description' => __( 'Drag widgets to this footer container', 'crunch' ),
// 	  		'before_widget' => '<div class="col-md-3"><section id="%1$s" class="widget %2$s">',
// 	  		'after_widget' => '</section></div>',
// 	  		'before_title' => '<h3 class="widget__title">',
// 	  		'after_title' => '</h3>',
// 		));
// 	}

// 	add_action( 'widgets_init', 'crunch_sidebar_widgets' );

// }


/**
 * ACF Google Maps API Key
 */

// function my_acf_init() {

//     acf_update_setting('google_api_key', 'XXXXXXXXXXXXXXXXXXXX');
// }

// add_action('acf/init', 'my_acf_init');


/**
 * Init Sidebar
 */

// function crunch_widgets_init() {
//     register_sidebar(
//         array(
//             'name' => __( 'Blog', 'crunch' ),
//             'id' => 'sidebar-blog',
//             'description' => __( 'Widgets in this section are displayed on blog pages.', 'crunch' ),
//             'before_widget' => '<div id="%1$s" class="widget %2$s">',
//         'after_widget'  => '</div>',
//         'before_title'  => '<h2 class="widget__title">',
//         'after_title'   => '</h2>',
//         )
//     );
// }

// add_action( 'widgets_init', 'crunch_widgets_init' );


/**
 * Removing standard posts from WP Admin
 */

// function my_remove_menu_pages() {
//     remove_menu_page('edit.php');
// }

// add_action( 'admin_menu', 'my_remove_menu_pages' );


/**
 * Deregister WP Embed
 */

function my_deregister_scripts()
{
    wp_deregister_script('wp-embed');
}

add_action('wp_footer', 'my_deregister_scripts');


/**
 * Disable WP Emoji
 */

function disable_emojicons_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

function disable_wp_emojicons()
{
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');

    add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce');
}

add_action('init', 'disable_wp_emojicons');


/**
 * AJAX Load More
 */

// function post_type_ajax_load_more(){
//     // prepare our arguments for the query
//     $args = json_decode( stripslashes( $_POST['query'] ), true );

//     $current_post_type = $args['post_type'];

//     $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
//     $args['post_status'] = 'publish';
//     $args['posts_per_page'] = 4;

//     if ($current_post_type == 'event') {
//         $args['meta_query'] = array(
//             array(
//                 'key' => 'event_date',
//                 'value' => $today,
//                 'compare' => '>'
//             ),
//         );
//         $args['meta_key'] = 'event_date';
//         $args['orderby'] = 'meta_value';
//     }

//     if ($current_post_type == 'case_study') $args['orderby'] = 'menu_order';

//     // it is always better to use WP_Query but not here
//     query_posts( $args );

//     if ($current_post_type == 'case_study' || $current_post_type == 'expert_thought') $i = 5;
//     if( have_posts() ) :

//         // run the loop
//         while( have_posts() ): the_post();

//             if ($current_post_type == 'case_study') {
//                 include(locate_template('template-parts/components/post-preview-case-study.php'));
//             } elseif ($current_post_type == 'expert_thought') {
//                 include(locate_template('template-parts/components/post-preview-expert-thought.php'));
//             } else {
//                 include(locate_template('template-parts/components/post-preview-default.php'));
//             }

//             if ($current_post_type == 'case_study' || $current_post_type == 'expert_thought') $i++;
//         endwhile;

//     endif;
//     die; // here we exit the script and even no wp_reset_query() required!
// }

// add_action('wp_ajax_loadmore', 'post_type_ajax_load_more'); // wp_ajax_{action}
// add_action('wp_ajax_nopriv_loadmore', 'post_type_ajax_load_more'); // wp_ajax_nopriv_{action}


/**
 * Set post type number
 */

/**
 * Event Archive
 */

// function event_post_per_page( $query ) {
// if( is_post_type_archive( 'event' ) && !is_admin() ) {
//         $query->set( 'posts_per_page', '6' );
//     }
// }

// add_action( 'pre_get_posts', 'event_post_per_page' );


/**
 * Remove type attribute type for Javascript and style
 */

function prefix_output_buffer_start()
{
    ob_start("prefix_output_callback");
}

function prefix_output_callback($buffer)
{
    return preg_replace("%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer);
}

add_action('wp_loaded', 'prefix_output_buffer_start');


/**
 * Hide unnecessary wp-admin-bar elements
 */

function shapeSpace_remove_toolbar_nodes($wp_admin_bar)
{
    $wp_admin_bar->remove_node('comments');
    $wp_admin_bar->remove_node('customize');
    $wp_admin_bar->remove_node('updates');
    $wp_admin_bar->remove_node('wpseo-menu');
}

add_action('admin_bar_menu', 'shapeSpace_remove_toolbar_nodes', 999);


/**
 * Remove Wordpress Comments
 */

add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;

    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

/**
 * Function will container
 */
function container_start($display)
{
    $template_elements = "</div></div></div></div>";

    if ($display === false) {
        return $template_elements;
    }

    echo $template_elements;
}
add_action("container_start", 'container_start');

/**
 * Function will open container
 */
function container_end($display)
{
    global $default_container;
    $template_elements = '<div class="container"><div class="row"><div class="' . $default_container . ' mx-auto"><div class="entry-content">';

    if ($display === false) {
        return $template_elements;
    }

    echo $template_elements;
}
add_action('container_end', 'container_end');


/**
 * Remove meta generator tag
 */

// global $sitepress; Use if there's WPML plugin installted
remove_action('wp_head', 'wp_generator');
// remove_action( 'wp_head', array( $sitepress, 'meta_generator_tag' ) ); Use if there's WPML plugin installted

/**
 * Block phishing and clickjacking
 */
function block_frames() {
    header( 'X-FRAME-OPTIONS: SAMEORIGIN' );
}
add_action( 'send_headers', 'block_frames', 10 );