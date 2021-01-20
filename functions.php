<?php

defined( 'ABSPATH' ) || exit;

function theme_scripts() {
    // Get the theme data
    $the_theme     = wp_get_theme();
    $theme_version = $the_theme->get( 'Version' );
    
    // Check if IE
    global $is_IE;

    wp_enqueue_style( 'theme-fonts', 'https://use.typekit.net/onz2qme.css', array(), $theme_version );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/vendors/fontawesome/css/all.min.css', array(), $theme_version );
    wp_enqueue_style( 'theme-styles', get_template_directory_uri() . '/style.css', array(), $theme_version );

    // IE
    if ( $is_IE ) {
        wp_enqueue_style( 'theme-ie-styles', get_template_directory_uri() . "/assets/css/ie.css", array(), $theme_version );
    }

    // Print
    wp_enqueue_style( 'theme-print-styles', get_template_directory_uri() . '/assets/css/print.css', array(), $theme_version, 'print' );

    // Register Scripts
    wp_register_script( 'theme-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), $theme_version, true );

    // WP Variables for JS
    $site_variables = array(
        'site_url'		=> site_url('/'),
        'site_title'	=> get_bloginfo( 'name' ),
    );

    // Add Variables and Enqueue Scripts
    wp_localize_script( 'theme-scripts', 'theme_wp', $site_variables );
    wp_enqueue_script( 'theme-scripts' );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );
