<?php

/*
 * Satinize function
*/

function sanitize_break($text)
{
	return addslashes($text);
}

function asap_sanitize_checkbox($checked)
{
	return ( ( isset($checked) && true == $checked ) ? true : false );
}

function asap_sanitize_select($input, $setting)
{
	$input   = sanitize_key($input);
	$choices = $setting
		->manager
		->get_control($setting->id)->choices;
	return (array_key_exists($input, $choices) ? $input : $setting->default);
}

function asap_sanitize_js_code($input)
{
	return base64_encode($input);
}

function asap_sanitize_image( $file, $setting ) {

	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
	);

	$file_ext = wp_check_filetype( $file, $mimes );

	return ( $file_ext['ext'] ? $file : $setting->default );
}

function asap_escape_js_output($input)
{
	return esc_textarea(base64_decode($input));
}

if (class_exists('WP_Customize_Control'))
{
	class WP_Customize_Teeny_Control extends WP_Customize_Control
	{
		function __construct($manager, $id, $options)
		{
			parent::__construct($manager, $id, $options);

			global $num_customizer_teenies_initiated;
			$num_customizer_teenies_initiated = empty($num_customizer_teenies_initiated) ? 1 : $num_customizer_teenies_initiated + 1;
		}
		function render_content()
		{
			global $num_customizer_teenies_initiated, $num_customizer_teenies_rendered;
			$num_customizer_teenies_rendered = empty($num_customizer_teenies_rendered) ? 1 : $num_customizer_teenies_rendered + 1;

			$value                           = $this->value();
?>


<style>
	

	
			#customize-control-asap_ads_2,
			#customize-control-asap_ads_3,
			#customize-control-asap_ads_4,
			#customize-control-asap_ads_5,
			#customize-control-asap_ads_6,		
			#customize-control-asap_ads_7,		
			#customize-control-asap_ads_8,			
			#customize-control-asap_ads_9,			
			#customize-control-asap_ads_10,
			#customize-control-asap_show_last_single  .customize-control-title,	
			#customize-control-asap_ads_after_sidebar,
			#customize-control-asap_side_thumb_width .customize-control-title,
			#customize-control-asap_social_post_types .customize-control-title,
			#customize-control-asap_show_facebook,
			#customize-control-asap_content_type_options,
			#customize-control-asap_options_fonts   .customize-control-title,
			#customize-control-asap_ads_before .customize-control-title,
			#customize-control-asap_home_text_before .customize-control-title
			/*#customize-control-asap_deactivate_background*/
			{
				border-top:2px solid #666;
				margin-top:12px;
				padding-top:16px;
			}
	
			#customize-control-asap_show_facebook:before {
				content:'Selecciona las redes sociales';
			}
	
			#customize-control-asap_content_type_options:before {
				content:'Cabeceras de seguridad';
			}
	
			#customize-control-asap_show_sidebar_single:before {
				content:'Ubicación barra lateral';
			}

			#customize-control-asap_show_last_single:before {
				content:'Últimas entradas barra lateral';
			}
	
			#customize-control-asap_optimize_analytics:before {
				content:'JS';
			}
	
			#customize-control-asap_optimize_youtube:before {
				content:'Medios';
			}

			#customize-control-asap_limit_heartbeat:before {
				content:'Otros';
			}
	
			#customize-control-asap_minify_html:before {
				content:'HTML';
			}
			
			#customize-control-asap_remove_global_styles:before {
				content:'CSS';
			}
	
			#customize-control-asap_show_facebook:before,
			#customize-control-asap_content_type_options:before,
	 		#customize-control-asap_show_sidebar_single:before,
			#customize-control-asap_show_last_single:before,
			#customize-control-asap_optimize_analytics:before,
			#customize-control-asap_optimize_youtube:before,
			#customize-control-asap_optimize_fonts:before,
			#customize-control-asap_limit_heartbeat:before,
			#customize-control-asap_minify_html:before,
			#customize-control-asap_remove_global_styles:before {
				display:block;
				font-size: 14px;
				line-height: 1.75;
				font-weight: 600;
				margin-bottom: 10px;
				margin-top:4px;
			}
	
			#customize-control-asap_options_fonts   .customize-control-title
			{
				margin-bottom: 10px;
			}
				
			#customize-control-asap_show_sidebar_single,
			#customize-control-asap_show_sidebar_page,
			#customize-control-asap_show_sidebar_home,
			#customize-control-asap_show_sidebar_cat,
			#customize-control-asap_show_last_single,
			#customize-control-asap_show_last_page,
			#customize-control-asap_show_last_home,
			#customize-control-asap_show_last_cat,
			#customize-control-asap_show_facebook,
			#customize-control-asap_show_facebookm,
			#customize-control-asap_show_twitter,
			#customize-control-asap_show_pinterest,
			#customize-control-asap_show_whatsapp,
			#customize-control-asap_show_tumblr,
			#customize-control-asap_show_linkedin,
			#customize-control-asap_show_email,
			#customize-control-asap_show_telegram,
			#customize-control-asap_optimize_analytics,
			#customize-control-asap_jquery_footer,
			#customize-control-asap_optimize_youtube,
			#customize-control-asap_disable_embed,
			#customize-control-asap_optimize_fonts,
			#customize-control-asap_limit_heartbeat,
			#customize-control-asap_enable_js_defer
			{
				margin-bottom:0 !important;
			}

			#customize-control-asap_optimize_analytics,
			#customize-control-asap_optimize_youtube,
			#customize-control-asap_optimize_fonts, 
			#customize-control-asap_limit_heartbeat,
			#customize-control-asap_remove_global_styles,
			#customize-control-asap_show_last_single:before,
			#customize-control-asap_ads_loop_2,
			#customize-control-asap_ads_loop_3,
			#customize-control-asap_ads_loop_4,
			#customize-control-asap_ads_loop_5
			{
				border-top:2px solid #666;
				margin-top:6px;
				padding-top:16px;
			}
			span#_customize-description-asap_index_pos {
				margin-top:-5px;
				margin-bottom:8px;
			}
			#customize-control-asap_ads_loop_1_show_home,
			#customize-control-asap_ads_loop_1_show_cats,
			#customize-control-asap_ads_loop_2_show_home,
			#customize-control-asap_ads_loop_2_show_cats,
			#customize-control-asap_ads_loop_3_show_home,
			#customize-control-asap_ads_loop_3_show_cats,
			#customize-control-asap_ads_loop_4_show_home,
			#customize-control-asap_ads_loop_4_show_cats,
			#customize-control-asap_ads_loop_5_show_home,
			#customize-control-asap_ads_loop_5_show_cats,
			#customize-control-asap_ads_header_show_home,
			#customize-control-asap_ads_header_show_cats,
			#customize-control-asap_ads_header_show_tags,
			#customize-control-asap_ads_header_show_posts,
			#customize-control-asap_ads_before_sidebar_show_home,
			#customize-control-asap_ads_before_sidebar_show_cats,
			#customize-control-asap_ads_before_sidebar_show_tags,
			#customize-control-asap_ads_before_sidebar_show_posts,
			#customize-control-asap_ads_after_sidebar_show_home,
			#customize-control-asap_ads_after_sidebar_show_cats,
			#customize-control-asap_ads_after_sidebar_show_tags,
			#customize-control-asap_ads_after_sidebar_show_posts
			{
				margin-bottom:0;
			}
	
		#customize-control-asap_hero_post label::after,		
		#customize-control-asap_hero_page label::after,
		#customize-control-asap_hero_cat label::after
	{
			content: "Nuevo";
			margin-left: 6px;
			background: #1abc9c;
			padding: 2px 7px 3px 7px;
			border-radius: 50px;
			font-size: 11px !important;
			color: #fff !important;
		}
	
	
	
		</style>
        <label>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
          <input id="<?php echo $this->id ?>-link" class="wp-editor-area" type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea($value); ?>">
          <?php
			wp_editor($value, $this->id, ['textarea_name' => $this->id, 'media_buttons' => false, 'drag_drop_upload' => false, 'teeny' => true, 'quicktags' => false, 'textarea_rows' => 5, 'tinymce' => ['toolbar1' => 'formatselect,bold,italic,blockquote,bullist,numlist,alignleft,aligncenter,alignright,link,unlink', 'setup' => "function (editor) {
                  var cb = function () {
                    var linkInput = document.getElementById('$this->id-link')
                    linkInput.value = editor.getContent()
                    linkInput.dispatchEvent(new Event('change'))
                  }
                  editor.on('Change', cb)
                  editor.on('Undo', cb)
                  editor.on('Redo', cb)
                  editor.on('KeyUp', cb) // Remove this if it seems like an overkill
                }"]]);
?>
        </label>
      <?php
			if ($num_customizer_teenies_rendered == $num_customizer_teenies_initiated) do_action('admin_print_footer_scripts');
		}
	}

	class asap_Dropdown_Category_Control extends WP_Customize_Control
	{

		public $type          = 'dropdown-category';

		protected $dropdown_args = false;

		protected function render_content()
		{
?><label><?php
			$dropdown_args = wp_parse_args($this->dropdown_args, array(
				'taxonomy'               	=> 'category',
				'show_option_none'      	=> __('Show in all categories', 'asap'),
				'selected'               	=> $this->value() ,
				'show_option_all'           => '',
				'orderby'               	=> 'id',
				'order'               		=> 'ASC',
				'hide_empty'               	=> 1,
				'child_of'               	=> 0,
				'exclude'               	=> '',
				'hierarchical'              => 1,
				'depth'               		=> 0,
				'tab_index'               	=> 0,
				'hide_if_empty'            	=> false,
				'option_none_value'     	=> 0,
				'value_field'               => 'term_id',
			));

			$dropdown_args['echo']               = false;

			$dropdown      = wp_dropdown_categories($dropdown_args);
			$dropdown      = str_replace('<select', '<select ' . $this->get_link() , $dropdown);
			echo $dropdown;

?></label><?php
		}
	}

}


function asap_customize_register($wp_customize)
{
	
	
	/*
	 * General panel
	*/
	$wp_customize->add_panel('custom_options', array(
		'title' => __('Asap Theme Options', 'asap') ,
		'priority' => 120,
		'capability' => 'edit_theme_options',
	));
	
	
	/*
	 * Ads options panel
	*/

	$wp_customize->add_panel('custom_options_ads', array(
		'title' => __('Advertising and Analytics Options', 'asap') ,
		'priority' => 120,
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_section('asap_ads_settings', array(
		'title' => __('Google Analytics and others', 'asap') ,
		'panel' => 'custom_options_ads',
		'priority' => 1,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_section('asap_ads_sec_enable', array(
		'title' => __('Enable Advertising', 'asap') ,
		'panel' => 'custom_options_ads',
		'priority' => 1,
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_section('asap_ads_sec_header', array(
		'title' => __('Header', 'asap') ,
		'panel' => 'custom_options_ads',
		'priority' => 1,
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_section('asap_ads_sec_before', array(
		'title' => __('Before the content', 'asap') ,
		'panel' => 'custom_options_ads',
		'priority' => 1,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_section('asap_ads_sec_middle', array(
		'title' => __('Half of the content', 'asap') ,
		'panel' => 'custom_options_ads',
		'priority' => 1,
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_section('asap_ads_sec_after', array(
		'title' => __('After the content', 'asap') ,
		'panel' => 'custom_options_ads',
		'priority' => 1,
		'capability' => 'edit_theme_options',
	));
		
	$wp_customize->add_section('asap_ads_sec_inside', array(
		'title' => __('Inside the content', 'asap') ,
		'panel' => 'custom_options_ads',
		'priority' => 1,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_section('asap_ads_sec_sidebar', array(
		'title' => __('On sidebar', 'asap') ,
		'panel' => 'custom_options_ads',
		'priority' => 1,
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_section('asap_ads_sec_loop', array(
		'title' => __('On loops', 'asap') ,
		'panel' => 'custom_options_ads',
		'priority' => 1,
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_setting('asap_show_ads', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_ads', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_enable',
		'priority' => 1,
		'label' => __('Activate advertising', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_code_analytics', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_code_analytics', array(
		'label' => __('Code in ‹head›', 'asap') ,
		'description' => __('This code will be printed in the ‹head› section. Usage examples: Google Analytics, Search Console, Facebook Pixel', 'asap') ,
		'section' => 'asap_ads_settings',
		'priority' => 1,
		'type' => 'textarea',
	));
	
	$wp_customize->add_setting('asap_body_code', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_body_code', array(
		'label' => __('Code in ‹body›', 'asap') ,
		'description' => __('This code will be printed just below the opening ‹body› tag.', 'asap') ,
		'section' => 'asap_ads_settings',
		'priority' => 1,
		'type' => 'textarea',
	));

	$wp_customize->add_setting('asap_footer_code', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_footer_code', array(
		'label' => __('Code before ‹/body›', 'asap') ,
		'description' => __('This code will be printed above the closing ‹/body› tag.', 'asap') ,
		'section' => 'asap_ads_settings',
		'priority' => 1,
		'type' => 'textarea',
	));
	

	$wp_customize->add_setting('asap_ads_1', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_ads_1', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'type' => 'textarea',
		'description' => __('Shortcode: [ads id=3]', 'asap') ,
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_1_place', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('After paragraph 1', 'asap') ,
		'2' => __('After paragraph 2', 'asap') ,
		'3' => __('After paragraph 3', 'asap') ,
		'4' => __('After paragraph 4', 'asap') ,
		'5' => __('After paragraph 5', 'asap') ,
		'6' => __('After paragraph 6', 'asap') ,
		'7' => __('After paragraph 7', 'asap') ,
		'8' => __('After paragraph 8', 'asap') ,
		'9' => __('After paragraph 9', 'asap') ,
		'10' => __('After paragraph 10', 'asap') ,
		'11' => __('After paragraph 11', 'asap') ,
		'12' => __('After paragraph 12', 'asap') ,
		'13' => __('After paragraph 13', 'asap') ,
		'14' => __('After paragraph 14', 'asap') ,
		'15' => __('After paragraph 15', 'asap') ,
		'16' => __('After paragraph 16', 'asap') ,
		'17' => __('After paragraph 17', 'asap') ,
		'18' => __('After paragraph 18', 'asap') ,
		'19' => __('After paragraph 19', 'asap') ,
		'20' => __('After paragraph 20', 'asap') ,
		'0-1' => __('After H2 number 1', 'asap') ,
		'0-2' => __('After H2 number 2', 'asap') ,
		'0-3' => __('After H2 number 3', 'asap') ,
		'0-4' => __('After H2 number 4', 'asap') ,
		'0-5' => __('After H2 number 5', 'asap') ,
		'0-6' => __('After H2 number 6', 'asap') ,
		'0-7' => __('After H2 number 7', 'asap') ,
		'0-8' => __('After H2 number 8', 'asap') ,
		'0-9' => __('After H2 number 9', 'asap') ,
		'0-10' => __('After H2 number 10', 'asap') ,
		'h3-1' => __('After H3 number 1', 'asap') ,
		'h3-2' => __('After H3 number 2', 'asap') ,
		'h3-3' => __('After H3 number 3', 'asap') ,
		'h3-4' => __('After H3 number 4', 'asap') ,
		'h3-5' => __('After H3 number 5', 'asap') ,
		'h3-6' => __('After H3 number 6', 'asap') ,
		'h3-7' => __('After H3 number 7', 'asap') ,
		'h3-8' => __('After H3 number 8', 'asap') ,
		'h3-9' => __('After H3 number 9', 'asap') ,
		'h3-10' => __('After H3 number 10', 'asap') ,
		'li-1' => __('After item list  1', 'asap') ,
		'li-2' => __('After item list  2', 'asap') ,
		'li-3' => __('After item list  3', 'asap') ,
		'li-4' => __('After item list  4', 'asap') ,
		'li-5' => __('After item list  5', 'asap') ,
		'li-6' => __('After item list  6', 'asap') ,
		'li-7' => __('After item list  7', 'asap') ,
		'li-8' => __('After item list  8', 'asap') ,
		'li-9' => __('After item list  9', 'asap') ,
		'li-10' => __('After item list  10', 'asap') ,
		'li-11' => __('After item list  11', 'asap') ,
		'li-12' => __('After item list  12', 'asap') ,
		'li-13' => __('After item list  13', 'asap') ,
		'li-14' => __('After item list  14', 'asap') ,
		'li-15' => __('After item list  15', 'asap') ,
		'li-16' => __('After item list  16', 'asap') ,
		'li-17' => __('After item list  17', 'asap') ,
		'li-18' => __('After item list  18', 'asap') ,
		'li-19' => __('After item list  19', 'asap') ,
		'li-20' => __('After item list  20', 'asap') ,

	);

	$wp_customize->add_control('asap_ads_1_place', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_1_style', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'ads-asap-aligncenter',
	));

	$cats = array(
		'ads-asap-alignleft' => __('Left', 'asap') ,
		'ads-asap-alignleft-wrap' => __('Left wrapped', 'asap') ,
		'ads-asap-aligncenter' => __('Center', 'asap') ,
		'ads-asap-alignright' => __('Right', 'asap') ,
		'ads-asap-alignright-wrap' => __('Right wrapped', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_1_style', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_1_type', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '2',
	));

	$cats = array(
		'1' => __('Posts / Pages', 'asap') ,
		'2' => __('only posts', 'asap') ,
		'3' => __('only pages', 'asap') ,
		'4' => __('Use only as shortcode', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_1_type', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_1_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
		'4' => __('Use only as shortcode', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_1_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_1_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new asap_Dropdown_Category_Control($wp_customize, 'asap_ads_1_cat', array(
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
	)));

	$wp_customize->add_setting('asap_ads_1_margin', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('asap_ads_1_margin', array(
		'section' => 'asap_ads_sec_inside',
		'type' => 'number',
		'priority' => 1,
		'input_attrs' => array(
			'placeholder' => __('Margin', 'asap') ,
		)
	));

	$wp_customize->add_setting('asap_ads_2', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_ads_2', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'description' => __('Shortcode: [ads id=4]', 'asap') ,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_2_place', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('After paragraph 1', 'asap') ,
		'2' => __('After paragraph 2', 'asap') ,
		'3' => __('After paragraph 3', 'asap') ,
		'4' => __('After paragraph 4', 'asap') ,
		'5' => __('After paragraph 5', 'asap') ,
		'6' => __('After paragraph 6', 'asap') ,
		'7' => __('After paragraph 7', 'asap') ,
		'8' => __('After paragraph 8', 'asap') ,
		'9' => __('After paragraph 9', 'asap') ,
		'10' => __('After paragraph 10', 'asap') ,
		'11' => __('After paragraph 11', 'asap') ,
		'12' => __('After paragraph 12', 'asap') ,
		'13' => __('After paragraph 13', 'asap') ,
		'14' => __('After paragraph 14', 'asap') ,
		'15' => __('After paragraph 15', 'asap') ,
		'16' => __('After paragraph 16', 'asap') ,
		'17' => __('After paragraph 17', 'asap') ,
		'18' => __('After paragraph 18', 'asap') ,
		'19' => __('After paragraph 19', 'asap') ,
		'20' => __('After paragraph 20', 'asap') ,
		'0-1' => __('After H2 number 1', 'asap') ,
		'0-2' => __('After H2 number 2', 'asap') ,
		'0-3' => __('After H2 number 3', 'asap') ,
		'0-4' => __('After H2 number 4', 'asap') ,
		'0-5' => __('After H2 number 5', 'asap') ,
		'0-6' => __('After H2 number 6', 'asap') ,
		'0-7' => __('After H2 number 7', 'asap') ,
		'0-8' => __('After H2 number 8', 'asap') ,
		'0-9' => __('After H2 number 9', 'asap') ,
		'0-10' => __('After H2 number 10', 'asap') ,
		'h3-1' => __('After H3 number 1', 'asap') ,
		'h3-2' => __('After H3 number 2', 'asap') ,
		'h3-3' => __('After H3 number 3', 'asap') ,
		'h3-4' => __('After H3 number 4', 'asap') ,
		'h3-5' => __('After H3 number 5', 'asap') ,
		'h3-6' => __('After H3 number 6', 'asap') ,
		'h3-7' => __('After H3 number 7', 'asap') ,
		'h3-8' => __('After H3 number 8', 'asap') ,
		'h3-9' => __('After H3 number 9', 'asap') ,
		'h3-10' => __('After H3 number 10', 'asap') ,
		'li-1' => __('After item list  1', 'asap') ,
		'li-2' => __('After item list  2', 'asap') ,
		'li-3' => __('After item list  3', 'asap') ,
		'li-4' => __('After item list  4', 'asap') ,
		'li-5' => __('After item list  5', 'asap') ,
		'li-6' => __('After item list  6', 'asap') ,
		'li-7' => __('After item list  7', 'asap') ,
		'li-8' => __('After item list  8', 'asap') ,
		'li-9' => __('After item list  9', 'asap') ,
		'li-10' => __('After item list  10', 'asap') ,
		'li-11' => __('After item list  11', 'asap') ,
		'li-12' => __('After item list  12', 'asap') ,
		'li-13' => __('After item list  13', 'asap') ,
		'li-14' => __('After item list  14', 'asap') ,
		'li-15' => __('After item list  15', 'asap') ,
		'li-16' => __('After item list  16', 'asap') ,
		'li-17' => __('After item list  17', 'asap') ,
		'li-18' => __('After item list  18', 'asap') ,
		'li-19' => __('After item list  19', 'asap') ,
		'li-20' => __('After item list  20', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_2_place', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_2_style', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'ads-asap-aligncenter',
	));

	$cats = array(
		'ads-asap-alignleft' => __('Left', 'asap') ,
		'ads-asap-alignleft-wrap' => __('Left wrapped', 'asap') ,
		'ads-asap-aligncenter' => __('Center', 'asap') ,
		'ads-asap-alignright' => __('Right', 'asap') ,
		'ads-asap-alignright-wrap' => __('Right wrapped', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_2_style', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_2_type', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '2',
	));

	$cats = array(
		'1' => __('Posts / Pages', 'asap') ,
		'2' => __('only posts', 'asap') ,
		'3' => __('only pages', 'asap') ,
		'4' => __('Use only as shortcode', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_2_type', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_2_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_2_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_2_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new asap_Dropdown_Category_Control($wp_customize, 'asap_ads_2_cat', array(
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
	)));

	$wp_customize->add_setting('asap_ads_2_margin', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('asap_ads_2_margin', array(
		'section' => 'asap_ads_sec_inside',
		'type' => 'number',
		'priority' => 1,
		'input_attrs' => array(
			'placeholder' => __('Margin', 'asap') ,
		)
	));

	$wp_customize->add_setting('asap_ads_3', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_ads_3', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'description' => __('Shortcode: [ads id=5]', 'asap') ,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_3_place', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('After paragraph 1', 'asap') ,
		'2' => __('After paragraph 2', 'asap') ,
		'3' => __('After paragraph 3', 'asap') ,
		'4' => __('After paragraph 4', 'asap') ,
		'5' => __('After paragraph 5', 'asap') ,
		'6' => __('After paragraph 6', 'asap') ,
		'7' => __('After paragraph 7', 'asap') ,
		'8' => __('After paragraph 8', 'asap') ,
		'9' => __('After paragraph 9', 'asap') ,
		'10' => __('After paragraph 10', 'asap') ,
		'11' => __('After paragraph 11', 'asap') ,
		'12' => __('After paragraph 12', 'asap') ,
		'13' => __('After paragraph 13', 'asap') ,
		'14' => __('After paragraph 14', 'asap') ,
		'15' => __('After paragraph 15', 'asap') ,
		'16' => __('After paragraph 16', 'asap') ,
		'17' => __('After paragraph 17', 'asap') ,
		'18' => __('After paragraph 18', 'asap') ,
		'19' => __('After paragraph 19', 'asap') ,
		'20' => __('After paragraph 20', 'asap') ,
		'0-1' => __('After H2 number 1', 'asap') ,
		'0-2' => __('After H2 number 2', 'asap') ,
		'0-3' => __('After H2 number 3', 'asap') ,
		'0-4' => __('After H2 number 4', 'asap') ,
		'0-5' => __('After H2 number 5', 'asap') ,
		'0-6' => __('After H2 number 6', 'asap') ,
		'0-7' => __('After H2 number 7', 'asap') ,
		'0-8' => __('After H2 number 8', 'asap') ,
		'0-9' => __('After H2 number 9', 'asap') ,
		'0-10' => __('After H2 number 10', 'asap') ,
		'h3-1' => __('After H3 number 1', 'asap') ,
		'h3-2' => __('After H3 number 2', 'asap') ,
		'h3-3' => __('After H3 number 3', 'asap') ,
		'h3-4' => __('After H3 number 4', 'asap') ,
		'h3-5' => __('After H3 number 5', 'asap') ,
		'h3-6' => __('After H3 number 6', 'asap') ,
		'h3-7' => __('After H3 number 7', 'asap') ,
		'h3-8' => __('After H3 number 8', 'asap') ,
		'h3-9' => __('After H3 number 9', 'asap') ,
		'h3-10' => __('After H3 number 10', 'asap') ,
		'li-1' => __('After item list  1', 'asap') ,
		'li-2' => __('After item list  2', 'asap') ,
		'li-3' => __('After item list  3', 'asap') ,
		'li-4' => __('After item list  4', 'asap') ,
		'li-5' => __('After item list  5', 'asap') ,
		'li-6' => __('After item list  6', 'asap') ,
		'li-7' => __('After item list  7', 'asap') ,
		'li-8' => __('After item list  8', 'asap') ,
		'li-9' => __('After item list  9', 'asap') ,
		'li-10' => __('After item list  10', 'asap') ,
		'li-11' => __('After item list  11', 'asap') ,
		'li-12' => __('After item list  12', 'asap') ,
		'li-13' => __('After item list  13', 'asap') ,
		'li-14' => __('After item list  14', 'asap') ,
		'li-15' => __('After item list  15', 'asap') ,
		'li-16' => __('After item list  16', 'asap') ,
		'li-17' => __('After item list  17', 'asap') ,
		'li-18' => __('After item list  18', 'asap') ,
		'li-19' => __('After item list  19', 'asap') ,
		'li-20' => __('After item list  20', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_3_place', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_3_style', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'ads-asap-aligncenter',
	));

	$cats = array(
		'ads-asap-alignleft' => __('Left', 'asap') ,
		'ads-asap-alignleft-wrap' => __('Left wrapped', 'asap') ,
		'ads-asap-aligncenter' => __('Center', 'asap') ,
		'ads-asap-alignright' => __('Right', 'asap') ,
		'ads-asap-alignright-wrap' => __('Right wrapped', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_3_style', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_3_type', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '2',
	));

	$cats = array(
		'1' => __('Posts / Pages', 'asap') ,
		'2' => __('only posts', 'asap') ,
		'3' => __('only pages', 'asap') ,
		'4' => __('Use only as shortcode', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_3_type', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_3_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_3_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_3_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new asap_Dropdown_Category_Control($wp_customize, 'asap_ads_3_cat', array(
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
	)));

	$wp_customize->add_setting('asap_ads_3_margin', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('asap_ads_3_margin', array(
		'section' => 'asap_ads_sec_inside',
		'type' => 'number',
		'priority' => 1,
		'input_attrs' => array(
			'placeholder' => __('Margin', 'asap') ,
		)
	));

	$wp_customize->add_setting('asap_ads_4', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_ads_4', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'description' => __('Shortcode: [ads id=6]', 'asap') ,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_4_place', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('After paragraph 1', 'asap') ,
		'2' => __('After paragraph 2', 'asap') ,
		'3' => __('After paragraph 3', 'asap') ,
		'4' => __('After paragraph 4', 'asap') ,
		'5' => __('After paragraph 5', 'asap') ,
		'6' => __('After paragraph 6', 'asap') ,
		'7' => __('After paragraph 7', 'asap') ,
		'8' => __('After paragraph 8', 'asap') ,
		'9' => __('After paragraph 9', 'asap') ,
		'10' => __('After paragraph 10', 'asap') ,
		'11' => __('After paragraph 11', 'asap') ,
		'12' => __('After paragraph 12', 'asap') ,
		'13' => __('After paragraph 13', 'asap') ,
		'14' => __('After paragraph 14', 'asap') ,
		'15' => __('After paragraph 15', 'asap') ,
		'16' => __('After paragraph 16', 'asap') ,
		'17' => __('After paragraph 17', 'asap') ,
		'18' => __('After paragraph 18', 'asap') ,
		'19' => __('After paragraph 19', 'asap') ,
		'20' => __('After paragraph 20', 'asap') ,
		'0-1' => __('After H2 number 1', 'asap') ,
		'0-2' => __('After H2 number 2', 'asap') ,
		'0-3' => __('After H2 number 3', 'asap') ,
		'0-4' => __('After H2 number 4', 'asap') ,
		'0-5' => __('After H2 number 5', 'asap') ,
		'0-6' => __('After H2 number 6', 'asap') ,
		'0-7' => __('After H2 number 7', 'asap') ,
		'0-8' => __('After H2 number 8', 'asap') ,
		'0-9' => __('After H2 number 9', 'asap') ,
		'0-10' => __('After H2 number 10', 'asap') ,
		'h3-1' => __('After H3 number 1', 'asap') ,
		'h3-2' => __('After H3 number 2', 'asap') ,
		'h3-3' => __('After H3 number 3', 'asap') ,
		'h3-4' => __('After H3 number 4', 'asap') ,
		'h3-5' => __('After H3 number 5', 'asap') ,
		'h3-6' => __('After H3 number 6', 'asap') ,
		'h3-7' => __('After H3 number 7', 'asap') ,
		'h3-8' => __('After H3 number 8', 'asap') ,
		'h3-9' => __('After H3 number 9', 'asap') ,
		'h3-10' => __('After H3 number 10', 'asap') ,
		'li-1' => __('After item list  1', 'asap') ,
		'li-2' => __('After item list  2', 'asap') ,
		'li-3' => __('After item list  3', 'asap') ,
		'li-4' => __('After item list  4', 'asap') ,
		'li-5' => __('After item list  5', 'asap') ,
		'li-6' => __('After item list  6', 'asap') ,
		'li-7' => __('After item list  7', 'asap') ,
		'li-8' => __('After item list  8', 'asap') ,
		'li-9' => __('After item list  9', 'asap') ,
		'li-10' => __('After item list  10', 'asap') ,
		'li-11' => __('After item list  11', 'asap') ,
		'li-12' => __('After item list  12', 'asap') ,
		'li-13' => __('After item list  13', 'asap') ,
		'li-14' => __('After item list  14', 'asap') ,
		'li-15' => __('After item list  15', 'asap') ,
		'li-16' => __('After item list  16', 'asap') ,
		'li-17' => __('After item list  17', 'asap') ,
		'li-18' => __('After item list  18', 'asap') ,
		'li-19' => __('After item list  19', 'asap') ,
		'li-20' => __('After item list  20', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_4_place', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_4_style', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'ads-asap-aligncenter',
	));

	$cats = array(
		'ads-asap-alignleft' => __('Left', 'asap') ,
		'ads-asap-alignleft-wrap' => __('Left wrapped', 'asap') ,
		'ads-asap-aligncenter' => __('Center', 'asap') ,
		'ads-asap-alignright' => __('Right', 'asap') ,
		'ads-asap-alignright-wrap' => __('Right wrapped', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_4_style', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_4_type', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '2',
	));

	$cats = array(
		'1' => __('Posts / Pages', 'asap') ,
		'2' => __('only posts', 'asap') ,
		'3' => __('only pages', 'asap') ,
		'4' => __('Use only as shortcode', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_4_type', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_4_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_4_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_4_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new asap_Dropdown_Category_Control($wp_customize, 'asap_ads_4_cat', array(
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
	)));

	$wp_customize->add_setting('asap_ads_4_margin', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('asap_ads_4_margin', array(
		'section' => 'asap_ads_sec_inside',
		'type' => 'number',
		'priority' => 1,
		'input_attrs' => array(
			'placeholder' => __('Margin', 'asap') ,
		)
	));

	$wp_customize->add_setting('asap_ads_5', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_ads_5', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'description' => __('Shortcode: [ads id=7]', 'asap') ,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_5_place', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('After paragraph 1', 'asap') ,
		'2' => __('After paragraph 2', 'asap') ,
		'3' => __('After paragraph 3', 'asap') ,
		'4' => __('After paragraph 4', 'asap') ,
		'5' => __('After paragraph 5', 'asap') ,
		'6' => __('After paragraph 6', 'asap') ,
		'7' => __('After paragraph 7', 'asap') ,
		'8' => __('After paragraph 8', 'asap') ,
		'9' => __('After paragraph 9', 'asap') ,
		'10' => __('After paragraph 10', 'asap') ,
		'11' => __('After paragraph 11', 'asap') ,
		'12' => __('After paragraph 12', 'asap') ,
		'13' => __('After paragraph 13', 'asap') ,
		'14' => __('After paragraph 14', 'asap') ,
		'15' => __('After paragraph 15', 'asap') ,
		'16' => __('After paragraph 16', 'asap') ,
		'17' => __('After paragraph 17', 'asap') ,
		'18' => __('After paragraph 18', 'asap') ,
		'19' => __('After paragraph 19', 'asap') ,
		'20' => __('After paragraph 20', 'asap') ,
		'0-1' => __('After H2 number 1', 'asap') ,
		'0-2' => __('After H2 number 2', 'asap') ,
		'0-3' => __('After H2 number 3', 'asap') ,
		'0-4' => __('After H2 number 4', 'asap') ,
		'0-5' => __('After H2 number 5', 'asap') ,
		'0-6' => __('After H2 number 6', 'asap') ,
		'0-7' => __('After H2 number 7', 'asap') ,
		'0-8' => __('After H2 number 8', 'asap') ,
		'0-9' => __('After H2 number 9', 'asap') ,
		'0-10' => __('After H2 number 10', 'asap') ,
		'h3-1' => __('After H3 number 1', 'asap') ,
		'h3-2' => __('After H3 number 2', 'asap') ,
		'h3-3' => __('After H3 number 3', 'asap') ,
		'h3-4' => __('After H3 number 4', 'asap') ,
		'h3-5' => __('After H3 number 5', 'asap') ,
		'h3-6' => __('After H3 number 6', 'asap') ,
		'h3-7' => __('After H3 number 7', 'asap') ,
		'h3-8' => __('After H3 number 8', 'asap') ,
		'h3-9' => __('After H3 number 9', 'asap') ,
		'h3-10' => __('After H3 number 10', 'asap') ,
		'li-1' => __('After item list  1', 'asap') ,
		'li-2' => __('After item list  2', 'asap') ,
		'li-3' => __('After item list  3', 'asap') ,
		'li-4' => __('After item list  4', 'asap') ,
		'li-5' => __('After item list  5', 'asap') ,
		'li-6' => __('After item list  6', 'asap') ,
		'li-7' => __('After item list  7', 'asap') ,
		'li-8' => __('After item list  8', 'asap') ,
		'li-9' => __('After item list  9', 'asap') ,
		'li-10' => __('After item list  10', 'asap') ,
		'li-11' => __('After item list  11', 'asap') ,
		'li-12' => __('After item list  12', 'asap') ,
		'li-13' => __('After item list  13', 'asap') ,
		'li-14' => __('After item list  14', 'asap') ,
		'li-15' => __('After item list  15', 'asap') ,
		'li-16' => __('After item list  16', 'asap') ,
		'li-17' => __('After item list  17', 'asap') ,
		'li-18' => __('After item list  18', 'asap') ,
		'li-19' => __('After item list  19', 'asap') ,
		'li-20' => __('After item list  20', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_5_place', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_5_style', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'ads-asap-aligncenter',
	));

	$cats = array(
		'ads-asap-alignleft' => __('Left', 'asap') ,
		'ads-asap-alignleft-wrap' => __('Left wrapped', 'asap') ,
		'ads-asap-aligncenter' => __('Center', 'asap') ,
		'ads-asap-alignright' => __('Right', 'asap') ,
		'ads-asap-alignright-wrap' => __('Right wrapped', 'asap') ,

	);

	$wp_customize->add_control('asap_ads_5_style', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_5_type', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '2',
	));

	$cats = array(
		'1' => __('Posts / Pages', 'asap') ,
		'2' => __('only posts', 'asap') ,
		'3' => __('only pages', 'asap') ,
		'4' => __('Use only as shortcode', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_5_type', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_5_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_5_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_5_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new asap_Dropdown_Category_Control($wp_customize, 'asap_ads_5_cat', array(
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
	)));

	$wp_customize->add_setting('asap_ads_5_margin', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('asap_ads_5_margin', array(
		'section' => 'asap_ads_sec_inside',
		'type' => 'number',
		'priority' => 1,
		'input_attrs' => array(
			'placeholder' => __('Margin', 'asap') ,
		)
	));

	$wp_customize->add_setting('asap_ads_6', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_ads_6', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'description' => __('Shortcode: [ads id=8]', 'asap') ,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_6_place', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('After paragraph 1', 'asap') ,
		'2' => __('After paragraph 2', 'asap') ,
		'3' => __('After paragraph 3', 'asap') ,
		'4' => __('After paragraph 4', 'asap') ,
		'5' => __('After paragraph 5', 'asap') ,
		'6' => __('After paragraph 6', 'asap') ,
		'7' => __('After paragraph 7', 'asap') ,
		'8' => __('After paragraph 8', 'asap') ,
		'9' => __('After paragraph 9', 'asap') ,
		'10' => __('After paragraph 10', 'asap') ,
		'11' => __('After paragraph 11', 'asap') ,
		'12' => __('After paragraph 12', 'asap') ,
		'13' => __('After paragraph 13', 'asap') ,
		'14' => __('After paragraph 14', 'asap') ,
		'15' => __('After paragraph 15', 'asap') ,
		'16' => __('After paragraph 16', 'asap') ,
		'17' => __('After paragraph 17', 'asap') ,
		'18' => __('After paragraph 18', 'asap') ,
		'19' => __('After paragraph 19', 'asap') ,
		'20' => __('After paragraph 20', 'asap') ,
		'0-1' => __('After H2 number 1', 'asap') ,
		'0-2' => __('After H2 number 2', 'asap') ,
		'0-3' => __('After H2 number 3', 'asap') ,
		'0-4' => __('After H2 number 4', 'asap') ,
		'0-5' => __('After H2 number 5', 'asap') ,
		'0-6' => __('After H2 number 6', 'asap') ,
		'0-7' => __('After H2 number 7', 'asap') ,
		'0-8' => __('After H2 number 8', 'asap') ,
		'0-9' => __('After H2 number 9', 'asap') ,
		'0-10' => __('After H2 number 10', 'asap') ,
		'h3-1' => __('After H3 number 1', 'asap') ,
		'h3-2' => __('After H3 number 2', 'asap') ,
		'h3-3' => __('After H3 number 3', 'asap') ,
		'h3-4' => __('After H3 number 4', 'asap') ,
		'h3-5' => __('After H3 number 5', 'asap') ,
		'h3-6' => __('After H3 number 6', 'asap') ,
		'h3-7' => __('After H3 number 7', 'asap') ,
		'h3-8' => __('After H3 number 8', 'asap') ,
		'h3-9' => __('After H3 number 9', 'asap') ,
		'h3-10' => __('After H3 number 10', 'asap') ,
		'li-1' => __('After item list  1', 'asap') ,
		'li-2' => __('After item list  2', 'asap') ,
		'li-3' => __('After item list  3', 'asap') ,
		'li-4' => __('After item list  4', 'asap') ,
		'li-5' => __('After item list  5', 'asap') ,
		'li-6' => __('After item list  6', 'asap') ,
		'li-7' => __('After item list  7', 'asap') ,
		'li-8' => __('After item list  8', 'asap') ,
		'li-9' => __('After item list  9', 'asap') ,
		'li-10' => __('After item list  10', 'asap') ,
		'li-11' => __('After item list  11', 'asap') ,
		'li-12' => __('After item list  12', 'asap') ,
		'li-13' => __('After item list  13', 'asap') ,
		'li-14' => __('After item list  14', 'asap') ,
		'li-15' => __('After item list  15', 'asap') ,
		'li-16' => __('After item list  16', 'asap') ,
		'li-17' => __('After item list  17', 'asap') ,
		'li-18' => __('After item list  18', 'asap') ,
		'li-19' => __('After item list  19', 'asap') ,
		'li-20' => __('After item list  20', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_6_place', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_6_style', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'ads-asap-aligncenter',
	));

	$cats = array(
		'ads-asap-alignleft' => __('Left', 'asap') ,
		'ads-asap-alignleft-wrap' => __('Left wrapped', 'asap') ,
		'ads-asap-aligncenter' => __('Center', 'asap') ,
		'ads-asap-alignright' => __('Right', 'asap') ,
		'ads-asap-alignright-wrap' => __('Right wrapped', 'asap') ,

	);

	$wp_customize->add_control('asap_ads_6_style', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_6_type', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '2',
	));

	$cats = array(
		'1' => __('Posts / Pages', 'asap') ,
		'2' => __('only posts', 'asap') ,
		'3' => __('only pages', 'asap') ,
		'4' => __('Use only as shortcode', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_6_type', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_6_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_6_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_6_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new asap_Dropdown_Category_Control($wp_customize, 'asap_ads_6_cat', array(
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
	)));

	$wp_customize->add_setting('asap_ads_6_margin', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('asap_ads_6_margin', array(
		'section' => 'asap_ads_sec_inside',
		'type' => 'number',
		'priority' => 1,
		'input_attrs' => array(
			'placeholder' => __('Margin', 'asap') ,
		)
	));

	$wp_customize->add_setting('asap_ads_7', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_ads_7', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'description' => __('Shortcode: [ads id=9]', 'asap') ,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_7_place', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('After paragraph 1', 'asap') ,
		'2' => __('After paragraph 2', 'asap') ,
		'3' => __('After paragraph 3', 'asap') ,
		'4' => __('After paragraph 4', 'asap') ,
		'5' => __('After paragraph 5', 'asap') ,
		'6' => __('After paragraph 6', 'asap') ,
		'7' => __('After paragraph 7', 'asap') ,
		'8' => __('After paragraph 8', 'asap') ,
		'9' => __('After paragraph 9', 'asap') ,
		'10' => __('After paragraph 10', 'asap') ,
		'11' => __('After paragraph 11', 'asap') ,
		'12' => __('After paragraph 12', 'asap') ,
		'13' => __('After paragraph 13', 'asap') ,
		'14' => __('After paragraph 14', 'asap') ,
		'15' => __('After paragraph 15', 'asap') ,
		'16' => __('After paragraph 16', 'asap') ,
		'17' => __('After paragraph 17', 'asap') ,
		'18' => __('After paragraph 18', 'asap') ,
		'19' => __('After paragraph 19', 'asap') ,
		'20' => __('After paragraph 20', 'asap') ,
		'0-1' => __('After H2 number 1', 'asap') ,
		'0-2' => __('After H2 number 2', 'asap') ,
		'0-3' => __('After H2 number 3', 'asap') ,
		'0-4' => __('After H2 number 4', 'asap') ,
		'0-5' => __('After H2 number 5', 'asap') ,
		'0-6' => __('After H2 number 6', 'asap') ,
		'0-7' => __('After H2 number 7', 'asap') ,
		'0-8' => __('After H2 number 8', 'asap') ,
		'0-9' => __('After H2 number 9', 'asap') ,
		'0-10' => __('After H2 number 10', 'asap') ,
		'h3-1' => __('After H3 number 1', 'asap') ,
		'h3-2' => __('After H3 number 2', 'asap') ,
		'h3-3' => __('After H3 number 3', 'asap') ,
		'h3-4' => __('After H3 number 4', 'asap') ,
		'h3-5' => __('After H3 number 5', 'asap') ,
		'h3-6' => __('After H3 number 6', 'asap') ,
		'h3-7' => __('After H3 number 7', 'asap') ,
		'h3-8' => __('After H3 number 8', 'asap') ,
		'h3-9' => __('After H3 number 9', 'asap') ,
		'h3-10' => __('After H3 number 10', 'asap') ,	
		'li-1' => __('After item list  1', 'asap') ,
		'li-2' => __('After item list  2', 'asap') ,
		'li-3' => __('After item list  3', 'asap') ,
		'li-4' => __('After item list  4', 'asap') ,
		'li-5' => __('After item list  5', 'asap') ,
		'li-6' => __('After item list  6', 'asap') ,
		'li-7' => __('After item list  7', 'asap') ,
		'li-8' => __('After item list  8', 'asap') ,
		'li-9' => __('After item list  9', 'asap') ,
		'li-10' => __('After item list  10', 'asap') ,
		'li-11' => __('After item list  11', 'asap') ,
		'li-12' => __('After item list  12', 'asap') ,
		'li-13' => __('After item list  13', 'asap') ,
		'li-14' => __('After item list  14', 'asap') ,
		'li-15' => __('After item list  15', 'asap') ,
		'li-16' => __('After item list  16', 'asap') ,
		'li-17' => __('After item list  17', 'asap') ,
		'li-18' => __('After item list  18', 'asap') ,
		'li-19' => __('After item list  19', 'asap') ,
		'li-20' => __('After item list  20', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_7_place', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_7_style', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'ads-asap-aligncenter',
	));

	$cats = array(
		'ads-asap-alignleft' => __('Left', 'asap') ,
		'ads-asap-alignleft-wrap' => __('Left wrapped', 'asap') ,
		'ads-asap-aligncenter' => __('Center', 'asap') ,
		'ads-asap-alignright' => __('Right', 'asap') ,
		'ads-asap-alignright-wrap' => __('Right wrapped', 'asap') ,

	);

	$wp_customize->add_control('asap_ads_7_style', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_7_type', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '2',
	));

	$cats = array(
		'1' => __('Posts / Pages', 'asap') ,
		'2' => __('only posts', 'asap') ,
		'3' => __('only pages', 'asap') ,
		'4' => __('Use only as shortcode', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_7_type', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_7_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_7_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_7_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new asap_Dropdown_Category_Control($wp_customize, 'asap_ads_7_cat', array(
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
	)));

	$wp_customize->add_setting('asap_ads_7_margin', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('asap_ads_7_margin', array(
		'section' => 'asap_ads_sec_inside',
		'type' => 'number',
		'priority' => 1,
		'input_attrs' => array(
			'placeholder' => __('Margin', 'asap') ,
		)
	));

	$wp_customize->add_setting('asap_ads_8', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_ads_8', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'description' => __('Shortcode: [ads id=10]', 'asap') ,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_8_place', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('After paragraph 1', 'asap') ,
		'2' => __('After paragraph 2', 'asap') ,
		'3' => __('After paragraph 3', 'asap') ,
		'4' => __('After paragraph 4', 'asap') ,
		'5' => __('After paragraph 5', 'asap') ,
		'6' => __('After paragraph 6', 'asap') ,
		'7' => __('After paragraph 7', 'asap') ,
		'8' => __('After paragraph 8', 'asap') ,
		'9' => __('After paragraph 9', 'asap') ,
		'10' => __('After paragraph 10', 'asap') ,
		'11' => __('After paragraph 11', 'asap') ,
		'12' => __('After paragraph 12', 'asap') ,
		'13' => __('After paragraph 13', 'asap') ,
		'14' => __('After paragraph 14', 'asap') ,
		'15' => __('After paragraph 15', 'asap') ,
		'16' => __('After paragraph 16', 'asap') ,
		'17' => __('After paragraph 17', 'asap') ,
		'18' => __('After paragraph 18', 'asap') ,
		'19' => __('After paragraph 19', 'asap') ,
		'20' => __('After paragraph 20', 'asap') ,
		'0-1' => __('After H2 number 1', 'asap') ,
		'0-2' => __('After H2 number 2', 'asap') ,
		'0-3' => __('After H2 number 3', 'asap') ,
		'0-4' => __('After H2 number 4', 'asap') ,
		'0-5' => __('After H2 number 5', 'asap') ,
		'0-6' => __('After H2 number 6', 'asap') ,
		'0-7' => __('After H2 number 7', 'asap') ,
		'0-8' => __('After H2 number 8', 'asap') ,
		'0-9' => __('After H2 number 9', 'asap') ,
		'0-10' => __('After H2 number 10', 'asap') ,
		'h3-1' => __('After H3 number 1', 'asap') ,
		'h3-2' => __('After H3 number 2', 'asap') ,
		'h3-3' => __('After H3 number 3', 'asap') ,
		'h3-4' => __('After H3 number 4', 'asap') ,
		'h3-5' => __('After H3 number 5', 'asap') ,
		'h3-6' => __('After H3 number 6', 'asap') ,
		'h3-7' => __('After H3 number 7', 'asap') ,
		'h3-8' => __('After H3 number 8', 'asap') ,
		'h3-9' => __('After H3 number 9', 'asap') ,
		'h3-10' => __('After H3 number 10', 'asap') ,
		'li-1' => __('After item list  1', 'asap') ,
		'li-2' => __('After item list  2', 'asap') ,
		'li-3' => __('After item list  3', 'asap') ,
		'li-4' => __('After item list  4', 'asap') ,
		'li-5' => __('After item list  5', 'asap') ,
		'li-6' => __('After item list  6', 'asap') ,
		'li-7' => __('After item list  7', 'asap') ,
		'li-8' => __('After item list  8', 'asap') ,
		'li-9' => __('After item list  9', 'asap') ,
		'li-10' => __('After item list  10', 'asap') ,
		'li-11' => __('After item list  11', 'asap') ,
		'li-12' => __('After item list  12', 'asap') ,
		'li-13' => __('After item list  13', 'asap') ,
		'li-14' => __('After item list  14', 'asap') ,
		'li-15' => __('After item list  15', 'asap') ,
		'li-16' => __('After item list  16', 'asap') ,
		'li-17' => __('After item list  17', 'asap') ,
		'li-18' => __('After item list  18', 'asap') ,
		'li-19' => __('After item list  19', 'asap') ,
		'li-20' => __('After item list  20', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_8_place', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_8_style', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'ads-asap-aligncenter',
	));

	$cats = array(
		'ads-asap-alignleft' => __('Left', 'asap') ,
		'ads-asap-alignleft-wrap' => __('Left wrapped', 'asap') ,
		'ads-asap-aligncenter' => __('Center', 'asap') ,
		'ads-asap-alignright' => __('Right', 'asap') ,
		'ads-asap-alignright-wrap' => __('Right wrapped', 'asap') ,

	);

	$wp_customize->add_control('asap_ads_8_style', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_8_type', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '2',
	));

	$cats = array(
		'1' => __('Posts / Pages', 'asap') ,
		'2' => __('only posts', 'asap') ,
		'3' => __('only pages', 'asap') ,
		'4' => __('Use only as shortcode', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_8_type', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_8_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_8_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_8_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new asap_Dropdown_Category_Control($wp_customize, 'asap_ads_8_cat', array(
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
	)));

	$wp_customize->add_setting('asap_ads_8_margin', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('asap_ads_8_margin', array(
		'section' => 'asap_ads_sec_inside',
		'type' => 'number',
		'priority' => 1,
		'input_attrs' => array(
			'placeholder' => __('Margin', 'asap') ,
		)
	));

	$wp_customize->add_setting('asap_ads_9', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_ads_9', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'description' => __('Shortcode: [ads id=11]', 'asap') ,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_9_place', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('After paragraph 1', 'asap') ,
		'2' => __('After paragraph 2', 'asap') ,
		'3' => __('After paragraph 3', 'asap') ,
		'4' => __('After paragraph 4', 'asap') ,
		'5' => __('After paragraph 5', 'asap') ,
		'6' => __('After paragraph 6', 'asap') ,
		'7' => __('After paragraph 7', 'asap') ,
		'8' => __('After paragraph 8', 'asap') ,
		'9' => __('After paragraph 9', 'asap') ,
		'10' => __('After paragraph 10', 'asap') ,
		'11' => __('After paragraph 11', 'asap') ,
		'12' => __('After paragraph 12', 'asap') ,
		'13' => __('After paragraph 13', 'asap') ,
		'14' => __('After paragraph 14', 'asap') ,
		'15' => __('After paragraph 15', 'asap') ,
		'16' => __('After paragraph 16', 'asap') ,
		'17' => __('After paragraph 17', 'asap') ,
		'18' => __('After paragraph 18', 'asap') ,
		'19' => __('After paragraph 19', 'asap') ,
		'20' => __('After paragraph 20', 'asap') ,
		'0-1' => __('After H2 number 1', 'asap') ,
		'0-2' => __('After H2 number 2', 'asap') ,
		'0-3' => __('After H2 number 3', 'asap') ,
		'0-4' => __('After H2 number 4', 'asap') ,
		'0-5' => __('After H2 number 5', 'asap') ,
		'0-6' => __('After H2 number 6', 'asap') ,
		'0-7' => __('After H2 number 7', 'asap') ,
		'0-8' => __('After H2 number 8', 'asap') ,
		'0-9' => __('After H2 number 9', 'asap') ,
		'0-10' => __('After H2 number 10', 'asap') ,
		'h3-1' => __('After H3 number 1', 'asap') ,
		'h3-2' => __('After H3 number 2', 'asap') ,
		'h3-3' => __('After H3 number 3', 'asap') ,
		'h3-4' => __('After H3 number 4', 'asap') ,
		'h3-5' => __('After H3 number 5', 'asap') ,
		'h3-6' => __('After H3 number 6', 'asap') ,
		'h3-7' => __('After H3 number 7', 'asap') ,
		'h3-8' => __('After H3 number 8', 'asap') ,
		'h3-9' => __('After H3 number 9', 'asap') ,
		'h3-10' => __('After H3 number 10', 'asap') ,
		'li-1' => __('After item list  1', 'asap') ,
		'li-2' => __('After item list  2', 'asap') ,
		'li-3' => __('After item list  3', 'asap') ,
		'li-4' => __('After item list  4', 'asap') ,
		'li-5' => __('After item list  5', 'asap') ,
		'li-6' => __('After item list  6', 'asap') ,
		'li-7' => __('After item list  7', 'asap') ,
		'li-8' => __('After item list  8', 'asap') ,
		'li-9' => __('After item list  9', 'asap') ,
		'li-10' => __('After item list  10', 'asap') ,
		'li-11' => __('After item list  11', 'asap') ,
		'li-12' => __('After item list  12', 'asap') ,
		'li-13' => __('After item list  13', 'asap') ,
		'li-14' => __('After item list  14', 'asap') ,
		'li-15' => __('After item list  15', 'asap') ,
		'li-16' => __('After item list  16', 'asap') ,
		'li-17' => __('After item list  17', 'asap') ,
		'li-18' => __('After item list  18', 'asap') ,
		'li-19' => __('After item list  19', 'asap') ,
		'li-20' => __('After item list  20', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_9_place', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_9_style', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'ads-asap-aligncenter',
	));

	$cats = array(
		'ads-asap-alignleft' => __('Left', 'asap') ,
		'ads-asap-alignleft-wrap' => __('Left wrapped', 'asap') ,
		'ads-asap-aligncenter' => __('Center', 'asap') ,
		'ads-asap-alignright' => __('Right', 'asap') ,
		'ads-asap-alignright-wrap' => __('Right wrapped', 'asap') ,

	);

	$wp_customize->add_control('asap_ads_9_style', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_9_type', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '2',
	));

	$cats = array(
		'1' => __('Posts / Pages', 'asap') ,
		'2' => __('only posts', 'asap') ,
		'3' => __('only pages', 'asap') ,
		'4' => __('Use only as shortcode', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_9_type', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_9_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_9_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_9_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new asap_Dropdown_Category_Control($wp_customize, 'asap_ads_9_cat', array(
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
	)));

	$wp_customize->add_setting('asap_ads_9_margin', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('asap_ads_9_margin', array(
		'section' => 'asap_ads_sec_inside',
		'type' => 'number',
		'priority' => 1,
		'input_attrs' => array(
			'placeholder' => __('Margin', 'asap') ,
		)
	));

	$wp_customize->add_setting('asap_ads_10', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_ads_10', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'description' => __('Shortcode: [ads id=12]', 'asap') ,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_10_place', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('After paragraph 1', 'asap') ,
		'2' => __('After paragraph 2', 'asap') ,
		'3' => __('After paragraph 3', 'asap') ,
		'4' => __('After paragraph 4', 'asap') ,
		'5' => __('After paragraph 5', 'asap') ,
		'6' => __('After paragraph 6', 'asap') ,
		'7' => __('After paragraph 7', 'asap') ,
		'8' => __('After paragraph 8', 'asap') ,
		'9' => __('After paragraph 9', 'asap') ,
		'10' => __('After paragraph 10', 'asap') ,
		'11' => __('After paragraph 11', 'asap') ,
		'12' => __('After paragraph 12', 'asap') ,
		'13' => __('After paragraph 13', 'asap') ,
		'14' => __('After paragraph 14', 'asap') ,
		'15' => __('After paragraph 15', 'asap') ,
		'16' => __('After paragraph 16', 'asap') ,
		'17' => __('After paragraph 17', 'asap') ,
		'18' => __('After paragraph 18', 'asap') ,
		'19' => __('After paragraph 19', 'asap') ,
		'20' => __('After paragraph 20', 'asap') ,
		'0-1' => __('After H2 number 1', 'asap') ,
		'0-2' => __('After H2 number 2', 'asap') ,
		'0-3' => __('After H2 number 3', 'asap') ,
		'0-4' => __('After H2 number 4', 'asap') ,
		'0-5' => __('After H2 number 5', 'asap') ,
		'0-6' => __('After H2 number 6', 'asap') ,
		'0-7' => __('After H2 number 7', 'asap') ,
		'0-8' => __('After H2 number 8', 'asap') ,
		'0-9' => __('After H2 number 9', 'asap') ,
		'0-10' => __('After H2 number 10', 'asap') ,
		'h3-1' => __('After H3 number 1', 'asap') ,
		'h3-2' => __('After H3 number 2', 'asap') ,
		'h3-3' => __('After H3 number 3', 'asap') ,
		'h3-4' => __('After H3 number 4', 'asap') ,
		'h3-5' => __('After H3 number 5', 'asap') ,
		'h3-6' => __('After H3 number 6', 'asap') ,
		'h3-7' => __('After H3 number 7', 'asap') ,
		'h3-8' => __('After H3 number 8', 'asap') ,
		'h3-9' => __('After H3 number 9', 'asap') ,
		'h3-10' => __('After H3 number 10', 'asap') ,
		'li-1' => __('After item list  1', 'asap') ,
		'li-2' => __('After item list  2', 'asap') ,
		'li-3' => __('After item list  3', 'asap') ,
		'li-4' => __('After item list  4', 'asap') ,
		'li-5' => __('After item list  5', 'asap') ,
		'li-6' => __('After item list  6', 'asap') ,
		'li-7' => __('After item list  7', 'asap') ,
		'li-8' => __('After item list  8', 'asap') ,
		'li-9' => __('After item list  9', 'asap') ,
		'li-10' => __('After item list  10', 'asap') ,
		'li-11' => __('After item list  11', 'asap') ,
		'li-12' => __('After item list  12', 'asap') ,
		'li-13' => __('After item list  13', 'asap') ,
		'li-14' => __('After item list  14', 'asap') ,
		'li-15' => __('After item list  15', 'asap') ,
		'li-16' => __('After item list  16', 'asap') ,
		'li-17' => __('After item list  17', 'asap') ,
		'li-18' => __('After item list  18', 'asap') ,
		'li-19' => __('After item list  19', 'asap') ,
		'li-20' => __('After item list  20', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_10_place', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_10_style', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'ads-asap-aligncenter',
	));

	$cats = array(
		'ads-asap-alignleft' => __('Left', 'asap') ,
		'ads-asap-alignleft-wrap' => __('Left wrapped', 'asap') ,
		'ads-asap-aligncenter' => __('Center', 'asap') ,
		'ads-asap-alignright' => __('Right', 'asap') ,
		'ads-asap-alignright-wrap' => __('Right wrapped', 'asap') ,

	);

	$wp_customize->add_control('asap_ads_10_style', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_10_type', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '2',
	));

	$cats = array(
		'1' => __('Posts / Pages', 'asap') ,
		'2' => __('only posts', 'asap') ,
		'3' => __('only pages', 'asap') ,
		'4' => __('Use only as shortcode', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_10_type', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_10_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_10_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_10_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new asap_Dropdown_Category_Control($wp_customize, 'asap_ads_10_cat', array(
		'section' => 'asap_ads_sec_inside',
		'priority' => 1,
	)));

	$wp_customize->add_setting('asap_ads_10_margin', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('asap_ads_10_margin', array(
		'section' => 'asap_ads_sec_inside',
		'type' => 'number',
		'priority' => 1,
		'input_attrs' => array(
			'placeholder' => __('Margin', 'asap') ,
		)
	));
	
	
	$wp_customize->add_setting('asap_ads_before_image', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_ads_before_image', array(
		'label' => __('Before featured image', 'asap') ,
		'section' => 'asap_ads_sec_before',
		'description' => __('Shortcode: [ads id=16]', 'asap') ,
		'priority' => 1,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_before_image_style', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'ads-asap-aligncenter',
	));

	$cats = array(
		'ads-asap-alignleft' => __('Left', 'asap') ,
		'ads-asap-alignleft-wrap' => __('Left wrapped', 'asap') ,
		'ads-asap-aligncenter' => __('Center', 'asap') ,
		'ads-asap-alignright' => __('Right', 'asap') ,
		'ads-asap-alignright-wrap' => __('Right wrapped', 'asap') ,

	);

	$wp_customize->add_control('asap_ads_before_image_style', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_before',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_before_image_type', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '2',
	));

	$cats = array(
		'1' => __('Posts / Pages', 'asap') ,
		'2' => __('Only posts', 'asap') ,
		'3' => __('Only pages', 'asap') ,
		'4' => __('Use only as shortcode', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_before_image_type', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_before',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_before_image_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_before_image_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_before',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_before_image_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new asap_Dropdown_Category_Control($wp_customize, 'asap_ads_before_image_cat', array(
		'section' => 'asap_ads_sec_before',
		'priority' => 1,
	)));

	$wp_customize->add_setting('asap_ads_before_image_margin', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('asap_ads_before_image_margin', array(
		'section' => 'asap_ads_sec_before',
		'type' => 'number',
		'priority' => 1,
		'input_attrs' => array(
			'placeholder' => __('Margin', 'asap') ,
		)
	));

	$wp_customize->add_setting('asap_ads_before', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_ads_before', array(
		'label' => __('After featured image', 'asap') ,
		'section' => 'asap_ads_sec_before',
		'description' => __('Shortcode: [ads id=1]', 'asap') ,
		'priority' => 1,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_before_style', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'ads-asap-aligncenter',
	));

	$cats = array(
		'ads-asap-alignleft' => __('Left', 'asap') ,
		'ads-asap-alignleft-wrap' => __('Left wrapped', 'asap') ,
		'ads-asap-aligncenter' => __('Center', 'asap') ,
		'ads-asap-alignright' => __('Right', 'asap') ,
		'ads-asap-alignright-wrap' => __('Right wrapped', 'asap') ,

	);

	$wp_customize->add_control('asap_ads_before_style', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_before',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_before_type', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '2',
	));

	$cats = array(
		'1' => __('Posts / Pages', 'asap') ,
		'2' => __('Only posts', 'asap') ,
		'3' => __('Only pages', 'asap') ,
		'4' => __('Use only as shortcode', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_before_type', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_before',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_before_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_before_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_before',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_before_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new asap_Dropdown_Category_Control($wp_customize, 'asap_ads_before_cat', array(
		'section' => 'asap_ads_sec_before',
		'priority' => 1,
	)));

	$wp_customize->add_setting('asap_ads_before_margin', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('asap_ads_before_margin', array(
		'section' => 'asap_ads_sec_before',
		'type' => 'number',
		'priority' => 1,
		'input_attrs' => array(
			'placeholder' => __('Margin', 'asap') ,
		)
	));
	
	
	
	
	$wp_customize->add_setting('asap_ads_after', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_ads_after', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_after',
		'priority' => 1,
		'description' => __('Shortcode: [ads id=2]', 'asap') ,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_after_style', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'ads-asap-aligncenter',
	));

	$cats = array(
		'ads-asap-alignleft' => __('Left', 'asap') ,
		'ads-asap-alignleft-wrap' => __('Left wrapped', 'asap') ,
		'ads-asap-aligncenter' => __('Center', 'asap') ,
		'ads-asap-alignright' => __('Right', 'asap') ,
		'ads-asap-alignright-wrap' => __('Right wrapped', 'asap') ,

	);

	$wp_customize->add_control('asap_ads_after_style', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_after',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_after_type', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '2',
	));

	$cats = array(
		'1' => __('Posts / Pages', 'asap') ,
		'2' => __('Only posts', 'asap') ,
		'3' => __('Only pages', 'asap') ,
		'4' => __('Use only as shortcode', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_after_type', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_after',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_after_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_after_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_after',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_after_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new asap_Dropdown_Category_Control($wp_customize, 'asap_ads_after_cat', array(
		'section' => 'asap_ads_sec_after',
		'priority' => 1,
	)));

	$wp_customize->add_setting('asap_ads_after_margin', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('asap_ads_after_margin', array(
		'section' => 'asap_ads_sec_after',
		'type' => 'number',
		'priority' => 1,
		'input_attrs' => array(
			'placeholder' => __('Margin', 'asap') ,
		)
	));
	

	$wp_customize->add_setting('asap_ads_header', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_ads_header', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_header',
		'description' => __('Shortcode: [ads id=0]', 'asap') ,
		'priority' => 1,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_header_show_home', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_header_show_home', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_header',
		'priority' => 1,
		'label' => __('Home page', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_header_show_cats', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_header_show_cats', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_header',
		'priority' => 1,
		'label' => __('Categories', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_header_show_tags', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_header_show_tags', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_header',
		'priority' => 1,
		'label' => __('Tags', 'asap') ,
	));	
	
	$wp_customize->add_setting('asap_ads_header_show_posts', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_header_show_posts', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_header',
		'priority' => 1,
		'label' => __('Posts', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_ads_header_show_pages', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_header_show_pages', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_header',
		'priority' => 1,
		'label' => __('Pages', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_ads_header_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_header_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_header',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_header_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new asap_Dropdown_Category_Control($wp_customize, 'asap_ads_header_cat', array(
		'section' => 'asap_ads_sec_header',
		'priority' => 1,
	)));

	$wp_customize->add_setting('asap_ads_header_margin', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('asap_ads_header_margin', array(
		'section' => 'asap_ads_sec_header',
		'type' => 'number',
		'priority' => 1,
		'input_attrs' => array(
			'placeholder' => __('Margin', 'asap') ,
		)
	));

	$wp_customize->add_setting('asap_ads_before_sidebar', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_ads_before_sidebar', array(
		'label' => __('Before content', 'asap') ,
		'section' => 'asap_ads_sec_sidebar',
		'priority' => 1,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_before_sidebar_show_home', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_before_sidebar_show_home', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_sidebar',
		'priority' => 1,
		'label' => __('Home page', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_before_sidebar_show_cats', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_before_sidebar_show_cats', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_sidebar',
		'priority' => 1,
		'label' => __('Categories', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_before_sidebar_show_tags', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_before_sidebar_show_tags', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_sidebar',
		'priority' => 1,
		'label' => __('Tags', 'asap') ,
	));	
	
	$wp_customize->add_setting('asap_ads_before_sidebar_show_posts', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_before_sidebar_show_posts', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_sidebar',
		'priority' => 1,
		'label' => __('Posts', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_ads_before_sidebar_show_pages', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_before_sidebar_show_pages', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_sidebar',
		'priority' => 1,
		'label' => __('Pages', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_before_sidebar_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_before_sidebar_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_sidebar',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_before_sidebar_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new asap_Dropdown_Category_Control($wp_customize, 'asap_ads_before_sidebar_cat', array(
		'section' => 'asap_ads_sec_sidebar',
		'priority' => 1,
	)));

	$wp_customize->add_setting('asap_ads_after_sidebar', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_ads_after_sidebar', array(
		'label' => __('After content', 'asap') ,
		'section' => 'asap_ads_sec_sidebar',
		'priority' => 1,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_after_sidebar_show_home', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_after_sidebar_show_home', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_sidebar',
		'priority' => 1,
		'label' => __('Home page', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_after_sidebar_show_cats', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_after_sidebar_show_cats', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_sidebar',
		'priority' => 1,
		'label' => __('Categories', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_after_sidebar_show_tags', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_after_sidebar_show_tags', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_sidebar',
		'priority' => 1,
		'label' => __('Tags', 'asap') ,
	));	
	
	$wp_customize->add_setting('asap_ads_after_sidebar_show_posts', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_after_sidebar_show_posts', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_sidebar',
		'priority' => 1,
		'label' => __('Posts', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_ads_after_sidebar_show_pages', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_after_sidebar_show_pages', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_sidebar',
		'priority' => 1,
		'label' => __('Pages', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_after_sidebar_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_after_sidebar_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_sidebar',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_after_sidebar_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new asap_Dropdown_Category_Control($wp_customize, 'asap_ads_after_sidebar_cat', array(
		'section' => 'asap_ads_sec_sidebar',
		'priority' => 1,
	)));
	

	$wp_customize->add_setting('asap_ads_mid', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));

	$wp_customize->add_control('asap_ads_mid', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_middle',
		'priority' => 1,
		'description' => __('Shortcode: [ads id=15]', 'asap') ,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_mid_style', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'ads-asap-aligncenter',
	));

	$cats = array(
		'ads-asap-alignleft' => __('Left', 'asap') ,
		'ads-asap-alignleft-wrap' => __('Left wrapped', 'asap') ,
		'ads-asap-aligncenter' => __('Center', 'asap') ,
		'ads-asap-alignright' => __('Right', 'asap') ,
		'ads-asap-alignright-wrap' => __('Right wrapped', 'asap') ,

	);

	$wp_customize->add_control('asap_ads_mid_style', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_middle',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_mid_type', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '2',
	));

	$cats = array(
		'1' => __('Posts / Pages', 'asap') ,
		'2' => __('only posts', 'asap') ,
		'3' => __('only pages', 'asap') ,
		'4' => __('Use only as shortcode', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_mid_type', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_middle',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_mid_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_mid_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_middle',
		'priority' => 1,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_ads_mid_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new asap_Dropdown_Category_Control($wp_customize, 'asap_ads_mid_cat', array(
		'section' => 'asap_ads_sec_middle',
		'priority' => 1,
	)));

	$wp_customize->add_setting('asap_ads_mid_margin', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('asap_ads_mid_margin', array(
		'section' => 'asap_ads_sec_middle',
		'type' => 'number',
		'priority' => 1,
		'input_attrs' => array(
			'placeholder' => __('Margin', 'asap') ,
		)
	));

	$wp_customize->add_setting('asap_ads_loop_1', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));	
	
	$wp_customize->add_control('asap_ads_loop_1', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));
	
	$wp_customize->add_setting('asap_ads_loop_1_show_home', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_loop_1_show_home', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'label' => __('Home page', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_loop_1_show_cats', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_loop_1_show_cats', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'label' => __('Categories', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_loop_1_show_tags', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_loop_1_show_tags', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'label' => __('Tags', 'asap') ,
	));	
	
	$wp_customize->add_setting('asap_ads_loop_1_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_loop_1_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'choices' => $cats
	));

	
	$wp_customize->add_setting('asap_ads_loop_1_place', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('After row 1', 'asap') ,
		'2' => __('After row 2', 'asap') ,
		'3' => __('After row 3', 'asap') ,
		'4' => __('After row 4', 'asap') ,
		'5' => __('After row 5', 'asap') ,
		'6' => __('After row 6', 'asap') ,
		'7' => __('After row 7', 'asap') ,
		'8' => __('After row 8', 'asap') ,
		'9' => __('After row 9', 'asap') ,
		'10' => __('After row 10', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_loop_1_place', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'choices' => $cats
	));
	
	$wp_customize->add_setting('asap_ads_loop_2', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));	
	
	$wp_customize->add_control('asap_ads_loop_2', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_loop_2_show_home', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_loop_2_show_home', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'label' => __('Home page', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_loop_2_show_cats', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_loop_2_show_cats', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'label' => __('Categories', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_loop_2_show_tags', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_loop_2_show_tags', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'label' => __('Tags', 'asap') ,
	));	

	$wp_customize->add_setting('asap_ads_loop_2_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_loop_2_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'choices' => $cats
	));

	
	$wp_customize->add_setting('asap_ads_loop_2_place', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('After row 1', 'asap') ,
		'2' => __('After row 2', 'asap') ,
		'3' => __('After row 3', 'asap') ,
		'4' => __('After row 4', 'asap') ,
		'5' => __('After row 5', 'asap') ,
		'6' => __('After row 6', 'asap') ,
		'7' => __('After row 7', 'asap') ,
		'8' => __('After row 8', 'asap') ,
		'9' => __('After row 9', 'asap') ,
		'10' => __('After row 10', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_loop_2_place', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'choices' => $cats
	));
	
	$wp_customize->add_setting('asap_ads_loop_3', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));	
	
	$wp_customize->add_control('asap_ads_loop_3', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_loop_3_show_home', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_loop_3_show_home', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'label' => __('Home page', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_loop_3_show_cats', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_loop_3_show_cats', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'label' => __('Categories', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_loop_3_show_tags', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_loop_3_show_tags', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'label' => __('Tags', 'asap') ,
	));	

	$wp_customize->add_setting('asap_ads_loop_3_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_loop_3_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'choices' => $cats
	));

	
	$wp_customize->add_setting('asap_ads_loop_3_place', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('After row 1', 'asap') ,
		'2' => __('After row 2', 'asap') ,
		'3' => __('After row 3', 'asap') ,
		'4' => __('After row 4', 'asap') ,
		'5' => __('After row 5', 'asap') ,
		'6' => __('After row 6', 'asap') ,
		'7' => __('After row 7', 'asap') ,
		'8' => __('After row 8', 'asap') ,
		'9' => __('After row 9', 'asap') ,
		'10' => __('After row 10', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_loop_3_place', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'choices' => $cats
	));
	
	$wp_customize->add_setting('asap_ads_loop_4', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));	
	
	$wp_customize->add_control('asap_ads_loop_4', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_loop_4_show_home', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_loop_4_show_home', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'label' => __('Home page', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_loop_4_show_cats', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_loop_4_show_cats', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'label' => __('Categories', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_loop_4_show_tags', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_loop_4_show_tags', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'label' => __('Tags', 'asap') ,
	));	

	$wp_customize->add_setting('asap_ads_loop_4_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_loop_4_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'choices' => $cats
	));

	
	$wp_customize->add_setting('asap_ads_loop_4_place', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('After row 1', 'asap') ,
		'2' => __('After row 2', 'asap') ,
		'3' => __('After row 3', 'asap') ,
		'4' => __('After row 4', 'asap') ,
		'5' => __('After row 5', 'asap') ,
		'6' => __('After row 6', 'asap') ,
		'7' => __('After row 7', 'asap') ,
		'8' => __('After row 8', 'asap') ,
		'9' => __('After row 9', 'asap') ,
		'10' => __('After row 10', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_loop_4_place', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'choices' => $cats
	));
	
$wp_customize->add_setting('asap_ads_loop_5', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'asap_sanitize_js_code',
		'sanitize_js_callback' => 'asap_escape_js_output',
	));	
	
	$wp_customize->add_control('asap_ads_loop_5', array(
		'label' => __('', 'asap') ,
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Add your ad here', 'asap' ),
		),
	));

	$wp_customize->add_setting('asap_ads_loop_5_show_home', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_loop_5_show_home', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'label' => __('Home page', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_loop_5_show_cats', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_loop_5_show_cats', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'label' => __('Categories', 'asap') ,
	));

	$wp_customize->add_setting('asap_ads_loop_5_show_tags', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_ads_loop_5_show_tags', array(
		'type' => 'checkbox',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'label' => __('Tags', 'asap') ,
	));	

	$wp_customize->add_setting('asap_ads_loop_5_device', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('All devices', 'asap') ,
		'2' => __('Desktop only', 'asap') ,
		'3' => __('Mobile only', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_loop_5_device', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'choices' => $cats
	));

	
	$wp_customize->add_setting('asap_ads_loop_5_place', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('After row 1', 'asap') ,
		'2' => __('After row 2', 'asap') ,
		'3' => __('After row 3', 'asap') ,
		'4' => __('After row 4', 'asap') ,
		'5' => __('After row 5', 'asap') ,
		'6' => __('After row 6', 'asap') ,
		'7' => __('After row 7', 'asap') ,
		'8' => __('After row 8', 'asap') ,
		'9' => __('After row 9', 'asap') ,
		'10' => __('After row 10', 'asap') ,
	);

	$wp_customize->add_control('asap_ads_loop_5_place', array(
		'type' => 'select',
		'section' => 'asap_ads_sec_loop',
		'priority' => 1,
		'choices' => $cats
	));
	
	

	
	/*
	 * Sections
	*/

	$wp_customize->add_section('asap_appearance', array(
		'title' => __('Appearance', 'asap') ,
		'panel' => 'custom_options',
		'priority' => 1,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_section('asap_color', array(
		'title' => __('Colors', 'asap') ,
		'panel' => 'custom_options',
		'priority' => 2,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_section('asap_font', array(
		'title' => __('Fonts', 'asap') ,
		'panel' => 'custom_options',
		'priority' => 3,
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_section('asap_loop', array(
		'title' => __('Listing options', 'asap') ,
		'panel' => 'custom_options',
		'priority' => 5,
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_section('asap_single', array(
		'title' => __('Posts options', 'asap') ,
		'panel' => 'custom_options',
		'priority' => 6,
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_section('asap_page', array(
		'title' => __('Page options', 'asap') ,
		'panel' => 'custom_options',
		'priority' => 7,
		'capability' => 'edit_theme_options',
	));	

	$wp_customize->add_section('asap_menu_sec', array(
		'title' => __('Header options', 'asap') ,
		'panel' => 'custom_options',
		'priority' => 7,
		'capability' => 'edit_theme_options',
	));		
	
	$wp_customize->add_section('asap_sidebar', array(
		'title' => __('Sidebar', 'asap') ,
		'panel' => 'custom_options',
		'priority' => 8,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_section('asap_search', array(
		'title' => __('Search engine', 'asap') ,
		'panel' => 'custom_options',
		'priority' => 9,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_section('asap_breadcrumbs_options', array(
		'title' => __('Breadcrumbs', 'asap') ,
		'panel' => 'custom_options',
		'priority' => 10,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_section('asap_content_index', array(
		'title' => __('Table of contents', 'asap') ,
		'panel' => 'custom_options',
		'priority' => 11,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_section('asap_share_social', array(
		'title' => __('Social buttons', 'asap') ,
		'panel' => 'custom_options',
		'priority' => 12,
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_section('asap_schema', array(
		'title' => __('Structured data (Schema)', 'asap') ,
		'panel' => 'custom_options',
		'priority' => 13,
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_section('asap_cookies', array(
		'title' => __('Cookies', 'asap') ,
		'panel' => 'custom_options',
		'priority' => 13,
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_section('asap_security', array(
		'title' => __('Security', 'asap') ,
		'panel' => 'custom_options',
		'priority' => 14,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_section('asap_wpo', array(
		'title' => __('Optimization', 'asap') ,
		'panel' => 'custom_options',
		'priority' => 15,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_section('asap_performance', array(
		'title' => __('Other options', 'asap') ,
		'panel' => 'custom_options',
		'priority' => 16,
		'capability' => 'edit_theme_options',
	));



	/*
	 * Settings
	*/
	

	$wp_customize->add_setting('asap_enable_featured_posts', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_enable_featured_posts', array(
		'type' => 'checkbox',
		'section' => 'asap_loop',
		'label' => __('Show first row featured', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_columns_featured', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '3',
	));

	$cats = array(
		'1' => esc_html__('1', 'asap') ,
		'2' => esc_html__('2', 'asap') ,
		'3' => esc_html__('3', 'asap') ,
		'4' => esc_html__('4', 'asap') ,
		'5' => esc_html__('5', 'asap') ,
	);

	$wp_customize->add_control('asap_columns_featured', array(
		'type' => 'select',
		'section' => 'asap_loop',
		'label' => __('Columns featured posts', 'asap') ,
		'choices' => $cats,
		 'active_callback' => function ($control) {
			return $control->manager->get_setting('asap_enable_featured_posts')->value();
		},
	));	

	$wp_customize->add_setting('asap_rows_featured', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => esc_html__('1', 'asap') ,
		'2' => esc_html__('2', 'asap') ,
		'3' => esc_html__('3', 'asap') ,
		'4' => esc_html__('4', 'asap') ,
		'5' => esc_html__('5', 'asap') ,
	);

	$wp_customize->add_control('asap_rows_featured', array(
		'type' => 'select',
		'section' => 'asap_loop',
		'label' => __('Rows featured posts', 'asap') ,
		'choices' => $cats,
		 'active_callback' => function ($control) {
			return $control->manager->get_setting('asap_enable_featured_posts')->value();
		},
	));	

	$wp_customize->add_setting('asap_columns', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '3',
	));

	$cats = array(
		'1' => esc_html__('1', 'asap') ,
		'2' => esc_html__('2', 'asap') ,
		'3' => esc_html__('3', 'asap') ,
		'4' => esc_html__('4', 'asap') ,
		'5' => esc_html__('5', 'asap') ,
	);

	$wp_customize->add_control('asap_columns', array(
		'type' => 'select',
		'section' => 'asap_loop',
		'label' => __('Columns', 'asap') ,
		'choices' => $cats
	));
	
	$wp_customize->add_setting('asap_loop_design', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '0',
	));

	$cats = array(
		'0' => esc_html__('Top', 'asap') ,
		'1' => esc_html__('Left', 'asap') ,
	);

	$wp_customize->add_control('asap_loop_design', array(
		'type' => 'select',
		'section' => 'asap_loop',
		'label' => __('Image', 'asap') ,
		'choices' => $cats,
		'active_callback' => function ($control) {
            return $control->manager->get_setting('asap_design')->value() === '1';
		}
	));	
	
	$wp_customize->add_setting('asap_loop_format', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'p',
	));

	$cats = array(
		'p' => esc_html__('Párrafo', 'asap') ,
		'h2' => esc_html__('H2', 'asap') ,
		'h3' => esc_html__('H3', 'asap') ,
	);

	$wp_customize->add_control('asap_loop_format', array(
		'type' => 'select',
		'section' => 'asap_loop',
		'label' => __('Format', 'asap') ,
		'choices' => $cats
	));	
		
	$wp_customize->add_setting('asap_show_post_category', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_post_category', array(
		'type' => 'checkbox',
		'section' => 'asap_loop',
		'label' => __('Show categories', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_date_loop', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_date_loop', array(
		'type' => 'checkbox',
		'section' => 'asap_loop',
		'label' => __('Show date', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_show_post_extract', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_post_extract', array(
		'type' => 'checkbox',
		'section' => 'asap_loop',
		'label' => __('Show description', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_cluster_extract', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_cluster_extract', array(
		'type' => 'checkbox',
		'section' => 'asap_loop',
		'label' => __('Show description in clusters', 'asap') ,
	));

	$wp_customize->add_setting('asap_extract_long', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '12',
	));

	$wp_customize->add_control('asap_extract_long', array(
		'label' => __('Number of words description', 'asap') ,
		'section' => 'asap_loop',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'max' => 30,
		) ,
	));

	$wp_customize->add_setting('asap_text_button_more', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('asap_text_button_more', array(
		'label' => __('Read more text', 'asap') ,
		'section' => 'asap_loop',
		'type' => 'text',
	));
	
	$wp_customize->add_setting('asap_featured_text', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
		'default' => __('Featured', 'asap'),
	));

	$wp_customize->add_control('asap_featured_text', array(
		'label' => __('Featured message', 'asap') ,
		'section' => 'asap_loop',
		'type' => 'text',
	));

	//$wp_customize->add_setting('asap_loop_image_height', array(
	//	'type' => 'theme_mod',
	//	'capability' => 'edit_theme_options',
	//	'sanitize_callback' => 'absint',
	//	'default' => '0',
	//));

	//$wp_customize->add_control('asap_loop_image_height', array(
	//	'label' => __('High thumbnails', 'asap') ,
	//	'section' => 'asap_loop',
	//	'type' => 'number',
	//	'input_attrs' => array(
	//		'min' => 100,
	//		'max' => 500,
	//	) ,
	//	'active_callback' => function ($control) {
	//		return ! $control->manager->get_setting('asap_deactivate_background')->value();
	//	},
	//));	
	

	$wp_customize->add_setting('asap_deactivate_background', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_deactivate_background', array(
		'type' => 'checkbox',
		'section' => 'asap_loop',
		'label' => __('Keep the aspect ratio width / height of images', 'asap') ,
	));			
		
	$wp_customize->add_setting('asap_thumb_width', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '400',
	));

	$wp_customize->add_control('asap_thumb_width', array(
		'label' => __('Thumbnails width', 'asap') ,
		'section' => 'asap_loop',
		'description' => __('It is necessary to regenerate all the miniatures.', 'asap') ,
		'type' => 'number',
		'input_attrs' => array(
			'min' => 200,
			'max' => 500,
		) ,
		'active_callback' => function ($control) {
			return $control->manager->get_setting('asap_deactivate_background')->value();
		},
	));

	$wp_customize->add_setting('asap_thumb_height', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '267',
	));

	$wp_customize->add_control('asap_thumb_height', array(
		'label' => __('High thumbnails', 'asap') ,
		'section' => 'asap_loop',
		'description' => __('It is necessary to regenerate all the miniatures.', 'asap') ,
		'type' => 'number',
		'input_attrs' => array(
			'min' => 200,
			'max' => 500,
		) ,
		'active_callback' => function ($control) {
			return $control->manager->get_setting('asap_deactivate_background')->value();
		},	
	));
	

	$wp_customize->add_setting('asap_design', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '0',
	));

	$cats = array(
		'0' => esc_html__('Flat', 'asap') ,
		'1' => esc_html__('Box', 'asap') ,
	);

	$wp_customize->add_control('asap_design', array(
		'type' => 'select',
		'section' => 'asap_appearance',
		'label' => __('Design', 'asap') ,
		'choices' => $cats
	));	
	
	$wp_customize->add_setting('asap_width_logo', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '160',
	));

	$wp_customize->add_control('asap_width_logo', array(
		'label' => __('Logo width', 'asap') ,
		'section' => 'asap_appearance',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 100,
			'max' => 300,
		) ,
	));

	$wp_customize->add_setting('asap_width_header', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '980',
	));

	$wp_customize->add_control('asap_width_header', array(
		'label' => __('Header container width', 'asap') ,
		'section' => 'asap_appearance',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 720,
			'max' => 1280,
		) ,
	));

	$wp_customize->add_setting('asap_width_loop', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '980',
	));

	$wp_customize->add_control('asap_width_loop', array(
		'label' => __('List container width', 'asap') ,
		'section' => 'asap_appearance',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 720,
			'max' => 1280,
		) ,
	));

	$wp_customize->add_setting('asap_width_single', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '980',
	));

	$wp_customize->add_control('asap_width_single', array(
		'label' => __('Posts container width', 'asap') ,
		'section' => 'asap_appearance',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 720,
			'max' => 1280,
		) ,
	));

	$wp_customize->add_setting('asap_width_page', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '980',
	));

	$wp_customize->add_control('asap_width_page', array(
		'label' => __('Pages container width', 'asap') ,
		'section' => 'asap_appearance',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 720,
			'max' => 1280,
		) ,
	));
	
	if ( function_exists( 'is_woocommerce' ) ) {

		$wp_customize->add_setting('asap_width_wc', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'absint',
			'default' => '980',
		));

		$wp_customize->add_control('asap_width_wc', array(
			'label' => __('WooCommerce container width', 'asap') ,
			'section' => 'asap_appearance',
			'type' => 'number',
			'input_attrs' => array(
				'min' => 720,
				'max' => 1280,
			) ,
		));
		
			
	}

	$wp_customize->add_setting('asap_width_sidebar', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '300',
	));

	$wp_customize->add_control('asap_width_sidebar', array(
		'label' => __('Sidebar container width', 'asap') ,
		'section' => 'asap_appearance',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 300,
			'max' => 500,
		) ,
	));

	$wp_customize->add_setting('asap_enable_transitions', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
		'default' => true

	));

	$wp_customize->add_control('asap_enable_transitions', array(
		'type' => 'checkbox',
		'section' => 'asap_appearance',
		'label' => __('Enable transitions', 'asap') ,
	));		
	
	$wp_customize->add_setting('asap_total_footer', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_total_footer', array(
		'type' => 'checkbox',
		'section' => 'asap_appearance',
		'label' => __('Activate full footer', 'asap') ,
	));
	

	$wp_customize->add_setting('asap_enable_layout_lists', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_enable_layout_lists', array(
		'type' => 'checkbox',
		'section' => 'asap_appearance',
		'label' => __('Enable layout in lists', 'asap') ,
	));
	
	
	$wp_customize->add_setting('asap_disable_footer', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',

	));

	$wp_customize->add_control('asap_disable_footer', array(
		'type' => 'checkbox',
		'section' => 'asap_appearance',
		'label' => __('Disable footer', 'asap') ,
	));

	$wp_customize->add_setting('asap_hide_logo_footer', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_hide_logo_footer', array(
		'type' => 'checkbox',
		'section' => 'asap_appearance',
		'label' => __('Hide footer logo', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_hide_rise_button', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_hide_rise_button', array(
		'type' => 'checkbox',
		'section' => 'asap_appearance',
		'label' => __('Hide Go Up button', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_rounded_borders', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_rounded_borders', array(
		'type' => 'checkbox',
		'section' => 'asap_appearance',
		'label' => __('Activate rounded borders', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_borders_radius', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '10',
	));

	$wp_customize->add_control('asap_borders_radius', array(
		'label' => __('Border radius', 'asap') ,
		'section' => 'asap_appearance',
		'type' => 'number',
		'active_callback' => function ($control) {
			return $control->manager->get_setting('asap_rounded_borders')->value();
		},		
		'input_attrs' => array(
			'min' => 1,
			'max' => 100,
		) ,
	));
	
		
	
	$wp_customize->add_setting('asap_font_title', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'default' => 'Poppins.400',
	));

	$cats = array(
		'Arial.400' => 'Arial 400',
		'Arial.700' => 'Arial 700',
		'Cabin.400' => 'Cabin 400',
		'Cabin.500' => 'Cabin 500',
		'Cabin.700' => 'Cabin 700',
		'Comfortaa.300' => 'Comfortaa 300',
		'Comfortaa.400' => 'Comfortaa 400',
		'Comfortaa.700' => 'Comfortaa 700',
		'Josefin Sans.300' => 'Josefin Sans 300',
		'Josefin Sans.400' => 'Josefin Sans 400',
		'Josefin Sans.700' => 'Josefin Sans 700',
		'Jost.300' => 'Jost 300',
		'Jost.400' => 'Jost 400',
		'Jost.700' => 'Jost 700',
		'Lato.300' => 'Lato 300',
		'Lato.400' => 'Lato 400',
		'Lato.700' => 'Lato 700',
		'Lora.400' => 'Lora 400',
		'Lora.700' => 'Lora 700',
		'Libre Franklin.300' => 'Libre Franklin 300',
		'Libre Franklin.400' => 'Libre Franklin 400',
		'Libre Franklin.500' => 'Libre Franklin 500',
		'Libre Franklin.700' => 'Libre Franklin 700',
		'Maven Pro.400' => 'Maven Pro 300',
		'Maven Pro.700' => 'Maven Pro 700',
		'Merriweather.300' => 'Merriweather 300',
		'Merriweather.400' => 'Merriweather 400',
		'Merriweather.700' => 'Merriweather 700',
		'Montserrat.300' => 'Montserrat 300',
		'Montserrat.400' => 'Montserrat 400',
		'Montserrat.700' => 'Montserrat 700',
		'Noto Sans.400' => 'Noto Sans 400',
		'Noto Sans.700' => 'Noto Sans 700',
		'Nunito.300' => 'Nunito 300',
		'Nunito.400' => 'Nunito 400',
		'Nunito.700' => 'Nunito 700',
		'Open Sans.300' => 'Open Sans 300',
		'Open Sans.400' => 'Open Sans 400',
		'Open Sans.700' => 'Open Sans 700',
		'Poppins.300' => 'Poppins 300',
		'Poppins.400' => 'Poppins 400',
		'Poppins.700' => 'Poppins 700',
		'PT Sans.400' => 'PT Sans 400',
		'PT Sans.700' => 'PT Sans 700',
		'Quicksand.300' => 'Quicksand 300',
		'Quicksand.400' => 'Quicksand 400',
		'Quicksand.600' => 'Quicksand 600',
		'Quicksand.700' => 'Quicksand 700',
		'Raleway.300' => 'Raleway 300',
		'Raleway.400' => 'Raleway 400',
		'Raleway.700' => 'Raleway 700',
		'Roboto.300' => 'Roboto 300',
		'Roboto.400' => 'Roboto 400',
		'Roboto.700' => 'Roboto 700',
		'Roboto Slab.300' => 'Roboto Slab 300',
		'Roboto Slab.400' => 'Roboto Slab 400',
		'Roboto Slab.700' => 'Roboto Slab 700',
		'Rubik.300' => 'Rubik 300',
		'Rubik.400' => 'Rubik 400',
		'Rubik.500' => 'Rubik 500',
		'Rubik.600' => 'Rubik 600',
		'Rubik.700' => 'Rubik 700',
		'Source Sans Pro.300' => 'Source Sans Pro 300',
		'Source Sans Pro.400' => 'Source Sans Pro 400',
		'Source Sans Pro.700' => 'Source Sans Pro 700',
		'Urbanist.300' => 'Urbanist 300',
		'Urbanist.400' => 'Urbanist 400',
		'Urbanist.700' => 'Urbanist 700',
		'Verdana.400' => 'Verdana 400',
		'Verdana.700' => 'Verdana 700',
		'Work Sans.300' => 'Work Sans 300',
		'Work Sans.400' => 'Work Sans 400',
		'Work Sans.700' => 'Work Sans 700',
		'ZCOOL KuaiLe.400' => 'ZCOOL KuaiLe 400',
	);

	$wp_customize->add_control('asap_font_title', array(
		'type' => 'select',
		'section' => 'asap_font',
		'label' => __('Headers font', 'asap') ,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_font_text', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'default' => 'Poppins.300',		
	));

	$cats = array(
		'Arial.400' => 'Arial 400',
		'Arial.700' => 'Arial 700',
		'Cabin.400' => 'Cabin 400',
		'Cabin.500' => 'Cabin 500',
		'Cabin.700' => 'Cabin 700',
		'Comfortaa.300' => 'Comfortaa 300',
		'Comfortaa.400' => 'Comfortaa 400',
		'Comfortaa.700' => 'Comfortaa 700',
		'Jost.300' => 'Jost 300',
		'Jost.400' => 'Jost 400',
		'Jost.700' => 'Jost 700',
		'Josefin Sans.300' => 'Josefin Sans 300',
		'Josefin Sans.400' => 'Josefin Sans 400',
		'Josefin Sans.700' => 'Josefin Sans 700',
		'Lato.300' => 'Lato 300',
		'Lato.400' => 'Lato 400',
		'Lato.700' => 'Lato 700',
		'Lora.400' => 'Lora 400',
		'Lora.700' => 'Lora 700',
		'Libre Franklin.300' => 'Libre Franklin 300',
		'Libre Franklin.400' => 'Libre Franklin 400',
		'Libre Franklin.500' => 'Libre Franklin 500',
		'Libre Franklin.700' => 'Libre Franklin 700',
		'Maven Pro.400' => 'Maven Pro 300',
		'Maven Pro.700' => 'Maven Pro 700',
		'Merriweather.300' => 'Merriweather 300',
		'Merriweather.400' => 'Merriweather 400',
		'Merriweather.700' => 'Merriweather 700',
		'Montserrat.300' => 'Montserrat 300',
		'Montserrat.400' => 'Montserrat 400',
		'Montserrat.700' => 'Montserrat 700',
		'Noto Sans.400' => 'Noto Sans 400',
		'Noto Sans.700' => 'Noto Sans 700',
		'Nunito.300' => 'Nunito 300',
		'Nunito.400' => 'Nunito 400',
		'Nunito.700' => 'Nunito 700',
		'Open Sans.300' => 'Open Sans 300',
		'Open Sans.400' => 'Open Sans 400',
		'Open Sans.700' => 'Open Sans 700',
		'Poppins.300' => 'Poppins 300',
		'Poppins.400' => 'Poppins 400',
		'Poppins.700' => 'Poppins 700',
		'PT Sans.400' => 'PT Sans 400',
		'PT Sans.700' => 'PT Sans 700',
		'Quicksand.300' => 'Quicksand 300',
		'Quicksand.400' => 'Quicksand 400',
		'Quicksand.600' => 'Quicksand 600',
		'Quicksand.700' => 'Quicksand 700',
		'Raleway.300' => 'Raleway 300',
		'Raleway.400' => 'Raleway 400',
		'Raleway.700' => 'Raleway 700',
		'Roboto.300' => 'Roboto 300',
		'Roboto.400' => 'Roboto 400',
		'Roboto.700' => 'Roboto 700',
		'Roboto Slab.300' => 'Roboto Slab 300',
		'Roboto Slab.400' => 'Roboto Slab 400',
		'Roboto Slab.700' => 'Roboto Slab 700',
		'Rubik.300' => 'Rubik 300',
		'Rubik.400' => 'Rubik 400',
		'Rubik.500' => 'Rubik 500',
		'Rubik.600' => 'Rubik 600',
		'Rubik.700' => 'Rubik 700',
		'Source Sans Pro.300' => 'Source Sans Pro 300',
		'Source Sans Pro.400' => 'Source Sans Pro 400',
		'Source Sans Pro.700' => 'Source Sans Pro 700',
		'Urbanist.300' => 'Urbanist 300',
		'Urbanist.400' => 'Urbanist 400',
		'Urbanist.700' => 'Urbanist 700',
		'Verdana.400' => 'Verdana 400',
		'Verdana.700' => 'Verdana 700',
		'Work Sans.300' => 'Work Sans 300',
		'Work Sans.400' => 'Work Sans 400',
		'Work Sans.700' => 'Work Sans 700',
		'ZCOOL KuaiLe.400' => 'ZCOOL KuaiLe 400',
	);

	$wp_customize->add_control('asap_font_text', array(
		'type' => 'select',
		'section' => 'asap_font',
		'label' => __('Text font', 'asap') ,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_font_loop', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'default' => 'Poppins.300',		
	));

	$cats = array(
		'Arial.400' => 'Arial 400',
		'Arial.700' => 'Arial 700',
		'Cabin.400' => 'Cabin 400',
		'Cabin.500' => 'Cabin 500',
		'Cabin.700' => 'Cabin 700',
		'Comfortaa.300' => 'Comfortaa 300',
		'Comfortaa.400' => 'Comfortaa 400',
		'Comfortaa.700' => 'Comfortaa 700',
		'Jost.300' => 'Jost 300',
		'Jost.400' => 'Jost 400',
		'Jost.700' => 'Jost 700',
		'Josefin Sans.300' => 'Josefin Sans 300',
		'Josefin Sans.400' => 'Josefin Sans 400',
		'Josefin Sans.700' => 'Josefin Sans 700',
		'Lato.300' => 'Lato 300',
		'Lato.400' => 'Lato 400',
		'Lato.700' => 'Lato 700',
		'Lora.400' => 'Lora 400',
		'Lora.700' => 'Lora 700',
		'Libre Franklin.300' => 'Libre Franklin 300',
		'Libre Franklin.400' => 'Libre Franklin 400',
		'Libre Franklin.500' => 'Libre Franklin 500',
		'Libre Franklin.700' => 'Libre Franklin 700',
		'Maven Pro.400' => 'Maven Pro 300',
		'Maven Pro.700' => 'Maven Pro 700',
		'Merriweather.300' => 'Merriweather 300',
		'Merriweather.400' => 'Merriweather 400',
		'Merriweather.700' => 'Merriweather 700',
		'Montserrat.300' => 'Montserrat 300',
		'Montserrat.400' => 'Montserrat 400',
		'Montserrat.700' => 'Montserrat 700',
		'Noto Sans.400' => 'Noto Sans 400',
		'Noto Sans.700' => 'Noto Sans 700',
		'Nunito.300' => 'Nunito 300',
		'Nunito.400' => 'Nunito 400',
		'Nunito.700' => 'Nunito 700',
		'Open Sans.300' => 'Open Sans 300',
		'Open Sans.400' => 'Open Sans 400',
		'Open Sans.700' => 'Open Sans 700',
		'Poppins.300' => 'Poppins 300',
		'Poppins.400' => 'Poppins 400',
		'Poppins.700' => 'Poppins 700',
		'PT Sans.400' => 'PT Sans 400',
		'PT Sans.700' => 'PT Sans 700',
		'Quicksand.300' => 'Quicksand 300',
		'Quicksand.400' => 'Quicksand 400',
		'Quicksand.600' => 'Quicksand 600',
		'Quicksand.700' => 'Quicksand 700',
		'Raleway.300' => 'Raleway 300',
		'Raleway.400' => 'Raleway 400',
		'Raleway.700' => 'Raleway 700',
		'Roboto.300' => 'Roboto 300',
		'Roboto.400' => 'Roboto 400',
		'Roboto.700' => 'Roboto 700',
		'Roboto Slab.300' => 'Roboto Slab 300',
		'Roboto Slab.400' => 'Roboto Slab 400',
		'Roboto Slab.700' => 'Roboto Slab 700',
		'Rubik.300' => 'Rubik 300',
		'Rubik.400' => 'Rubik 400',
		'Rubik.500' => 'Rubik 500',
		'Rubik.600' => 'Rubik 600',
		'Rubik.700' => 'Rubik 700',
		'Source Sans Pro.300' => 'Source Sans Pro 300',
		'Source Sans Pro.400' => 'Source Sans Pro 400',
		'Source Sans Pro.700' => 'Source Sans Pro 700',
		'Urbanist.300' => 'Urbanist 300',
		'Urbanist.400' => 'Urbanist 400',
		'Urbanist.700' => 'Urbanist 700',
		'Verdana.400' => 'Verdana 400',
		'Verdana.700' => 'Verdana 700',
		'Work Sans.300' => 'Work Sans 300',
		'Work Sans.400' => 'Work Sans 400',
		'Work Sans.700' => 'Work Sans 700',
		'ZCOOL KuaiLe.400' => 'ZCOOL KuaiLe 400',
	);

	$wp_customize->add_control('asap_font_loop', array(
		'type' => 'select',
		'section' => 'asap_font',
		'label' => __('List font', 'asap') ,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_size_h1', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '38',
	));

	$wp_customize->add_control('asap_size_h1', array(
		'label' => __('Header size H1', 'asap') ,
		'section' => 'asap_font',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 30,
			'max' => 50,
		) ,
	));

	$wp_customize->add_setting('asap_size_h2', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '32',
	));

	$wp_customize->add_control('asap_size_h2', array(
		'label' => __('Header size H2', 'asap') ,
		'section' => 'asap_font',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 24,
			'max' => 44,
		) ,
	));

	$wp_customize->add_setting('asap_size_h3', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '28',
	));

	$wp_customize->add_control('asap_size_h3', array(
		'label' => __('Header size H3', 'asap') ,
		'section' => 'asap_font',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 20,
			'max' => 40,
		) ,
	));

	$wp_customize->add_setting('asap_size_h4', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '23',
	));

	$wp_customize->add_control('asap_size_h4', array(
		'label' => __('Header size H4', 'asap') ,
		'section' => 'asap_font',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 16,
			'max' => 34,
		) ,
	));

	$wp_customize->add_setting('asap_size_text', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '18',
	));

	$wp_customize->add_control('asap_size_text', array(
		'label' => __('Text size', 'asap') ,
		'section' => 'asap_font',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 14,
			'max' => 22,
		) ,
	));

	$wp_customize->add_setting('asap_size_loop', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '18',
	));

	$wp_customize->add_control('asap_size_loop', array(
		'label' => __('List size', 'asap') ,
		'section' => 'asap_font',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 16,
			'max' => 26,
		) ,
	));

	$wp_customize->add_setting('asap_body_background', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_body_background', array(
		'label' => __('Background', 'asap') ,
		'section' => 'asap_color'
	)));
	
	$wp_customize->add_setting('asap_top_header_background', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#206592',		
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_top_header_background', array(
		'label' => __('Top header background', 'asap') ,
		'section' => 'asap_color',
		'active_callback' => function ($control) {
			return $control->manager->get_setting('asap_header_top')->value();
		},	
	)));	

	$wp_customize->add_setting('asap_header_background', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#2471a3',
		'active_callback' => function ($control) {
			return $control->manager->get_setting('asap_header_top')->value();
		},	
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_header_background', array(
		'label' => __('Header background', 'asap') ,
		'section' => 'asap_color',
	)));

	$wp_customize->add_setting('asap_header_color', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#FFFfff',		
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_header_color', array(
		'label' => __('Header links', 'asap') ,
		'section' => 'asap_color',
	)));
	
	$wp_customize->add_setting('asap_footer_background', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#2471a3',		
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_footer_background', array(
		'label' => __('Footer background', 'asap') ,
		'section' => 'asap_color',
	)));

	$wp_customize->add_setting('asap_footer_color', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#FFFFFF',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_footer_color', array(
		'label' => __('Footer links', 'asap') ,
		'section' => 'asap_color',
	)));

	$wp_customize->add_setting('asap_font_color', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#222222',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_font_color', array(
		'label' => __('Text', 'asap') ,
		'section' => 'asap_color',
	)));

	$wp_customize->add_setting('asap_link_color', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#0183e4',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_link_color', array(
		'label' => __('Links', 'asap') ,
		'section' => 'asap_color',

	)));

	$wp_customize->add_setting('asap_btn_background', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#2471a3',		
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_btn_background', array(
		'label' => __('Buttons background', 'asap') ,
		'section' => 'asap_color',
	)));

	$wp_customize->add_setting('asap_btn_color', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#FFF',				
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_btn_color', array(
		'label' => __('Button text', 'asap') ,
		'section' => 'asap_color',
	)));

	$wp_customize->add_setting('asap_h1_color', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#222222',		
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_h1_color', array(
		'label' => __('Header H1', 'asap') ,
		'section' => 'asap_color',
	)));

	$wp_customize->add_setting('asap_h2_color', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#222222',				
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_h2_color', array(
		'label' => __('Headers H2', 'asap') ,
		'section' => 'asap_color',
	)));
	
	$wp_customize->add_setting('asap_h3_color', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#222222',		
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_h3_color', array(
		'label' => __('Headers H3', 'asap') ,
		'section' => 'asap_color',
	)));
	
	$wp_customize->add_setting('asap_h4_color', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#222222',		
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_h4_color', array(
		'label' => __('Headers H4', 'asap') ,
		'section' => 'asap_color',
	)));
	
	$wp_customize->add_setting('asap_featured_background', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#f16028',		

	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_featured_background', array(
		'label' => __('Featured advice background', 'asap') ,
		'section' => 'asap_color',
	)));
	
	$wp_customize->add_setting('asap_featured_color', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#FFFFFF',		
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_featured_color', array(
		'label' => __('Featured advice text', 'asap') ,
		'section' => 'asap_color',
	)));
	
	$wp_customize->add_setting('asap_hero_background', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_hero_background', array(
		'label' => __('Hero background', 'asap') ,
		'section' => 'asap_color',
	)));
	
	$wp_customize->add_setting('asap_hero_text', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'asap_hero_text', array(
		'label' => __('Hero text', 'asap') ,
		'section' => 'asap_color',
	)));	
	
	
	$wp_customize->add_setting('asap_hero_post', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'normal',
	));

	$cats = array(
		'normal' => __('Normal', 'asap') ,
		'1' => __('Featured', 'asap') ,
		'2' => __('Featured without search engine', 'asap') ,

	);

	$wp_customize->add_control('asap_hero_post', array(
		'type' => 'select',
		'section' => 'asap_single',
		'label' => __('Header design', 'asap') ,
		'choices' => $cats,
	));		
	
	$wp_customize->add_setting('asap_hide_image_featured', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_hide_image_featured', array(
		'type' => 'checkbox',
		'section' => 'asap_single',
		'label' => __('Hide featured image', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_show_featured_small', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_featured_small', array(
		'type' => 'checkbox',
		'section' => 'asap_single',
		'label' => __('Show Featured Image Small', 'asap') ,
		'active_callback' => function ($control) {
			return ! $control->manager->get_setting('asap_hide_image_featured')->value();
		},
	));

	$wp_customize->add_setting('asap_show_author', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_author', array(
		'type' => 'checkbox',
		'section' => 'asap_single',
		'label' => __('Show author', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_box_author', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_box_author', array(
		'type' => 'checkbox',
		'section' => 'asap_single',
		'label' => __('Show author box', 'asap') ,
	));

	$wp_customize->add_setting('asap_deactivate_author_link', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_deactivate_author_link', array(
		'type' => 'checkbox',
		'section' => 'asap_single',
		'label' => __('Disable link in author', 'asap') ,
		'active_callback' => function ($control) {
			return ( $control->manager->get_setting('asap_show_author')->value() || $control->manager->get_setting('asap_show_box_author')->value() );
		},
	));
	
	
	$wp_customize->add_setting('asap_show_date_single', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_date_single', array(
		'type' => 'checkbox',
		'section' => 'asap_single',
		'label' => __('Show publication date', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_nav_single', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_nav_single', array(
		'type' => 'checkbox',
		'section' => 'asap_single',
		'label' => __('Show Previous / Next navigation', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_tags', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_tags', array(
		'type' => 'checkbox',
		'section' => 'asap_single',
		'label' => __('Show labels', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_related_single', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_related_single', array(
		'type' => 'checkbox',
		'section' => 'asap_single',
		'label' => __('Show related posts', 'asap') ,
	));

	$wp_customize->add_setting('asap_number_related_single', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '6',
	));

	$wp_customize->add_control('asap_number_related_single', array(
		'label' => __('Number of related entries', 'asap') ,
		'section' => 'asap_single',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 2,
			'max' => 18,
		) ,
		'active_callback' => function ($control) {
			return $control->manager->get_setting('asap_show_related_single')->value();
		},
	));
	
	$wp_customize->add_setting('asap_columns_related', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '3',
	));

	$cats = array(
		'1' => esc_html__('1', 'asap') ,
		'2' => esc_html__('2', 'asap') ,
		'3' => esc_html__('3', 'asap') ,
		'4' => esc_html__('4', 'asap') ,
		'5' => esc_html__('5', 'asap') ,
	);

	$wp_customize->add_control('asap_columns_related', array(
		'type' => 'select',
		'section' => 'asap_single',
		'label' => __('Columns related posts', 'asap') ,
		'choices' => $cats,
		'active_callback' => function ($control) {
			return $control->manager->get_setting('asap_show_related_single')->value();
		},
	));

	$wp_customize->add_setting('asap_related_by', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('Related by category', 'asap') ,
		'2' => __('Relacionadas por etiquetas', 'asap') ,
		'3' => __('Random posts', 'asap') ,

	);

	$wp_customize->add_control('asap_related_by', array(
		'type' => 'select',
		'section' => 'asap_single',
		'label' => __('Related posts', 'asap') ,
		'choices' => $cats,
		'active_callback' => function ($control) {
			return $control->manager->get_setting('asap_show_related_single')->value();
		},
	));

	$wp_customize->add_setting('asap_related_title_text', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('asap_related_title_text', array(
		'label' => __('Related posts title', 'asap') ,
		'section' => 'asap_single',
		'type' => 'text',
		'active_callback' => function ($control) {
			return $control->manager->get_setting('asap_show_related_single')->value();
		},
	));
	
	$wp_customize->add_setting('asap_comment_count_title', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('asap_comment_count_title', array(
		'label' => __('Comment list title', 'asap') ,
		'section' => 'asap_single',
		'type' => 'text',
	));
	
	$wp_customize->add_setting('asap_show_last_paragraph_single', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_last_paragraph_single', array(
		'type' => 'checkbox',
		'section' => 'asap_single',
		'label' => __('Show last paragraph dynamic', 'asap') ,
	));
	
	$wp_customize->add_setting( 'asap_last_paragraph_single', array(
	  'capability' => 'edit_theme_options',
	  'default' => 'Si quieres conocer otros artículos parecidos a %%title%% puedes visitar la categoría %%category%%.',
	 // 'sanitize_callback' => 'sanitize_textarea_field',
	) );

	$wp_customize->add_control( 'asap_last_paragraph_single', array(
	  	'type' => 'textarea',
	  	'section' => 'asap_single',
		'label' => __('', 'asap') ,
	  'description' => __( '<strong>Título</strong> %%title%%<br><strong>Categoría</strong> %%category%%<br><strong>Etiqueta</strong> %%tag%%<br><strong>Año actual</strong> %%currentyear%%' ),
		 'active_callback' => function ($control) {
			return $control->manager->get_setting('asap_show_last_paragraph_single')->value();
		},
	) );
	
	$wp_customize->add_setting('asap_show_sidebar_single', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_sidebar_single', array(
		'type' => 'checkbox',
		'section' => 'asap_sidebar',
		'label' => __('Posts', 'asap') ,
		'choices' => $cats
	));
	
	$wp_customize->add_setting('asap_hero_page', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'normal',
	));

	$cats = array(
		'normal' => __('Normal', 'asap') ,
		'1' => __('Featured', 'asap') ,
		'2' => __('Featured without search engine', 'asap') ,

	);

	$wp_customize->add_control('asap_hero_page', array(
		'type' => 'select',
		'section' => 'asap_page',
		'label' => __('Header design', 'asap') ,
		'choices' => $cats,
	));	
	
	
	$wp_customize->add_setting('asap_show_author_page', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_author_page', array(
		'type' => 'checkbox',
		'section' => 'asap_page',
		'label' => __('Show author', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_box_author_page', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_box_author_page', array(
		'type' => 'checkbox',
		'section' => 'asap_page',
		'label' => __('Show author box', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_date_page', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_date_page', array(
		'type' => 'checkbox',
		'section' => 'asap_page',
		'label' => __('Show publication date', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_tags_page', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_tag_page', array(
		'type' => 'checkbox',
		'section' => 'asap_page',
		'label' => __('Show labels', 'asap') ,
	));

	$wp_customize->add_setting('asap_hide_image_featured_page', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_hide_image_featured_page', array(
		'type' => 'checkbox',
		'section' => 'asap_page',
		'label' => __('Hide featured image on pages', 'asap') ,
	));	
	
	$wp_customize->add_setting('asap_show_featured_small_page', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_featured_small_page', array(
		'type' => 'checkbox',
		'section' => 'asap_page',
		'label' => __('Show Featured Image Small', 'asap') ,
		'active_callback' => function ($control) {
			return ! $control->manager->get_setting('asap_hide_image_featured_page')->value();
		},
	));

	$wp_customize->add_setting('asap_show_author_page', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_author_page', array(
		'type' => 'checkbox',
		'section' => 'asap_page',
		'label' => __('Show author', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_box_author_page', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_box_author_page', array(
		'type' => 'checkbox',
		'section' => 'asap_page',
		'label' => __('Show author box', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_date_page', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_date_page', array(
		'type' => 'checkbox',
		'section' => 'asap_page',
		'label' => __('Show publication date', 'asap') ,
	));

	$wp_customize->add_setting('asap_enable_tags_page', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_enable_tags_page', array(
		'type' => 'checkbox',
		'section' => 'asap_page',
		'label' => __('Enable tags', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_tags_page', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_tags_page', array(
		'type' => 'checkbox',
		'section' => 'asap_page',
		'label' => __('Show labels', 'asap') ,
		'active_callback' => function ($control) {
			return $control->manager->get_setting('asap_enable_tags_page')->value();
		},
	));

	$wp_customize->add_setting('asap_show_last_paragraph_page', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_last_paragraph_page', array(
		'type' => 'checkbox',
		'section' => 'asap_page',
		'label' => __('Show last paragraph dynamic', 'asap') ,
	));
	
	$wp_customize->add_setting( 'asap_last_paragraph_page', array(
	  'capability' => 'edit_theme_options',
	  'default' => 'Esperamos que te haya gustado este artículo sobre %%title%%.',
	) );

	$wp_customize->add_control( 'asap_last_paragraph_page', array(
	  'type' => 'textarea',
	  'section' => 'asap_page',
	  'label' => __('', 'asap') ,
	  'description' => __( '<strong>Título</strong> %%title%%<br><strong>Etiqueta</strong> %%tag%%<br><strong>Año actual</strong> %%currentyear%%' ),
	  'active_callback' => function ($control) {
			return $control->manager->get_setting('asap_show_last_paragraph_page')->value();
		},
	));
	
$wp_customize->add_setting('asap_disable_header', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',

	));

	$wp_customize->add_control('asap_disable_header', array(
		'type' => 'checkbox',
		'section' => 'asap_menu_sec',
		'label' => __('Disable header', 'asap') ,
	));
		
	$wp_customize->add_setting('asap_no_sticky_header', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_no_sticky_header', array(
		'type' => 'checkbox',
		'section' => 'asap_menu_sec',
		'label' => __('Disable fixed header', 'asap') ,
		'active_callback' => function ($control) {
			return ! $control->manager->get_setting('asap_disable_header')->value();
		},
	));		
	
	
	$wp_customize->add_setting('asap_header_top', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_header_top', array(
		'type' => 'checkbox',
		'section' => 'asap_menu_sec',
		'label' => __('Activar cabecera doble', 'asap') ,
		'active_callback' => function ($control) {
			return ! $control->manager->get_setting('asap_disable_header')->value();
		},
	));			
	
	$wp_customize->add_setting('asap_search_header_left', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_search_header_left', array(
		'type' => 'checkbox',
		'section' => 'asap_menu_sec',
		'label' => __('Alinear logo a izquierda', 'asap') ,
		'active_callback' => function ($control) {
			return $control->manager->get_setting('asap_header_top')->value();
		},
	));		
	$wp_customize->add_setting('asap_shadow_menu', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
		
	));

	$wp_customize->add_control('asap_shadow_menu', array(
		'type' => 'checkbox',
		'section' => 'asap_menu_sec',
		'label' => __('Show shadow above header', 'asap') ,
		'active_callback' => function ($control) {
			return ! $control->manager->get_setting('asap_disable_header')->value();
		},
	));			
	
	
	$wp_customize->add_setting('asap_float_menu', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_float_menu', array(
		'type' => 'checkbox',
		'section' => 'asap_menu_sec',
		'label' => __('Activate float menu mobile icon', 'asap') ,
		'active_callback' => function ($control) {
			return ! $control->manager->get_setting('asap_disable_header')->value();
		},
	));		
	
	$wp_customize->add_setting('asap_float_design', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',

	));

	$wp_customize->add_control('asap_float_design', array(
		'type' => 'checkbox',
		'section' => 'asap_menu_sec',
		'label' => __('Activate float menu mobile design', 'asap') ,
		'active_callback' => function ($control) {
			return ! $control->manager->get_setting('asap_disable_header')->value();
		},
	));			

	
	$wp_customize->add_setting('asap_dropdown_right', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_dropdown_right', array(
		'type' => 'checkbox',
		'section' => 'asap_menu_sec',
		'label' => __('Drop down to the right', 'asap') ,
			'active_callback' => function ($control) {
			return ! $control->manager->get_setting('asap_disable_header')->value();
		},
	));			
	
$wp_customize->add_setting('asap_menu_columns', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => esc_html__('1', 'asap') ,
		'2' => esc_html__('2', 'asap') ,
		'3' => esc_html__('3', 'asap') ,
	);

	$wp_customize->add_control('asap_menu_columns', array(
		'type' => 'select',
		'section' => 'asap_menu_sec',
		'label' => __('Drop Down Menu columns', 'asap') ,
		'choices' => $cats,
		
		'active_callback' => function ($control) {
			return ! $control->manager->get_setting('asap_disable_header')->value();
		},
	));			
	
	$wp_customize->add_setting('asap_breadcrumb_text', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('asap_breadcrumb_text', array(
		'label' => __('Breadcrumbs text', 'asap') ,
		'section' => 'asap_breadcrumbs_options',
		'type' => 'text',
	));

	$wp_customize->add_setting('asap_hide_breadcrumb', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_hide_breadcrumb', array(
		'type' => 'checkbox',
		'section' => 'asap_breadcrumbs_options',
		'label' => __('Disable on posts', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_hide_breadcrumb_page', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_hide_breadcrumb_page', array(
		'type' => 'checkbox',
		'section' => 'asap_breadcrumbs_options',
		'label' => __('Disable on pages', 'asap') ,
	));
	
	
	$wp_customize->add_setting('asap_hide_breadcrumb_cats', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_hide_breadcrumb_cats', array(
		'type' => 'checkbox',
		'section' => 'asap_breadcrumbs_options',
		'label' => __('Hide categories in breadcrumbs', 'asap') ,
	));


	$wp_customize->add_setting('asap_show_sidebar_page', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_sidebar_page', array(
		'type' => 'checkbox',
		'section' => 'asap_sidebar',
		'label' => __('Pages', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_show_sidebar_home', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_sidebar_home', array(
		'type' => 'checkbox',
		'section' => 'asap_sidebar',
		'label' => __('Home page', 'asap') ,
	));
	
	
	$wp_customize->add_setting('asap_show_sidebar_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_sidebar_cat', array(
		'type' => 'checkbox',
		'section' => 'asap_sidebar',
		'label' => __('Categories', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_show_sidebar_tag', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_sidebar_tag', array(
		'type' => 'checkbox',
		'section' => 'asap_sidebar',
		'label' => __('Tags', 'asap') ,
	));
	
	if ( function_exists( 'is_woocommerce' ) ) {
		
		$wp_customize->add_setting('asap_show_sidebar_products', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback'      => 'asap_sanitize_checkbox',
		));

		$wp_customize->add_control('asap_show_sidebar_products', array(
			'type' => 'checkbox',
			'section' => 'asap_sidebar',
			'label' => __('Products', 'asap') ,
			'choices' => $cats
		));
		
	}
	
	$wp_customize->add_setting('asap_show_last_single', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_last_single', array(
		'type' => 'checkbox',
		'section' => 'asap_sidebar',
		'label' => __('Show on posts', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_last_page', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_last_page', array(
		'type' => 'checkbox',
		'section' => 'asap_sidebar',
		'label' => __('Show on pages', 'asap') ,
	));

	
	$wp_customize->add_setting('asap_show_last_home', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_last_home', array(
		'type' => 'checkbox',
		'section' => 'asap_sidebar',
		'label' => __('Show on home page', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_last_cat', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_last_cat', array(
		'type' => 'checkbox',
		'section' => 'asap_sidebar',
		'label' => __('Show on categories', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_show_last_tag', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_last_tag', array(
		'type' => 'checkbox',
		'section' => 'asap_sidebar',
		'label' => __('Show on tags', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_sidebar_type_posts', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 0,
	));

	$cats = array(
		0 => __('Show all posts', 'asap') ,
		1 => __('Show only entries in the same category', 'asap') ,
		3 => __('Show only entries in the same tag', 'asap') ,
		2 => __('Show only featured posts', 'asap') ,
	);

	$wp_customize->add_control('asap_sidebar_type_posts', array(
		'type' => 'select',
		'section' => 'asap_sidebar',
		'label' => __('Last post options', 'asap') ,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_showposts_last_sidebar', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => 5,
	));

	$wp_customize->add_control('asap_showposts_last_sidebar', array(
		'label' => __('Number of posts', 'asap') ,
		'section' => 'asap_sidebar',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'max' => 10,
		) ,
	));
	
	$wp_customize->add_setting('asap_sidebar_image', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 0,
	));

	$cats = array(
		0 => __('Top', 'asap') ,
		1 => __('Left', 'asap') ,
	);

	$wp_customize->add_control('asap_sidebar_image', array(
		'type' => 'select',
		'section' => 'asap_sidebar',
		'label' => __('Image location', 'asap') ,
		'choices' => $cats
	));
	
	$wp_customize->add_setting('asap_sidebar_posts_title', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('asap_sidebar_posts_title', array(
		'label' => __('Title', 'asap') ,
		'section' => 'asap_sidebar',
		'type' => 'text',
	));	

	$wp_customize->add_setting('asap_side_thumb_width', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '300',
	));

	$wp_customize->add_control('asap_side_thumb_width', array(
		'label' => __('Thumbnails width', 'asap') ,
		'section' => 'asap_sidebar',
		'description' => __('It is necessary to regenerate all the miniatures.', 'asap') ,
		'type' => 'number',
		'input_attrs' => array(
			'min' => 200,
			'max' => 500,
		) ,
	));

	$wp_customize->add_setting('asap_side_thumb_height', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '140',
	));

	$wp_customize->add_control('asap_side_thumb_height', array(
		'label' => __('High thumbnails', 'asap') ,
		'section' => 'asap_sidebar',
		'description' => __('It is necessary to regenerate all the miniatures.', 'asap') ,
		'type' => 'number',
		'input_attrs' => array(
			'min' => 100,
			'max' => 500,
		) ,
	));

	$wp_customize->add_setting('asap_sticky_sidebar', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_sticky_sidebar', array(
		'type' => 'checkbox',
		'section' => 'asap_sidebar',
		'label' => __('Fixed sidebar', 'asap') ,
	));
	
	
	$wp_customize->add_setting('asap_schema_organization', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => true, 
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_schema_organization', array(
		'type' => 'checkbox',
		'section' => 'asap_schema',
		'label' => __('Activate organization structured data', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_schema_article', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => true, 
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_schema_article', array(
		'type' => 'checkbox',
		'section' => 'asap_schema',
		'label' => __('Activate article structured data', 'asap') ,
	));	
	
	$wp_customize->add_setting('asap_schema_breadcrumbs', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => true, 
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_schema_breadcrumbs', array(
		'type' => 'checkbox',
		'section' => 'asap_schema',
		'label' => __('Activate breadcrumbs structured data', 'asap') ,
	));			
	$wp_customize->add_setting('asap_schema_search', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => true, 
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_schema_search', array(
		'type' => 'checkbox',
		'section' => 'asap_schema',
		'label' => __('Activate search structured data', 'asap') ,
	));	
	
	$wp_customize->add_setting('asap_enable_schema_video', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => false, 
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_enable_schema_video', array(
		'type' => 'checkbox',
		'section' => 'asap_schema',
		'label' => __('Enable video Schema', 'asap') ,
		
	));

	$wp_customize->add_setting('asap_youtube_api_key', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('asap_youtube_api_key', array(
		'label' => __('Youtube API Key', 'asap') ,
		'section' => 'asap_schema',
		'description' => __('It is required to enable video Schema.', 'asap') ,
		'type' => 'text',
		"active_callback" => function ($control) {
		return $control->manager->get_setting("asap_enable_schema_video")->value();
		},
	));
		
	
	$wp_customize->add_setting('asap_show_cookies', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_cookies', array(
		'type' => 'checkbox',
		'section' => 'asap_cookies',
		'label' => __('Activate cookies', 'asap') ,
	));

	$wp_customize->add_setting('asap_cookies_text', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('asap_cookies_text', array(
		'label' => __('Message', 'asap') ,
		'section' => 'asap_cookies',
		'type' => 'textarea',
	));

	$wp_customize->add_setting('asap_cookies_text_btn', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('asap_cookies_text_btn', array(
		'label' => __('Accept text', 'asap') ,
		'section' => 'asap_cookies',
		'type' => 'text',
	));

	$wp_customize->add_setting('asap_cookies_text_link', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('asap_cookies_text_link', array(
		'label' => __('More information text', 'asap') ,
		'section' => 'asap_cookies',
		'type' => 'text',
	));

	$wp_customize->add_setting('asap_cookies_link', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	));

	$wp_customize->add_control('asap_cookies_link', array(
		'label' => __('Cookies page', 'asap') ,
		'section' => 'asap_cookies',
		'type' => 'dropdown-pages',
	));

	$wp_customize->add_setting('asap_delete_version', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => true, 
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_delete_version', array(
		'type' => 'checkbox',
		'section' => 'asap_security',
		'label' => __('Delete WordPress version', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_delete_wlw', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => true, 		
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_delete_wlw', array(
		'type' => 'checkbox',
		'section' => 'asap_security',
		'label' => __('Delete WLW Link', 'asap') ,
	));	
	
	$wp_customize->add_setting('asap_delete_rds', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => true, 		
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_delete_rds', array(
		'type' => 'checkbox',
		'section' => 'asap_security',
		'label' => __('Delete RDS Link', 'asap') ,
	));		
	
	$wp_customize->add_setting('asap_delete_api_rest_link', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => true, 
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_delete_api_rest_link', array(
		'type' => 'checkbox',
		'section' => 'asap_security',
		'label' => __('Delete API REST Link', 'asap') ,
	));		
	
	$wp_customize->add_setting('asap_content_type_options', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_content_type_options', array(
		'type' => 'checkbox',
		'section' => 'asap_security',
		'label' => __('X-Content-Type-Options', 'asap') ,
	));			

	$wp_customize->add_setting('asap_frame_options', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_frame_options', array(
		'type' => 'checkbox',
		'section' => 'asap_security',
		'label' => __('X-Frame-Options', 'asap') ,
	));		
	
	$wp_customize->add_setting('asap_xxs_protection', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_xxs_protection', array(
		'type' => 'checkbox',
		'section' => 'asap_security',
		'label' => __('X-XXS-Protection', 'asap') ,
	));		
		
	$wp_customize->add_setting('asap_strict_transport_security', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_strict_transport_security', array(
		'type' => 'checkbox',
		'section' => 'asap_security',
		'label' => __('Strict-Transport-Security', 'asap') ,
	));		

	$wp_customize->add_setting('asap_referrer_policy', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_referrer_policy', array(
		'type' => 'checkbox',
		'section' => 'asap_security',
		'label' => __('Referrer-Policy', 'asap') ,
	));		

	$wp_customize->add_setting('asap_minify_html', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_minify_html', array(
		'type' => 'checkbox',
		'section' => 'asap_wpo',
		'label' => __('Optimize HTML code', 'asap') ,
	));
	

	$wp_customize->add_setting('asap_remove_global_styles', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_remove_global_styles', array(
		'type' => 'checkbox',
		'section' => 'asap_wpo',
		'label' => __('Remove Global Styles', 'asap') ,
		'active_callback' => function ($control) {
			return ! $control->manager->get_setting('asap_delete_guten_css')->value();
		},	
	));
	
	$wp_customize->add_setting('asap_optimize_analytics', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_optimize_analytics', array(
		'type' => 'checkbox',
		'section' => 'asap_wpo',
		'label' => __('Optimize Google Analytics', 'asap') ,
	));

	
	$wp_customize->add_setting('asap_enable_js_defer', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));
	
	$wp_customize->add_control('asap_enable_js_defer', array(
		'type' => 'checkbox',
		'section' => 'asap_wpo',
		'label' => __('Enable Javascript lazy loading', 'asap') ,
	));

	$wp_customize->add_setting('asap_deactivate_jquery', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));
	
	$wp_customize->add_control('asap_deactivate_jquery', array(
		'type' => 'checkbox',
		'section' => 'asap_wpo',
		'label' => __('Disable jQuery', 'asap') ,
	));	
	
	$wp_customize->add_setting('asap_optimize_youtube', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_optimize_youtube', array(
		'type' => 'checkbox',
		'section' => 'asap_wpo',
		'label' => __('Optimize YouTube videos', 'asap') ,
	));
	

	$wp_customize->add_setting('asap_disable_embed', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));
	
	$wp_customize->add_control('asap_disable_embed', array(
		'type' => 'checkbox',
		'section' => 'asap_wpo',
		'label' => __('Disable embedded content', 'asap') ,
	));	
	
	$wp_customize->add_setting('asap_preload_featured_image', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
		'default'      => true
	));

	$wp_customize->add_control('asap_preload_featured_image', array(
		'type' => 'checkbox',
		'section' => 'asap_wpo',
		'label' => __('Preload featured image', 'asap') ,
	));
		
	$wp_customize->add_setting('asap_options_fonts', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 2
	));

	$cats = array(
		2 => __('Host Google Fonts locally', 'asap') ,
		1 => __('Host Google Fonts externally', 'asap') ,
		3 => __('Disable Google Fonts', 'asap') ,
	);

	$wp_customize->add_control('asap_options_fonts', array(
		'type' => 'select',
		'section' => 'asap_wpo',
		'label' => __('Google Fonts', 'asap') ,
		'choices' => $cats,

	));
	
	if ( function_exists( 'is_woocommerce' ) ) {

		$wp_customize->add_setting( 'asap_wc_remove_dependencies', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback'      => 'asap_sanitize_checkbox',
		));
		
		$wp_customize->add_control( 'asap_wc_remove_dependencies', array(
			'section' => 'asap_wpo',
			'type' => 'checkbox',
			'label' => __('Remove WooCommerce dependencies outside their domains', 'asap'),
		));
	
	}	
	

	$wp_customize->add_setting('asap_delete_guten_css', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_delete_guten_css', array(
		'type' => 'checkbox',
		'section' => 'asap_performance',
		'label' => __('Activate Classic Editor', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_classic_editor_widgets', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_classic_editor_widgets', array(
		'type' => 'checkbox',
		'section' => 'asap_performance',
		'label' => __('Activate Classic Editor on Widgets', 'asap') ,
		'active_callback' => function ($control) {
			return ! $control->manager->get_setting('asap_delete_guten_css')->value();
		},	
	));	

	$wp_customize->add_setting('asap_enable_awesome', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_enable_awesome', array(
		'type' => 'checkbox',
		'section' => 'asap_performance',
		'label' => __('Activate Awesome library', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_remove_comments_links', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
		'default' => true
	));

	$wp_customize->add_control('asap_remove_comments_links', array(
		'type' => 'checkbox',
		'section' => 'asap_performance',
		'label' => __('Remove links in comments', 'asap') ,
	));	
	
	$wp_customize->add_setting('asap_show_comments_url', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_comments_url', array(
		'type' => 'checkbox',
		'section' => 'asap_performance',
		'label' => __('Show URL in comments', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_hero_cat', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => 'normal',
	));

	$cats = array(
		'normal' => __('Normal', 'asap') ,
		'1' => __('Featured', 'asap') ,
		'2' => __('Featured without search engine', 'asap') ,

	);

	$wp_customize->add_control('asap_hero_cat', array(
		'type' => 'select',
		'section' => 'asap_performance',
		'label' => __('Category Header design', 'asap') ,
		'choices' => $cats,
	));		
	
	$wp_customize->add_setting('asap_home_text_before', array(
		'sanitize_callback' => 'wp_kses_post',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod'
	));

	$wp_customize->add_control(new WP_Customize_Teeny_Control($wp_customize, 'asap_home_text_before', array(
		'label' => __('Home text − Before', 'asap') ,
		'section' => 'asap_performance',
	)));


	$wp_customize->add_setting('asap_home_text', array(
		'sanitize_callback' => 'wp_kses_post',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod'
	));

	$wp_customize->add_control(new WP_Customize_Teeny_Control($wp_customize, 'asap_home_text', array(
		'label' => __('Home text − After', 'asap') ,
		'section' => 'asap_performance',
	)));
	
	
	
	
	
	$wp_customize->add_setting('asap_enable_post_index', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_enable_post_index', array(
		'type' => 'checkbox',
		'section' => 'asap_content_index',
		'label' => __('Activate on posts', 'asap') ,
	));

	$wp_customize->add_setting('asap_enable_page_index', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_enable_page_index', array(
		'type' => 'checkbox',
		'section' => 'asap_content_index',
		'label' => __('Activate on pages', 'asap') ,
	));

	$wp_customize->add_setting('asap_user_hide_index', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_user_hide_index', array(
		'type' => 'checkbox',
		'section' => 'asap_content_index',
		'label' => __('Allow user to change visibility', 'asap') ,
	));

	$wp_customize->add_setting('asap_hide_index', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_hide_index', array(
		'type' => 'checkbox',
		'section' => 'asap_content_index',
		'label' => __('Hide initially', 'asap') ,
		'active_callback' => function ($control) {
			return $control->manager->get_setting('asap_user_hide_index')->value();
		},
	));
	
	$wp_customize->add_setting('asap_scroll_smooth', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_scroll_smooth', array(
		'type' => 'checkbox',
		'section' => 'asap_content_index',
		'label' => __('Enable smooth scrolling', 'asap') ,
	));
	
	$wp_customize->add_setting( 'asap_exclude_h3_tags', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'asap_exclude_h3_tags', array(
		'type' => 'checkbox',
		'section' => 'asap_content_index',
		'label' =>  __('Exclude H3 tags', 'asap'),
	));	
	
	$wp_customize->add_setting( 'asap_toc_sticky', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'asap_toc_sticky', array(
		'type' => 'checkbox',
		'section' => 'asap_content_index',
		'label' =>  __('Fix when scrolling on mobile', 'asap'),
	));		
	
	$wp_customize->add_setting( 'asap_toc_overlay', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'asap_toc_overlay', array(
		'type' => 'checkbox',
		'section' => 'asap_content_index',
		'label' =>  __('Overlay over header', 'asap'),
		'active_callback' => function ($control) {
			return $control->manager->get_setting('asap_toc_sticky')->value();
		},	
	));			
	
	$wp_customize->add_setting('asap_index_design', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '0',
		
	));

	$cats = array(
		'0' => esc_html__('Flat Gray Background', 'asap') ,
		'1' => esc_html__('Flat Color Background', 'asap') ,
		'2' => esc_html__('Shadow', 'asap') ,
	);

	$wp_customize->add_control('asap_index_design', array(
		'type' => 'select',
		'section' => 'asap_content_index',
		'label' => __('Design', 'asap') ,
		'choices' => $cats,
	));
		
	$wp_customize->add_setting('asap_index_pos', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('Before the first heading', 'asap') ,
		'2' => __('Above', 'asap') ,
		'3' => __('Down', 'asap') ,
		'4' => __('Use only as shortcode', 'asap') ,
	);

	$wp_customize->add_control('asap_index_pos', array(
		'type' => 'select',
		'section' => 'asap_content_index',
		'label' => __('Position', 'asap') ,
		'description' => __('Shortcode: [asap_toc]', 'asap') ,		
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_index_list', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
		'default'      => '1',
	));

	$cats = array(
		'1' => __('Numbered list', 'asap') ,
		'2' => __('Bulleted list', 'asap') ,
		'3' => __('No numbers or bullet point', 'asap') ,
	);

	$wp_customize->add_control('asap_index_list', array(
		'type' => 'select',
		'section' => 'asap_content_index',
		'label' => __('Format', 'asap') ,
		'choices' => $cats
	));

	$wp_customize->add_setting('asap_index_text', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => __('Index', 'asap'),
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('asap_index_text', array(
		'label' => __('Title', 'asap') ,
		'section' => 'asap_content_index',
		'type' => 'text',
	));
	
	$wp_customize->add_setting('asap_show_search_index', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_search_index', array(
		'type' => 'checkbox',
		'section' => 'asap_search',
		'label' => __('Show search engine at home', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_search_cate', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_search_cate', array(
		'type' => 'checkbox',
		'section' => 'asap_search',
		'label' => __('Show search engine at categories', 'asap') ,
	));

		$wp_customize->add_setting('asap_show_search_tags', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_search_tags', array(
		'type' => 'checkbox',
		'section' => 'asap_search',
		'label' => __('Show search engine at tags', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_show_search_menu', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_search_menu', array(
		'type' => 'checkbox',
		'section' => 'asap_search',
		'label' => __('Show search engine in responsive menu', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_search', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_search', array(
		'type' => 'checkbox',
		'section' => 'asap_search',
		'label' => __('Show search engine in desktop menu', 'asap') ,
	));
	
	if ( function_exists( 'is_woocommerce' ) ) {

		$wp_customize->add_setting('asap_show_search_wc', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback'      => 'asap_sanitize_checkbox',
		));

		$wp_customize->add_control('asap_show_search_wc', array(
			'type' => 'checkbox',
			'section' => 'asap_search',
			'label' => __('Show search engine in product list', 'asap') ,
		));

	}

	$wp_customize->add_setting('asap_search_text', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('asap_search_text', array(
		'label' => __('Search engine text', 'asap') ,
		'section' => 'asap_search',
		'description' => __('The text will appear in all search engines.', 'asap') ,
		'type' => 'text',
	));

	$wp_customize->add_setting('asap_search_header_width', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '200',
	));

	$wp_customize->add_control('asap_search_header_width', array(
		'label' => __('Search engine width', 'asap') ,
		'description' => __('It will only be used in the desktop menu.', 'asap') ,
		'section' => 'asap_search',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 200,
			'max' => 500,
		) ,
	));

	$wp_customize->add_setting('asap_search_margin', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'default' => '0',
	));

	$wp_customize->add_control('asap_search_margin', array(
		'label' => __('Distance', 'asap') ,
		'description' => __('Left margin of the search engine. It will only be used in the desktop menu.', 'asap') ,
		'section' => 'asap_search',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 200,
			'max' => 350,
		) ,
	));

	$wp_customize->add_setting('asap_show_social_buttons_before', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_social_buttons_before', array(
		'type' => 'checkbox',
		'section' => 'asap_share_social',
		'label' => __('Before content', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_social_buttons_after', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_social_buttons_after', array(
		'type' => 'checkbox',
		'section' => 'asap_share_social',
		'label' => __('After content', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_social_buttons_bottom', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_social_buttons_bottom', array(
		'type' => 'checkbox',
		'section' => 'asap_share_social',
		'label' => __('Bottom mobile only', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_facebook', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_facebook', array(
		'type' => 'checkbox',
		'section' => 'asap_share_social',
		'label' => __('Facebook', 'asap') ,
	));

	$wp_customize->add_setting('asap_show_facebookm', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_facebookm', array(
		'type' => 'checkbox',
		'section' => 'asap_share_social',
		'label' => __('Facebook Messenger', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_show_twitter', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_twitter', array(
		'type' => 'checkbox',
		'section' => 'asap_share_social',
		'label' => __('Twitter', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_show_pinterest', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_pinterest', array(
		'type' => 'checkbox',
		'section' => 'asap_share_social',
		'label' => __('Pinterest', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_show_whatsapp', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_whatsapp', array(
		'type' => 'checkbox',
		'section' => 'asap_share_social',
		'label' => __('WhatsApp', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_show_tumblr', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_tumblr', array(
		'type' => 'checkbox',
		'section' => 'asap_share_social',
		'label' => __('Tumblr', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_show_linkedin', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_linkedin', array(
		'type' => 'checkbox',
		'section' => 'asap_share_social',
		'label' => __('Linkedin', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_show_telegram', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_telegram', array(
		'type' => 'checkbox',
		'section' => 'asap_share_social',
		'label' => __('Telegram', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_show_email', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_email', array(
		'type' => 'checkbox',
		'section' => 'asap_share_social',
		'label' => __('E-mail', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_show_reddit', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_checkbox',
	));

	$wp_customize->add_control('asap_show_reddit', array(
		'type' => 'checkbox',
		'section' => 'asap_share_social',
		'label' => __('Reddit', 'asap') ,
	));
	
	$wp_customize->add_setting('asap_social_post_types', array(
		'type'      => 'theme_mod',
		'capability'      => 'edit_theme_options',
		'sanitize_callback'      => 'asap_sanitize_select',
	));

	$cats = array(
		'1' => __('All', 'asap') ,
		'2' => __('only posts', 'asap') ,
		'3' => __('only pages', 'asap') ,
	);

	$wp_customize->add_control('asap_social_post_types', array(
		'type' => 'select',
		'section' => 'asap_share_social',
		'label' => __('Post type', 'asap') ,
		'choices' => $cats
	));
	
	$wp_customize->add_setting('asap_social_title', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('asap_social_title', array(
		'label' => __('Social buttons title', 'asap') ,
		'section' => 'asap_share_social',
		'type' => 'text',
	));
	

	
	
	/**/
	
	if ( function_exists( 'is_woocommerce' ) ) {
				
		$wp_customize->add_section('asap_wc', array(
			'title' => __('WooCommerce', 'asap') ,
			'panel' => 'custom_options',
			'priority' => 99,
			'capability' => 'edit_theme_options',
		));
		
		$wp_customize->add_setting( 'asap_wc_disable_breadcrumbs', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback'      => 'asap_sanitize_checkbox',
		));

		$wp_customize->add_control( 'asap_wc_disable_breadcrumbs', array(
			'section' => 'asap_wc',
			'type' => 'checkbox',
			'label' => __('Disable breadcrumbs', 'asap'),
		));
		
		$wp_customize->add_setting( 'asap_wc_disable_saving', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback'      => 'asap_sanitize_checkbox',
		));
		
		$wp_customize->add_control( 'asap_wc_disable_saving', array(
			'section' => 'asap_wc',
			'type' => 'checkbox',
			'label' => __('Disable savings percentage', 'asap'),
		));

		$wp_customize->add_setting( 'asap_wc_disable_header_account', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback'      => 'asap_sanitize_checkbox',
		));
		
		$wp_customize->add_control( 'asap_wc_disable_header_account', array(
			'section' => 'asap_wc',
			'type' => 'checkbox',
			'label' => __('Disable header account', 'asap'),
		));
		
		$wp_customize->add_setting( 'asap_wc_disable_header_cart', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback'      => 'asap_sanitize_checkbox',
		));
		
		$wp_customize->add_control( 'asap_wc_disable_header_cart', array(
			'section' => 'asap_wc',
			'type' => 'checkbox',
			'label' => __('Disable header cart', 'asap'),
		));
	
		
		$wp_customize->add_setting( 'asap_wc_deactivate_add_to_cart', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback'      => 'asap_sanitize_checkbox',
		));
		
		$wp_customize->add_control( 'asap_wc_deactivate_add_to_cart', array(
			'section' => 'asap_wc',
			'type' => 'checkbox',
			'label' => __('Disable Add to Cart Button', 'asap'),
		));
		
		$wp_customize->add_setting( 'asap_wc_deactivate_related_products', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback'      => 'asap_sanitize_checkbox',
		));
		
		$wp_customize->add_control( 'asap_wc_deactivate_related_products', array(
			'section' => 'asap_wc',
			'type' => 'checkbox',
			'label' => __('Disable related products', 'asap'),
		));
		
		$wp_customize->add_setting('asap_wc_related_number', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'absint',
			'default' => 4,
		));

		$wp_customize->add_control('asap_wc_related_number', array(
			'label' => __('Number of related products', 'asap') ,
			'section' => 'asap_wc',
			'type' => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 18,
			) ,
		));

		$wp_customize->add_setting('asap_wc_related_prod_columns', array(
			'type'      => 'theme_mod',
			'capability'      => 'edit_theme_options',
			'sanitize_callback'      => 'absint',
			'default'      => 4,
		));
		
		$wp_customize->add_control('asap_wc_related_prod_columns', array(
			'label' => __('Products by row Related Products', 'asap') ,
			'section' => 'asap_wc',
			'type' => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 6,
			) ,
		));
		
		$wp_customize->add_setting('asap_wc_cart_button_text', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		));

		$wp_customize->add_control('asap_wc_cart_button_text', array(
			'label' => __('Add to cart Button text', 'asap') ,
			'section' => 'asap_wc',
			'type' => 'text',
		));
		

	}
	
	
}

add_action('customize_register', 'asap_customize_register');

?>
