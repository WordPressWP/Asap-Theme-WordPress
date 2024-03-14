<?php

$columns_rels 			= get_query_var('columns_rels'); 
$deactivate_background 	= get_query_var('deactivate_background'); 
$asap_anchor_related	= get_post_meta( get_the_ID(), 'asap_anchor_related', true );  

?>

<article class="article-loop asap-columns-<?php echo $columns_rels; ?>">
	
	<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		
		<?php if ( has_post_thumbnail() ) : ?>
		
		<div class="article-content">

			<?php if ( ! $deactivate_background ) : ?>
			
			<div style="background-image: url('<?php echo asap_post_thumbnail(); ?>');" class="article-image"></div>
			
			<?php else : 
			
			the_post_thumbnail(); 
			
			endif; ?>
			
		</div>
		
		<?php endif; ?>
		
		<?php if ( get_theme_mod('asap_design') ) { ?>

		<div class="asap-box-container">

		<?php } ?>
		
		<?php
		
		$title = $asap_anchor_related ? esc_html( $asap_anchor_related ) : get_the_title();
			
		echo '<p class="entry-title">' . $title . '</p>';
	
		?>
		
		<?php if ( get_theme_mod('asap_design') ) { ?>

		</div>

		<?php } ?>				
	</a>
	
</article>