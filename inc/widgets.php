<?php
/**
 * Social Buttons Widget
 *
 * @package AsapTheme
 */


class asap_Widget_Social_Buttons extends WP_Widget
{

	function __construct()
	{
		$widget_ops = array(
			'classname' => 'widget-social-buttons',
			'description' => __('Links to your social networks.', 'asap'),
			'customize_selective_refresh' => true,
		);
	    parent::__construct('social-buttons-asap', __('ASAP − Social networks', 'asap'), $widget_ops);
	}

	function widget($args, $instance)
	{
		if (! isset($args['widget_id'])) {
			$args['widget_id'] = $this->id;
		}
		
		$title = ( ! empty($instance['title']) ) ? $instance['title'] : __('Follow us', 'asap');
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);
		$fb = ( ! empty($instance['fb']) );
		$tw = ( ! empty($instance['tw']) );
		$ig = ( ! empty($instance['ig']) );
		$yt = ( ! empty($instance['yt']) );
		$pi = ( ! empty($instance['pi']) );
		$tl = ( ! empty($instance['tl']) );
		$tk = ( ! empty($instance['tk']) );
		$lk = ( ! empty($instance['lk']) );
		$em = ( ! empty($instance['em']) );
		$ap = ( ! empty($instance['ap']) );
		
		?>
			
		<?php echo $args['before_widget']; ?>
			
		<?php if ($title) {	echo $args['before_title'] . $title . $args['after_title'];	} ?>

		<?php echo '<div class="asap-content-sb">'; ?>
			
		<?php if ( $fb ) : ?>
			
		<a title="Facebook" href="<?php echo $instance['fb']; ?>" class="asap-icon icon-facebook" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg></a>
			
		<?php endif; ?>
			
		<?php if ( $tw ) { ?>
			
		<a title="Twitter" href="<?php echo $instance['tw']; ?>" class="asap-icon icon-twitter" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" /></svg></a>
			
		<?php } ?>
			
		<?php if ( $ig ) { ?>
			
		<a title="Instagram" href="<?php echo $instance['ig']; ?>" class="asap-icon icon-instagram" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="16" height="16" rx="4" /><circle cx="12" cy="12" r="3" /><line x1="16.5" y1="7.5" x2="16.5" y2="7.501" /></svg></a>
			
		<?php } ?>
			
		<?php if ( $yt ) { ?>
		
		<a title="Youtube" href="<?php echo $instance['yt']; ?>" class="asap-icon icon-youtube" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="4" /><path d="M10 9l5 3l-5 3z" /></svg></a>
			
		<?php } ?>
			
		<?php if ( $pi ) { ?>
			
		<a title="Pinterest" href="<?php echo $instance['pi']; ?>" class="asap-icon icon-pinterest" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="8" y1="20" x2="12" y2="11" /><path d="M10.7 14c.437 1.263 1.43 2 2.55 2c2.071 0 3.75 -1.554 3.75 -4a5 5 0 1 0 -9.7 1.7" /><circle cx="12" cy="12" r="9" /></svg></a>
			
		<?php } ?>

		<?php if ( $tl ) { ?>
			
		<a title="Telegram" href="<?php echo $instance['tl']; ?>" class="asap-icon icon-telegram" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" /></svg></a>
			
		<?php } ?>

		<?php if ( $tk ) { ?>
			
		<a title="TikTok" href="<?php echo $instance['tk']; ?>" class="asap-icon icon-tiktok" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 12a4 4 0 1 0 4 4v-12a5 5 0 0 0 5 5" /></svg></a>
			
		<?php } ?>

		<?php if ( $lk ) { ?>
			
		<a title="LinkedIn" href="<?php echo $instance['lk']; ?>" class="asap-icon icon-linkedin" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="16" height="16" rx="2" /><line x1="8" y1="11" x2="8" y2="16" /><line x1="8" y1="8" x2="8" y2="8.01" /><line x1="12" y1="16" x2="12" y2="11" /><path d="M16 16v-3a2 2 0 0 0 -4 0" /></svg></a>
			
		<?php } ?>

		<?php if ( $em ) : ?>
			
		<a title="Email" href="<?php echo $instance['em']; ?>" class="asap-icon icon-email"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="2" /><polyline points="3 7 12 13 21 7" /></svg></a>
			
		<?php endif; ?>

		<?php if ( $ap ) : ?>
			
		<a title="App" href="<?php echo $instance['ap']; ?>" class="asap-icon icon-app"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="10" x2="4" y2="16" /><line x1="20" y1="10" x2="20" y2="16" /><path d="M7 9h10v8a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-8a5 5 0 0 1 10 0" /><line x1="8" y1="3" x2="9" y2="5" /><line x1="16" y1="3" x2="15" y2="5" /><line x1="9" y1="18" x2="9" y2="21" /><line x1="15" y1="18" x2="15" y2="21" /></svg></a>
			
		<?php endif; ?>

		<?php echo '</div>'; ?>

		<?php echo $args['after_widget']; ?>
			
	<?php
		
	}

	function update($new_instance, $old_instance) {

		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);		
		$instance['fb'] = sanitize_text_field($new_instance['fb']);
		$instance['tw'] = sanitize_text_field($new_instance['tw']);		
		$instance['ig'] = sanitize_text_field($new_instance['ig']);		
		$instance['yt'] = sanitize_text_field($new_instance['yt']);		
		$instance['pi'] = sanitize_text_field($new_instance['pi']);				
		$instance['tl'] = sanitize_text_field($new_instance['tl']);				
		$instance['tk'] = sanitize_text_field($new_instance['tk']);				
		$instance['lk'] = sanitize_text_field($new_instance['lk']);		
		$instance['em'] = sanitize_text_field($new_instance['em']);		
		$instance['ap'] = sanitize_text_field($new_instance['ap']);						
		return $instance;
	}

	function form($instance) {
		
		$title  = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$fb     = isset($instance['fb']) ? esc_attr($instance['fb']) : '';
		$tw     = isset($instance['tw']) ? esc_attr($instance['tw']) : '';
		$ig     = isset($instance['ig']) ? esc_attr($instance['ig']) : '';
		$yt    	= isset($instance['yt']) ? esc_attr($instance['yt']) : '';
		$pi     = isset($instance['pi']) ? esc_attr($instance['pi']) : '';
		$tl     = isset($instance['pi']) ? esc_attr($instance['tl']) : '';
		$tk     = isset($instance['tk']) ? esc_attr($instance['tk']) : '';
		$lk     = isset($instance['lk']) ? esc_attr($instance['lk']) : '';
		$em     = isset($instance['em']) ? esc_attr($instance['em']) : '';
		$ap     = isset($instance['ap']) ? esc_attr($instance['ap']) : '';
		
		?>
	
		<div class="widget_asap">		
			
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'asap'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('fb'); ?>"><?php _e('Facebook URL', 'asap'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('fb'); ?>" name="<?php echo $this->get_field_name('fb'); ?>" type="text" value="<?php echo $fb; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('tw'); ?>"><?php _e('Twitter URL', 'asap'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('tw'); ?>" name="<?php echo $this->get_field_name('tw'); ?>" type="text" value="<?php echo $tw; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('ig'); ?>"><?php _e('Instagram URL', 'asap'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('ig'); ?>" name="<?php echo $this->get_field_name('ig'); ?>" type="text" value="<?php echo $ig; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('yt'); ?>"><?php _e('YouTube URL', 'asap'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('yt'); ?>" name="<?php echo $this->get_field_name('yt'); ?>" type="text" value="<?php echo $yt; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('pi'); ?>"><?php _e('Pinterest URL', 'asap'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('pi'); ?>" name="<?php echo $this->get_field_name('pi'); ?>" type="text" value="<?php echo $pi; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('tl'); ?>"><?php _e('Telegram URL', 'asap'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('tl'); ?>" name="<?php echo $this->get_field_name('tl'); ?>" type="text" value="<?php echo $tl; ?>" />
			</p>	
			
			<p>
				<label for="<?php echo $this->get_field_id('tk'); ?>"><?php _e('TikTok URL', 'asap'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('tk'); ?>" name="<?php echo $this->get_field_name('tk'); ?>" type="text" value="<?php echo $tk; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('lk'); ?>"><?php _e('LinkedIn URL', 'asap'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('lk'); ?>" name="<?php echo $this->get_field_name('lk'); ?>" type="text" value="<?php echo $lk; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('em'); ?>"><?php _e('Contact URL', 'asap'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('em'); ?>" name="<?php echo $this->get_field_name('em'); ?>" type="text" value="<?php echo $em; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('ap'); ?>"><?php _e('App URL', 'asap'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('ap'); ?>" name="<?php echo $this->get_field_name('ap'); ?>" type="text" value="<?php echo $ap; ?>" />
			</p>

		</div>

		<?php
	}
}



add_action( 'widgets_init', 'asap_load_widgets' );

function asap_load_widgets() {
    register_widget( 'asap_Widget_Social_Buttons' );

}








