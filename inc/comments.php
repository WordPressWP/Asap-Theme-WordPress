<?php
	function asap_enable_threaded_comments() {
		if ( is_singular() AND comments_open() AND ( get_option( 'thread_comments' ) == 1 ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'get_header', 'asap_enable_threaded_comments' );
	
	add_filter('comment_form_default_fields','asap_disable_url_comment');
	function asap_disable_url_comment($fields) { 
		if ( ! get_theme_mod('asap_show_comments_url') ) {
			unset($fields['url']);
			return $fields;
		}
	}
	
	add_filter( 'comment_form_defaults', 'asap_modify_fields_form' );
	function asap_modify_fields_form( $args ){
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " required " : '' );
		$author = '<input placeholder="'.__( 'Name' ) . ( $req ? ' *' : '' ).'" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" size="30"' . $aria_req . ' />';
		$email = '<div class="fields-wrap"><input placeholder="'.__( 'Email' ) . ( $req ? ' *' : '' ).'" id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .'" size="30"' . $aria_req . ' />';	
		$url = '<div class="fields-wrap"><input placeholder="'.__( 'URL' ).'" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .'" size="30" />';
		$comment = '<textarea placeholder="'. _x( 'Comment', '' ).'" id="comment" name="comment" cols="45" rows="5" required></textarea>';
	
		$args['fields']['author'] = $author;
		$args['fields']['email'] = $email;
		
		if ( get_theme_mod('asap_show_comments_url') ) {
		$args['fields']['url'] = $url;
		}
		
		$args['comment_field'] = $comment;
		return $args;
	}

	add_filter( 'comment_form_fields', 'asap_modify_order_fields' );	
	function asap_modify_order_fields( $fields ){
		$val = $fields['comment'];
		unset($fields['comment']);
		$fields += array('comment' => $val );
		return $fields;
	}

	add_filter('comment_text', 'asap_wrap_comments_div');
	function asap_wrap_comments_div( $content ) {
		return '<div class="asap-user-comment-text">' . wpautop($content) . '</div>';
	}

?>