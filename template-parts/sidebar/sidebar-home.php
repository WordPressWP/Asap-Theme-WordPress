<?php

	asap_show_ads(3);

	if ( get_theme_mod('asap_show_last_home')) :

	get_template_part('template-parts/loops/loop','sidebar');	

	endif;

	if ( is_active_sidebar( 'home' ) ) :

	dynamic_sidebar( 'home' );

	endif;

	asap_show_ads(4);

?>