<?php

$show_category 				= get_query_var('show_category'); 

$featured_post 				= get_post_meta( get_the_ID(), 'featured_post', true );  
$single_featured_text		= get_post_meta( get_the_ID(), 'single_bc_featured', true );  
$asap_anchor_home			= get_post_meta( get_the_ID(), 'asap_anchor_home', true );  

$loop_format 				= get_theme_mod('asap_loop_format') ? : 'p';

$featured_text 				= $single_featured_text ?: get_theme_mod('asap_featured_text') ?: __("Featured", "asap");

$columns 					= get_query_var('cluster_columns') ? : get_query_var('columns_featured');

?>

<article class="article-loop-featured asap-columns-<?php echo $columns; ?>">
	
	<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
				
		<div style="background-image: url('<?php echo asap_post_thumbnail(); ?>');" class="article-image-featured">

			<?php if ( $featured_post || $single_featured_text ) : ?>

			<span class="item-featured"><?php echo $featured_text; ?></span>

			<?php endif; ?>
				
			<?php if ( $show_category ) : ?>

			<div class="content-item-category">

				<?php foreach ( ( get_the_category() ) as $category ) : ?>

				<span><?php echo $category->cat_name; ?></span>

				<?php endforeach; ?>

			</div>

			<?php endif; ?>
				
			<?php

			$title = $asap_anchor_home ? $asap_anchor_home : get_the_title();
				
			echo '<'.$loop_format.' class="entry-title">' . $title . '</'.$loop_format.'>';

			?>
				
		</div>			

	</a>
	
</article>