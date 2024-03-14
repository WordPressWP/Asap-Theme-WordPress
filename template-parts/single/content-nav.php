<?php
	
$prev_post = get_next_post();
	
$next_post = get_previous_post(); 

?>

<ul class="single-nav">

	<li class="nav-prev">
		
	<?php  if ( !empty( $prev_post ) ) : ?>
		
		<a href="<?php echo get_permalink( $prev_post->ID ); ?>" ><?php echo get_the_title($prev_post) ?></a>
		
	<?php endif; ?>
		
	</li>

	<li class="nav-next">	
		
	<?php  if ( !empty ( $next_post ) ) : ?>
		
	<a href="<?php echo get_permalink( $next_post->ID ); ?>" >
		
		<?php echo get_the_title($next_post) ?>
		
	</a>
		
	<?php endif; ?>
		
	</li>		

</ul>
