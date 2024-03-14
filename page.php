<?php 
/**
 * The template for displaying all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AsapTheme
 */

get_header(); 

$hide_sidebar = get_post_meta( get_the_ID(), 'hide_sidebar', true ); 

$hero_page = get_theme_mod('asap_hero_page', 'normal');

$header_design = get_post_meta( get_the_ID(), 'asap_header_design', true ) ?: $hero_page;

$wc = asap_wc_check();

$hide_sidebar = $wc ? true : false;

if ( ( get_theme_mod('asap_show_sidebar_page') ) && ( ! $hide_sidebar ) ) :  

	$class_content = 'content-thin'; 

else: 

	$class_content = 'article-full'; 

endif;

?>	

<?php if ( $header_design != 'normal' ) {  ?>
	
<?php asap_show_hero('page'); ?>
	
<?php } ?>

<main class="content-page">
				
	<?php asap_show_ads(5); ?>

	<?php if ( have_posts() ) : ?>
		
	<?php while ( have_posts() ) : the_post(); ?>

	<?php asap_data_images(); ?>
	
	<article class="<?php echo $class_content; ?>">
		
	<?php if ( $header_design == 'normal'  ) {  ?>
	
	<?php get_template_part('template-parts/header/content', 'header'); ?>
	
	<?php } else { ?>
	
	<?php asap_breadcrumbs_pages( $post, true ); ?>

	<?php } ?>
		
	<?php get_template_part('template-parts/page/content', 'page'); ?>
			
	</article>
	
	<?php endwhile; else : ?>
	
	<?php get_template_part('template-parts/none/content', 'none'); ?>
	
	<?php endif; ?>
	
	<?php if ( ( get_theme_mod('asap_show_sidebar_page') ) && ( ! $hide_sidebar ) ) : get_sidebar(); endif; ?>
	
</main>

<?php 

get_footer(); 

if ( get_theme_mod('asap_enable_page_index') ) :
	
do_action('create_index');
	
endif;

?>
