<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AsapTheme
 */

get_header(); ?>

<main class="content-loop">
	
	<section class="content-area">
		
		<?php if ( have_posts() ) : ?>
		
		<?php get_columns(); ?>
				
		<?php while ( have_posts() ) : the_post(); ?>
				
		<?php get_template_part('template-parts/content/content', 'loop'); ?>
		
		<?php endwhile; else : ?>
		
		<?php get_template_part('template-parts/none/content', 'none'); ?>
		
		<?php endif; ?>
					
		<?php 
			
		$paginate = paginate_links( array(
			'prev_text' => '«',
            'next_text' => '»',
		));	
			
		if ( $paginate ) : ?>

		<nav class="pagination"><?php echo $paginate; ?></nav>

		<?php endif; ?>
					
	</section>
	
</main>

<?php get_footer(); ?>