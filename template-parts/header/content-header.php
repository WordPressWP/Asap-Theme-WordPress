	<?php

	$hide_h1 = get_post_meta( get_the_ID(), 'hide_h1', true ); 

	$hide_social = get_post_meta( get_the_ID(), 'hide_social_btn', true ); 

	?>

	<?php if ( is_single() ) :  ?>

		<?php 
		
		$subtitle = get_post_meta( get_the_ID(), 'subtitle_post', true ); 

		?>

		<?php

		$hide_breadcrumbs = get_theme_mod('asap_hide_breadcrumb'); 
		
		$hide_breadcrumbs_meta = get_post_meta( get_the_ID(), 'hide_breadcrumbs', true );
			
		if ( ! $hide_breadcrumbs && ! $hide_breadcrumbs_meta ) : asap_breadcrumbs(true); endif;	

		?>

		<?php if ( ! $hide_h1 ) : ?><h1><?php the_title(); ?></h1><?php endif; ?>

		<?php if ( $subtitle ) : ?><p class="asap-subtitle"><?php echo $subtitle; ?></p><?php endif; ?>
	
		<?php asap_show_author(); ?>

		<?php asap_show_ads(6); ?>

		<?php

		if ( get_theme_mod('asap_show_social_buttons_before') && ( get_theme_mod('asap_social_post_types') == '1' || get_theme_mod('asap_social_post_types') == '2' ) && ( ! $hide_social ) )  : 

		?>

		<div class="social-buttons-top">
		
		<?php get_template_part('template-parts/social/content', 'social'); ?>

		</div>

		<?php

		endif; 

		?>
			

	<?php endif; ?>


	<?php if ( is_page() ) :  ?>

		<?php

		$hide_social = get_post_meta( get_the_ID(), 'hide_social_btn', true ); 
	
		?>
	
		<?php asap_breadcrumbs_pages( $post, true ); ?>

		<?php if ( ! $hide_h1 ) : ?><h1><?php the_title(); ?></h1><?php endif; ?>

		<?php asap_show_author(); ?>		
		
		<?php asap_show_ads(6); ?>

		<?php
			
		if ( get_theme_mod('asap_show_social_buttons_before') &&  ( get_theme_mod('asap_social_post_types') == '1' || get_theme_mod('asap_social_post_types') == '3' ) && ( ! $hide_social ) )  : 

		get_template_part('template-parts/social/content', 'social');

		endif; 

		?>


	<?php endif; ?>

	
	<?php if ( is_front_page() && ! get_theme_mod('asap_enable_hero') ) : ?>
		
		<?php get_template_part('template-parts/header/content', 'search'); ?>
		
	<?php endif; ?>


	<?php if ( is_category() ) : ?>

		<?php

		$hero_cat = get_theme_mod('asap_hero_cat', 'normal');

		$header_design = get_term_meta(get_queried_object()->term_id, 'asap_header_design', true) ?: $hero_cat;

		if ( $header_design == 'normal'  ) { 

		?>	

		<h1><?php echo single_cat_title(); ?></h1>
		
		<?php get_template_part('template-parts/header/content', 'search'); ?>

		<?php } ?>

		<?php

		$paged = get_query_var('paged') ? get_query_var('paged') : 1;

		if ( category_description() && $paged == 1 ) : 

		?>

		<div class="des-category"><?php echo category_description(); ?></div>

		<?php endif; ?>

	<?php endif; ?>


	<?php if ( is_tag() ) : ?>

		<h1><?php echo single_tag_title(); ?></h1>

		<?php get_template_part('template-parts/header/content', 'search'); ?>

		<?php if ( tag_description() ) : ?>

		<div class="des-category"><?php echo tag_description(); ?></div>

		<?php endif; ?>

	<?php endif; ?>


	<?php if ( is_search() ) : ?>

		<p class="p404"><?php _e('Results found for your search', 'asap'); ?>: <span><?php echo get_search_query() ?></span></p>

	<?php endif; ?>


	<?php if ( is_author() ) : ?>

		<?php

		$author_tw = get_the_author_meta( 'author_tw' );

		$author_fb = get_the_author_meta( 'author_fb' );

		$author_ig = get_the_author_meta( 'author_ig' );

		$author_pin = get_the_author_meta( 'author_pin' );

		$author_yt = get_the_author_meta( 'author_yt' );

		?>
		
		<h1><?php echo get_the_author(); ?></h1>

		<?php $author_description = get_the_author_meta('description'); ?>

		<?php if ( $author_description ): ?>

		<div class="des-category">
			
			<p><?php echo $author_description ?></p>
						
			<?php if ( $author_fb || $author_tw || $author_ig || $author_pin || $author_yt ) : ?>
		
				<div class="social-buttons flexbox">

					<?php if ($author_fb) : ?>

					<a href="<?php echo $author_fb;?>" class="asap-icon-single icon-facebook" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg></a>

					<?php endif; ?>

					<?php if ($author_tw) : ?>

					<a href="<?php echo $author_tw;?>" class="asap-icon-single icon-twitter" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" /></svg></a>

					<?php endif; ?>

					<?php if ($author_ig) : ?>

					<a href="<?php echo $author_ig;?>" class="asap-icon-single icon-instagram"  target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="16" height="16" rx="4" /><circle cx="12" cy="12" r="3" /><line x1="16.5" y1="7.5" x2="16.5" y2="7.501" /></svg></a>

					<?php endif; ?>

					<?php if ($author_pin) : ?>

					<a href="<?php echo $author_pin;?>" class="asap-icon-single icon-pinterest" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="8" y1="20" x2="12" y2="11" /><path d="M10.7 14c.437 1.263 1.43 2 2.55 2c2.071 0 3.75 -1.554 3.75 -4a5 5 0 1 0 -9.7 1.7" /><circle cx="12" cy="12" r="9" /></svg></a>

					<?php endif; ?>			

					<?php if ($author_yt) : ?>

					<a href="<?php echo $author_yt;?>" class="asap-icon-single icon-youtube" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="4" /><path d="M10 9l5 3l-5 3z" /></svg></a>

					<?php endif; ?>					

				</div>

			<?php endif; ?>
	
		</div>

		<?php endif; ?>
		
	<?php endif; ?>