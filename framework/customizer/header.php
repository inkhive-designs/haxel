<?php
function haxel_customize_register_header_settings($wp_customize) {
    //Settings For Logo Area

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
    ) );

    $wp_customize->add_setting( 'haxel_logo_resize' , array(
        'default'     => 100,
        'sanitize_callback' => 'haxel_sanitize_positive_number',
    ) );
    $wp_customize->add_control(
        'haxel_logo_resize',
        array(
            'label' => __('Resize & Adjust Logo','haxel'),
            'section' => 'title_tagline',
            'settings' => 'haxel_logo_resize',
            'priority' => 6,
            'type' => 'range',
            'active_callback' => 'haxel_logo_enabled',
            'input_attrs' => array(
                'min'   => 30,
                'max'   => 200,
                'step'  => 5,
            ),
        )
    );

    function haxel_logo_enabled($control) {
        $option = $control->manager->get_setting('custom_logo');
        return $option->value() == true;
    }



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