<?php
/**
 * The template for displaying all tags.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AsapTheme
 */

get_header(); 

$show_sidebar = get_theme_mod('asap_show_sidebar_tag');

$enable_featured_posts = get_theme_mod('asap_enable_featured_posts');

?>

<main class="content-loop">
	
	<?php echo asap_show_ads(5); ?>

	<?php get_template_part('template-parts/header/content', 'header'); ?>	
	
	<?php if ( $show_sidebar ) : ?>
	
	<section class="content-all">
		
	<section class="content-thin">
		
	<?php endif; ?>
	
	<section class="content-area">
		
		<?php if ( have_posts() ) : ?>
		
		<?php get_columns(); ?>
		
		<?php $columns = intval( get_query_var('columns_featured') ) * intval ( get_query_var('rows_featured') );  ?>
		
		<?php $count = 1; ?>
		
		<?php while ( have_posts() ) : the_post(); ?>
	
		<?php if ( ( $count <= $columns ) && ( $enable_featured_posts ) ) { ?>
		
		<?php get_template_part('template-parts/content/content', 'loop-featured'); ?>
		
		<?php } else { ?>
			
		<?php get_template_part('template-parts/content/content', 'loop'); ?>
	
		<?php } ?>
		
		<?php asap_show_ads_loop( $count ); ?>
		
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
		
	<?php if ( $show_sidebar ) : ?>
	
	</section>
		
	<?php get_sidebar(); ?>
		
	</section>
		
	<?php endif; ?>
	
</main>

<?php get_footer(); ?>