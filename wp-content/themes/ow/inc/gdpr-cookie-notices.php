<?php

/**
 *   GDPR Script initialization
 *   
 *   As the CCA plugin is “managing” your visitors from outside the EU, 
 *   we can ensure that, for these visitors at least, 
 *   GA will is always served and executed so “organic” information is not lost; 
 *   and CN will still block Analytics for EU visitors until acceptance.
 * 
 *   Source: https://wptest.means.us.com/cca-cookie-notice-google-analytics/
 *
 *   @package Crunch
 *   @since 5.1.1
 */

/**
 * Define default options page
 * 
 */
if (function_exists("acf_add_options_page")) {
    acf_add_options_sub_page(array(
        "page_title" => "GDPR Scripts",
        "menu_title" => "GDPR Scripts",
        "parent_slug" => "theme-general-settings",
    ));
}
/**
 * Define local acf fields for GDPR options
 * 
 */
if (function_exists("acf_add_local_field_group")) {
    acf_add_local_field_group(array(
        "key" => "group_5f1f4a126d231",
        "title" => "GDPR Cookie Notices",
        "fields" => array(
            array(
                'key' => 'field_60a6d66bbf247',
                'label' => 'How GDPR Scripts Works',
                'name' => '',
                'type' => 'message',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => 'Generally, scripts like that should be loaded only if the user will agree to that. So I added them to load only if the user will accept a cookie and privacy policy. If the privacy policy available on the website allows loading such scripts before obtaining user consent, please let me know - I will change it.',
                'new_lines' => 'wpautop',
                'esc_html' => 0,
            ),
            array(
                "key" => "field_5f1f4a127dff0",
                "label" => "Code in 'head' tag",
                "name" => "gdpr_in_head_tag",
                "type" => "textarea",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "wrapper" => array(
                    "width" => "",
                    "class" => "",
                    "id" => "",
                ),
                "default_value" => "",
                "placeholder" => "",
                "maxlength" => "",
                "rows" => "",
                "new_lines" => "",
            ),
            array(
                "key" => "field_5f1f4a127e00a",
                "label" => "Code after 'body' opening tag",
                "name" => "gdpr_after_body_opening_tag",
                "type" => "textarea",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "wrapper" => array(
                    "width" => "",
                    "class" => "",
                    "id" => "",
                ),
                "default_value" => "",
                "placeholder" => "",
                "maxlength" => "",
                "rows" => "",
                "new_lines" => "",
            ),
            array(
                "key" => "field_5f1f4a127e01a",
                "label" => "Code before 'body' ending tag",
                "name" => "gdpr_before_body_ending_tag",
                "type" => "textarea",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "wrapper" => array(
                    "width" => "",
                    "class" => "",
                    "id" => "",
                ),
                "default_value" => "",
                "placeholder" => "",
                "maxlength" => "",
                "rows" => "",
                "new_lines" => "",
            ),
        ),
        "location" => array(
            array(
                array(
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "acf-options-gdpr-scripts",
                ),
            ),
        ),
        "menu_order" => 0,
        "position" => "normal",
        "style" => "default",
        "label_placement" => "top",
        "instruction_placement" => "label",
        "hide_on_screen" => "",
        "active" => true,
        "description" => "",
    ));
}

/**
 * Get user ip based on connecting browser
 * 
 */
if (!function_exists("gdpr_get_user_ip")) {

    function gdpr_get_user_ip()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
}

/**
 * Check if user connecting from EU based on Geo Plugin API
 * API: http://www.geoplugin.net
 * 
 * @param $user_ip string
 * @return boolean
 * 
 */
if (!function_exists("gdpr_check_user_is_eu")) {

    function gdpr_check_user_is_eu($user_ip)
    {
        $geo_details = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $user_ip));

        if ($geo_details) {
            return $geo_details->geoplugin_inEU;
        }
    }
}

/**
 * Set cookie for one year
 * 
 */
if (!function_exists("gdpr_set_cookie")) {
    function gdpr_set_cookie()
    {
?> <script>
document.cookie = "cca_is_eu=1;max-age=" + 3600 * 24 * 364 + "; path=/";
</script> <?php
                }
            }

/**
 * Display script in website head
 * 
 */
if( !function_exists("gdpr_head_cookie_scripts") && function_exists('the_field')) {
    function gdpr_head_cookie_scripts() { 
    
        if(function_exists("gdpr_set_cookie")) {
            gdpr_set_cookie();
        }
    
        the_field( "gdpr_in_head_tag", "options" );
    }
}

/**
 * Display script in website body open
 * 
 */
if( !function_exists("gdpr_body_open_cookie_scripts") && function_exists('the_field')) {
    function gdpr_body_open_cookie_scripts() { 
        if(function_exists("gdpr_set_cookie")) {
            gdpr_set_cookie();
        }

                    the_field("gdpr_in_head_tag", "options");
                }
            }

/**
 * Display scripts in body footer
 */
if ( !function_exists("gdpr_footer_cookie_scripts") && function_exists('the_field')) {
    function gdpr_footer_cookie_scripts() { 
        if(function_exists("gdpr_set_cookie")) {
            gdpr_set_cookie();
        }

                    the_field("gdpr_after_body_opening_tag", "options");
                }
            }

            /**
             * Display scripts in body footer
             */
            if (!function_exists("gdpr_footer_cookie_scripts")) {
                function gdpr_footer_cookie_scripts()
                {
                    if (function_exists("gdpr_set_cookie")) {
                        gdpr_set_cookie();
                    }

                    the_field("gdpr_before_body_ending_tag", "options");
                }
            }

            /** 
             * Check if user cames from EU and display fields
             * 
             */
            if (function_exists("get_field") && (function_exists("gdpr_check_user_is_eu") && !gdpr_check_user_is_eu(gdpr_get_user_ip())) || (function_exists("cn_cookies_accepted") && cn_cookies_accepted())) {
                if (get_field("gdpr_in_head_tag", "options")) {
                    add_action("wp_head", "gdpr_head_cookie_scripts");
                }

                if (get_field("gdpr_after_body_opening_tag", "options")) {
                    add_action("wp_body_open", "gdpr_body_open_cookie_scripts");
                }

                if (get_field("gdpr_before_body_ending_tag", "options")) {
                    add_action("wp_footer", "gdpr_footer_cookie_scripts");
                }
            }

                    ?>