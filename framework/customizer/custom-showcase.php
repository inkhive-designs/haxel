<?php
function haxel_customize_register_custom_showcase ($wp_customize) {
    //CUSTOM SHOWCASE
    $wp_customize->add_panel( 'haxel_showcase_panel', array(
        'priority'       => 35,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Custom Showcase','haxel'),
    ) );

    $wp_customize->add_section(
        'haxel_sec_showcase_options',
        array(
            'title'     => __('Enable/Disable','haxel'),
            'priority'  => 0,
            'panel'     => 'haxel_showcase_panel'
        )
    );


    $wp_customize->add_setting(
        'haxel_showcase_enable',
        array( 'sanitize_callback' => 'haxel_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'haxel_showcase_enable', array(
            'settings' => 'haxel_showcase_enable',
            'label'    => __( 'Enable Showcase on Front Page.', 'haxel' ),
            'section'  => 'haxel_sec_showcase_options',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'haxel_showcase_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'haxel_showcase_title', array(
            'settings' => 'haxel_showcase_title',
            'label'    => __( 'Title','haxel' ),
            'section'  => 'haxel_sec_showcase_options',
            'type'     => 'text',
        )
    );

    for ( $i = 1 ; $i <= 3 ; $i++ ) :

        //Create the settings Once, and Loop through it.
        $wp_customize->add_section(
            'haxel_showcase_sec'.$i,
            array(
                'title'     => __('ShowCase ','haxel').$i,
                'priority'  => $i,
                'panel'     => 'haxel_showcase_panel',

            )
        );

        $wp_customize->add_setting(
            'haxel_showcase_img'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'haxel_showcase_img'.$i,
                array(
                    'label' => '',
                    'section' => 'haxel_showcase_sec'.$i,
                    'settings' => 'haxel_showcase_img'.$i,
                )
            )
        );

        $wp_customize->add_setting(
            'haxel_showcase_title'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'haxel_showcase_title'.$i, array(
                'settings' => 'haxel_showcase_title'.$i,
                'label'    => __( 'Showcase Title','haxel' ),
                'section'  => 'haxel_showcase_sec'.$i,
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            'haxel_showcase_desc'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'haxel_showcase_desc'.$i, array(
                'settings' => 'haxel_showcase_desc'.$i,
                'label'    => __( 'Showcase Description','haxel' ),
                'section'  => 'haxel_showcase_sec'.$i,
                'type'     => 'text',
            )
        );


        $wp_customize->add_setting(
            'haxel_showcase_url'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            'haxel_showcase_url'.$i, array(
                'settings' => 'haxel_showcase_url'.$i,
                'label'    => __( 'Target URL','haxel' ),
                'section'  => 'haxel_showcase_sec'.$i,
                'type'     => 'url',
            )
        );

    endfor;
}
add_action('customize_register', 'haxel_customize_register_custom_showcase');