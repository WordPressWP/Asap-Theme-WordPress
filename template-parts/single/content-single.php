	<?php 

	$hide_image = get_post_meta( get_the_ID(), 'hide_image_post', true ); 

	$hero_post = get_theme_mod('asap_hero_post', 'normal');

	$header_design = get_post_meta( get_the_ID(), 'asap_header_design', true ) ?: $hero_post;

	?>

	<?php if ( get_theme_mod('asap_design') ) { ?>

	<div class="asap-content-box">
			
	<?php } ?>
		
	<?php if ( has_post_thumbnail() && !$hide_image && !get_theme_mod('asap_hide_image_featured') && $header_design == 'normal' ) : ?>

	<div class="post-thumbnail"><?php the_post_thumbnail('large', [ 'loading' => false ]); ?></div>

	<?php endif; ?>	

	<?php asap_show_ads(1); ?>

	<div class="the-content">
	
	<?php 
			
	the_content(); 
		
	asap_show_dynamic_single();
		
	if ( get_theme_mod('asap_index_pos') == 3 ) : echo do_shortcode('[asap_toc]'); endif; 
		
	if ( get_theme_mod('asap_show_tags') ) : the_tags( '<div class="content-tags">', '', '</div>' ); endif; 	

	wp_link_pages( array(
		'before'      => '<nav class="pagination">',
		'after'       => '</nav>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'next',
		'separator'        => ' ',
		'nextpagelink'     => '»',
		'previouspagelink' => '«',
		'pagelink'         => '%',
		'echo'             => 1
		)
	);
	
	
	?>				
	
	</div>

	<?php if ( get_theme_mod('asap_design') ) { ?>

	</div>
			
	<?php } ?>

	<?php

	/* */

	$show_social_buttons_after = get_theme_mod('asap_show_social_buttons_after');
	
	$show_social_buttons_bottom = get_theme_mod('asap_show_social_buttons_bottom');

	$social_post_types = get_theme_mod('asap_social_post_types');

	$hide_social = get_post_meta( get_the_ID(), 'hide_social_btn', true ); 
	
	if 	( ( $show_social_buttons_after ) && ( ( $social_post_types == 1 ) || ( $social_post_types == 2 ) ) && ( ! $hide_social ) ) : 

	get_template_part('template-parts/social/content', 'social');

	endif; 


	/* */

	asap_show_author_box();


	/* */
	
	if ( get_theme_mod('asap_show_nav_single') ) :

	get_template_part('template-parts/single/content', 'nav');

	endif;


	/* */

	asap_show_ads(2);


	/* */

	$hide_related = get_post_meta( get_the_ID(), 'hide_related_post', true ); 

	if ( ( get_theme_mod('asap_show_related_single') ) && ( ! $hide_related ) )  :

	get_template_part('template-parts/loops/loop', 'related');

	endif;


	/* */	
	
	comments_template(); 	


	/* */

	if ( ( $show_social_buttons_bottom ) && ( ( $social_post_types == 1 ) || ( $social_post_types == 2 ) ) && ( ! $hide_social ) ) : 
	
	?>

	<div class="social-fix">
			
	<?php get_template_part('template-parts/social/content', 'social'); ?>
			
	</div>	

	<?php endif; ?>