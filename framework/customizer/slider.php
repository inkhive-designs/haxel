<?php
function haxel_customize_register_slider_settings($wp_customize) {
    // SLIDER PANEL
    $wp_customize->add_panel( 'haxel_slider_panel', array(
        'priority'       => 35,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Main Slider','haxel'),
    ) );

    $wp_customize->add_section(
        'haxel_sec_slider_options',
        array(
            'title'     => __('Enable/Disable','haxel'),
            'priority'  => 0,
            'panel'     => 'haxel_slider_panel'
        )
    );


    $wp_customize->add_setting(
        'haxel_main_slider_enable',
        array( 'sanitize_callback' => 'haxel_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'haxel_main_slider_enable', array(
            'settings' => 'haxel_main_slider_enable',
            'label'    => __( 'Enable Slider.', 'haxel' ),
            'section'  => 'haxel_sec_slider_options',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'haxel_main_slider_count',
        array(
            'default' => '0',
            'sanitize_callback' => 'haxel_sanitize_positive_number'
        )
    );

    // Select How Many Slides the User wants, and Reload the Page.
    $wp_customize->add_control(
        'haxel_main_slider_count', array(
            'settings' => 'haxel_main_slider_count',
            'label'    => __( 'No. of Slides(Min:0, Max: 3)' ,'haxel'),
            'section'  => 'haxel_sec_slider_options',
            'type'     => 'number',
            'description' => __('Save the Settings, and Reload this page to Configure the Slides.','haxel'),

        )
    );

    $slides = get_theme_mod('haxel_main_slider_count');

    for ( $i = 1 ; $i <= 3 ; $i++ ) :

        //Create the settings Once, and Loop through it.

        $wp_customize->add_setting(
            'haxel_slide_img'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'haxel_slide_img'.$i,
                array(
                    'label' => '',
                    'section' => 'haxel_slide_sec'.$i,
                    'settings' => 'haxel_slide_img'.$i,
                )
            )
        );


        $wp_customize->add_section(
            'haxel_slide_sec'.$i,
            array(
                'title'     => __('Slide ','haxel').$i,
                'priority'  => $i,
                'panel'     => 'haxel_slider_panel'
            )
        );

        $wp_customize->add_setting(
            'haxel_slide_title'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'haxel_slide_title'.$i, array(
                'settings' => 'haxel_slide_title'.$i,
                'label'    => __( 'Slide Title','haxel' ),
                'section'  => 'haxel_slide_sec'.$i,
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            'haxel_slide_desc'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'haxel_slide_desc'.$i, array(
                'settings' => 'haxel_slide_desc'.$i,
                'label'    => __( 'Slide Description','haxel' ),
                'section'  => 'haxel_slide_sec'.$i,
                'type'     => 'text',
            )
        );



        $wp_customize->add_setting(
            'haxel_slide_CTA_button'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'haxel_slide_CTA_button'.$i, array(
                'settings' => 'haxel_slide_CTA_button'.$i,
                'label'    => __( 'Custom Call to Action Button Text(Optional)','haxel' ),
                'section'  => 'haxel_slide_sec'.$i,
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            'haxel_slide_url'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            'haxel_slide_url'.$i, array(
                'settings' => 'haxel_slide_url'.$i,
                'label'    => __( 'Target URL','haxel' ),
                'section'  => 'haxel_slide_sec'.$i,
                'type'     => 'url',
            )
        );

    endfor;
}
add_action('customize_register', 'haxel_customize_register_slider_settings');