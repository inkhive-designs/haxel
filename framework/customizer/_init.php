<?php
/**
 * haxel Theme Customizer
 *
 * @package haxel
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function haxel_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
}
add_action( 'customize_register', 'haxel_customize_register' );

require_once get_template_directory(). '/framework/customizer/_customizer_controls.php';
require_once get_template_directory(). '/framework/customizer/_googlefonts.php';
require_once get_template_directory(). '/framework/customizer/_layouts.php';
require_once get_template_directory(). '/framework/customizer/_sanitization.php';
require_once get_template_directory(). '/framework/customizer/_misc_scripts.php';
require_once get_template_directory(). '/framework/customizer/featured-posts.php';
require_once get_template_directory(). '/framework/customizer/custom-showcase.php';
require_once get_template_directory(). '/framework/customizer/header.php';
require_once get_template_directory(). '/framework/customizer/menu.php';
require_once get_template_directory(). '/framework/customizer/slider.php';
require_once get_template_directory(). '/framework/customizer/social-fa.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function haxel_customize_preview_js() {
    wp_enqueue_script( 'haxel_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'haxel_customize_preview_js' );
