<?php
    /**
    *   Custom Functions
    *
    *   @package Crunch
    *   @since 5.0.0
    */

        /**
         * Show the slug functions
         */

            function the_slug($echo=true){
            	$slug = basename(get_permalink());
                do_action('before_slug', $slug);
                $slug = apply_filters('slug_filter', $slug);
                if( $echo ) echo $slug;
                do_action('after_slug', $slug);
                return $slug;
            }


        /**
         * Get the slug function
         */

            function get_the_slug() {
                global $post;

                if ( is_single() || is_page() ) {
                    return $post->post_name;
                } else {
                    return "";
                }
            }


        /**
         * Create slug
         */

            function create_slug($string, $connector = '-'){
                $slug = preg_replace('/[^A-Za-z0-9-]+/', $connector, $string);
                $slug = strtolower($slug);
                return $slug;
            }


        /**
         * Custom pagination
         */

            function custom_pagination($loop = "") {
                global $wp_query;
                if(!empty($loop)) {
                    $wp_query = $loop;
                }
                $big = 999999999; // need an unlikely integer
                $pages = paginate_links(
                    array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total' => $wp_query->max_num_pages,
                        'prev_next' => false,
                        'type'  => 'array',
                    )
                );

                $prev_link = get_previous_posts_link(( '<svg class="d-block" enable-background="new 0 0 4 7" width="8" height="14" viewBox="0 0 4 7" xmlns="http://www.w3.org/2000/svg"><path d="m.5.5 3 3-3 3" fill="none" stroke="#F06E0D" stroke-linecap="round" stroke-linejoin="round"/></svg>'));

                $next_link = get_next_posts_link(( '<svg class="d-block" enable-background="new 0 0 4 7" width="8" height="14" viewBox="0 0 4 7" xmlns="http://www.w3.org/2000/svg"><path d="m.5.5 3 3-3 3" fill="none" stroke="#F06E0D" stroke-linecap="round" stroke-linejoin="round"/></svg>'));


                if( is_array( $pages ) ) {
                    $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
                    echo '<nav aria-label="Page navigation">
                            <ul class="crunch-pagination d-flex align-items-center justify-content-center c-mt-7 line-height-1 font-weight-semibold">';

                            if($prev_link) { echo "<li class=\"page-item prev c-mr-2\">"; }

                                echo $prev_link;

                            if($prev_link) { echo "</li>"; }

                            foreach ( $pages as $page ) {
                                echo "<li class=\"page-item c-mx-2 font-weight-medium line-height-1\">$page</li>";
                            }

                            if($next_link) { echo "<li class=\"page-item next c-ml-2\">"; }

                                echo $next_link;

                            if($next_link) { echo "</li>"; }
                    echo '</ul>
                    </nav>';
                }
            }


        /**
         * Author full name
         */

            function author_full_name() {
                global $post;
                $fname = get_the_author_meta('first_name');
                $lname = get_the_author_meta('last_name');
                $full_name = '';

                if( empty($fname)){
                    return $lname;
                } elseif( empty( $lname )){
                    return $fname;
                } else {
                    return "{$fname} {$lname}";
                }
            }


        /**
         * Check if more than one page exists
         */

            function show_posts_nav() {
                global $wp_query;
                return ($wp_query->max_num_pages > 1);
            }


        /**
         * Cut Text
         */

            function cut_text($string, $limit = 150) {
                if(strlen($string) > $limit) {
                    $string = wp_strip_all_tags($string);
                    $pos = strpos($string, ' ', $limit);
                    $string = substr($string,0,$pos ).'...';
                }
                echo $string;
            }


        /**
         * Registers acf block
         *
         * @param string $name
         * @param string $icon
         * @param array $keywords
         * @param string $type
         * @param bool $enqueueStyles
         * @param bool $enqueueScripts
         * @param bool $enableAssetsForAdmin
         * @param string $mode
         * @param bool $example
         * @param bool $align
         *
         */

            function crunch_register_block(
                $name,
                $icon = 'welcome-widgets-menus',
                $keywords = [],
                $type = BLOCK_TYPE_FULL_WIDTH,
                $enqueueStyles = true,
                $enqueueScripts = true,
                $enableAssetsForAdmin = false,
                $mode = BLOCK_MODE_EDIT,
                $example = false,
                $align = false,
                $postTypes = false
            ) {

                /**
                 * Check function exists
                 */
                if (function_exists('acf_register_block_type')) {

                    /**
                     * Register example block
                     */

                    $slug = create_slug($name);
                    $snakeSlug = create_slug($name, '_');

                    $attr = [
                        'name'              => $slug,
                        'title'             => __($name),
                        'description'       => __('Custom ' . $name . ' Block.'),
                        'render_template'   => get_template_directory() . '/template-parts/blocks/' . $type . '/' . $slug . '.php',
                        'enqueue_assets'    => function () use ($slug, $snakeSlug, $enqueueStyles, $enqueueScripts, $enableAssetsForAdmin) {

                            /**
                             * Styles
                             */
                            if ($enqueueStyles) {

                                $block_styles_uri = 'dist/acf_block_' . $snakeSlug . '.css';
                                $block_styles_ver = date("ymd-Gis", filemtime(get_template_directory_uri() . '../../' . $block_styles_uri));

                                if (!is_admin() || (is_admin() && $enableAssetsForAdmin)) {
                                    wp_enqueue_style($slug.'-block-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);
                                }

                            }

                            /**
                             * Scripts
                             */
                            if ($enqueueScripts) {

                                $block_scripts_uri = 'dist/acf_block_' . $snakeSlug . '.bundle.js';
                                $block_scripts_ver = date("ymd-Gis", filemtime(get_template_directory_uri() . '../../' . $block_scripts_uri));

                                if (!is_admin() || (is_admin() && $enableAssetsForAdmin)) {
                                    wp_enqueue_script($slug.'-block-scripts', get_template_directory_uri() . '/' . $block_scripts_uri, $block_scripts_ver, true);
                                }

                            }
                        },
                        'icon'              => $icon,
                        'mode'              => $mode,
                        'supports'          => ['align' => $align, 'anchor' => true],
                        'category'          => $type.'-blocks',
                        'keywords'          => $keywords,
                    ];

                    if ($example) {
                        $attr = array_merge($attr, [
                            'example'           => [
                                'attributes' => [
                                    'mode' => 'preview',
                                    'data' => [
                                        '__is_preview' => true,
                                    ]
                                ]
                            ],
                        ]);
                    }

                    if ($postTypes && is_array($postTypes) && count($postTypes) > 0) {
                        $attr = array_merge($attr, [
                            'post_types' => $postTypes,
                        ]);
                    }

                    acf_register_block_type($attr);

                }

            }

        /**
         * Register acf blocks
         *
         * @param array $settings
         */

            function crunch_register_blocks($settings = []) {
                if(count($settings) == 0) return;

                foreach($settings as $settingsItem){
                    crunch_register_block(
                        $settingsItem['name'],
                        $settingsItem['icon'] ?? 'welcome-widgets-menus',
                        $settingsItem['keywords'] ?? [],
                        $settingsItem['type'] ?? BLOCK_TYPE_FULL_WIDTH,
                        $settingsItem['enqueue_styles'] ?? true,
                        $settingsItem['enqueue_scripts'] ?? true,
                        $settingsItem['enable_assets_for_admin'] ?? false,
                        $settingsItem['mode'] ?? BLOCK_MODE_EDIT,
                        $settingsItem['example'] ?? true,
                        $settingsItem['align'] ?? false,
                        $settingsItem['post_types'] ?? false
                    );
                }
            }
    ?>
