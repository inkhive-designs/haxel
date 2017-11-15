<?php
function haxel_customize_register_header_settings($wp_customize) {
    $wp_customize->get_section('header_image')->panel = 'haxel_header_panel';
    //Settings For Logo Area
    $wp_customize->add_panel('haxel_header_panel',
        array(
            'title' => __('Header Settings', 'haxel'),
            'priority' => 30,
        )
    );

    $wp_customize->add_setting(
        'haxel_hide_title_tagline',
        array( 'sanitize_callback' => 'haxel_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'haxel_hide_title_tagline', array(
            'settings' => 'haxel_hide_title_tagline',
            'label'    => __( 'Hide Title and Tagline.', 'haxel' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
        )
    );

    //Header Styles
    $wp_customize->add_section( 'haxel_header_style' , array(
        'title'      => __( 'Select A Header Style', 'haxel' ),
        'panel' => 'haxel_header_panel',
        'priority'   => 10,
    ) );

    $wp_customize->add_setting( 'haxel_header_style_set' , array(
        'default'     => 'default',
        'sanitize_callback' => 'haxel_sanitize_header_style'
    ) );

    $wp_customize->add_control(
        'haxel_header_style_set',
        array(
            'label' => __('Select A Style.', 'haxel'),
            'section' => 'haxel_header_style',
            'settings' => 'haxel_header_style_set',
            'priority' => 5,
            'type' => 'select',
            'choices' => array(
                'default' => __('Default', 'haxel'),
                'style1' => __('Style 1', 'haxel'),
                'style2' => __('Style 2', 'haxel')
            )
        )
    );

    function haxel_sanitize_header_style ($input) {
        if ( in_array($input, array('default', 'style1', 'style2') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_setting(
        'haxel_branding_below_logo',
        array( 'sanitize_callback' => 'haxel_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'haxel_branding_below_logo', array(
            'settings' => 'haxel_branding_below_logo',
            'label'    => __( 'Display Site Title and Tagline Below the Logo.', 'haxel' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
            'active_callback' => 'haxel_title_visible'
        )
    );

    function haxel_title_visible( $control ) {
        $option = $control->manager->get_setting('haxel_hide_title_tagline');
        return $option->value() == false ;
    }


    //Logo Settings
    $wp_customize->add_section( 'title_tagline' , array(
        'title'      => __( 'Title, Tagline & Logo', 'haxel' ),
        'priority'   => 30,
        'panel' => 'haxel_header_panel'
    ) );


    //Replace Header Text Color with, separate colors for Title and Description
    //Override haxel_site_titlecolor
    $wp_customize->remove_control('display_header_text');
    $wp_customize->remove_setting('header_textcolor');
    $wp_customize->add_setting('haxel_site_titlecolor', array(
        'default'     => '#FFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'haxel_site_titlecolor', array(
            'label' => __('Site Title Color','haxel'),
            'section' => 'colors',
            'settings' => 'haxel_site_titlecolor',
            'type' => 'color'
        ) )
    );

    $wp_customize->add_setting('haxel_header_desccolor', array(
        'default'     => '#FFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'haxel_header_desccolor', array(
            'label' => __('Site Tagline Color','haxel'),
            'section' => 'colors',
            'settings' => 'haxel_header_desccolor',
            'type' => 'color'
        ) )
    );
}
add_action('customize_register', 'haxel_customize_register_header_settings');