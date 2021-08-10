<?php

/**
 * There is a file to define all global variables ised in theme.
 * This is also good file to read all environment variables from dot files
 *
 * Use following nomenclature:
 * global $default_{scope}_{variable}
 * $default_{scope}_{variable} = {value}
 *
 * {scope} - deteremine scope where this variable is using.
 * Example values: Global/Single/Page/PostType
 *
 * {variable} - variable name
 * {value} - value
 *
 * !! Remember to set all variables as global before you assing values !!
 *
 * Examples:
 *
 * global $default_global_variable;
 * $default_global_variable = "test";
 *
 * global $default_contact_message;
 * $default_contact_message = "example message";
 *
 * $default_single_container;
 * $default_single_container = "col-md-10 col-ld-9 col-xl-8";
 */

const BLOCK_TYPE_FULL_WIDTH = 'full-width';
const BLOCK_TYPE_INNER = 'inner';

const BLOCK_MODE_AUTO = 'auto';
const BLOCK_MODE_PREVIEW = 'preview';
const BLOCK_MODE_EDIT = 'edit';

function define_global_variables()
{
    /** Set $default_container */
    global $default_container;
    $default_container = "col-md-10 col-lg-9 col-xl-8";
}

add_action("after_setup_theme", "define_global_variables");
