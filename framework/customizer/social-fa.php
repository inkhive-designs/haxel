<?php
function haxel_customize_register_social_icons($wp_customize) {
    // Social Icons
    $wp_customize->add_section('haxel_social_section', array(
        'title' => __('Social Icons','haxel'),
        'priority' => 44 ,
        'panel' => 'haxel_header_panel'
    ));

    $social_networks = array( //Redefinied in Sanitization Function.
        'none' => __('-','haxel'),
        'facebook' => __('Facebook','haxel'),
        'twitter' => __('Twitter','haxel'),
        'google-plus' => __('Google Plus','haxel'),
        'instagram' => __('Instagram','haxel'),
        'rss' => __('RSS Feeds','haxel'),
        'vine' => __('Vine','haxel'),
        'vimeo-square' => __('Vimeo','haxel'),
        'youtube' => __('Youtube','haxel'),
        'flickr' => __('Flickr','haxel'),
    );

    $social_count = count($social_networks);

    for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

        $wp_customize->add_setting(
            'haxel_social_'.$x, array(
            'sanitize_callback' => 'haxel_sanitize_social',
            'default' => 'none'
        ));

        $wp_customize->add_control( 'haxel_social_'.$x, array(
            'settings' => 'haxel_social_'.$x,
            'label' => __('Icon ','haxel').$x,
            'section' => 'haxel_social_section',
            'type' => 'select',
            'choices' => $social_networks,
        ));

        $wp_customize->add_setting(
            'haxel_social_url'.$x, array(
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control( 'haxel_social_url'.$x, array(
            'settings' => 'haxel_social_url'.$x,
            'description' => __('Icon ','haxel').$x.__(' Url','haxel'),
            'section' => 'haxel_social_section',
            'type' => 'url',
            'choices' => $social_networks,
        ));

    endfor;

    function haxel_sanitize_social( $input ) {
        $social_networks = array(
            'none' ,
            'facebook',
            'twitter',
            'google-plus',
            'instagram',
            'rss',
            'vine',
            'vimeo-square',
            'youtube',
            'flickr'
        );
        if ( in_array($input, $social_networks) )
            return $input;
        else
            return '';
    }
}
add_action('customize_register', 'haxel_customize_register_social_icons');