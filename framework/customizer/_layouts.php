<?php
function haxel_customize_register_layouts ($wp_customize) {
    $wp_customize->get_section('colors')->panel = 'haxel_design_panel';
    // Layout and Design
    $wp_customize->add_panel( 'haxel_design_panel', array(
        'priority'       => 40,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Design & Layout','haxel'),
    ) );

    $wp_customize->add_section(
        'haxel_design_options',
        array(
            'title'     => __('Blog Layout','haxel'),
            'priority'  => 0,
            'panel'     => 'haxel_design_panel'
        )
    );


    $wp_customize->add_setting(
        'haxel_blog_layout',
        array( 'sanitize_callback' => 'haxel_sanitize_blog_layout' )
    );

    function haxel_sanitize_blog_layout( $input ) {
        if ( in_array($input, array('grid','grid_2_column','grid_3_column','haxel') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'haxel_blog_layout',array(
            'label' => __('Select Layout','haxel'),
            'settings' => 'haxel_blog_layout',
            'section'  => 'haxel_design_options',
            'type' => 'select',
            'choices' => array(
                'haxel' => __('Haxel Theme Layout','haxel'),
                'grid' => __('Basic Blog Layout','haxel'),
                'grid_2_column' => __('Grid - 2 Column','haxel'),
                'grid_3_column' => __('Grid - 3 Column','haxel'),

            )
        )
    );

    $wp_customize->add_section(
        'haxel_sidebar_options',
        array(
            'title'     => __('Sidebar Layout','haxel'),
            'priority'  => 0,
            'panel'     => 'haxel_design_panel'
        )
    );

    $wp_customize->add_setting(
        'haxel_disable_sidebar',
        array( 'sanitize_callback' => 'haxel_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'haxel_disable_sidebar', array(
            'settings' => 'haxel_disable_sidebar',
            'label'    => __( 'Disable Sidebar Everywhere.','haxel' ),
            'section'  => 'haxel_sidebar_options',
            'type'     => 'checkbox',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'haxel_disable_sidebar_home',
        array( 'sanitize_callback' => 'haxel_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'haxel_disable_sidebar_home', array(
            'settings' => 'haxel_disable_sidebar_home',
            'label'    => __( 'Disable Sidebar on Home/Blog.','haxel' ),
            'section'  => 'haxel_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'haxel_show_sidebar_options',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'haxel_disable_sidebar_front',
        array( 'sanitize_callback' => 'haxel_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'haxel_disable_sidebar_front', array(
            'settings' => 'haxel_disable_sidebar_front',
            'label'    => __( 'Disable Sidebar on Front Page.','haxel' ),
            'section'  => 'haxel_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'haxel_show_sidebar_options',
            'default'  => false
        )
    );


    $wp_customize->add_setting(
        'haxel_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'haxel_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'haxel_sidebar_width', array(
            'settings' => 'haxel_sidebar_width',
            'label'    => __( 'Sidebar Width','haxel' ),
            'description' => __('Min: 25%, Default: 33%, Max: 40%','haxel'),
            'section'  => 'haxel_sidebar_options',
            'type'     => 'range',
            'active_callback' => 'haxel_show_sidebar_options',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 5,
                'step'  => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function haxel_show_sidebar_options($control) {

        $option = $control->manager->get_setting('haxel_disable_sidebar');
        return $option->value() == false ;

    }

    $wp_customize-> add_section(
        'haxel_custom_codes',
        array(
            'title'			=> __('Custom CSS','haxel'),
            'description'	=> __('Enter your Custom CSS to Modify design.','haxel'),
            'priority'		=> 11,
            'panel'			=> 'haxel_design_panel'
        )
    );

    $wp_customize->add_setting(
        'haxel_custom_css',
        array(
            'default'		=> '',
            'sanitize_callback'    => 'wp_filter_nohtml_kses',
            'sanitize_js_callback' => 'wp_filter_nohtml_kses'
        )
    );

    $wp_customize->add_control(
        new Haxel_Custom_CSS_Control(
            $wp_customize,
            'haxel_custom_css',
            array(
                'section' => 'haxel_custom_codes',
                'settings' => 'haxel_custom_css'
            )
        )
    );

    function haxel_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }

    $wp_customize-> add_section(
        'haxel_custom_footer',
        array(
            'title'			=> __('Custom Footer Text','haxel'),
            'description'	=> __('Enter your Own Copyright Text.','haxel'),
            'priority'		=> 11,
            'panel'			=> 'haxel_design_panel'
        )
    );

    $wp_customize->add_setting(
        'haxel_footer_text',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'haxel_footer_text',
        array(
            'section' => 'haxel_custom_footer',
            'settings' => 'haxel_footer_text',
            'type' => 'text'
        )
    );


}
add_action('customize_register', 'haxel_customize_register_layouts');