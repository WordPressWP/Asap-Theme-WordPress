<?php

if ( ! class_exists( 'META_CT' ) ) {

	class META_CT {

		public function __construct() {

		}

		public function init() {
		 
		   add_action( 'category_add_form_fields', array ( $this, 'add_category_image' ), 10, 2 );
		   add_action( 'created_category', array ( $this, 'save_category_image' ), 10, 2 );
		   add_action( 'category_edit_form_fields', array ( $this, 'update_category_image' ), 10, 2 );
		   add_action( 'edited_category', array ( $this, 'updated_category_image' ), 10, 2 );
		   add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
		   add_action( 'admin_footer', array ( $this, 'add_script' ) );
		 
	 	}

		public function load_media() {
			
		 	wp_enqueue_media();
			
		}

	 /* Form */
		
	 public function add_category_image ( $taxonomy ) { ?>

	   <div class="form-field term-group">
		 <label for="category-image-id"><?php _e('Featured image', 'asap'); ?></label>
		 <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
		 <div id="category-image-wrapper"></div>
		 <p>
		   <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'asap' ); ?>" />
		   <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Delete Image', 'asap' ); ?>" />
		</p>
	   </div>
	 
	<?php }

	 /* Save Form */

	 public function save_category_image ( $term_id, $tt_id ) {
		 
	   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){
		   
		 $image = $_POST['category-image-id'];
		   
		 add_term_meta( $term_id, 'category-image-id', $image, true );
		   
	   }
		 
	 }

	/* Edit Form */

	public function update_category_image ( $term, $taxonomy ) { 

		$hero_cat = get_theme_mod('asap_hero_cat', 'normal');
		
		$asap_header_design = get_term_meta($term->term_id, 'asap_header_design', true);

	?>
	
	<style>

		.asap-advice {
			background:#1abc9c;
			color:#fff;
			font-size:12px;
			margin-left:10px;
			border-radius:2px;
			padding:2px 4px;
		}
		
		#category-image-wrapper,
		#category-cover-image-wrapper {
			margin-bottom:10px;
		}

	</style>

	<tr class="form-field">
        <th scope="row" valign="top"><?php _e('Header design - Global', 'asap'); ?></th>
        <td>
			<select disabled title="<?php  _e( 'This global option can only be changed from the customizer options.', 'asap' ); ?>">  
			<option value="normal" <?php selected( $hero_cat, "normal" ); ?>><?php  _e( 'Normal', 'asap' ); ?></option>  
			<option value="1" <?php selected( $hero_cat, "1" ); ?>><?php  _e( 'Featured', 'asap' ); ?></option>
			<option value="2" <?php selected( $hero_cat, "2" ); ?>><?php  _e( 'Featured without search engine', 'asap' ); ?></option>
			 </select>		
        </td>
    </tr>

	<tr class="form-field">
        <th scope="row" valign="top"><label for="asap_header_design"><?php _e('Header design', 'asap'); ?></label></th>
        <td>
            <select name="asap_header_design" id="asap_header_design">
				<?php if (empty($asap_header_design)) : ?>
					<option value="" selected disabled></option>
				<?php endif; ?>
                <option value="normal" <?php selected($asap_header_design, 'normal'); ?>><?php _e('Normal', 'asap'); ?></option>
                <option value="1" <?php selected($asap_header_design, '1'); ?>><?php _e('Featured', 'asap'); ?></option>
                <option value="2" <?php selected($asap_header_design, '2'); ?>><?php _e('Featured without search engine', 'asap'); ?></option>
            </select>
        </td>
    </tr>

    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="category-cover-image-id"><?php _e( 'Featured Image', 'asap' ); ?></label>
        </th>
        <td>
            <?php $image_id = get_term_meta ( $term -> term_id, 'category-cover-image-id', true ); ?>
            <input type="hidden" id="category-cover-image-id" name="category-cover-image-id" value="<?php echo $image_id; ?>">
            <div id="category-cover-image-wrapper">
                <?php if ( $image_id ) { ?>
                    <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
                <?php } ?>
            </div>
            <p>
                <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button_cover" name="ct_tax_media_button_cover" value="<?php _e( 'Add Image', 'asap' ); ?>" />
				<input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove_cover" name="ct_tax_media_remove_cover" data-target="#category-cover-image" value="<?php _e( 'Delete Image', 'asap' ); ?>" />
            </p>
        </td>
    </tr>

	   <tr class="form-field term-group-wrap">
		 <th scope="row">
		   <label for="category-image-id"><?php _e( 'Icon', 'asap' ); ?></label>
		 </th>
		 <td>
		   <?php $image_id = get_term_meta ( $term -> term_id, 'category-image-id', true ); ?>
		   <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">
		   <div id="category-image-wrapper">
			 <?php if ( $image_id ) { ?>
			   <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
			 <?php } ?>
		   </div>
		   <p>
			 <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'asap' ); ?>" />
			<input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" data-target="#category-image" value="<?php _e( 'Delete Image', 'asap' ); ?>" />
		   </p>
		 </td>
	   </tr>
	 
	<?php	
	
	}

	/* Update */
	 
	public function updated_category_image ( $term_id, $tt_id ) {
			
	   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){		   
		 $image = $_POST['category-image-id'];		   
		 update_term_meta ( $term_id, 'category-image-id', $image );		   
	   } else {
		 update_term_meta ( $term_id, 'category-image-id', '' );   
	   }
		
		if( isset( $_POST['category-cover-image-id'] ) && '' !== $_POST['category-cover-image-id'] ){
			$image = $_POST['category-cover-image-id'];
			update_term_meta ( $term_id, 'category-cover-image-id', $image );
		} else {
			update_term_meta ( $term_id, 'category-cover-image-id', '' );
		}		
		
		if (isset($_POST['asap_header_design'])) {
        	update_term_meta($term_id, 'asap_header_design', sanitize_text_field($_POST['asap_header_design']));
    	}
		
	 }

	/* Add script */
		
	public function add_script() { ?>
 <script>
    jQuery(document).ready( function($) {
        function ct_media_upload(button_class, input_id, wrapper_id) {
            var _custom_media = true,
            _orig_send_attachment = wp.media.editor.send.attachment;
            $('body').on('click', button_class, function(e) {
                var button_id = '#'+$(this).attr('id');
                var send_attachment_bkp = wp.media.editor.send.attachment;
                var button = $(button_id);
                _custom_media = true;
                wp.media.editor.send.attachment = function(props, attachment){
                    if ( _custom_media ) {
                        $(input_id).val(attachment.id);
                        $(wrapper_id).html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                        $(wrapper_id + ' .custom_media_image').attr('src',attachment.url).css('display','block');
                    } else {
                        return _orig_send_attachment.apply( button_id, [props, attachment] );
                    }
                }
                wp.media.editor.open(button);
                return false;
            });
        }
        ct_media_upload('#ct_tax_media_button_cover', '#category-cover-image-id', '#category-cover-image-wrapper'); 
        ct_media_upload('#ct_tax_media_button', '#category-image-id', '#category-image-wrapper'); 

        $('body').on('click','.ct_tax_media_remove',function(){
            var wrapper = $(this).data('target');
            $(wrapper + '-id').val('');
            $(wrapper + '-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
        });
        $(document).ajaxComplete(function(event, xhr, settings) {
            var queryStringArr = settings.data.split('&');
            if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
                var xml = xhr.responseXML;
                $response = $(xml).find('term_id').text();
                if($response!=""){
                    // Clear the thumb image
                    $('#category-cover-image-wrapper').html('');
                    $('#category-image-wrapper').html('');
                }
            }
        });
    });
</script>

		<?php
		
		}

	}

	$META_CT = new META_CT();
	$META_CT -> init();
 
}

?>