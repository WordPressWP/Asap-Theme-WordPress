<?php
/*
 * AsapTheme WooCommerce integration and compatibility
 *
 * @link https://es.wordpress.org/plugins/woocommerce/
 * @package AsapTheme
 */

function asap_wc_check () {
	
	if (function_exists('is_woocommerce')) {

		if ( is_cart() || is_checkout() || is_account_page() || is_woocommerce() ) {

			return true;

		} else {

			return false;

		}
	
	} else {
		
		return false;	
		
	}
	
}

if (function_exists('is_woocommerce')):

	add_filter('woocommerce_enqueue_styles', 'asap_wc_dequeue_styles');

	function asap_wc_dequeue_styles($enqueue_styles) {

		unset($enqueue_styles['woocommerce-general']);

		return $enqueue_styles;
	}

	add_action('wp_enqueue_scripts', 'asap_wc_scripts', 9);

	function asap_wc_scripts() {

		wp_enqueue_style('asap-woocommerce-style', get_template_directory_uri() . '/assets/css/woocommerce.min.css', array() , '02170921');

		$font_path   = WC()->plugin_url() . '/assets/fonts/';

		$inline_font = '@font-face {
				font-family: "star";
				src: url("' . $font_path . 'star.eot");
				src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
					url("' . $font_path . 'star.woff") format("woff"),
					url("' . $font_path . 'star.ttf") format("truetype"),
					url("' . $font_path . 'star.svg#star") format("svg");
				font-weight: normal;
				font-style: normal;
			}
			@font-face {
				font-family: "WooCommerce";
				src: url("' . $font_path . 'WooCommerce.eot");
				src: url("' . $font_path . 'WooCommerce.eot?#iefix") format("embedded-opentype"),
					url("' . $font_path . 'WooCommerce.woff") format("woff"),
					url("' . $font_path . 'WooCommerce.ttf") format("truetype"),
					url("' . $font_path . 'WooCommerce.svg#WooCommerce") format("svg");
				font-weight: normal;
				font-style: normal;
			}';

		wp_add_inline_style('asap-woocommerce-style', $inline_font);

	}

	remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);

	remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

	add_filter('woocommerce_product_additional_information_heading', '__return_false');

	add_filter('woocommerce_product_description_heading', '__return_false');

	add_action('after_setup_theme', 'asap_wc_setup');

	function asap_wc_setup() {

		add_theme_support('wc-product-gallery-zoom');

		add_theme_support('wc-product-gallery-lightbox');

		add_theme_support('wc-product-gallery-slider');

	}

	remove_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title', 10 );

	add_action('woocommerce_shop_loop_item_title', 'asap_wc_template_loop_product_title', 10 );

	function asap_wc_template_loop_product_title() {
		echo '<p class="woocommerce-loop-product__title">' . get_the_title() . '</p>';
	}

	add_action('woocommerce_before_single_product_summary', 'asap_wc_single_product_before', -99);

	function asap_wc_single_product_before() {
		echo '<div class="product-gallery-summary">';
	}

	add_filter('woocommerce_breadcrumb_defaults', 'asap_wc_change_breadcrumb');

	function asap_wc_change_breadcrumb($defaults) {
		$defaults['delimiter'] = '<span>›</span>';
		return $defaults;
	}




	add_filter('woocommerce_output_related_products_args', 'asap_wc_related_products_args', 20);

	function asap_wc_related_products_args($args) {

		$columns = get_theme_mod('asap_wc_related_prod_columns');

		$posts   = get_theme_mod('asap_wc_related_number');

		if ($columns):

			$args['columns']         = $columns;

		else:

			$args['columns']         = 4;

		endif;

		if ($posts):

			$args['posts_per_page'] = $posts;

		else:

			$args['posts_per_page'] = 4;

		endif;

		return $args;
	}


	add_action('wp_head', 'asap_wc_products_options');

	function asap_wc_products_options($product) {

		if (get_theme_mod('asap_wc_deactivate_add_to_cart')):

			remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

		endif;

		if (get_theme_mod('asap_wc_deactivate_related_products')):

			remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

		endif;

	}


	add_filter('woocommerce_product_add_to_cart_text', 'asap_wc_archive_custom_cart_button_text');

	function asap_wc_archive_custom_cart_button_text() {

		$add_to_cart_text = get_theme_mod('asap_wc_cart_button_text');

		if ($add_to_cart_text):

			return __($add_to_cart_text, 'woocommerce');

		else:

			return __('Add to cart', 'woocommerce');

		endif;

	}

	add_filter('woocommerce_product_single_add_to_cart_text', 'asap_wc_custom_cart_button_text');

	function asap_wc_custom_cart_button_text() {

		$add_to_cart_text = get_theme_mod('asap_wc_cart_button_text');

		if ($add_to_cart_text):

			return __($add_to_cart_text, 'woocommerce');

		else:

			return __('Add to cart', 'woocommerce');

		endif;

	}

	add_filter('woocommerce_sale_flash', 'asap_wc_add_percent_discount', 20, 3);

	function asap_wc_add_percent_discount($html, $post, $product) {

		if (!get_theme_mod('asap_wc_disable_saving')) {

			if ($product->is_type('variable')) {

				$percentages   = array();

				$prices        = $product->get_variation_prices();

				foreach ($prices['price'] as $key           => $price) {

					if ($prices['regular_price'][$key] !== $price) {

						$percentages[]               = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100));

					}
				}

				$percentage    = max($percentages) . '%';

			}
			else {

				$regular_price = (float)$product->get_regular_price();

				$sale_price    = (float)$product->get_sale_price();

				$percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';

			}

			return '<span class="onsale">' . esc_html__('Ahorras un', 'woocommerce') . ' ' . $percentage . '</span>';

		}
		else {

			return '<span class="onsale">' . __('Sale', 'woocommerce') . '</span>';

		}
	}

	add_action('wp_enqueue_scripts', 'asap_wc_dequeue_styles_scripts', 99);

	function asap_wc_dequeue_styles_scripts() {

		$remove_dependencies = get_theme_mod('asap_wc_remove_dependencies');

		if (!is_woocommerce() && !is_cart() && !is_checkout() && ($remove_dependencies)) {

			wp_dequeue_style('woocommerce-general');
			wp_dequeue_style('woocommerce-layout');
			wp_dequeue_style('woocommerce-smallscreen');
			wp_dequeue_style('woocommerce_frontend_styles');
			wp_dequeue_style('woocommerce_fancybox_styles');
			wp_dequeue_style('woocommerce_chosen_styles');
			wp_dequeue_style('woocommerce_prettyPhoto_css');
			wp_dequeue_script('wc_price_slider');
			wp_dequeue_script('wc-single-product');
			wp_dequeue_script('wc-add-to-cart');
			wp_dequeue_script('wc-cart-fragments');
			wp_dequeue_script('wc-checkout');
			wp_dequeue_script('wc-add-to-cart-variation');
			wp_dequeue_script('wc-single-product');
			wp_dequeue_script('wc-cart');
			wp_dequeue_script('wc-chosen');
			wp_dequeue_script('woocommerce');
			wp_dequeue_script('prettyPhoto');
			wp_dequeue_script('prettyPhoto-init');
			wp_dequeue_script('jquery-blockui');
			wp_dequeue_script('jquery-placeholder');
			wp_dequeue_script('fancybox');
			wp_dequeue_script('jqueryui');

		}
	}



	function asap_wc_cart_link() {

		if ( ! get_theme_mod('asap_wc_disable_header_cart') ) {

			$link = '<a class="cart-contents" href="' . esc_url( wc_get_cart_url() ) . '">';
			$link .= '<span class="cart-count"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="6" cy="19" r="2" /><circle cx="17" cy="19" r="2" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg><span class="count-number">' . esc_html( WC()->cart->get_cart_contents_count() ) . '</span></span>';
			$link .= '</a>';

			return $link;

		}	
	}



	function asap_wc_account_link() {

		if ( ! get_theme_mod('asap_wc_disable_header_account') )  {

			$link = '<a class="header-item wc-account-link" href="' . esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ) . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg></a>';

			return $link;

		}

	}



	add_action( 'product_cat_add_form_fields', 'asap_wc_add_cat_editor', 10, 2 );

	function asap_wc_add_cat_editor() {
		?>
		<div class="form-field">
			<label for="desc"><?php echo __('Descripción de abajo', 'woocommerce'); ?></label>
			<?php
			$settings = array(
			'textarea_name' => 'seconddesc',
			'quicktags' => array(
				'buttons' => 'em,strong,link'
			) ,
			'tinymce' => array(
				'theme_advanced_buttons1' => 'bold,italic,strikethrough,separator,bullist,numlist,separator,blockquote,separator,justifyleft,justifycenter,justifyright,separator,link,unlink,separator,undo,redo,separator',
				'theme_advanced_buttons2' => '',
			) ,
			'editor_css' => '<style>#wp-excerpt-editor-container .wp-editor-area{height:75px; width:80%;}</style>',
		);

		wp_editor('', 'seconddesc', $settings);

		?>

		<p class="description"><?php echo __('Este texto va en la zona de abajo de las categorías', 'woocommerce'); ?></p>
		</div>
		<?php
		}

		add_action('product_cat_edit_form_fields', 'asap_wc_add_cat_editor_bym', 10, 2);

		function asap_wc_add_cat_editor_bym($term)
		{
			$second_desc = htmlspecialchars_decode(get_woocommerce_term_meta($term->term_id, 'seconddesc', true));
		?>
			<tr class="form-field">
				<th scope="row" valign="top"><label for="second-desc"><?php echo __('Descripción de abajo', 'woocommerce'); ?></label></th>
				<td>
				<?php
				$settings = array(
				'textarea_name' => 'seconddesc',
				'quicktags' => array(
					'buttons' => 'em,strong,link'
				) ,
				'tinymce' => array(
					'theme_advanced_buttons1' => 'bold,italic,strikethrough,separator,bullist,numlist,separator,blockquote,separator,justifyleft,justifycenter,justifyright,separator,link,unlink,separator,undo,redo,separator',
					'theme_advanced_buttons2' => '',
				) ,
				'editor_css' => '<style>#wp-excerpt-editor-container .wp-editor-area{height:125px; width:100%;}</style>',
			);

			wp_editor($second_desc, 'seconddesc', $settings);
		?>

					<p class="description"><?php echo __('Este texto va en la zona inferior de la categoría de productos', 'woocommerce'); ?></p>
				</td>
			</tr>
			<?php
		}

		add_action('edit_term', 'asap_wc_cat_save', 10, 3);

		add_action('created_term', 'asap_wc_cat_save', 10, 3);

		function asap_wc_cat_save($term_id, $tt_id    = '', $taxonomy = '')
		{

			if (isset($_POST['seconddesc']) && 'product_cat' === $taxonomy)

			{
				update_woocommerce_term_meta($term_id, 'seconddesc', esc_attr($_POST['seconddesc']));

			}

		}

		add_action('woocommerce_after_shop_loop', 'asap_wc_show_cat_desc', 5);

		function asap_wc_show_cat_desc()
		{
			if (is_product_taxonomy())
			{
				$term = get_queried_object();

				if ($term && !empty(get_woocommerce_term_meta($term->term_id, 'seconddesc', true)))

				{

					echo '<p class="term-description">' . wc_format_content(htmlspecialchars_decode(get_woocommerce_term_meta($term->term_id, 'seconddesc', true))) . '</p>';

				}

			}
		}



		add_action('woocommerce_before_shop_loop', 'asap_wc_show_search', 5);

		function asap_wc_show_search() {
			
			if ( get_theme_mod('asap_show_search_wc') ) {
			
				get_template_part('template-parts/header/content', 'search-wc');
				
			}
			
		}



endif;




?>