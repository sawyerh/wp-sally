<?php 
/* The following tests which page is being shown
 * and determines which sidebar should be displayed.
 *
 * If there are no widgets added to the sidebar, nothing
 * will be shown.
*/
?>

<section class="sidebar">
   <!-- Site title / Logo -->
	<?php if(get_audiotheme_theme_option('logo')) { ?>
    	<h1 class="logo">
    	<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
        	<img src="<?php echo get_audiotheme_theme_option('logo'); ?>" alt="<?php bloginfo( 'name' ); ?>" /></h1>
        </a>
        </h1>
    <?php } else { ?>
		<h1 class="site-title logo"><?php bloginfo( 'name' ); ?></h1>
    	<p class="tagline"><?php bloginfo( 'description' ); ?></p>
    <?php } ?>
    
    <section class="audio-player widget">
        <?php get_audio_player( 158 ); ?>
    </section>
    
    <nav class="widget">
        <?php wp_nav_menu( array('menu_class' => 'primary-nav', 'container' => '', 'theme_location' => 'primary_menu', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
    </nav>
    
    <?
    if(is_single()){
    	dynamic_sidebar( 'single-sidebar' );
    }
    elseif(is_front_page() || is_archive()){
    	dynamic_sidebar( 'blog-sidebar' );
    }
    elseif(is_page_template('template-unique-sidebar.php')){
    	dynamic_sidebar( 'unique-sidebar' );
    }
    else {
    	dynamic_sidebar( 'page-sidebar' );
    } ?>
    
    <?php get_shaken_footer(); ?>
</section>