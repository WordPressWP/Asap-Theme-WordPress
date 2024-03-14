<?php 

$show_cats = get_theme_mod('asap_show_search_cate');

$show_home = get_theme_mod('asap_show_search_index');

$show_tags = get_theme_mod('asap_show_search_tags');

if ( ( is_front_page() && $show_home ) || ( is_category() && $show_cats ) || ( is_tag() && $show_tags ) || is_search() ) :

	$asap_search_text = get_theme_mod('asap_search_text') ?: esc_html( __( "Search", "asap" ) );

	?>

<div class="search-home">

	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">

		<input autocomplete="off" id="search-home" placeholder="<?php echo $asap_search_text; ?>" value="<?php echo get_search_query() ?>" name="s" required>
		
		<?php if (function_exists('is_woocommerce')): ?>

		<input type="hidden" value="product" name="post_type">
			
		<?php endif;?>
			
		<button class="s-btn" type="submit" aria-label="<?php echo esc_html( __( "Search", "asap" ) ); ?>">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				<circle cx="11" cy="11" r="8"></circle>
				<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
			</svg>
		</button>

	</form>	

</div>

<?php endif; ?>