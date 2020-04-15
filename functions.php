<?php
/**
 * Justice Centre Hong Kong theme functions
 *
 * Only code that is specific to the theme should go here. Otherwise, place it in the Justice Centre Extensions
 * plugin
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {
	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );
	// Load the stylesheet
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );
	
}
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );


/** 
 * Replace the default color palettes in the color picker
 */
// function my_custom_color_palettes( $palettes ) {
//     $palettes = array(
//         '#920000',
//         '#760000',
//         '#670001',
//         '#3e3e3e',
//         '#e8e8e8',
//         '#000000',
//         '#ffffff',
//     );

//     return $palettes;
// }
// add_filter( 'ocean_default_color_palettes', 'my_custom_color_palettes' );


/**
 * Alter your post layouts
 *
 * Replace is_singular( 'post' ) by the function where you want to alter the layout
 * @return full-width, full-screen, left-sidebar or right-sidebar
 *
 */
function custom_post_layout_class( $class ) {

    // Alter your layout
    if ( is_singular() ) {
        $class = 'full-width';
    }

    // Return correct class
    return $class;

}
add_filter( 'ocean_post_layout_class', 'custom_post_layout_class', 20 );


/**
 * Suppress errors
 */
add_filter('deprecated_constructor_trigger_error', '__return_false');

/**
 * Load only our designated fonts
 */
function myprefix_google_fonts( $array ) {
    return array( 'Open Sans', 'Open Sans Condensed', 'News Cycle' );
}
//add_filter( 'ocean_google_fonts_array', 'myprefix_google_fonts' );