<?php	

	$enable_featured_posts = get_theme_mod('asap_enable_featured_posts');

	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		
	$args = array(	
		'post_type' => 'post',
		'paged' 	=> $paged,
		'orderby' => 'meta_value_num date',
		'order' => 'DESC',
		'meta_query' => array(
			'relation' => 'OR',
				array(
					'key' => 'featured_post',
					'compare' => 'NOT EXISTS',
			),
				array(
					'key' => 'featured_post',
					'compare' => 'EXISTS',
			), 	
    	)); 

	$query = new WP_Query( $args );
	
	$total_pages = $query->max_num_pages;

	if ( $query->have_posts() ) :

	get_columns();

	$columns = intval( get_query_var('columns_featured') ) * intval ( get_query_var('rows_featured') ); 

	$count = 1;

	while (  $query->have_posts() ) : $query->the_post();

	if ( ( $count <= $columns ) && ( $enable_featured_posts ) ) {
		
	get_template_part('template-parts/content/content', 'loop-featured');	
		
	} else {

	get_template_part('template-parts/content/content', 'loop');	
		
	}

	asap_show_ads_loop( $count );
		
	$count++;

	endwhile; wp_reset_postdata(); 

	else :

	get_template_part('template-parts/none/content', 'none');

	endif;

	?>
			
	<?php
	
	$paginate = paginate_links( array(
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $total_pages,
		'prev_text' => '«',
		'next_text' => '»',
	));	
		
	if ( $paginate ) : ?>

	<nav class="pagination"><?php echo $paginate; ?></nav>

	<?php endif; ?>