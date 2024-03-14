<?php
/**
 * The main template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AsapTheme
 */

get_header(); 

$show_sidebar = get_theme_mod('asap_show_sidebar_home');

       
?>

<main class="content-loop">
	
	<?php asap_show_ads(5); ?>
	
	<?php get_template_part('template-parts/header/content', 'header'); ?>	
	
	<?php asap_show_home_text_before(); ?>
	
	<?php if ( $show_sidebar ) : ?>
	
	<section class="content-all">
		
	<section class="content-thin">
		
	<?php endif; ?>
	
	<section class="content-area">
					
		<?php get_template_part('template-parts/loops/loop', 'last'); ?>
		
	</section>
	
	<?php asap_show_home_text_after(); ?>
		
	<?php if ( $show_sidebar ) : ?>
	
	</section>
		
	<?php get_sidebar(); ?>
		
	</section>
		
	<?php endif; ?>
	
</main>

<?php get_footer(); ?>