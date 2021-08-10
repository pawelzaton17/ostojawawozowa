<?php

/**
 *   Crunch Gravity Forms Filters
 *
 *   Table of contents:
 *   - Changes the Default Gravity Forms AJAX Spinner to Transparent Image
 *   - Replace Input to Button for Gravity Forms Plugin
 *   - Populate ACF select field options with Gravity Forms forms
 *   - Populate ACF select field options with Nav Menus
 *   - Populate ACF select/checkbox/radio field options with custom options set in Options page
 *
 *   @package Crunch
 *   @since 6.1.0
 */

/**
 * Changes the Default Gravity Forms AJAX Spinner to Transparent Image (The Spinner has styles in Gravity Form Styles)
 * @return {string} transparent image string
 * @filter gform_ajax_spinner_url
 */

function ns_io_custom_gforms_spinner( $src ) {
    return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
}

add_filter( 'gform_ajax_spinner_url', 'ns_io_custom_gforms_spinner' );


/**
 * Replace Input to Button for Gravity Forms Plugin
 * @return {object} return new button
 * @filter gform_next_button
 * @filter gform_previous_button
 * @filter gform_submit_button
 * @filter gform_send_resume_link_button
 */

function input_to_button( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadHTML( $button );
    $textFormated = $form['button']['text'];
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $new_button = $dom->createElement( 'button' );
    $new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
    $input->removeAttribute( 'value' );
    foreach( $input->attributes as $attribute ) {
        $new_button->setAttribute( $attribute->name, $attribute->value );
    }
    $new_button->setAttribute("class", $input->getAttribute( 'class' )." crunch-button crunch-button__full-background crunch-button__full-background--font-size-14 crunch-button__full-background--primary-color crunch-button__full-background--hover-darken crunch-button__full-background--min-width-none crunch-button--with-letter-spacing text-uppercase border-0 ml-auto");
    $input->parentNode->replaceChild( $new_button, $input );

    return $dom->saveHtml( $new_button );
}

add_filter( 'gform_next_button', 'input_to_button', 10, 2 );
add_filter( 'gform_previous_button', 'input_to_button', 10, 2 );
add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
add_filter( 'gform_send_resume_link_button', 'input_to_button', 10, 2 );


/* Populate ACF select field options with Gravity Forms forms
 * - field slug must match 'gravity_forms_select'
 */

// function acf_populate_gf_forms_ids( $field ) {
//     if ( class_exists( 'GFFormsModel' ) ) {
//         $choices = [];
//         foreach ( \GFFormsModel::get_forms() as $form ) {
//             $choices[ $form->id ] = $form->title;
//         }
//         $field['choices'] = $choices;
//     }
//     return $field;
// }
// add_filter( 'acf/load_field/name=gravity_forms_select', 'acf_populate_gf_forms_ids' );


/* Populate ACF select field options with Nav Menus
 * - field slug must match 'nav_menu_select'
 */

// function acf_populate_select_filter( $field ) {
//      $menus = wp_get_nav_menus();
//      if ( $menus ) {
//          $choices = [];
//          foreach ($menus as $menu) {
//              $choices[ $menu->slug ] = $menu->name;
//          }
//          $field['choices'] = $choices;
//      }
//      return $field;
//  }
//  add_filter( 'acf/load_field/name=nav_menu_select', 'acf_populate_select_filter' );


/* Populate ACF select/checkbox/radio field options with custom options set in Options page
 * - you need to create 'features_names' field in options
 * - next one create 'pricing_features' field in place where you want to use choises from options
 */

// function acf_load_pricing_features_field_choices( $field ) {
//     $choices = [];
//     $features_names = get_field( 'features_names', 'option' );
//     ​
//     foreach ( $features_names as $feature ) {
//         $choices[create_slug( $feature['name'] )] = $feature['name'];
//     }
//     ​
//     $field['choices'] = $choices;
//     ​
//     // return the field
//     return $field;
// }
// add_filter('acf/load_field/name=pricing_features', 'acf_load_pricing_features_field_choices');
