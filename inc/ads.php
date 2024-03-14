<?php 

	add_filter( 'the_content', 'add_ads' );

	function add_ads ( $content ) {
		
		$cats = asap_categories();
				
		$show_ads = get_theme_mod('asap_show_ads');
		
		$hide_ads = get_post_meta( get_the_ID(), 'hide_ads', true ); 

		if ( ( $show_ads ) && ( ! $hide_ads ) ) :
		
			$ads1 		= 	base64_decode( get_theme_mod('asap_ads_1') ) ;
			$ads2 		= 	base64_decode( get_theme_mod('asap_ads_2') ) ;
			$ads3 		= 	base64_decode( get_theme_mod('asap_ads_3') ) ;
			$ads4 		= 	base64_decode( get_theme_mod('asap_ads_4') ) ;
			$ads5 		= 	base64_decode( get_theme_mod('asap_ads_5') ) ;
			$ads6 		= 	base64_decode( get_theme_mod('asap_ads_6') ) ;
			$ads7 		= 	base64_decode( get_theme_mod('asap_ads_7') ) ;
			$ads8 		= 	base64_decode( get_theme_mod('asap_ads_8') ) ;
			$ads9 		= 	base64_decode( get_theme_mod('asap_ads_9') ) ;
			$ads10 		= 	base64_decode( get_theme_mod('asap_ads_10') ) ;		
			$ads_mid	= 	base64_decode( get_theme_mod('asap_ads_mid') ) ;
		
			if ( $ads1 ) :

				$ads1_cat 		= get_theme_mod('asap_ads_1_cat');
		
				if ( ( in_array( $ads1_cat , $cats ) ) || ( ! $ads1_cat ) ) :
				
					$ads1_place 		= 	get_theme_mod('asap_ads_1_place');				
					$ads1_style 		= 	get_theme_mod('asap_ads_1_style');	
					$ads1_type			= 	get_theme_mod('asap_ads_1_type');	
					$ads1_device		= 	get_theme_mod('asap_ads_1_device');	
					$ads1_margin		= 	get_theme_mod('asap_ads_1_margin');

					$ads1_style_margin 	= '';		
		
					$ads1_place_bin = explode('-', $ads1_place);

					$ads1_place_tax = '';
		
					switch ( $ads1_place_bin[0] ) :
					
						case '0':
							$ads1_place_tax = 'h2';
							$ads1_place = $ads1_place_bin[1];
							break;
						
						case 'h3':
							$ads1_place_tax = 'h3';
							$ads1_place = $ads1_place_bin[1];
							break;
														
						case 'li':
							$ads1_place_tax = 'li';
							$ads1_place = $ads1_place_bin[1];
							break;
						
						default:
							$ads1_place_tax = 'pa';
							break;
							
					endswitch;

					if ( ! $ads1_place ) : $ads1_place = '1'; endif;
					if ( ! $ads1_style ) : $ads1_style = 'ads-asap-aligncenter'; endif;		
					if ( ! $ads1_type ) : $ads1_type = '2'; endif;	
					if ( $ads1_margin ) : $ads1_style_margin = '" style="padding:'.$ads1_margin.'px';	endif;

					switch ( $ads1_device ) :

						case 2:
							$ads1_style = $ads1_style.' ads-asap-desktop';
							break;

						case 3:
							$ads1_style = $ads1_style.' ads-asap-mobile';
							break;

					endswitch;

					$ads1 	=	'<div class="ads-asap ' . $ads1_style . $ads1_style_margin . '">' . $ads1 . '</div>';

				endif;
		
			endif;

			if ( $ads2 ) :
		
				$ads2_cat 		= get_theme_mod('asap_ads_2_cat');
		
				if ( ( in_array( $ads2_cat , $cats ) ) || ( ! $ads2_cat ) ) :		

					$ads2_place 	= 	get_theme_mod('asap_ads_2_place');	
					$ads2_style 	= 	get_theme_mod('asap_ads_2_style');	
					$ads2_type		= 	get_theme_mod('asap_ads_2_type');	
					$ads2_device	= 	get_theme_mod('asap_ads_2_device');	
					$ads2_margin	= 	get_theme_mod('asap_ads_2_margin');		

					$ads2_style_margin 	= '';		

					$ads2_place_bin = explode('-', $ads2_place);

					$ads2_place_tax = '';
		
					switch ( $ads2_place_bin[0] ) :
					
						case '0':
							$ads2_place_tax = 'h2';
							$ads2_place = $ads2_place_bin[1];
							break;
						
						case 'h3':
							$ads2_place_tax = 'h3';
							$ads2_place = $ads2_place_bin[1];
							break;		
		
						case 'li':
							$ads2_place_tax = 'li';
							$ads2_place = $ads2_place_bin[1];
							break;
							
						default:
							$ads2_place_tax = 'pa';
							break;
							
					endswitch;

					if ( ! $ads2_place ) : $ads2_place = '1'; endif;
					if ( ! $ads2_style ) : $ads2_style = 'ads-asap-aligncenter'; endif;		
					if ( ! $ads2_type ) : $ads2_type = '2'; endif;	
					if ( $ads2_margin ) : $ads2_style_margin = '" style="padding:'.$ads2_margin.'px';	endif;

					switch ( $ads2_device ) :

						case 2:
							$ads2_style = $ads2_style.' ads-asap-desktop';
							break;

						case 3:
							$ads2_style = $ads2_style.' ads-asap-mobile';
							break;

					endswitch;		

					$ads2 	=	'<div class="ads-asap ' . $ads2_style . $ads2_style_margin . '">' . $ads2 . '</div>';
		
				endif;

			endif;	

			if ( $ads3 ) :
		
				$ads3_cat 		= get_theme_mod('asap_ads_3_cat');
		
				if ( ( in_array( $ads3_cat , $cats ) ) || ( ! $ads3_cat ) ) :		

					$ads3_place 	= 	get_theme_mod('asap_ads_3_place');	
					$ads3_style 	= 	get_theme_mod('asap_ads_3_style');	
					$ads3_type		= 	get_theme_mod('asap_ads_3_type');
					$ads3_device	= 	get_theme_mod('asap_ads_3_device');	
					$ads3_margin	= 	get_theme_mod('asap_ads_3_margin');		

					$ads3_style_margin 	= '';		

					$ads3_place_bin = explode('-', $ads3_place);

					$ads3_place_tax = '';
		
					switch ( $ads3_place_bin[0] ) :
					
						case '0':
							$ads3_place_tax = 'h2';
							$ads3_place = $ads3_place_bin[1];
							break;
						
						case 'h3':
							$ads3_place_tax = 'h3';
							$ads3_place = $ads3_place_bin[1];
							break;	
		
						case 'li':
							$ads3_place_tax = 'li';
							$ads3_place = $ads3_place_bin[1];
							break;
							
						default:
							$ads3_place_tax = 'pa';
							break;
							
					endswitch;	

					if ( ! $ads3_place ) : $ads3_place = '1'; endif;
					if ( ! $ads3_style ) : $ads3_style = 'ads-asap-aligncenter'; endif;		
					if ( ! $ads3_type ) : $ads3_type = '2'; endif;	
					if ( $ads3_margin ) : $ads3_style_margin = '" style="padding:'.$ads3_margin.'px';	endif;

					switch ( $ads3_device ) :

						case 2:
							$ads3_style = $ads3_style.' ads-asap-desktop';
							break;

						case 3:
							$ads3_style = $ads3_style.' ads-asap-mobile';
							break;

					endswitch;	

					$ads3 	=	'<div class="ads-asap ' . $ads3_style . $ads3_style_margin . '">' . $ads3 . '</div>';
		
				endif;

			endif;	

			if ( $ads4 ) :
		
				$ads4_cat 		= get_theme_mod('asap_ads_4_cat');
		
				if ( ( in_array( $ads4_cat , $cats ) ) || ( ! $ads4_cat ) ) :				

					$ads4_place 	= 	get_theme_mod('asap_ads_4_place');	
					$ads4_style 	= 	get_theme_mod('asap_ads_4_style');	
					$ads4_type		= 	get_theme_mod('asap_ads_4_type');	
					$ads4_device	= 	get_theme_mod('asap_ads_4_device');	
					$ads4_margin	= 	get_theme_mod('asap_ads_4_margin');			

					$ads4_style_margin 	= '';				

					$ads4_place_bin = explode('-', $ads4_place);

					$ads4_place_tax = '';
		
					switch ( $ads4_place_bin[0] ) :
					
						case '0':
							$ads4_place_tax = 'h2';
							$ads4_place = $ads4_place_bin[1];
							break;

						case 'h3':
							$ads4_place_tax = 'h3';
							$ads4_place = $ads4_place_bin[1];
							break;
		
						case 'li':
							$ads4_place_tax = 'li';
							$ads4_place = $ads4_place_bin[1];
							break;
							
						default:
							$ads4_place_tax = 'pa';
							break;
							
					endswitch;	

					if ( ! $ads4_place ) : $ads4_place = '1'; endif;
					if ( ! $ads4_style ) : $ads4_style = 'ads-asap-aligncenter'; endif;		
					if ( ! $ads4_type ) : $ads4_type = '2'; endif;	
					if ( $ads4_margin ) : $ads4_style_margin = '" style="padding:'.$ads4_margin.'px';	endif;

					switch ( $ads4_device ) :

						case 2:
							$ads4_style = $ads4_style.' ads-asap-desktop';
							break;

						case 3:
							$ads4_style = $ads4_style.' ads-asap-mobile';
							break;

					endswitch;	

					$ads4 	=	'<div class="ads-asap ' . $ads4_style . $ads4_style_margin . '">' . $ads4 . '</div>';
				
				endif;

			endif;	

			if ( $ads5 ) :
		
				$ads5_cat 		= get_theme_mod('asap_ads_5_cat');
		
				if ( ( in_array( $ads5_cat , $cats ) ) || ( ! $ads5_cat ) ) :		

					$ads5_place 	= 	get_theme_mod('asap_ads_5_place');	
					$ads5_style 	= 	get_theme_mod('asap_ads_5_style');	
					$ads5_type		= 	get_theme_mod('asap_ads_5_type');	
					$ads5_device	= 	get_theme_mod('asap_ads_5_device');	
					$ads5_margin	= 	get_theme_mod('asap_ads_5_margin');					

					$ads5_style_margin 	= '';		

					$ads5_place_bin = explode('-', $ads5_place);

					$ads5_place_tax = '';
		
					switch ( $ads5_place_bin[0] ) :
					
						case '0':
							$ads5_place_tax = 'h2';
							$ads5_place = $ads5_place_bin[1];
							break;
					
						case 'h3':
							$ads5_place_tax = 'h3';
							$ads5_place = $ads5_place_bin[1];
							break;
														
						case 'li':
							$ads5_place_tax = 'li';
							$ads5_place = $ads5_place_bin[1];
							break;
							
						default:
							$ads5_place_tax = 'pa';
							break;
							
					endswitch;	

					if ( ! $ads5_place ) : $ads5_place = '1'; endif;
					if ( ! $ads5_style ) : $ads5_style = 'ads-asap-aligncenter'; endif;		
					if ( ! $ads5_type ) : $ads5_type = '2'; endif;	
					if ( $ads5_margin ) : $ads5_style_margin = '" style="padding:'.$ads5_margin.'px';	endif;

					switch ( $ads5_device ) :

						case 2:
							$ads5_style = $ads5_style.' ads-asap-desktop';
							break;

						case 3:
							$ads5_style = $ads5_style.' ads-asap-mobile';
							break;

					endswitch;	

					$ads5	=	'<div class="ads-asap ' . $ads5_style . $ads5_style_margin . '">' . $ads5 . '</div>';
		
				endif;

			endif;	

			if ( $ads6 ) :
		
				$ads6_cat 		= get_theme_mod('asap_ads_6_cat');
		
				if ( ( in_array( $ads6_cat , $cats ) ) || ( ! $ads6_cat ) ) :				

					$ads6_place 	= 	get_theme_mod('asap_ads_6_place');	
					$ads6_style 	= 	get_theme_mod('asap_ads_6_style');	
					$ads6_type		= 	get_theme_mod('asap_ads_6_type');
					$ads6_device	= 	get_theme_mod('asap_ads_6_device');	
					$ads6_margin	= 	get_theme_mod('asap_ads_6_margin');					

					$ads6_style_margin 	= '';		

					$ads6_place_bin = explode('-', $ads6_place);

					$ads6_place_tax = '';
		
					switch ( $ads6_place_bin[0] ) :
					
						case '0':
							$ads6_place_tax = 'h2';
							$ads6_place = $ads6_place_bin[1];
							break;
					
						case 'h3':
							$ads6_place_tax = 'h3';
							$ads6_place = $ads6_place_bin[1];
							break;
							
						case 'li':
							$ads6_place_tax = 'li';
							$ads6_place = $ads6_place_bin[1];
							break;
							
						default:
							$ads6_place_tax = 'pa';
							break;
							
					endswitch;	

					if ( ! $ads6_place ) : $ads6_place = '1'; endif;
					if ( ! $ads6_style ) : $ads6_style = 'ads-asap-aligncenter'; endif;		
					if ( ! $ads6_type ) : $ads6_type = '2'; endif;	
					if ( $ads6_margin ) : $ads6_style_margin = '" style="padding:'.$ads6_margin.'px';	endif;

					switch ( $ads6_device ) :

						case 2:
							$ads6_style = $ads6_style.' ads-asap-desktop';
							break;

						case 3:
							$ads6_style = $ads6_style.' ads-asap-mobile';
							break;

					endswitch;	

					$ads6 	=	'<div class="ads-asap ' . $ads6_style . $ads6_style_margin . '">' . $ads6 . '</div>';
		
				endif;

			endif;	
		
			if ( $ads7 ) :
		
				$ads7_cat 		= get_theme_mod('asap_ads_7_cat');
		
				if ( ( in_array( $ads7_cat , $cats ) ) || ( ! $ads7_cat ) ) :			

					$ads7_place 	= 	get_theme_mod('asap_ads_7_place');	
					$ads7_style 	= 	get_theme_mod('asap_ads_7_style');	
					$ads7_type		= 	get_theme_mod('asap_ads_7_type');
					$ads7_device	= 	get_theme_mod('asap_ads_7_device');	
					$ads7_margin	= 	get_theme_mod('asap_ads_7_margin');					

					$ads7_style_margin 	= '';		

					$ads7_place_bin = explode('-', $ads7_place);

					$ads7_place_tax = '';
		
					switch ( $ads7_place_bin[0] ) :
					
						case '0':
							$ads7_place_tax = 'h2';
							$ads7_place = $ads7_place_bin[1];
							break;
					
						case 'h3':
							$ads7_place_tax = 'h3';
							$ads7_place = $ads7_place_bin[1];
							break;
														
						case 'li':
							$ads7_place_tax = 'li';
							$ads7_place = $ads7_place_bin[1];
							break;
							
						default:
							$ads7_place_tax = 'pa';
							break;
							
					endswitch;	


					if ( ! $ads7_place ) : $ads7_place = '1'; endif;
					if ( ! $ads7_style ) : $ads7_style = 'ads-asap-aligncenter'; endif;		
					if ( ! $ads7_type ) : $ads7_type = '2'; endif;	
					if ( $ads7_margin ) : $ads7_style_margin = '" style="padding:'.$ads7_margin.'px';	endif;

					switch ( $ads7_device ) :

						case 2:
							$ads7_style = $ads7_style.' ads-asap-desktop';
							break;

						case 3:
							$ads7_style = $ads7_style.' ads-asap-mobile';
							break;

					endswitch;	

					$ads7 	=	'<div class="ads-asap ' . $ads7_style . $ads7_style_margin . '">' . $ads7 . '</div>';
		
				endif;

			endif;	
		
			if ( $ads8 ) :
		
				$ads8_cat 		= get_theme_mod('asap_ads_8_cat');
		
				if ( ( in_array( $ads8_cat , $cats ) ) || ( ! $ads8_cat ) ) :		

					$ads8_place 	= 	get_theme_mod('asap_ads_8_place');	
					$ads8_style 	= 	get_theme_mod('asap_ads_8_style');	
					$ads8_type		= 	get_theme_mod('asap_ads_8_type');
					$ads8_device	= 	get_theme_mod('asap_ads_8_device');	
					$ads8_margin	= 	get_theme_mod('asap_ads_8_margin');					

					$ads8_style_margin 	= '';		

					$ads8_place_bin = explode('-', $ads8_place);
		
					$ads8_place_tax = '';
		
					switch ( $ads8_place_bin[0] ) :
					
						case '0':
							$ads8_place_tax = 'h2';
							$ads8_place = $ads8_place_bin[1];
							break;
					
						case 'h3':
							$ads8_place_tax = 'h3';
							$ads8_place = $ads8_place_bin[1];
							break;
														
						case 'li':
							$ads8_place_tax = 'li';
							$ads8_place = $ads8_place_bin[1];
							break;
							
						default:
							$ads8_place_tax = 'pa';
							break;
							
					endswitch;	

					if ( ! $ads8_place ) : $ads8_place = '1'; endif;
					if ( ! $ads8_style ) : $ads8_style = 'ads-asap-aligncenter'; endif;		
					if ( ! $ads8_type ) : $ads8_type = '2'; endif;	
					if ( $ads8_margin ) : $ads8_style_margin = '" style="padding:'.$ads8_margin.'px';	endif;

					switch ( $ads8_device ) :

						case 2:
							$ads8_style = $ads8_style.' ads-asap-desktop';
							break;

						case 3:
							$ads8_style = $ads8_style.' ads-asap-mobile';
							break;

					endswitch;	

					$ads8 	=	'<div class="ads-asap ' . $ads8_style . $ads8_style_margin . '">' . $ads8 . '</div>';
		
				endif;

			endif;	
		
			if ( $ads9 ) :

				$ads9_cat 		= get_theme_mod('asap_ads_9_cat');
		
				if ( ( in_array( $ads9_cat , $cats ) ) || ( ! $ads9_cat ) ) :	

					$ads9_place 	= 	get_theme_mod('asap_ads_9_place');	
					$ads9_style 	= 	get_theme_mod('asap_ads_9_style');	
					$ads9_type		= 	get_theme_mod('asap_ads_9_type');
					$ads9_device	= 	get_theme_mod('asap_ads_9_device');	
					$ads9_margin	= 	get_theme_mod('asap_ads_9_margin');					

					$ads9_style_margin 	= '';		

					$ads9_place_bin = explode('-', $ads9_place);

					$ads9_place_tax = '';
		
					switch ( $ads9_place_bin[0] ) :
					
						case '0':
							$ads9_place_tax = 'h2';
							$ads9_place = $ads9_place_bin[1];
							break;
					
						case 'h3':
							$ads9_place_tax = 'h3';
							$ads9_place = $ads9_place_bin[1];
							break;
														
						case 'li':
							$ads9_place_tax = 'li';
							$ads9_place = $ads9_place_bin[1];
							break;
							
						default:
							$ads9_place_tax = 'pa';
							break;
							
					endswitch;	

					if ( ! $ads9_place ) : $ads9_place = '1'; endif;
					if ( ! $ads9_style ) : $ads9_style = 'ads-asap-aligncenter'; endif;		
					if ( ! $ads9_type ) : $ads9_type = '2'; endif;	
					if ( $ads9_margin ) : $ads9_style_margin = '" style="padding:'.$ads9_margin.'px';	endif;

					switch ( $ads9_device ) :

						case 2:
							$ads9_style = $ads9_style.' ads-asap-desktop';
							break;

						case 3:
							$ads9_style = $ads9_style.' ads-asap-mobile';
							break;

					endswitch;	

					$ads9 	=	'<div class="ads-asap ' . $ads9_style . $ads9_style_margin . '">' . $ads9 . '</div>';
		
				endif;

			endif;	
		
			if ( $ads10 ) :
		
				$ads10_cat 		= get_theme_mod('asap_ads_10_cat');
		
				if ( ( in_array( $ads10_cat , $cats ) ) || ( ! $ads10_cat ) ) :			

					$ads10_place 	= 	get_theme_mod('asap_ads_10_place');	
					$ads10_style 	= 	get_theme_mod('asap_ads_10_style');	
					$ads10_type		= 	get_theme_mod('asap_ads_10_type');
					$ads10_device	= 	get_theme_mod('asap_ads_10_device');	
					$ads10_margin	= 	get_theme_mod('asap_ads_10_margin');

					$ads10_style_margin 	= '';		

					$ads10_place_bin = explode('-', $ads10_place);

					$ads10_place_tax = '';
		
					switch ( $ads10_place_bin[0] ) :
					
						case '0':
							$ads10_place_tax = 'h2';
							$ads10_place = $ads10_place_bin[1];
							break;
					
						case 'h3':
							$ads10_place_tax = 'h3';
							$ads10_place = $ads10_place_bin[1];
							break;
														
						case 'li':
							$ads10_place_tax = 'li';
							$ads10_place = $ads10_place_bin[1];
							break;
							
						default:
							$ads10_place_tax = 'pa';
							break;
							
					endswitch;	

					if ( ! $ads10_place ) : $ads10_place = '1'; endif;
					if ( ! $ads10_style ) : $ads10_style = 'ads-asap-aligncenter'; endif;		
					if ( ! $ads10_type ) : $ads10_type = '2'; endif;	
					if ( $ads10_margin ) : $ads10_style_margin = '" style="padding:'.$ads10_margin.'px';	endif;

					switch ( $ads10_device ) :

						case 2:
							$ads10_style = $ads10_style.' ads-asap-desktop';
							break;

						case 3:
							$ads10_style = $ads10_style.' ads-asap-mobile';
							break;

					endswitch;	

					$ads10 	=	'<div class="ads-asap ' . $ads10_style . $ads10_style_margin . '">' . $ads10 . '</div>';
		
				endif;

			endif;			
		
			if ( $ads_mid ) :
		
				$adsmid_cat 		= get_theme_mod('asap_ads_mid_cat');
		
				if ( ( in_array( $adsmid_cat , $cats ) ) || ( ! $adsmid_cat ) ) :				

					$ads_mid_style 	= 	get_theme_mod('asap_ads_mid_style');	
					$ads_mid_type	= 	get_theme_mod('asap_ads_mid_type');	
					$ads_mid_device	= 	get_theme_mod('asap_ads_mid_device');	
					$ads_mid_margin	= 	get_theme_mod('asap_ads_mid_margin');

					$ads_mid_style_margin 	= '';				

					if ( ! $ads_mid_style ) : $ads_mid_style = 'ads-asap-aligncenter'; endif;		
					if ( ! $ads_mid_type ) : $ads_mid_type = '2'; endif;	
					if ( $ads_mid_margin ) : $ads_mid_style_margin = '" style="padding:'.$ads_mid_margin.'px';	endif;

					switch ( $ads_mid_device ) :

						case 2:
							$ads_mid_style = $ads_mid_style.' ads-asap-desktop';
							break;

						case 3:
							$ads_mid_style = $ads_mid_style.' ads-asap-mobile';
							break;

					endswitch;

					$ads_mid = '<div class="ads-asap ' . $ads_mid_style . $ads_mid_style_margin . '">' . $ads_mid . '</div>';
		
				endif;

			endif;

			/* */	
		
			$wc = asap_wc_check();

			if ( is_single() && ! is_admin() && ( ! $wc ) ) {

				if ( ( $ads1 ) && ( ( $ads1_type == '1' ) || ( $ads1_type == '2' ) ) ) :
				
					$content = ads_attach ( $ads1, $ads1_place, $content, $ads1_place_tax );
			
				endif;

				if ( ( $ads2 ) && ( ( $ads2_type == '1' ) || ( $ads2_type == '2' ) ) ) :

					$content = ads_attach ( $ads2, $ads2_place, $content, $ads2_place_tax );

				endif;

				if ( ( $ads3 ) && ( ( $ads3_type == '1' ) || ( $ads3_type == '2' ) ) ) :
					
					$content = ads_attach ( $ads3, $ads3_place, $content, $ads3_place_tax );
				
				endif;

				if ( ( $ads4 ) && ( ( $ads4_type == '1' ) || ( $ads4_type == '2' ) ) ) :

					$content = ads_attach ( $ads4, $ads4_place, $content, $ads4_place_tax );

				endif;

				if ( ( $ads5 ) && ( ( $ads5_type == '1' ) || ( $ads5_type == '2' ) ) ) :

					$content = ads_attach ( $ads5, $ads5_place, $content, $ads5_place_tax );

				endif;

				if ( ( $ads6 ) && ( ( $ads6_type == '1' ) || ( $ads6_type == '2' ) ) ) :

					$content = ads_attach ( $ads6, $ads6_place, $content, $ads6_place_tax );

				endif;
				
				if ( ( $ads7 ) && ( ( $ads7_type == '1' ) || ( $ads7_type == '2' ) ) ) :
					
					$content = ads_attach ( $ads7, $ads7_place, $content, $ads7_place_tax );

				endif;
				
				if ( ( $ads8 ) && ( ( $ads8_type == '1' ) || ( $ads8_type == '2' ) ) ) :

					$content = ads_attach ( $ads8, $ads8_place, $content, $ads8_place_tax );

				endif;
				
				if ( ( $ads9 ) && ( ( $ads9_type == '1' ) || ( $ads9_type == '2' ) ) ) :
					
					$content = ads_attach ( $ads9, $ads9_place, $content, $ads9_place_tax );

				endif;
				
				if ( ( $ads10 ) && ( ( $ads10_type == '1' ) || ( $ads10_type == '2' ) ) ) :
					
					$content = ads_attach ( $ads10, $ads10_place, $content, $ads10_place_tax );

				endif;				

				if ( ( $ads_mid ) && ( ( $ads_mid_type == '1' ) || ( $ads_mid_type == '2' ) ) ) :

					$ads_mid_place = substr_count( $content, '<p>' );
					
					$ads_mid_place = $ads_mid_place / 2;
				
					$ads_mid_place = round($ads_mid_place);

					$tax = 'pa';
				
					$content = ads_attach ( $ads_mid, $ads_mid_place, $content, $tax );

				endif;				

				return $content;

			}

			/* */

			if ( is_page() && ! is_admin() && ( ! $wc ) ) {

				if ( ( $ads1 ) && ( ( $ads1_type == '1' ) || ( $ads1_type == '3' ) ) ) :

					$content = ads_attach ( $ads1, $ads1_place, $content, $ads1_place_tax );
				
				endif;

				if ( ( $ads2 ) && ( ( $ads2_type == '1' ) || ( $ads2_type == '3' ) ) ) :

					$content = ads_attach ( $ads2, $ads2_place, $content, $ads2_place_tax );

				endif;

				if ( ( $ads3 ) && ( ( $ads3_type == '1' ) || ( $ads3_type == '3' ) ) ) :

					$content = ads_attach ( $ads3, $ads3_place, $content, $ads3_place_tax );

				endif;

				if ( ( $ads4 ) && ( ( $ads4_type == '1' ) || ( $ads4_type == '3' ) ) ) :
					
					$content = ads_attach ( $ads4, $ads4_place, $content, $ads4_place_tax );

				endif;

				if ( ( $ads5 ) && ( ( $ads5_type == '1' ) || ( $ads5_type == '3' ) ) ) :

					$content = ads_attach ( $ads5, $ads5_place, $content, $ads5_place_tax );

				endif;

				if ( ( $ads6 ) && ( ( $ads6_type == '1' ) || ( $ads6_type == '3' ) ) ) :

					$content = ads_attach ( $ads6, $ads6_place, $content, $ads6_place_tax );

				endif;

				if ( ( $ads7 ) && ( ( $ads7_type == '1' ) || ( $ads7_type == '3' ) ) ) :
					
					$content = ads_attach ( $ads7, $ads7_place, $content, $ads7_place_tax );

				endif;
				
				if ( ( $ads8 ) && ( ( $ads8_type == '1' ) || ( $ads8_type == '3' ) ) ) :

					$content = ads_attach ( $ads8, $ads8_place, $content, $ads8_place_tax );

				endif;
				
				if ( ( $ads9 ) && ( ( $ads9_type == '1' ) || ( $ads9_type == '3' ) ) ) :
					
					$content = ads_attach ( $ads9, $ads9_place, $content, $ads9_place_tax );

				endif;
				
				if ( ( $ads10 ) && ( ( $ads10_type == '1' ) || ( $ads10_type == '3' ) ) ) :

					$content = ads_attach ( $ads10, $ads10_place, $content, $ads10_place_tax );

				endif;				

				
				
				if ( ( $ads_mid ) && ( ( $ads_mid_type == '1' ) || ( $ads_mid_type == '3' ) ) ) :

					$ads_mid_place = substr_count( $content, '<p>' );
					
					$ads_mid_place = $ads_mid_place / 2;
				
					$ads_mid_place = round($ads_mid_place);

					$tax = 'pa';
				
					$content = ads_attach ( $ads_mid, $ads_mid_place, $content, $tax );

				endif;				

				return $content;

			}
		
		endif;
		
		return $content;
	}

	/* */

	function ads_attach ( $insertion, $paragraph_id, $content, $place_tax ) {

		switch ( $place_tax ) :
					
			case 'h2':
				$closing_p = '</h2>';
				break;

			case 'h3':
				$closing_p = '</h3>';
				break;
							
			case 'li':
				$closing_p = '</li>';
				break;
							
			case 'pa':
			default:
				$closing_p = '</p>';
				break;
							
		endswitch;

		$paragraphs = array_filter(explode($closing_p, $content));

		$cantidad_items = count($paragraphs) - 1;
				
		foreach ($paragraphs as $index => $paragraph) {

			if ( trim( $paragraph ) ) {

				$paragraphs[$index] .= $closing_p;

			}

			if ( $paragraph_id == $index + 1 && $paragraph_id <= $cantidad_items ) {

				$paragraphs[$index] .= $insertion;

			}

		}

		return implode( '', $paragraphs );
			
	}

	

	/* ADS SHORTCODES */

	add_shortcode('ads', 'show_ads');

	function show_ads( $atts, $content ) {
	
		$hide_ads = get_post_meta( get_the_ID(), 'hide_ads', true ); 
		
		if ( ! $hide_ads ) :

			$ad_shortcode = shortcode_atts ( array( 'id' => 1 ) , $atts );

			$ad = ( $ad_shortcode['id'] );

			switch ( $ad ) {

				case 1 : 
					$ads = 	base64_decode( get_theme_mod('asap_ads_before') );
					break;	

				case 2 : 
					$ads = 	base64_decode( get_theme_mod('asap_ads_after') );
					break;					

				case 3 : 
					$ads = 	base64_decode( get_theme_mod('asap_ads_1') );
					break;					

				case 4 : 
					$ads = 	base64_decode( get_theme_mod('asap_ads_2') );
					break;					

				case 5 : 
					$ads = 	base64_decode( get_theme_mod('asap_ads_3') );
					break;					

				case 6 : 
					$ads = 	base64_decode( get_theme_mod('asap_ads_4') );
					break;					

				case 7 : 
					$ads = 	base64_decode( get_theme_mod('asap_ads_5') );
					break;					

				case 8 : 
					$ads = 	base64_decode( get_theme_mod('asap_ads_6') );
					break;	
					
				case 9 : 
					$ads = 	base64_decode( get_theme_mod('asap_ads_7') );
					break;	
					
				case 10 : 
					$ads = 	base64_decode( get_theme_mod('asap_ads_8') );
					break;	
					
				case 11 : 
					$ads = 	base64_decode( get_theme_mod('asap_ads_9') );
					break;	
					
				case 12 : 
					$ads = 	base64_decode( get_theme_mod('asap_ads_10') );
					break;	

				case 13 : 
					$ads = 	base64_decode( get_theme_mod('asap_ads_before_sidebar') );
					break;			

				case 14 : 
					$ads = 	base64_decode( get_theme_mod('asap_ads_after_sidebar') );
					break;		
					
				case 15 : 
					$ads = 	base64_decode( get_theme_mod('asap_ads_mid') );
					break;		
					
				case 16 : 
					$ads = 	base64_decode( get_theme_mod('asap_ads_before_image') );
					break;		

			}

			return '<div class="ads-asap ads-asap-aligncenter">'.$ads.'</div>';
		
		endif;

	}

?>