<?php 
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package AsapTheme
 */

get_header(); ?>

<main class="content-loop">	
	
	<?php if ( have_posts() ) : ?>

	<?php get_template_part('template-parts/header/content', 'header'); ?>	
		
	<section class="content-area">

	<?php get_columns(); ?>		
		
	<?php while ( have_posts() ) : the_post(); ?>
		
	<?php get_template_part('template-parts/content/content', 'loop'); ?>
		
	<?php endwhile; ?>
			
	</section>
			
	<?php else : ?>
		
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
		
</main>

<?php get_footer(); ?>