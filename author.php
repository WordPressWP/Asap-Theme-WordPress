<?php 
/**
 * The template for displaying the author.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AsapTheme
 */

get_header(); 

$enable_featured_posts = get_theme_mod('asap_enable_featured_posts');

?>

<main class="content-loop">
	
	<?php get_template_part('template-parts/header/content', 'header'); ?>
	
	<section class="content-area">
				
		<?php if ( have_posts() ) : ?>
		
		<?php get_columns(); ?>
		
		<?php $columns = get_query_var('columns');  ?>
		
		<?php $count = 1; ?>
		
		<?php while ( have_posts() ) : the_post(); ?>
		
		<?php if ( ( $count <= $columns ) && ( $enable_featured_posts ) ) { ?>
		
		<?php get_template_part('template-parts/content/content', 'loop-featured'); ?>
		
		<?php } else { ?>
			
		<?php get_template_part('template-parts/content/content', 'loop'); ?>
	
		<?php } ?>
		
		<?php $count++; ?>
		
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