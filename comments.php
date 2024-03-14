<?php 
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AsapTheme
 */

if ( post_password_required() ) return; ?>

<div id="comentarios" class="area-comentarios">
	
	<?php if ( have_comments() ) : ?>
		
		<ol>
			
			<?php asap_comments_count(); ?>

			<?php
				wp_list_comments( array(
					'style' 		=> 'ol',
					'short_ping' 	=> true,
					'avatar_size' 	=> 42,
			)); ?>
			
		</ol>
	
		<?php

			$nav = get_the_comments_navigation( array(
					'screen_reader_text' => 'Comentarios',
				) );
			
			$nav = str_replace('<h2 class="screen-reader-text">Comentarios</h2>', '', $nav);
	
			echo $nav;
		?>
	
	<?php endif; ?>

	<?php comment_form(
			array(
				'title_reply_before' => '<p>',
				'title_reply_after' => '</p>',
			)
		);
	?>

</div>