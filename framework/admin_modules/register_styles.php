<?php
/**
 * Enqueue scripts and styles.
 */
function haxel_scripts() {
    wp_enqueue_style( 'haxel-style', get_stylesheet_uri() );

    wp_enqueue_style('haxel-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('haxel_title_font', 'Ubuntu')) ).':100,300,400,700' );

    wp_enqueue_style('haxel-body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('haxel_body_font', 'Ubuntu') ) ).':100,300,400,700' );

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );

    wp_enqueue_style( 'nivo-style', get_template_directory_uri() . '/assets/css/nivo-slider.css' );

    wp_enqueue_style( 'nivo-skin-style', get_template_directory_uri() . '/assets/css/nivo-default/default.css' );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );

    wp_enqueue_style( 'hover-style', get_template_directory_uri() . '/assets/css/hover.min.css' );

    wp_enqueue_style( 'haxel-main-theme-style', get_template_directory_uri() . '/assets/theme_styles/css/default.css' );

    wp_enqueue_script( 'haxel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'haxel-externaljs', get_template_directory_uri() . '/js/external.js', array('jquery'), '20120206', true );

    wp_enqueue_script( 'haxel-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'haxel-custom-js', get_template_directory_uri() . '/js/custom.js' );
}
add_action( 'wp_enqueue_scripts', 'haxel_scripts' );
