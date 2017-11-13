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

    <div id="top-bar" class="other">
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

    <header id="masthead" class="site-header other" role="banner">

        <div class="container">

            <div id="slickmenu"></div>
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php
                //Display the Menu.
                if (has_nav_menu('primary')) {
                    wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => new Haxel_Menu_With_Icon) );
                } else {
                    wp_nav_menu( array( 'theme_location' => 'primary') );
                }
                ?>
            </nav><!-- #site-navigation -->

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

            <div class="social-icons">
                <?php get_template_part('modules/social/social', 'fa'); ?>
            </div>

        </div>
    </header><!-- #masthead -->

    <?php if (is_single()) : ?>
        <?php if ( has_post_thumbnail() ):
            $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
        else :
            $image_data = ''; ?>
        <?php endif; ?>
        <header class="entry-header single-header" style="background-image: url(<?php echo $image_data[0] ?>)">
            <div class="layer">
                <div class="container">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                    <div class="entry-meta">
                        <?php wp_reset_postdata(); haxel_posted_on(); ?>
                    </div><!-- .entry-meta -->
                </div>
            </div>
        </header>
    <?php endif; ?>
    <div class="mega-container">

        <div id="content" class="site-content container">