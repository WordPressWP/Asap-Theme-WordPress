<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://deve$header_designloper.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AsapTheme
 */

get_header(); 

$hide_sidebar = get_post_meta( get_the_ID(), 'hide_sidebar', true ); 

$hero_post = get_theme_mod('asap_hero_post', 'normal');

$header_design = get_post_meta( get_the_ID(), 'asap_header_design', true ) ?: $hero_post;

if ( ( get_theme_mod('asap_show_sidebar_single') ) && ( ! $hide_sidebar ) ) : 
	
	$class_content = 'content-thin'; 

else: 

	$class_content = 'article-full';

endif;

?>

<?php if ( $header_design != 'normal' ) {  ?>
	
<?php asap_show_hero('post'); ?>
	
<?php } ?>

<main class="content-single">
	
	<?php asap_show_ads(5); ?>
		
	<?php if ( have_posts() ) : ?>
		
	<?php while ( have_posts() ) : the_post(); ?>
	
	<?php asap_data_images(); ?>
				
	<article class="<?php echo $class_content; ?>">
				
	<?php if ( $header_design == 'normal'  ) {  ?>
	
	<?php get_template_part('template-parts/header/content', 'header'); ?>
	
	<?php } else { ?>
		
	<?php
				  
	$hide_breadcrumbs = get_theme_mod('asap_hide_breadcrumb'); 
		
	$hide_breadcrumbs_meta = get_post_meta( get_the_ID(), 'hide_breadcrumbs', true );				 
	
	if ( ! $hide_breadcrumbs && ! $hide_breadcrumbs_meta ) : asap_breadcrumbs(true); endif; 
				  
	?>

	<?php } ?>
	
	<?php get_template_part('template-parts/single/content', 'single'); ?>
			
	</article>
	
	<?php endwhile; else : ?>
	
	<?php get_template_part('template-parts/none/content', 'none'); ?>
	
	<?php endif; ?>
	
	<?php if ( ( get_theme_mod('asap_show_sidebar_single') ) && ( ! $hide_sidebar ) ) : get_sidebar(); endif; ?>
	
</main>

<?php 

get_footer(); 

if ( get_theme_mod('asap_enable_post_index') ) :
	
do_action('create_index');
	
endif;

?>