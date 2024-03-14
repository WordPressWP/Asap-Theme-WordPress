<?php 
/**
 * The template for displaying WooCommerce settings
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AsapTheme
 */

get_header(); 

if ( ( get_theme_mod('asap_show_sidebar_products') ) && is_product() ) :  

	$class_content = 'content-thin'; 

else: 

	$class_content = 'article-full'; 

endif;

$disable_breadcrumbs = get_theme_mod('asap_wc_disable_breadcrumbs');

?>

<main class="content-wc">
		
	<?php if ( have_posts() ) : ?>
		
	<article class="<?php echo $class_content; ?>">
		
	<?php if ( ( ! $disable_breadcrumbs ) && is_product() ) : woocommerce_breadcrumb(); endif; ?>
					
	<?php woocommerce_content(); ?>
			
	</article>
	
	<?php else : ?>
	
	<?php get_template_part('template-parts/none/content', 'none'); ?>
	
	<?php endif; ?>
	
	<?php if ( ( get_theme_mod('asap_show_sidebar_products') ) && is_product() ) : get_sidebar(); endif; ?>
	
</main>

<?php 

get_footer(); 

?>
