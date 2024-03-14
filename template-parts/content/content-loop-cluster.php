<?php 

$show_cluster_extract 		= get_theme_mod('asap_show_cluster_extract');

$cluster_columns 			= get_query_var('cluster_columns');
$text_show_more 			= get_query_var('text_show_more');
$deactivate_background 		= get_query_var('deactivate_background');
$loop_format 				= get_query_var('format');

$asap_anchor_cluster		= get_post_meta( get_the_ID(), 'asap_anchor_cluster', true );  
$featured_post 				= get_post_meta( get_the_ID(), 'featured_post', true );  
$single_featured_text		= get_post_meta( get_the_ID(), 'single_bc_featured', true );  

$featured_text 				= $single_featured_text ?: get_theme_mod('asap_featured_text') ?: __("Featured", "asap");

if ( get_theme_mod('asap_design') ) :

?>

	<article class="article-loop asap-columns-<?php echo $cluster_columns; ?>">

		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">

			<?php if ( has_post_thumbnail() ) : ?>

			<div class="article-content">

				<?php if ( $featured_post || $single_featured_text ) : ?>

				<span class="item-featured"><?php echo $featured_text; ?></span>

				<?php endif; ?>

				<?php if ( ! $deactivate_background ) : ?>

				<div style="background-image: url('<?php echo asap_post_thumbnail(); ?>');" class="article-image"></div>

				<?php else : 

				the_post_thumbnail(); 

				endif; ?>

			</div>

			<?php endif; ?>

			<div class="asap-box-container">

			<?php

			$title = $asap_anchor_cluster ? $asap_anchor_cluster : get_the_title();

			echo '<'.$loop_format.' class="entry-title">' . $title . '</'.$loop_format.'>';

			?>

			<?php if ( $show_cluster_extract ) : ?>

			<div class="show-extract">

				<?php the_excerpt(); ?>	

				<?php if ( $text_show_more ) : ?>

				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $text_show_more; ?></a>

				<?php endif; ?>

			</div>

			<?php endif; ?>
			
			</div>

		</a>

	</article>

<?php else : ?>

	<article class="article-loop asap-columns-<?php echo $cluster_columns; ?>">

		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">

			<?php if ( has_post_thumbnail() ) : ?>

			<div class="article-content">

				<?php if ( $featured_post || $single_featured_text ) : ?>

				<span class="item-featured"><?php echo $featured_text; ?></span>

				<?php endif; ?>

				<?php if ( ! $deactivate_background ) : ?>

				<div style="background-image: url('<?php echo asap_post_thumbnail(); ?>');" class="article-image"></div>

				<?php else : 

				the_post_thumbnail(); 

				endif; ?>

			</div>

			<?php endif; ?>

			<?php

			$title = $asap_anchor_cluster ? $asap_anchor_cluster : get_the_title();

			echo '<'.$loop_format.' class="entry-title">' . $title . '</'.$loop_format.'>';

			?>

		</a>

		<?php if ( $show_cluster_extract ) : ?>

		<div class="show-extract">

			<?php the_excerpt(); ?>	

			<?php if ( $text_show_more ) : ?>

			<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $text_show_more; ?></a>

			<?php endif; ?>

		</div>

		<?php endif; ?>

	</article>

<?php endif; ?>