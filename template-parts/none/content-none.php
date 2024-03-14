	<?php if ( (is_single()) || (is_page()) ) : ?>

		<p class="p404"><?php _e('Nothing found', 'asap'); ?></p>

	<?php endif; ?>

	<?php if ( (is_front_page()) || (is_tag()) || (is_category()) || (is_author()) ) : ?>

		<p class="p404"><?php _e('There are no published articles yet.','asap'); ?></p>

	<?php endif; ?>

	<?php if(is_search()) : ?>

		<p class="p404"><?php _e('We have not found results for your search', 'asap'); ?> <span><?php echo get_search_query() ?></span>.</p>

		<?php echo do_shortcode('[asap_search]'); ?>
	
	<?php endif; ?>

	<?php if(is_404()) : ?>

		<p class="p404"><?php _e('Nothing found', 'asap'); ?>.</p>

	<?php endif; ?>

	<?php if ( (is_search()) || (is_404()) ) : ?>
		
		<p><?php _e('Other items that might interest you', 'asap'); ?></p>

		<div class="content-area">

		<?php 

		global $post;
			
		$cols = get_theme_mod('asap_columns');
					
		$last_posts = get_posts(array('showposts' => $cols, 'orderby' => 'rand'));
		
		foreach ( $last_posts as $post ) :
		
		setup_postdata( $post );

		get_columns();
		
		get_template_part('template-parts/content/content', 'loop');
		
		endforeach; wp_reset_postdata();
			
		?>
			
		</div>
			
<?php endif; ?>
