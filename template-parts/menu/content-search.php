	<?php 

	$asap_search_text = get_theme_mod('asap_search_text') ?: esc_html( __( "Search", "asap" ) );

	?>

	<?php if  ( get_theme_mod('asap_show_search')  ) : ?>

	<div class="search-header">

		<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">

			<input autocomplete="off" id="search-header" placeholder="<?php echo $asap_search_text; ?>" value="<?php echo get_search_query() ?>" name="s" required>
		
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