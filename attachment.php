<?php
/**
 * The template for displaying attachments.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AsapTheme
 */

get_header(); ?>

<main class="content-single">
	
	<section class="content-attachment">
		
		<div class="image-attachment">
		
		<?php 
			$image_size = apply_filters( 'wporg_attachment_size', 'large' ); 
			echo wp_get_attachment_image( get_the_ID(), $image_size );
		?>
			 
		</div>
			
		<nav class="pagination">
			<?php previous_image_link( false, '«' ); ?>
			<?php next_image_link( false, '»' ); ?>
		</nav>
		
	</section>
	
</main>

<?php get_footer(); ?>