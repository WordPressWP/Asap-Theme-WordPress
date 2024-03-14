<?php 

$deactivate_background 		= get_query_var('deactivate_background');

$asap_anchor_side			= get_post_meta( get_the_ID(), 'asap_anchor_side', true ); 
$featured_post 				= get_post_meta( get_the_ID(), 'featured_post', true );  
$single_featured_text		= get_post_meta( get_the_ID(), 'single_bc_featured', true ); 

$featured_text 				= $single_featured_text ?: get_theme_mod('asap_featured_text') ?: __("Featured", "asap");

?>

<article class="article-loop asap-columns-1">
	
	<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		
		<?php if ( has_post_thumbnail() ) : ?>
		
		<div class="article-content">
		
			<?php if ( $featured_post || $single_featured_text ) : ?>
	
			<span class="item-featured"><?php echo $featured_text; ?></span>

			<?php endif; ?>

			<?php if ( ! $deactivate_background ) : ?>
			
			<div style="background-image: url('<?php echo asap_side_thumbnail(); ?>');" class="article-image"></div>
			
			<?php else : 
			
			the_post_thumbnail('side-thumbnail'); 
			
			endif; ?>
			
		</div>
		
		<?php endif; ?>
			
		<?php
		
		$title = $asap_anchor_side ? esc_html( $asap_anchor_side ) : get_the_title();
		
		echo '<p class="entry-title">' . $title . '</p>';
	
		?>						
			
	</a>
	
</article>