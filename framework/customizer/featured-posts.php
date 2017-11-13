<?php
function haxel_customize_register_featured_posts($wp_customize) {
    //FEATURED POSTS

    $wp_customize->add_section(
        'haxel_featposts',
        array(
            'title'     => __('Featured Posts','haxel'),
            'priority'  => 35,
        )
    );

    $wp_customize->add_setting(
        'haxel_featposts_enable',
        array( 'sanitize_callback' => 'haxel_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'haxel_featposts_enable', array(
            'settings' => 'haxel_featposts_enable',
            'label'    => __( 'Enable', 'haxel' ),
            'section'  => 'haxel_featposts',
            'type'     => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'haxel_featposts_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'haxel_featposts_title', array(
            'settings' => 'haxel_featposts_title',
            'label'    => __( 'Title', 'haxel' ),
            'section'  => 'haxel_featposts',
            'type'     => 'text',
        )
    );



    $wp_customize->add_setting(
        'haxel_featposts_cat',
        array( 'sanitize_callback' => 'haxel_sanitize_category' )
    );


    $wp_customize->add_control(
        new Haxel_WP_Customize_Category_Control(
            $wp_customize,
            'haxel_featposts_cat',
            array(
                'label'    => __('Category For Featured Posts','haxel'),
                'settings' => 'haxel_featposts_cat',
                'section'  => 'haxel_featposts'
            )
        )
    );

    $wp_customize->add_setting(
        'haxel_featposts_rows',
        array( 'sanitize_callback' => 'haxel_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'haxel_featposts_rows', array(
            'settings' => 'haxel_featposts_rows',
            'label'    => __( 'Max No. of Rows.', 'haxel' ),
            'section'  => 'haxel_featposts',
            'type'     => 'number',
            'default'  => '0'
        )
    );
}
add_action('customize_register', 'haxel_customize_register_featured_posts');