<div class="asap-content-logo-top">
	
	<div class="site-header-content-top">
		
	<?php if ( has_custom_logo() ) : ?>
			
	<div class="site-logo"><?php the_custom_logo(); ?></div>

	<?php else: ?>
	
	<div class="site-name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></div>

	<?php endif; ?>
	
	<?php get_template_part('template-parts/menu/content','search'); ?>

	</div>
	
</div>
		