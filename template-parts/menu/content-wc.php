<?php	

if ( function_exists( 'is_woocommerce' ) ) { 	

?>

<div class="site-header-wc">

	<?php									
		echo asap_wc_account_link();
		echo asap_wc_cart_link();												
	?>
	
</div>

<?php }	?>
	
