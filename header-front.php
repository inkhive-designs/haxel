<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package haxel
 */
?>
<?php get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'haxel' ); ?></a>

    <?php get_template_part('modules/header/jumbosearch'); ?>

    <div id="top-bar">
        <div class="top-bar-layer">
            <!--
<div class="container">
			<div id="top-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
			</div>
		</div>
-->
        </div>
    </div>


    <?php if( get_theme_mod('haxel_header_style_set') == 'style1' ) :  ?>
        <div class="header_style style1">
    <header id="masthead" class="site-header style1" role="banner" data-parallax="scroll" data-speed="0.2" data-z-index="1" data-image-src="<?php header_image(); ?>">
	<div class="layer">
		<div class="container">
			<div class="site-branding">
				<?php if ( haxel_has_logo() ) : ?>					
					<div id="site-logo">
						<?php haxel_logo() ?>
					</div>
				<?php endif; ?>	
				<div id="text-title-desc">
				<h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>
			</div>
			
			<div id="slickmenu"></div>
			<nav id="site-navigation" class="main-navigation front" role="navigation">
					<?php
						// Get the Appropriate Walker First.
						 if (has_nav_menu( 'primary' ) && !get_theme_mod('haxel_disable_nav_desc',true) ) :
								$walker = new Haxel_Menu_With_Description;
							elseif(!has_nav_menu('primary')) :
								$walker = '';
							else : 
								$walker = new Haxel_Menu_With_Icon;
						  endif;
						  //Display the Menu.							
						  wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) ); ?>
			</nav><!-- #site-navigation -->
				
		</div>


        <div class="social-icons">
            <?php get_template_part('modules/social/social', 'fa'); ?>
        </div>
				 

	</div>	
	</header><!-- #masthead -->
        </div>
    <?php elseif( get_theme_mod('haxel_header_style_set') == 'style2') :  ?>
        <div class="header_style style2">
    <header id="masthead" class="site-header style2" role="banner" data-parallax="scroll" data-speed="0.2" data-z-index="1" data-image-src="<?php header_image(); ?>">
        <div class="layer">
            <div class="container">
                <div class="site-branding">
                    <?php if ( haxel_has_logo() ) : ?>
                        <div id="site-logo">
                            <?php haxel_logo() ?>
                        </div>
                    <?php endif; ?>
                    <div id="text-title-desc">
                        <h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                    </div>
                </div>
            </div>


            <div class="social-icons">
                <?php get_template_part('modules/social/social', 'fa'); ?>
            </div>

        </div>

        <div class="clearfix"></div>
        <div id="slickmenu"></div>

    </header><!-- #masthead -->


        <nav id="site-navigation" class="main-navigation front" role="navigation">
            <?php
            // Get the Appropriate Walker First.
            if (has_nav_menu( 'primary' ) && !get_theme_mod('haxel_disable_nav_desc',true) ) :
                $walker = new Haxel_Menu_With_Description;
            elseif(!has_nav_menu('primary')) :
                $walker = '';
            else :
                $walker = new Haxel_Menu_With_Icon;
            endif;
            //Display the Menu.
            wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) ); ?>
        </nav><!-- #site-navigation -->
        </div>
    <?php else :  ?>
        <div class="header_style">
    <header id="masthead" class="site-header" role="banner" data-parallax="scroll" data-speed="0.2" data-z-index="1" data-image-src="<?php header_image(); ?>">
        <div class="layer">
            <div class="container">
                <div class="site-branding">
                    <?php if ( haxel_has_logo() ) : ?>
                        <div id="site-logo">
                            <?php haxel_logo() ?>
                        </div>
                    <?php endif; ?>
                    <div id="text-title-desc">
                        <h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                    </div>
                </div>

                <div id="slickmenu"></div>
                <nav id="site-navigation" class="main-navigation front" role="navigation">
                    <?php
                    // Get the Appropriate Walker First.
                    if (has_nav_menu( 'primary' ) && !get_theme_mod('haxel_disable_nav_desc',true) ) :
                        $walker = new Haxel_Menu_With_Description;
                    elseif(!has_nav_menu('primary')) :
                        $walker = '';
                    else :
                        $walker = new Haxel_Menu_With_Icon;
                    endif;
                    //Display the Menu.
                    wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) ); ?>
                </nav><!-- #site-navigation -->

            </div>


            <div class="social-icons">
                <?php get_template_part('modules/social/social', 'fa'); ?>
            </div>


        </div>
    </header><!-- #masthead -->
        </div>
    <?php endif; ?>
	
	<?php get_template_part('framework/featured-components/slider', 'nivo' ); ?>
	<div class="mega-container">
		<?php get_template_part('framework/featured-components/featured', 'showcase' ); ?>
		<?php get_template_part('framework/featured-components/featured', 'posts' ); ?>
	
		<div id="content" class="site-content container">