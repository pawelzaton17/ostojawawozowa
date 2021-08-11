<?php

/**
 *   Crunch WordPress Filters
 *
 *   @package Crunch
 *   @since 5.1.0
 */

use enshrined\svgSanitize\Sanitizer;


/**
 * OG image Fix
 * @return {string}
 * @filter wpseo_pre_analysis_post_content
 */


function crunch_opengraph_content($val)
{
    return preg_replace("/<img[^>]+>/i", "", $val);
}

add_filter('wpseo_pre_analysis_post_content', 'crunch_opengraph_content');


/**
 * Hide ACF
 */

// 	add_filter('acf/settings/show_admin', '__return_false');


/**
 * Add "nocookie" oo wordpress oEmbeded youtube videos
 * Tags: iframe, yt, youtube, nocookie
 * @return {string} add nocookie to string
 * @filter oembed_dataparse
 */

function wpex_youtube_nocookie_oembed($return)
{
    $return = str_replace('youtube', 'youtube-nocookie', $return);
    return $return;
}

add_filter('oembed_dataparse', 'wpex_youtube_nocookie_oembed');


/**
 * German Slugs
 * Tags: language, string, word, letter, permalink, url, german
 * @return {string} Replace germany letters to normal letters
 * @filter sanitize_title
 * core: http://core.trac.wordpress.org/ticket/16905
 */

function transliterate_aeoeuess($title, $raw_title = NULL, $context = 'query')
{
    if ($raw_title != NULL) {
        $title = $raw_title;
    }

    $title = str_replace('Ä', 'ae', $title);
    $title = str_replace('ä', 'ae', $title);
    $title = str_replace('Ö', 'oe', $title);
    $title = str_replace('ö', 'oe', $title);
    $title = str_replace('Ü', 'ue', $title);
    $title = str_replace('ü', 'ue', $title);
    $title = str_replace('ẞ', 'ss', $title);
    $title = str_replace('ß', 'ss', $title);

    if ($context == 'save') {
        $title = remove_accents($title);
    }

    return $title;
}

add_filter('sanitize_title', 'transliterate_aeoeuess', 5, 3);


/**
 * Remove Default Sizes
 * Tags: images, sizes, optimization, medium, large,
 * @return {array} remove from array not used sizes
 * @filter intermediate_image_sizes_advanced
 */

function prefix_remove_default_images($sizes)
{
    unset($sizes['medium']); // 300px
    unset($sizes['large']); // 1024px
    unset($sizes['medium_large']); // 768px

    return $sizes;
}

add_filter('intermediate_image_sizes_advanced', 'prefix_remove_default_images');


/**
 * Remove Wordpress Comments
 */

/**
 * Close Comments on the front-end
 * Tags: comments, disqus
 */

add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);


/**
 * Hide Existing Comments
 * Tags: comments, disqus
 */

add_filter('comments_array', '__return_empty_array', 10, 2);


/**
 * Enable Shortcode in Text / Textarea fields ACF
 * Tags: content, shortcodes, text, textarea
 */

add_filter('acf/format_value/type=text', 'do_shortcode');
add_filter('acf/format_value/type=textarea', 'do_shortcode');


/**
 * Add Custom Block Categories for Gutenberg
 */

/**
 * Inner Blocks Category
 * @return {array} add new block category to wordpress block categories
 * @filter block_categories_all
 */

function inner_blocks_category($categories, $post)
{
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'inner-blocks',
                'title' => __('Inner Blocks', 'crunch'),
                'icon'  => 'layout',
            ),
        )
    );
}

add_filter('block_categories_all', 'inner_blocks_category', 10, 2);

/**
 * Full Width Blocks Category
 * @return {array} add new block category to wordpress block categories
 * @filter block_categories_all
 */

function full_width_categories($categories, $post)
{
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'full-width-blocks',
                'title' => __('Full Width Blocks', 'crunch'),
                'icon'  => 'tagcloud',
            ),
        )
    );
}

add_filter('block_categories_all', 'full_width_categories', 10, 2);


/**
 * Add Meta Query to Search
 */

/**
 * [list_searcheable_acf list all the custom fields we want to include in our search query]
 * @return {array} [list of custom fields]
 */

function list_searcheable_acf()
{
    $list_searcheable_acf = array("title", "sub_title", "excerpt_short", "excerpt_long", "xyz", "myACF");
    return $list_searcheable_acf;
}


// /**
//  * [advanced_custom_search search that encompasses ACF/advanced custom fields and taxonomies and split expression before request]
//  * @param  [query-part/string]      $where    [the initial "where" part of the search query]
//  * @param  [object]                 $wp_query []
//  * @return [query-part/string]      $where    [the "where" part of the search query as we customized]
//  * see https://vzurczak.wordpress.com/2013/06/15/extend-the-default-wordpress-search/
//  * credits to Vincent Zurczak for the base query structure/spliting tags section
//  */

// function advanced_custom_search($where, $wp_query)
// {
//     global $wpdb;

//     if (empty($where))
//         return $where;

//     // get search expression
//     $terms = $wp_query->query_vars['s'];

//     // explode search expression to get search terms
//     $exploded = explode(' ', $terms);
//     if ($exploded === FALSE || count($exploded) == 0)
//         $exploded = array(0 => $terms);

//     // reset search in order to rebuilt it as we whish
//     $where = '';

//     // get searcheable_acf, a list of advanced custom fields you want to search content in
//     $list_searcheable_acf = list_searcheable_acf();
//     foreach ($exploded as $tag) :
//         $where .= "
//                         AND (
//                             (${prefix}posts.post_title LIKE '%$tag%')
//                             OR (${prefix}posts.post_content LIKE '%$tag%')
//                             OR EXISTS (
//                                 SELECT * FROM ${prefix}postmeta
//                                     WHERE post_id = ${prefix}posts.ID
//                                         AND (";
//         foreach ($list_searcheable_acf as $searcheable_acf) :
//             if ($searcheable_acf == $list_searcheable_acf[0]) :
//                 $where .= " (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
//             else :
//                 $where .= " OR (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
//             endif;
//         endforeach;
//         $where .= ")
//                         )
//                         OR EXISTS (
//                             SELECT * FROM ${prefix}comments
//                             WHERE comment_post_ID = ${prefix}posts.ID
//                                 AND comment_content LIKE '%$tag%'
//                         )
//                         OR EXISTS (
//                             SELECT * FROM ${prefix}terms
//                             INNER JOIN ${prefix}term_taxonomy
//                                 ON ${prefix}term_taxonomy.term_id = ${prefix}terms.term_id
//                             INNER JOIN ${prefix}term_relationships
//                                 ON ${prefix}term_relationships.term_taxonomy_id = ${prefix}term_taxonomy.term_taxonomy_id
//                             WHERE (
//                                 taxonomy = 'post_tag'
//                                     OR taxonomy = 'category'
//                                     OR taxonomy = 'myCustomTax'
//                                 )
//                                 AND object_id = ${prefix}posts.ID
//                                 AND ${prefix}terms.name LIKE '%$tag%'
//                             )
//                         )";
//                 endforeach;
//                 return $where;
//             }
//             add_filter( 'posts_search', 'advanced_custom_search', 500, 2 );

//     return $attributes;
// }

// add_filter('wp_get_attachment_image_attributes', 'gs_change_attachment_image_markup');


/**
 * Disable XML-RPC
 */

add_filter('xmlrpc_enabled', '__return_false');


/**
 * Hide WP Version Strings from Scripts and Styles
 * Tags: security, version
 * @return {string} $src
 * @filter script_loader_src
 * @filter style_loader_src
 */

function crunch_remove_wp_version_strings($src)
{
    global $wp_version;
    parse_str(parse_url($src, PHP_URL_QUERY), $query);
    if (!empty($query['ver']) && $query['ver'] === $wp_version) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

add_filter('script_loader_src', 'crunch_remove_wp_version_strings');
add_filter('style_loader_src', 'crunch_remove_wp_version_strings');


/**
 * Hide WP version strings from generator meta tag
 * Tags: security, version
 */

function crunch_remove_version()
{
    return '';
}

add_filter('the_generator', 'crunch_remove_version');
remove_action('wp_head', 'wp_generator');

/**
 * Remove all empty div's from content
 * Tags: content, letters, signs, missing content, div, tags, empty tags
 * @param String $content
 * @return String filtered content widh doubled content
 */
function remove_empty_nodes_from_content($content)
{
    $formatted_content = container_end(false);
    $formatted_content .= apply_filters('the_content', $content);
    $formatted_content .= container_start(false);

    $doc = new DOMDocument();
    @$doc->loadHTML(mb_convert_encoding($formatted_content, 'HTML-ENTITIES', 'UTF-8'));

    $domNodeList = $doc->getElementsByTagname('*');
    $domElemsToRemove = array();

    foreach ($domNodeList as $domElement) {
        $domElement->normalize();

        /**
         * In below code all magic are happen
         * You can add conditions to condition below to avoid remove elements
         */
        if (
            /**
                 * Remove empty divs
                 */
            trim($domElement->textContent, "\xc2\xa0 \n \t ") == "" &&

            /**
                 * Don't remove element with class first-element-fix
                 */
            $domElement->getAttribute('class') !== "first-element-fix" &&

            /**
                 * Don't remov elements with these tags
                 */
            $domElement->tagName !== "img" &&
            $domElement->tagName !== "figure" &&
            $domElement->tagName !== "picture" &&

            /**
                 * Don't remove these elements inside div - these elements haven't any content value
                 * and return empty string
                 */
            ($domElement->childNodes->length === 1 && $domElement->firstChild->nodeName === "img") &&
            ($domElement->childNodes->length === 1 && $domElement->firstChild->nodeName === "figure") &&
            ($domElement->childNodes->length === 1 && $domElement->firstChild->nodeName === "picture")
        ) {
            $domElemsToRemove[] = $domElement;
        }
    }

    foreach ($domElemsToRemove as $domElement) {
        $domElement->parentNode->removeChild($domElement);
    }

    $domNodeList = $doc->getElementsByTagname('body')->item(0);
    $newNodeDocument = new DOMDocument();
    $childNodes = $domNodeList->childNodes;

    foreach ($childNodes as $domElement) {
        $newnode = $newNodeDocument->importNode($domElement, true);
        $newNodeDocument->appendChild($newnode);

    }
    $parsedNodeDocument = $newNodeDocument->saveHTML();

    echo $parsedNodeDocument;
}
/**
 * Convert special charts to UTF-8
 * Tags: emoji, special characters, missing characters
 * This function may affect emoji displaying. If you are not import data from API you can comment this code.
 */
// function remove_non_utf8_chars($content) {
//     return htmlspecialchars_decode(utf8_decode(htmlentities($content, ENT_COMPAT, 'utf-8', false)));
// }
// add_filter( 'the_content', 'remove_non_utf8_chars' );

/**
 * Add XML encoding line to the top of uploaded SVG file
 * Tags: Svg, Error
 * @param String $upload
 * @return String filtered SVG code with XML encoding line
 */
add_filter("wp_handle_upload_prefilter", function($upload) {

    if ( !empty($upload["type"]) && $upload["type"] === "image/svg+xml" ) {

        // Pass SVG Code to variable
        $contents = file_get_contents( $upload["tmp_name"] );

        if ( strpos($contents, "<?xml") === false ) {
            // Add the XML Declaration if it's missing (otherwise WordPress does not allow uploads)
            file_put_contents( $upload["tmp_name"], '<?xml version="1.0" encoding="UTF-8"?>' . $contents );

            // Create a new Sanitizer instance
            $sanitizer = new Sanitizer();

            // Pass it to the Sanitizer and get it back clean
            if ( ! $sanitizer->sanitize( $contents ) ) {
                // Return error message
                $upload['error'] = __( 'Error', $contents );
            }

        }
    }

    return $upload;

});

/**
 *  Remove the h1 tag from the WordPress editor.
 *  Tags: h1, editor, heading
 *
 *  @param   array  $settings  The array of editor settings
 *  @return  array             The modified edit settings
 */
 function remove_h1_from_editor( $settings ) {
    $settings['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre;';
    return $settings;
}

/**
 * Check if string is valid json
 */

function is_json($string) {
    return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
 }

/**
 * Add 'first-element-fix' after opening 'entry-content'
 */
add_filter( 'final_output', function( $output ) {
    if(!is_admin()) {
        $doc = new DOMDocument();
        @$doc->loadHTML( mb_convert_encoding( $output, 'HTML-ENTITIES', 'UTF-8' ) );
        $finder = new DOMXPath( $doc );
        $class_name = 'entry-content';
        $nodes = $finder->query( "//*[contains(@class, '$class_name')]" );

        foreach ( $nodes as $node ) {
            $first_element_fix_dom = $doc->createElement( 'span' );
            $first_element_fix_dom->setAttribute( 'class', 'first-element-fix' );

            $node->insertBefore( $first_element_fix_dom, $node->firstChild );
        }

        return is_json($output) ? $output : $doc->saveHTML();

    }

    return $output;
});

/* Move Yoast to bottom of page edit */

function yoasttobottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

