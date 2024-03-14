<?php 

/* Clusters shortcode */

function add_cluster( $atts ){
	
	ob_start();
	
	$atts = shortcode_atts(
		array(
		'pages' 			=> 0,
		'posts' 			=> 0,
		'tags'              =>  '',
		'categories' 		=> '',
		'showposts' 		=> 12,			
		'order'         	=> 'DESC',
		'columns'			=> 3,
		'format'			=> 'p',			
		), $atts 
	);
	
	
	if($atts['order'] == 'rand'){
		$orderby = 'rand';		
	}else{
		$orderby = 'ID';	
	}
	
	$format = $atts['format'] ? : 'p';

	if($atts['posts']){
		$args = array(
			'post__in' 		=> explode(',', $atts['posts']),
			'post_type'		=> 'post',
			'post__not_in'  => array(get_the_ID()),
			'showposts' 	=> $atts['showposts'],
			'order'         => $atts['order'],
			'orderby'       => $orderby
		);
	}		
	
	if($atts['pages']){
		$args = array(
			'post__in' 		=> explode(',', $atts['pages']),
			'post_type'		=> 'page',
			'post__not_in'  => array(get_the_ID()),
			'showposts' 	=> $atts['showposts'],
			'order'         => $atts['order'],
			'orderby'       => $orderby
		);
	}
	
	if($atts['categories']){
		$args = array(
			'cat'			=> $atts['categories'],
			'post_type'		=> array( 'page', 'post' ),
			'post__not_in'  => array(get_the_ID()),
			'showposts' 	=> $atts['showposts'],
			'order'         => $atts['order'],
			'orderby'       => $orderby
		);
	}
	
	if($atts['tags']){
		$tags_array = explode(',', $atts['tags']);
		$args = array(
			'tag__in'        => $tags_array,
			'post_type'		=> array( 'page', 'post' ),
			'post__not_in'  => array(get_the_ID()),
			'showposts' 	=> $atts['showposts'],
			'order'         => $atts['order'],
			'orderby'       => $orderby
		);
	}	
	
	$query = new WP_Query( $args );

	if ( $query->have_posts() ) { ?>

	<div class="content-cluster">

	<?php   

		get_columns();
	
		$columns = intval( get_query_var('columns_featured') ) * intval ( get_query_var('rows_featured') ); 
		
		$count = 0;
		
		$enable_featured_posts = get_theme_mod('asap_enable_featured_posts');
		
		while ( $query->have_posts() ) :	$query->the_post(); 
				
			$cluster_columns = $atts['columns'];

			if ($cluster_columns > 5) :	$cluster_columns = 3; endif;

			set_query_var('cluster_columns', $cluster_columns);	
			
			set_query_var('format', $format);	
		
			if ( ( $count < $columns ) && ( $enable_featured_posts ) ) {
				
			get_template_part('template-parts/content/content', 'loop-featured');	
		
			} else {

			get_template_part('template-parts/content/content', 'loop-cluster');

			}

			$count++;
	
		endwhile; ?>
	
	</div>

	<?php
		
	}
	
	wp_reset_postdata();
	
	return ob_get_clean();
}

add_shortcode( 'cluster', 'add_cluster' );




/* Button shortcode */

function asap_shortcode_btn( $atts ){
	
	$target 		= '';
	$style 			= '';
	$style_div 		= '';
	$rel 			= '';

	$atts = shortcode_atts(
		array(
		'link' 			=> '',
		'target' 		=> '',
		'radius'        => 0,
		'color_bg' 		=> '',
		'color_text' 	=> '',			
		'position'      => '',
		'size'			=> 0,
		'icon'			=> '',			
		'text'			=> '',			
		'rel'			=> '',			
		'margin'		=> 0,		
		'padding'		=> 0,		
		'show_border'	=> 0
		), $atts 
	);
	
	$content = $atts['text'];
	
	if( ( ! empty($atts['icon'])) && ( get_theme_mod('asap_enable_awesome') ) ) :
		$content = '<i class="fa '.$atts['icon'].'"></i>'.$content;
	endif;

    if( $atts['target'] == 'blank') :
        $target = ' target="_blank"';
    endif;
    
	if( ! empty($atts['rel'])) :
        $rel = ' rel="'.$atts['rel'].'"';
    endif;
	
    if( ! empty($atts['radius'])) :
        $style .= 'border-radius: '.$atts['radius'].'px;';
	endif;
	
    if( ! empty($atts['color_bg'])) :
        $style .= 'background: '.$atts['color_bg'].';';
	endif;
	
    if( ! empty($atts['color_text'])) :
        $style .= 'color: '.$atts['color_text'].';';
	endif;
	
	if( ! empty($atts['size'])) :
        $style .= 'font-size: '.$atts['size'].'px;';
	endif;
	
	if( ! empty($atts['margin'])) :
        $style .= 'margin: '.$atts['margin'].'px;';
	endif;
	
 	if( ! empty($atts['padding'])) :
        $style .= 'padding: '.$atts['padding'].'px;';	
	else:
        $style .= 'padding: 10px;';		
	endif;
	
    if( $atts['show_border'] == 1) :
        $style_div .= 'border: 1px solid #DDD; padding:14px;';	
	endif;
	
    return '<div class="asap-btn-ctn-'.$atts['position'].'" style="'.$style_div.'" ><a href="'.$atts['link'].'"'.$target.' style="'.$style.'" class="asap-stc-btn"'.$rel.'>'.$content.'</a></div>';
	
	
}

add_shortcode( 'asap_btn', 'asap_shortcode_btn' );




/* Note shortcode */

function asap_note_btn( $atts, $content = null ){
	
	$style 			= '';
	$style_pa 		= '';
	
	$atts = shortcode_atts(
		array(
		'radius'        => 0,
		'color_bg' 		=> '',
		'color_text' 	=> '',			
		'position'      => '',
		'size'			=> 0,
		'text'			=> '',			
		'margin'		=> 0,		
		'padding'		=> 0,					
		), $atts 
	);
			
    if( ! empty($atts['radius'])) :
        $style .= 'border-radius: '.$atts['radius'].'px;';
	endif;
	
    if( ! empty($atts['color_bg'])) :
        $style .= 'background: '.$atts['color_bg'].';';
	endif;
	
    if( ! empty($atts['color_text'])) :
        $style_pa .= 'color: '.$atts['color_text'].';';
	endif;
		
	if( ! empty($atts['margin'])) :
        $style .= 'margin: '.$atts['margin'].'px;';
	endif;
	
 	if( ! empty($atts['padding'])) :
        $style .= 'padding: '.$atts['padding'].'px;';
	else :
		$style .= 'padding: 16px;';
	endif;
	
	if( ! empty($atts['size'])) :
        $style_pa .= 'font-size: '.$atts['size'].'px;';
	endif;
		
    return '<div class="asap-note asap-btn-ctn-'.$atts['position'].'" style="'.$style.'"><p style="'.$style_pa.'">'.$content.'</p></div>';
	
}

add_shortcode( 'asap_note', 'asap_note_btn' );




/* Pros & Cons shortcode */

function asap_pros_cons($atts, $content = null) {
	
	$style_title 	= '';
	$style_pros 	= '';
	$style_cons 	= '';
	
    $atts = shortcode_atts([
		'pros' => '', 
		'cons' => '', 
		'show_header' => 0,
		'pros_title' => '', 
		'cons_title' => '', 
		'pros_color' => '', 
		'cons_color' => '', 
		'title_color' => ''
	], $atts, 'asap_pros_cons');

	if (!empty($atts['title_color'])):
        $style_title .= 'color: ' . $atts['title_color'] . ';';
    endif;
	
    if (!empty($atts['pros_color'])):
        $style_pros .= 'background: ' . $atts['pros_color'] . ';';
    endif;

    if (!empty($atts['cons_color'])):
        $style_cons .= 'background: ' . $atts['cons_color'] . ';';
    endif;

    $iconpros = '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="' . $atts['pros_color'] . '" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>';

    $iconcons = '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="' . $atts['cons_color'] . '" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>';

    if (strlen($content) > 8)
    {
        $data = explode("###ER##GF####", do_shortcode($content) , 2);
        $atts['pros'] = $data[0];
        $atts['cons'] = $data[1];
    }

    $data = '<div class="asap-pros-cons">';

    $data .= '<div class="asap-pros">';
    if ($atts['show_header']):
        $data .= '<div class="asap-pros-cons-title" style="' . $style_pros . '"><span style="' . $style_title . '">' . $atts['pros_title'] . '</span></div>';
    endif;
    $data .= '<div class="asap-pros-cons-content">';
    $data .= asap_pros_cons_list($atts['pros'], $iconpros);
    $data .= '</div></div>';

    $data .= '<div class="asap-cons">';
    if ($atts['show_header']):
        $data .= '<div class="asap-pros-cons-title" style="' . $style_cons . '"><span style="' . $style_title . '">' . $atts['cons_title'] . '</span></div>';
    endif;
    $data .= '<div class="asap-pros-cons-content">';
    $data .= asap_pros_cons_list($atts['cons'], $iconcons);
    $data .= '</div></div>';

    $data .= '</div>';

    return $data;
}

add_shortcode('asap_pros_cons', 'asap_pros_cons');
add_shortcode('asap_pros_cons', 'asap_pros_cons');

function asap_pros_cons_list($data, $icon)
{
    $lines = explode("\n", $data);
    $lines_br = explode("<br", $data);
    if (count($lines) < count($lines_br))
    {
        $lines = $lines_br;
        $lines = array_map(function ($value)
        {
            return str_replace('/>', '', $value);
        }
        , $lines);
    }
    $list = "<ul>";
    foreach ($lines as $key => $value)
    {
        if (strlen(trim(strip_tags($value))) > 0)
        {
            $list .= "<li>" . $icon . "<span>" . $value . "</span></li>";
        }
    }
    return $list . '</ul>';
}

function asap_cons_source($attr, $content = null)
{
    return $content;
}
function asap_pros_source($attr, $content = null)
{
    return $content . "###ER##GF####";
}

add_shortcode('asap_pros', 'asap_pros_source');
add_shortcode('asap_cons', 'asap_cons_source');




/* Highlite shortcode */

function asap_highlight( $atts, $content = null ){
	
	$style 			= '';
	
	$atts = shortcode_atts(
		array(
		'color_bg' 		=> '',
		'color_text' 	=> '',						
		), $atts 
	);
	
	$style .= 'padding: 4px;';
			
	if( ! empty($atts['color_bg'])) :
        $style .= 'background: '.$atts['color_bg'].';';
	endif;
	
    if( ! empty($atts['color_text'])) :
        $style .= 'color: '.$atts['color_text'].';';
	endif;
		
    return '<span class="asap-highlight" style="'.$style.'">'.$content.'</span>';
	
}

add_shortcode( 'asap_highlight', 'asap_highlight' );





/* Categories clusters shortcode */

function add_cluster_categories( $atts ){
	
	ob_start();
	
	$atts = shortcode_atts(
		array(
		'columns'			=> 3,
		'exclude' 			=> '',
		), $atts 
	);
	
	if($atts['exclude']){
		$args = array(  
			'exclude'		=> $atts['exclude'],
		); 	
	}

	$categories = get_categories( $args ); 

	?>

	<div class="content-cluster">

	<?php
	
	foreach ( $categories as $category ) {
		
	$args = array(
		
		'category__in' => array ( $category->term_id ),
				
	);
					
	$cat_id 	= 	$category->term_id;
	
	$image_id 	= 	get_term_meta ( $cat_id, 'category-image-id', true );
	
	$thumb_url 	= 	wp_get_attachment_image_src( $image_id, 'post-thumbnail', true );
	
	$image 		= 	$thumb_url[0];
			
	$cluster_columns = $atts['columns'];

	if (($cluster_columns < 2) || ($cluster_columns > 4)) :	$cluster_columns = 3; endif;
		
	?>

	<article class="article-loop asap-columns-<?php echo $cluster_columns; ?>">
	
		<a href="<?php echo get_category_link( $category->term_id ) ; ?>" rel="bookmark">

			<?php if ( $image ) : ?>

			<div class="article-content">

				<div style="background-image: url('<?php echo $image; ?>');" class="article-image"></div>

			</div>

			<?php endif; ?>
			
			<p class="entry-title">
				<?php echo $category->name; ?>
			</p>

		</a>
	
	</article>
			
			
	<?php
		
	}
	
	?>
		
	</div>
		
	<?php
	
	return ob_get_clean();
}

add_shortcode( 'categories', 'add_cluster_categories' );




/* Search in post - page */

function asap_shortcode_search(){
	
	ob_start();

	$asap_search_text = get_theme_mod('asap_search_text'); 

	if ( ! $asap_search_text ) : $asap_search_text = esc_html( __( "Search", "asap" ) ) ; endif; 	
	
	?>
	
	<div class="search-home">

		<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">

			<input autocomplete="off" id="search-home" placeholder="<?php echo $asap_search_text; ?>" value="<?php echo get_search_query() ?>" name="s" required>
			
			<?php if (function_exists('is_woocommerce')): ?>

		   	<input type="hidden" value="product" name="post_type">
			
		   	<?php endif;?>

			<button class="s-btn" type="submit" aria-label="<?php echo esc_html( __( "Search", "asap" ) ); ?>" >
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
					<circle cx="11" cy="11" r="8"></circle>
					<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
				</svg>
			</button>

		</form>	

	</div>
	
	<?php 
	
	return ob_get_clean();
	
}

add_shortcode( 'asap_search', 'asap_shortcode_search' );




/* Cluster child pages */

function asap_cluster_child_pages( $atts ){
	
	ob_start();

	$args = array(
		'post_type'		=> 'page',
		'post__not_in'  => array(get_the_ID()),
    	'post_parent'	=> get_the_ID(),
    	'post_status' 	=> 'publish', 
	);
		

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) { ?>

	<div class="content-cluster">

	<?php   
		
		get_columns();
		
		$count = 0;
		
		$enable_featured_posts = get_theme_mod('asap_enable_featured_posts');
		
		while ( $query->have_posts() ) :	$query->the_post(); 
				
			$cluster_columns = $atts['columns'];

			if ($cluster_columns > 5) :	$cluster_columns = 3; endif;

			set_query_var('cluster_columns', $cluster_columns);	
		
			if ( ( $count < $cluster_columns ) && ( $enable_featured_posts ) ) {
				
			get_template_part('template-parts/content/content', 'loop-featured');	
		
			} else {

			get_template_part('template-parts/content/content', 'loop-cluster');

			}

			$count++;
	
		endwhile; ?>
	
	</div>

	<?php
		
	}
	
	wp_reset_postdata();
	
	return ob_get_clean();
}

add_shortcode( 'asap_child_pages', 'asap_cluster_child_pages' );






function asap_cluster_categories( $atts ){
	
	ob_start();
	
	$atts = shortcode_atts(
		array(
		'id' 			=> '',
		'color_bg' 		=> '',
		'color_text' 	=> '',
		'color_stars' 	=> '',
		'show_icon' 	=> '',
		'show_stars' 	=> '',
		'columns'       => 6,
		'size_text' 	=> 17,			
		), $atts 
	);
	
	$args = array(
		'include'		=> $atts['id'],
		'post_type'		=> array( 'page', 'post' ),
		'orderby'       => 'name',
		'order'         => 'ASC',
	);
	
	$categories = get_categories( $args ); 
	
	?>

	<div class="asap-content-clusters-cats">

	<?php 
	
	$enable_awesome = get_theme_mod('asap_enable_awesome');
	
	foreach ( $categories as $category ) { 
		
		$cat_id 	= 	$category->term_id;
	
		$image_id 	= 	get_term_meta ( $cat_id, 'category-image-id', true );

		$thumb_url 	= 	wp_get_attachment_image_src( $image_id, 'post-thumbnail', true );

		$image 		= 	$thumb_url[0];
		
		?>
		<a style="color:<?php echo $atts['color_text'];?>;background-color:<?php echo $atts['color_bg'];?>;" href="<?php echo get_category_link( $category->term_id ) ; ?>" class="asap-clusters-cats asap-clusters-cols-<?php echo $atts['columns']; ?>" > 
			
			<?php if ( $atts['show_icon'] == 'yes' && $image )  { ?>
			
			<img src="<?php echo $image; ?>" alt="<?php echo $category->name; ?>" width="<?php echo $thumb_url[1]; ?>" height="<?php echo $thumb_url[2]; ?>" loading="lazy" />
			
			<?php } ?>

			<span style="font-size:<?php echo $atts['size_text'];?>px;"><?php echo $category->name; ?></span>
			
			<?php if ( ( $atts['show_stars'] == 'yes' ) && $enable_awesome ) { ?>
			
			<span class="asap-stars">
				<i class="fas fa-star" style="color:<?php echo $atts['color_stars']; ?>;"></i>
				<i class="fas fa-star"  style="color:<?php echo $atts['color_stars']; ?>;"></i>
				<i class="fas fa-star"  style="color:<?php echo $atts['color_stars']; ?>;"></i>
				<i class="fas fa-star"  style="color:<?php echo $atts['color_stars']; ?>;"></i>
				<i class="fas fa-star"  style="color:<?php echo $atts['color_stars']; ?>;"></i>
			</span>
			
			<?php } ?>

		</a>

	<?php } ?>
					
	</div>

	<?php
	
	wp_reset_postdata();
	
	return ob_get_clean();
}

add_shortcode( 'asap_categories', 'asap_cluster_categories' );



?>