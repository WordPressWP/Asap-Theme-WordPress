<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AsapTheme
 */

?> 

	<?php

	$disable_footer = asap_disable_footer();

	if ( ! $disable_footer ) {

	?>

	<?php if ( ! function_exists( 'is_woocommerce' ) ) : ?>

	<?php if ( is_single() && ! get_theme_mod('asap_hide_breadcrumb') && ! get_post_meta( get_the_ID(), 'hide_breadcrumbs', true ) ) : ?>
		
	<div class="footer-breadcrumb">
				
		<?php asap_breadcrumbs(false); ?>
			
	</div>
		
	<?php endif; ?>

	<?php if ( is_page() && ! get_theme_mod('asap_hide_breadcrumb_page') && ! get_post_meta( get_the_ID(), 'hide_breadcrumbs', true )  ) : ?>
		
	<div class="footer-breadcrumb">
				
		<?php echo asap_breadcrumbs_pages( $post, false ); ?>
			
	</div>
		
	<?php endif; ?>

	<?php if ( ( is_single() || is_page() ) && ( ! get_theme_mod('asap_hide_rise_button') ) ) : ?>
		
		<span class="go-top"><span><?php _e("Go up", "asap"); ?></span><i class="arrow arrow-up"></i></span>
		
	<?php endif; ?>

	<?php endif; ?>

	<?php if ( is_active_sidebar( 'social' ) ) : ?>

	<div class="content-footer-social">

		<?php dynamic_sidebar( 'social' );	?>
		
	</div>
		
	<?php endif; 	?>

	<?php 
		
	if (is_active_sidebar( 'widget-footer-1' )	|| 
		is_active_sidebar( 'widget-footer-2' )	||
		is_active_sidebar( 'widget-footer-3' )	|| 
		is_active_sidebar( 'widget-footer-4' )) : ?>

	<footer>
	
		<div class="content-footer">

			<div class="widget-content-footer">
				
				<?php if ( ( has_custom_logo() ) && ( ! get_theme_mod('asap_hide_logo_footer') ) ) : ?>

				<div class="logo-footer"><?php the_custom_logo(); ?></div>

				<?php endif; ?>

				<?php if ( is_active_sidebar( 'widget-footer-1' ) ) : ?>
				
					<?php dynamic_sidebar( 'widget-footer-1' ); ?>
				
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'widget-footer-2' ) ) : ?>
				
					<?php dynamic_sidebar( 'widget-footer-2' ); ?>
				
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'widget-footer-3' ) ) : ?>
				
					<?php dynamic_sidebar( 'widget-footer-3' ); ?>
				
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'widget-footer-4' ) ) : ?>
				
					<?php dynamic_sidebar( 'widget-footer-4' ); ?>
				
				<?php endif; ?>

			</div>
			
		</div>

	</footer>

	<?php endif; ?>

	<?php } ?>

	<?php 

	if ( get_theme_mod('asap_show_cookies') ) : 

	$cookies_text 		= 	get_theme_mod('asap_cookies_text');
	$cookies_text_btn 	= 	get_theme_mod('asap_cookies_text_btn');
	$cookies_link 		= 	get_theme_mod('asap_cookies_link');
	$cookies_text_link 	= 	get_theme_mod('asap_cookies_text_link');

	?>

	<div id="cookiesbox" class="cookiesn">
	
	<p>
		<?php echo $cookies_text; ?>
		<a href="<?php echo get_the_permalink($cookies_link); ?>"><?php echo $cookies_text_link; ?></a>
	</p>
	<p>
		<button onclick="allowCookies()"><?php echo $cookies_text_btn; ?></button>			
	</p>
		
	</div>

	<?php endif; ?>




	<?php wp_footer(); ?>

  </body>
</html>