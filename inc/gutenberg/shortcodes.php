<?php

function asap_add_shortcodes_js() {
	
wp_register_script( 'clusters-js', get_template_directory_uri() . '/inc/gutenberg/assets/js/shortcodes.min.js', array( 'jquery'), '001130522', true );
	
wp_enqueue_script( 'clusters-js' );
	
}

add_action("admin_menu", "asap_add_options");
function asap_add_options() {
add_menu_page('Shortcodes', 'Shortcodes', 'manage_options', 'shortcodes', 'asap_add_shortcodes_options');
}

	
function asap_add_shortcodes_options() {

?>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css?ver=6.2.2">

	<style>

		code{display:block!important;overflow-x:auto!important;padding:1em!important;margin:0 1px!important;background:#eaeaea!important;background:rgba(0,0,0,.07)!important;font-size:14px!important}.cluster-disp-none{display:none}.gute-cluster-option-active{box-shadow:none;border-bottom:4px solid #666!important;color:#23282d!important}h1.cl-h1{font-weight:400!important}p.cl-description{color:#666;font-size:15px;font-style:italic;padding:1rem 3rem!important}.gute-cluster .gute-add_categories,.gute-cluster .gute-add_pages,.gute-cluster .gute-add_posts{padding-top:0!important}.submit{padding:1em 0 1em 0!important;margin:0!important}@media (min-width:800px){.gute-add-cluster{max-width:70%}}.gute-cluster li{list-style:none!important}.gute-cluster input:not([type=checkbox]),.gute-cluster select{width:50%}.gute-cluster .selection{background:#f9f9f9;border:1px solid #ccd0d4;padding:.8rem 1rem .6rem 1rem;margin-bottom:1.2rem;max-height:150px;overflow-y:scroll;box-shadow:0 1px 1px rgba(0,0,0,.04)}.gute-cluster .options .list_options{margin-bottom:1.1rem}.gute-add-categories,.gute-add-pages,.gute-add-posts,.gute-add-tags,.gute-add-search,.gute-add-childpages,.gute-add-cluster3-categories {display:none}.label{margin-top:8px;margin-bottom:4px;display:block}.selection div{margin-bottom:6px}.gute-add_categories .selection input,.gute-add_pages .selection input,.gute-add_posts .selection input{margin-top:2px}.label>span{color: red;}
	
.asap-modal-awesome {
    display: none; 
    position: fixed; 
    z-index: 999999; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
	padding-bottom:2rem;
	margin-top:-2rem;
    overflow: auto; 
    background-color: rgba(0,0,0,0.4);
	-webkit-box-shadow: 0 3px 6px rgba( 0, 0, 0, 0.3 );
    box-shadow: 0 3px 6px rgba( 0, 0, 0, 0.3 );
}

.asap-modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 300px;
	max-height:300px;
	overflow-y:auto;
	position:relative;
}
.asap-modal-content i {
	padding:5px 10px 5px 0;
}
	
.asap-close {
	position:absolute;
	right:0;
	top:0;
	cursor:pointer;
	font-size:18px;
	font-weight:bold;
	padding-right:.5rem;
	color:#333;
	padding-top:.5rem;
}
	
#asap-openModalButton {
	cursor:pointer;		
}
	
#asap-openModalButton:hover {
	text-decoration:underline;
}		
		
		
	</style>
<script>
document.addEventListener("DOMContentLoaded", function(){
    var modal = document.getElementById("asap-modal-awesome");
    var btn = document.getElementById("asap-openModalButton");
    var span = document.getElementById("asap-closeModalButton");

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});


</script>

	<div class="wrap">
   <h1>Shortcodes</h1>
   <div class="gute-cluster">
      <div class="wp-filter">
         <ul class="filter-links">
            <li><a type="button" role="tab" class="gute-cluster-option gute-cluster-option-posts media-menu-item"><?php _e('Buttons', 'asap'); ?></a></li>
            <li><a type="button" role="tab" class="gute-cluster-option gute-cluster-option-pages media-menu-item"><?php _e('Note', 'asap'); ?></a></li>
            <li><a type="button" role="tab" class="gute-cluster-option gute-cluster-option-categories media-menu-item"><?php _e('Comparative', 'asap'); ?></a></li>
            <li><a type="button" role="tab" class="gute-cluster-option gute-cluster-option-tags media-menu-item"><?php _e('Highlight text', 'asap'); ?></a></li>
            <li><a type="button" role="tab" class="gute-cluster-option gute-cluster-option-search media-menu-item"><?php _e('Search engine', 'asap'); ?></a></li>			 
             <li><a type="button" role="tab" class="gute-cluster-option gute-cluster-option-childpages media-menu-item"><?php _e('Child pages', 'asap'); ?></a></li>		
		      <li><a type="button" role="tab" class="gute-cluster-option gute-cluster-option-cluster3-categories media-menu-item"><?php _e('Categories', 'asap'); ?></a></li>			 

		  </ul>
      </div>
      <div class="gute-add-cluster">
         <div class="gute-add-posts gute-cluster-type">
            <div class="list_options"> <span class="label"><?php _e('Button text', 'asap'); ?> <span>* <?php _e('Required', 'asap'); ?></span></span>
               <input id="asap_button_text" type="text" name="asap_button_text" placeholder="<?php _e('Ex: Download now', 'asap'); ?>" style="margin: 2px 0px 10px;" />
            </div>
            <div class="list_options"> <span class="label"><?php _e('Link', 'asap'); ?> <span>* <?php _e('Required', 'asap'); ?></span></span>
               <input type="text" name="asap_button_link" placeholder="<?php _e('Ex: https://demo.asaptheme.com', 'asap'); ?>"  style="margin: 2px 0px 10px;">
            </div>
            <div class="list_options"> <span class="label"><?php _e('Rel Attribute', 'asap'); ?></span>
               <input id="asap_button_attr_rel" type="text" name="asap_button_attr_rel" placeholder="<?php _e('Ex:  nofollow noopener', 'asap'); ?>" style="margin: 2px 0px 10px;" />
            </div>
            <div class="list_options">
               <span class="label"><?php _e('Target', 'asap'); ?></span>
               <select name="asap_button_target" id="asap_button_target"  style="margin: 2px 0px 10px;">
                  <option value="self" selected><?php _e('Open in the same tab', 'asap'); ?></option>
                  <option value="blank"><?php _e('Open in a new tab', 'asap'); ?></option>
               </select>
            </div>
            <div class="list_options"> <span class="label"><?php _e('Background color', 'asap'); ?></span>
               <input id="asap_button_color_background" type="color" name="asap_button_color_background" value="#355070" style="margin: 2px 0px 10px;" />
            </div>
            <div class="list_options"> <span class="label"><?php _e('Text color', 'asap'); ?></span>
               <input id="asap_button_color_text" type="color" name="asap_button_color_text" value="#FFFFFF" style="margin: 2px 0px 10px;" />
            </div>
            <div class="list_options">
               <span class="label"><?php _e('Position', 'asap'); ?></span>
               <select name="asap_button_position" id="asap_button_position" style="margin: 2px 0px 10px;">
                  <option value="left"><?php _e('Left', 'asap'); ?></option>
                  <option value="center" selected><?php _e('Center', 'asap'); ?></option>
                  <option value="right"><?php _e('Right', 'asap'); ?></option>
               </select>
            </div>
            <div class="list_options"> <span class="label"><?php _e('Text size', 'asap'); ?></span>
               <input name="asap_button_size" type="number" min="12" max="40" step="1" style="margin: 2px 0px 10px;">
            </div>
            <div class="list_options"> <span class="label"><?php _e('Margin', 'asap'); ?> <?php _e('(In pixels)', 'asap'); ?></span>
               <input name="asap_button_margin" type="number" min="0" max="40" step="1" style="margin: 2px 0px 10px;">
            </div>
            <div class="list_options"> <span class="label"><?php _e('Padding', 'asap'); ?> <?php _e('(In pixels)', 'asap'); ?></span>
               <input name="asap_button_padding" type="number" min="0" max="40" step="1" style="margin: 2px 0px 10px;">
            </div>
            <div class="list_options"> <span class="label"><?php _e('Border radius', 'asap'); ?> <?php _e('(In pixels)', 'asap'); ?></span>
               <input name="asap_button_radius" type="number" min="0" max="40" step="1" style="margin: 2px 0px 10px;">
            </div>
            <div class="list_options"> <span class="label"><?php _e('Icon', 'asap'); ?> (<a id="asap-openModalButton">Ver disponibles</a>)</span>
               <input id="asap_button_icon" type="text" name="asap_button_icon" placeholder="<?php _e('Ex: fa-download', 'asap'); ?>" style="margin: 2px 0px 10px;" />
            </div>
            <div class="list_options">
               <span class="label"><?php _e('Show container border', 'asap'); ?></span>
               <select name="asap_button_border" id="asap_button_border"  style="margin: 2px 0px 10px;">
                  <option value="0" selected><?php _e('No', 'asap'); ?></option>
                  <option value="1"><?php _e('Yes', 'asap'); ?></option>
               </select>
            </div>
            <div class="options">
               <div class="submit list_options">
                  <button class="button button-primary" id="shortcode-btn-submit-gtnb"><?php _e('Create shortcode', 'asap'); ?> →</button>
               </div>
            </div>
         </div>
         <div class="gute-add-pages gute-cluster-type">
            <div class="list_options"> <span class="label"><?php _e('Background color', 'asap'); ?></span>
               <input id="asap_note_color_background" type="color" name="asap_note_color_background" value="#ffffc1" style="margin: 2px 0px 10px;" />
            </div>
            <div class="list_options"> <span class="label"><?php _e('Text color', 'asap'); ?></span>
               <input id="asap_note_color_text" type="color" name="asap_note_color_text" value="#181818" style="margin: 2px 0px 10px;" />
            </div>
           <div class="list_options"> <span class="label"><?php _e('Text alignment', 'asap'); ?></span>
                        <select name="asap_note_position" id="asap_note_position" style="margin: 2px 0px 10px;">
                            <option value="left" selected><?php _e('Left', 'asap'); ?></option>
                            <option value="center"><?php _e('Center', 'asap'); ?></option>
                            <option value="right"><?php _e('Right', 'asap'); ?></option>
                        </select>
                    </div>        
            <div class="list_options"> <span class="label"><?php _e('Text size', 'asap'); ?> <?php _e('(In pixels)', 'asap'); ?></span>
               <input name="asap_note_size" type="number" min="12" max="40" step="1" style="margin: 2px 0px 10px;">
            </div>
            <div class="list_options"> <span class="label"><?php _e('Margin', 'asap'); ?> <?php _e('(In pixels)', 'asap'); ?></span>
               <input name="asap_note_margin" type="number" min="0" max="40" step="1" style="margin: 2px 0px 10px;">
            </div>
            <div class="list_options"> <span class="label"><?php _e('Padding', 'asap'); ?> <?php _e('(In pixels)', 'asap'); ?></span>
               <input name="asap_note_padding" type="number" min="0" max="40" step="1" style="margin: 2px 0px 10px;">
            </div>
            <div class="list_options"> <span class="label"><?php _e('Border radius', 'asap'); ?> <?php _e('(In pixels)', 'asap'); ?></span>
               <input name="asap_note_radius" type="number" min="0" max="40" step="1" style="margin: 2px 0px 10px;">
            </div>
            <div class="list_options"> <span class="label"><?php _e('Text', 'asap'); ?> <span>* <?php _e('Required', 'asap'); ?></span></span>
               <textarea id="asap_note_text" type="text" name="asap_note_text" style="resize:none; width:100%; max-width:25rem; margin: 2px 0px 10px;" rows="6"></textarea>
            </div>
            <div class="options">
               <div class="submit list_options">
                  <button class="button button-primary" id="shortcode-note-submit-gtnb"><?php _e('Create shortcode', 'asap'); ?> →</button>
               </div>
            </div>
         </div>
         <div class="gute-add-categories gute-cluster-type">
          <div class="list_options"> <span class="label"><?php _e('Show titles', 'asap'); ?></span>
                        <select name="asap_pros_cons_show_title" id="asap_pros_cons_show_title"  style="margin: 2px 0px 10px;">
							<option value="1" selected><?php _e('Yes', 'asap'); ?></option>
                            <option value="0" ><?php _e('No', 'asap'); ?></option>
    
					</select>
                    </div>
            <div class="list_options"> <span class="label"><?php _e('Title text color', 'asap'); ?></span>
               <input id="asap_pros_cons_color_title" type="color" name="asap_pros_cons_color_title" value="#FFFFFF" style="margin: 2px 0px 10px;" />
            </div>
            <div class="list_options"> <span class="label"><?php _e('Background title Advantages', 'asap'); ?></span>
               <input id="asap_pros_color" type="color" name="asap_pros_color" value="#5cac4b" style="margin: 2px 0px 10px;" />
            </div>
            <div class="list_options"><span class="label"><?php _e('Background title Disadvantages', 'asap'); ?></span>
               <input id="asap_cons_color" type="color" name="asap_cons_color" value="#e63334" style="margin: 2px 0px 10px;" />
            </div>
            <div class="list_options"> <span class="label"><?php _e('Advantages Title', 'asap'); ?></span>
               <input id="asap_title_pros" type="text" name="asap_title_pros" placeholder="Ej: Ventajas" style="margin: 2px 0px 10px;" />
            </div>
            <div class="list_options"> <span class="label"><?php _e('Advantages', 'asap'); ?> <span>* <?php _e('Required', 'asap'); ?></span></span>
               <textarea id="asap_text_pros" type="text" name="asap_text_pros" style="resize:none; width:100%; max-width:25rem; margin: 2px 0px 10px;" rows="6" placeholder="<?php _e('Advantage 1&#10;Advantage 2&#10;Advantage 3&#10;', 'asap'); ?>..."></textarea>
            </div>
            <div class="list_options"> <span class="label"><?php _e('Disadvantages Title', 'asap'); ?></span>
               <input id="asap_title_cons" type="text" name="asap_title_cons" placeholder="Ej: Desventajas" style="margin: 2px 0px 10px;" />
            </div>
            <div class="list_options"> <span class="label"><?php _e('Disadvantages', 'asap'); ?> <span>* <?php _e('Required', 'asap'); ?></span></span>
               <textarea id="asap_text_cons" type="text" name="asap_text_cons" style="resize:none; width:100%; max-width:25rem; margin: 2px 0px 10px;" rows="6" placeholder="<?php _e('Disadvantage 1&#10;Disadvantage 2&#10;Disadvantage 3&#10;', 'asap'); ?>..."></textarea>
            </div>
            <div class="options">
               <div class="submit list_options">
                  <button class="button button-primary" id="shortcode-table-submit-gtnb"><?php _e('Create shortcode', 'asap'); ?> →</button>
               </div>
            </div>
         </div>
         <div class="gute-add-tags gute-cluster-type">
            <div class="list_options"> <span class="label"><?php _e('Background color', 'asap'); ?></span>
               <input id="asap_color_highlight_bg" type="color" name="asap_color_highlight_bg" value="#ffffc1" style="margin: 2px 0px 10px;" />
            </div>
            <div class="list_options"> <span class="label"><?php _e('Text color', 'asap'); ?></span>
               <input id="asap_color_highlight_text" type="color" name="asap_color_highlight_text" value="#181818" style="margin: 2px 0px 10px;" />
            </div>
            <div class="list_options"> <span class="label"><?php _e('Text', 'asap'); ?> <span>* <?php _e('Required', 'asap'); ?></span></span>
               <textarea id="asap_text_highlight" type="text" name="asap_text_highlight" style="resize:none; width:100%; max-width:25rem; margin: 2px 0px 10px;" rows="6"></textarea>
            </div>
            <div class="options">
               <div class="submit list_options">
                  <button class="button button-primary" id="shortcode-highlight-submit-gtnb"><?php _e('Create shortcode', 'asap'); ?> →</button>
               </div>
            </div>
         </div>
		  <div class="gute-add-search gute-cluster-type">
            <div class="list_options">
              <p>
				  <?php _e('With this shortcode you can insert a search engine in the middle of any post or page.', 'asap'); ?>
				</p>
            </div>
            <div class="options">
               <div class="submit list_options">
                  <button class="button button-primary" id="shortcode-search-submit-gtnb"><?php _e('Create shortcode', 'asap'); ?> →</button>
               </div>
            </div>
         </div>
	  <div class="gute-add-childpages gute-cluster-type">
            <div class="list_options">
              <p>
				  <?php _e('With this shortcode you can insert a cluster to display the child pages of the page you are editing.', 'asap'); ?>
				</p>
            </div>
            <div class="options">
               <div class="submit list_options">
                  <button class="button button-primary" id="shortcode-childpages-submit-gtnb"><?php _e('Create shortcode', 'asap'); ?> →</button>
               </div>
            </div>
         </div>
		  
 		 <div class="gute-add-cluster3-categories gute-cluster-type">
         
			<div class="list_options"> 
						<div class="selection">
							<?php $categories = get_categories(); foreach( $categories as $category ) { ?>
							<div>
								<input id="cate2_<?php echo $category->cat_ID; ?>" type="checkbox" name="checkfield[]" value="<?php echo $category->cat_ID; ?>" />
								<label for="cate2_<?php echo $category->cat_ID; ?>">
									<?php echo $category->name ?>
								</label>
							</div>
							<?php } ?>
						</div>
					</div>
					
					<div class="list_options"> <span class="label"><?php _e('Columns', 'asap'); ?></span>
						<select name="asap_cluster3_order" id="asap_cluster3_order">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4" selected>4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>

						</select>
					</div>
				
					<div class="list_options"> <span class="label"><?php _e('Font size', 'asap'); ?></span>
						<input name="asap_cluster3_showpost" type="number" min="14" value="30" step="1" placeholder="<?php _e('Default: 17', 'asap'); ?>" style="margin: 2px 0px 10px;" >
					</div>
					
                     <div class="list_options"> <span class="label"><?php _e('Background color', 'asap'); ?></span>
                        <input id="asap_cluster3_color_bg" type="color" name="asap_cluster3_color_bg" value="#EEEEEE" style="margin: 2px 0px 10px;" />
                    </div>
			
                     <div class="list_options"> <span class="label"><?php _e('Text color', 'asap'); ?></span>
                        <input id="asap_cluster3_color_text" type="color" name="asap_cluster3_color_text" value="#181818" style="margin: 2px 0px 10px;" />
                    </div>	
					
                     <div class="list_options"> <span class="label"><?php _e('Stars color', 'asap'); ?></span>
                        <input id="asap_cluster3_color_stars" type="color" name="asap_cluster3_color_stars" value="#f2b01e" style="margin: 2px 0px 10px;" />
                    </div>

	            
					<div class="list_options"> <span class="label"><?php _e('Show icon', 'asap'); ?></span>
                        <select name="asap_cluster3_show_icon" id="asap_cluster3_show_icon" style="margin: 2px 0px 10px;">
                            <option value="no" ><?php _e('No', 'asap'); ?></option>
                            <option value="yes"  selected><?php _e('Yes', 'asap'); ?></option>
                        </select>
                    </div>      
					
					
					<div class="list_options"> <span class="label"><?php _e('Show stars', 'asap'); ?></span>
                        <select name="asap_cluster3_show_stars" id="asap_cluster3_show_stars" style="margin: 2px 0px 10px;">
                            <option value="no" selected><?php _e('No', 'asap'); ?></option>
                            <option value="yes" ><?php _e('Yes', 'asap'); ?></option>
                        </select>
                    </div>       
			 
			 
            <div class="options">
               <div class="submit list_options">
                  <button class="button button-primary" id="shortcode-cluster3-submit-gtnb"><?php _e('Create shortcode', 'asap'); ?> →</button>
               </div>
            </div>
			 
         </div>
		
		  <div id="asap-modal-awesome" class="asap-modal-awesome">
				<div class="asap-modal-content">
					<span id="asap-closeModalButton" class="asap-close">&times;</span>
							<i class="fa fa-ad"></i>fa-ad<br>
							<i class="fa fa-address-book"></i>fa-address-book<br>
							<i class="fa fa-address-card"></i>fa-address-card<br>
							<i class="fa fa-adjust"></i>fa-adjust<br>
							<i class="fa fa-air-freshener"></i>fa-air-freshener<br>
							<i class="fa fa-align-center"></i>fa-align-center<br>
							<i class="fa fa-align-justify"></i>fa-align-justify<br>
							<i class="fa fa-align-left"></i>fa-align-left<br>
							<i class="fa fa-align-right"></i>fa-align-right<br>
							<i class="fa fa-allergies"></i>fa-allergies<br>
							<i class="fa fa-ambulance"></i>fa-ambulance<br>
							<i class="fa fa-american-sign-language-interpreting"></i>fa-american-sign-language-interpreting<br>
							<i class="fa fa-anchor"></i>fa-anchor<br>
							<i class="fa fa-angle-double-down"></i>fa-angle-double-down<br>
							<i class="fa fa-angle-double-left"></i>fa-angle-double-left<br>
							<i class="fa fa-angle-double-right"></i>fa-angle-double-right<br>
							<i class="fa fa-angle-double-up"></i>fa-angle-double-up<br>
							<i class="fa fa-angle-down"></i>fa-angle-down<br>
							<i class="fa fa-angle-left"></i>fa-angle-left<br>
							<i class="fa fa-angle-right"></i>fa-angle-right<br>
							<i class="fa fa-angle-up"></i>fa-angle-up<br>
							<i class="fa fa-angry"></i>fa-angry<br>
							<i class="fa fa-ankh"></i>fa-ankh<br>
							<i class="fa fa-apple-alt"></i>fa-apple-alt<br>
							<i class="fa fa-archive"></i>fa-archive<br>
							<i class="fa fa-archway"></i>fa-archway<br>
							<i class="fa fa-arrow-alt-circle-down"></i>fa-arrow-alt-circle-down<br>
							<i class="fa fa-arrow-alt-circle-left"></i>fa-arrow-alt-circle-left<br>
							<i class="fa fa-arrow-alt-circle-right"></i>fa-arrow-alt-circle-right<br>
							<i class="fa fa-arrow-alt-circle-up"></i>fa-arrow-alt-circle-up<br>
							<i class="fa fa-arrow-circle-down"></i>fa-arrow-circle-down<br>
							<i class="fa fa-arrow-circle-left"></i>fa-arrow-circle-left<br>
							<i class="fa fa-arrow-circle-right"></i>fa-arrow-circle-right<br>
							<i class="fa fa-arrow-circle-up"></i>fa-arrow-circle-up<br>
							<i class="fa fa-arrow-down"></i>fa-arrow-down<br>
							<i class="fa fa-arrow-left"></i>fa-arrow-left<br>
							<i class="fa fa-arrow-right"></i>fa-arrow-right<br>
							<i class="fa fa-arrow-up"></i>fa-arrow-up<br>
							<i class="fa fa-arrows-alt"></i>fa-arrows-alt<br>
							<i class="fa fa-arrows-alt-h"></i>fa-arrows-alt-h<br>
							<i class="fa fa-arrows-alt-v"></i>fa-arrows-alt-v<br>
							<i class="fa fa-assistive-listening-systems"></i>fa-assistive-listening-systems<br>
							<i class="fa fa-asterisk"></i>fa-asterisk<br>
							<i class="fa fa-at"></i>fa-at<br>
							<i class="fa fa-atlas"></i>fa-atlas<br>
							<i class="fa fa-atom"></i>fa-atom<br>
							<i class="fa fa-audio-description"></i>fa-audio-description<br>
							<i class="fa fa-award"></i>fa-award<br>
							<i class="fa fa-baby"></i>fa-baby<br>
							<i class="fa fa-baby-carriage"></i>fa-baby-carriage<br>
							<i class="fa fa-backspace"></i>fa-backspace<br>
							<i class="fa fa-backward"></i>fa-backward<br>
							<i class="fa fa-bacon"></i>fa-bacon<br>
							<i class="fa fa-bacteria"></i>fa-bacteria<br>
							<i class="fa fa-bacterium"></i>fa-bacterium<br>
							<i class="fa fa-bahai"></i>fa-bahai<br>
							<i class="fa fa-balance-scale"></i>fa-balance-scale<br>
							<i class="fa fa-balance-scale-left"></i>fa-balance-scale-left<br>
							<i class="fa fa-balance-scale-right"></i>fa-balance-scale-right<br>
							<i class="fa fa-ban"></i>fa-ban<br>
							<i class="fa fa-band-aid"></i>fa-band-aid<br>
							<i class="fa fa-barcode"></i>fa-barcode<br>
							<i class="fa fa-bars"></i>fa-bars<br>
							<i class="fa fa-baseball-ball"></i>fa-baseball-ball<br>
							<i class="fa fa-basketball-ball"></i>fa-basketball-ball<br>
							<i class="fa fa-bath"></i>fa-bath<br>
							<i class="fa fa-battery-empty"></i>fa-battery-empty<br>
							<i class="fa fa-battery-full"></i>fa-battery-full<br>
							<i class="fa fa-battery-half"></i>fa-battery-half<br>
							<i class="fa fa-battery-quarter"></i>fa-battery-quarter<br>
							<i class="fa fa-battery-three-quarters"></i>fa-battery-three-quarters<br>
							<i class="fa fa-bed"></i>fa-bed<br>
							<i class="fa fa-beer"></i>fa-beer<br>
							<i class="fa fa-bell"></i>fa-bell<br>
							<i class="fa fa-bell-slash"></i>fa-bell-slash<br>
							<i class="fa fa-bezier-curve"></i>fa-bezier-curve<br>
							<i class="fa fa-bible"></i>fa-bible<br>
							<i class="fa fa-bicycle"></i>fa-bicycle<br>
							<i class="fa fa-biking"></i>fa-biking<br>
							<i class="fa fa-binoculars"></i>fa-binoculars<br>
							<i class="fa fa-biohazard"></i>fa-biohazard<br>
							<i class="fa fa-birthday-cake"></i>fa-birthday-cake<br>
							<i class="fa fa-blender"></i>fa-blender<br>
							<i class="fa fa-blender-phone"></i>fa-blender-phone<br>
							<i class="fa fa-blind"></i>fa-blind<br>
							<i class="fa fa-blog"></i>fa-blog<br>
							<i class="fa fa-bold"></i>fa-bold<br>
							<i class="fa fa-bolt"></i>fa-bolt<br>
							<i class="fa fa-bomb"></i>fa-bomb<br>
							<i class="fa fa-bone"></i>fa-bone<br>
							<i class="fa fa-bong"></i>fa-bong<br>
							<i class="fa fa-book"></i>fa-book<br>
							<i class="fa fa-book-dead"></i>fa-book-dead<br>
							<i class="fa fa-book-medical"></i>fa-book-medical<br>
							<i class="fa fa-book-open"></i>fa-book-open<br>
							<i class="fa fa-book-reader"></i>fa-book-reader<br>
							<i class="fa fa-bookmark"></i>fa-bookmark<br>
							<i class="fa fa-border-all"></i>fa-border-all<br>
							<i class="fa fa-border-none"></i>fa-border-none<br>
							<i class="fa fa-border-style"></i>fa-border-style<br>
							<i class="fa fa-bowling-ball"></i>fa-bowling-ball<br>
							<i class="fa fa-box"></i>fa-box<br>
							<i class="fa fa-box-open"></i>fa-box-open<br>
							<i class="fa fa-box-tissue"></i>fa-box-tissue<br>
							<i class="fa fa-boxes"></i>fa-boxes<br>
							<i class="fa fa-braille"></i>fa-braille<br>
							<i class="fa fa-brain"></i>fa-brain<br>
							<i class="fa fa-bread-slice"></i>fa-bread-slice<br>
							<i class="fa fa-briefcase"></i>fa-briefcase<br>
							<i class="fa fa-briefcase-medical"></i>fa-briefcase-medical<br>
							<i class="fa fa-broadcast-tower"></i>fa-broadcast-tower<br>
							<i class="fa fa-broom"></i>fa-broom<br>
							<i class="fa fa-brush"></i>fa-brush<br>
							<i class="fa fa-bug"></i>fa-bug<br>
							<i class="fa fa-building"></i>fa-building<br>
							<i class="fa fa-bullhorn"></i>fa-bullhorn<br>
							<i class="fa fa-bullseye"></i>fa-bullseye<br>
							<i class="fa fa-burn"></i>fa-burn<br>
							<i class="fa fa-bus"></i>fa-bus<br>
							<i class="fa fa-bus-alt"></i>fa-bus-alt<br>
							<i class="fa fa-business-time"></i>fa-business-time<br>
							<i class="fa fa-calculator"></i>fa-calculator<br>
							<i class="fa fa-calendar"></i>fa-calendar<br>
							<i class="fa fa-calendar-alt"></i>fa-calendar-alt<br>
							<i class="fa fa-calendar-check"></i>fa-calendar-check<br>
							<i class="fa fa-calendar-day"></i>fa-calendar-day<br>
							<i class="fa fa-calendar-minus"></i>fa-calendar-minus<br>
							<i class="fa fa-calendar-plus"></i>fa-calendar-plus<br>
							<i class="fa fa-calendar-times"></i>fa-calendar-times<br>
							<i class="fa fa-calendar-week"></i>fa-calendar-week<br>
							<i class="fa fa-camera"></i>fa-camera<br>
							<i class="fa fa-camera-retro"></i>fa-camera-retro<br>
							<i class="fa fa-campground"></i>fa-campground<br>
							<i class="fa fa-candy-cane"></i>fa-candy-cane<br>
							<i class="fa fa-cannabis"></i>fa-cannabis<br>
							<i class="fa fa-capsules"></i>fa-capsules<br>
							<i class="fa fa-car"></i>fa-car<br>
							<i class="fa fa-car-alt"></i>fa-car-alt<br>
							<i class="fa fa-car-battery"></i>fa-car-battery<br>
							<i class="fa fa-car-crash"></i>fa-car-crash<br>
							<i class="fa fa-car-side"></i>fa-car-side<br>
							<i class="fa fa-caravan"></i>fa-caravan<br>
							<i class="fa fa-caret-down"></i>fa-caret-down<br>
							<i class="fa fa-caret-left"></i>fa-caret-left<br>
							<i class="fa fa-caret-right"></i>fa-caret-right<br>
							<i class="fa fa-caret-square-down"></i>fa-caret-square-down<br>
							<i class="fa fa-caret-square-left"></i>fa-caret-square-left<br>
							<i class="fa fa-caret-square-right"></i>fa-caret-square-right<br>
							<i class="fa fa-caret-square-up"></i>fa-caret-square-up<br>
							<i class="fa fa-caret-up"></i>fa-caret-up<br>
							<i class="fa fa-carrot"></i>fa-carrot<br>
							<i class="fa fa-cart-arrow-down"></i>fa-cart-arrow-down<br>
							<i class="fa fa-cart-plus"></i>fa-cart-plus<br>
							<i class="fa fa-cash-register"></i>fa-cash-register<br>
							<i class="fa fa-cat"></i>fa-cat<br>
							<i class="fa fa-certificate"></i>fa-certificate<br>
							<i class="fa fa-chair"></i>fa-chair<br>
							<i class="fa fa-chalkboard"></i>fa-chalkboard<br>
							<i class="fa fa-chalkboard-teacher"></i>fa-chalkboard-teacher<br>
							<i class="fa fa-charging-station"></i>fa-charging-station<br>
							<i class="fa fa-chart-area"></i>fa-chart-area<br>
							<i class="fa fa-chart-bar"></i>fa-chart-bar<br>
							<i class="fa fa-chart-line"></i>fa-chart-line<br>
							<i class="fa fa-chart-pie"></i>fa-chart-pie<br>
							<i class="fa fa-check"></i>fa-check<br>
							<i class="fa fa-check-circle"></i>fa-check-circle<br>
							<i class="fa fa-check-double"></i>fa-check-double<br>
							<i class="fa fa-check-square"></i>fa-check-square<br>
							<i class="fa fa-cheese"></i>fa-cheese<br>
							<i class="fa fa-chess"></i>fa-chess<br>
							<i class="fa fa-chess-bishop"></i>fa-chess-bishop<br>
							<i class="fa fa-chess-board"></i>fa-chess-board<br>
							<i class="fa fa-chess-king"></i>fa-chess-king<br>
							<i class="fa fa-chess-knight"></i>fa-chess-knight<br>
							<i class="fa fa-chess-pawn"></i>fa-chess-pawn<br>
							<i class="fa fa-chess-queen"></i>fa-chess-queen<br>
							<i class="fa fa-chess-rook"></i>fa-chess-rook<br>
							<i class="fa fa-chevron-circle-down"></i>fa-chevron-circle-down<br>
							<i class="fa fa-chevron-circle-left"></i>fa-chevron-circle-left<br>
							<i class="fa fa-chevron-circle-right"></i>fa-chevron-circle-right<br>
							<i class="fa fa-chevron-circle-up"></i>fa-chevron-circle-up<br>
							<i class="fa fa-chevron-down"></i>fa-chevron-down<br>
							<i class="fa fa-chevron-left"></i>fa-chevron-left<br>
							<i class="fa fa-chevron-right"></i>fa-chevron-right<br>
							<i class="fa fa-chevron-up"></i>fa-chevron-up<br>
							<i class="fa fa-child"></i>fa-child<br>
							<i class="fa fa-church"></i>fa-church<br>
							<i class="fa fa-circle"></i>fa-circle<br>
							<i class="fa fa-circle-notch"></i>fa-circle-notch<br>
							<i class="fa fa-city"></i>fa-city<br>
							<i class="fa fa-clinic-medical"></i>fa-clinic-medical<br>
							<i class="fa fa-clipboard"></i>fa-clipboard<br>
							<i class="fa fa-clipboard-check"></i>fa-clipboard-check<br>
							<i class="fa fa-clipboard-list"></i>fa-clipboard-list<br>
							<i class="fa fa-clock"></i>fa-clock<br>
							<i class="fa fa-clone"></i>fa-clone<br>
							<i class="fa fa-closed-captioning"></i>fa-closed-captioning<br>
							<i class="fa fa-cloud"></i>fa-cloud<br>
							<i class="fa fa-cloud-download-alt"></i>fa-cloud-download-alt<br>
							<i class="fa fa-cloud-meatball"></i>fa-cloud-meatball<br>
							<i class="fa fa-cloud-moon"></i>fa-cloud-moon<br>
							<i class="fa fa-cloud-moon-rain"></i>fa-cloud-moon-rain<br>
							<i class="fa fa-cloud-rain"></i>fa-cloud-rain<br>
							<i class="fa fa-cloud-showers-heavy"></i>fa-cloud-showers-heavy<br>
							<i class="fa fa-cloud-sun"></i>fa-cloud-sun<br>
							<i class="fa fa-cloud-sun-rain"></i>fa-cloud-sun-rain<br>
							<i class="fa fa-cloud-upload-alt"></i>fa-cloud-upload-alt<br>
							<i class="fa fa-cocktail"></i>fa-cocktail<br>
							<i class="fa fa-code"></i>fa-code<br>
							<i class="fa fa-code-branch"></i>fa-code-branch<br>
							<i class="fa fa-coffee"></i>fa-coffee<br>
							<i class="fa fa-cog"></i>fa-cog<br>
							<i class="fa fa-cogs"></i>fa-cogs<br>
							<i class="fa fa-coins"></i>fa-coins<br>
							<i class="fa fa-columns"></i>fa-columns<br>
							<i class="fa fa-comment"></i>fa-comment<br>
							<i class="fa fa-comment-alt"></i>fa-comment-alt<br>
							<i class="fa fa-comment-dollar"></i>fa-comment-dollar<br>
							<i class="fa fa-comment-dots"></i>fa-comment-dots<br>
							<i class="fa fa-comment-medical"></i>fa-comment-medical<br>
							<i class="fa fa-comment-slash"></i>fa-comment-slash<br>
							<i class="fa fa-comments"></i>fa-comments<br>
							<i class="fa fa-comments-dollar"></i>fa-comments-dollar<br>
							<i class="fa fa-compact-disc"></i>fa-compact-disc<br>
							<i class="fa fa-compass"></i>fa-compass<br>
							<i class="fa fa-compress"></i>fa-compress<br>
							<i class="fa fa-compress-alt"></i>fa-compress-alt<br>
							<i class="fa fa-compress-arrows-alt"></i>fa-compress-arrows-alt<br>
							<i class="fa fa-concierge-bell"></i>fa-concierge-bell<br>
							<i class="fa fa-cookie"></i>fa-cookie<br>
							<i class="fa fa-cookie-bite"></i>fa-cookie-bite<br>
							<i class="fa fa-copy"></i>fa-copy<br>
							<i class="fa fa-copyright"></i>fa-copyright<br>
							<i class="fa fa-couch"></i>fa-couch<br>
							<i class="fa fa-credit-card"></i>fa-credit-card<br>
							<i class="fa fa-crop"></i>fa-crop<br>
							<i class="fa fa-crop-alt"></i>fa-crop-alt<br>
							<i class="fa fa-cross"></i>fa-cross<br>
							<i class="fa fa-crosshairs"></i>fa-crosshairs<br>
							<i class="fa fa-crow"></i>fa-crow<br>
							<i class="fa fa-crown"></i>fa-crown<br>
							<i class="fa fa-crutch"></i>fa-crutch<br>
							<i class="fa fa-cube"></i>fa-cube<br>
							<i class="fa fa-cubes"></i>fa-cubes<br>
							<i class="fa fa-cut"></i>fa-cut<br>
							<i class="fa fa-database"></i>fa-database<br>
							<i class="fa fa-deaf"></i>fa-deaf<br>
							<i class="fa fa-democrat"></i>fa-democrat<br>
							<i class="fa fa-desktop"></i>fa-desktop<br>
							<i class="fa fa-dharmachakra"></i>fa-dharmachakra<br>
							<i class="fa fa-diagnoses"></i>fa-diagnoses<br>
							<i class="fa fa-dice"></i>fa-dice<br>
							<i class="fa fa-dice-d20"></i>fa-dice-d20<br>
							<i class="fa fa-dice-d6"></i>fa-dice-d6<br>
							<i class="fa fa-dice-five"></i>fa-dice-five<br>
							<i class="fa fa-dice-four"></i>fa-dice-four<br>
							<i class="fa fa-dice-one"></i>fa-dice-one<br>
							<i class="fa fa-dice-six"></i>fa-dice-six<br>
							<i class="fa fa-dice-three"></i>fa-dice-three<br>
							<i class="fa fa-dice-two"></i>fa-dice-two<br>
							<i class="fa fa-digital-tachograph"></i>fa-digital-tachograph<br>
							<i class="fa fa-directions"></i>fa-directions<br>
							<i class="fa fa-divide"></i>fa-divide<br>
							<i class="fa fa-dizzy"></i>fa-dizzy<br>
							<i class="fa fa-dna"></i>fa-dna<br>
							<i class="fa fa-dog"></i>fa-dog<br>
							<i class="fa fa-dollar-sign"></i>fa-dollar-sign<br>
							<i class="fa fa-dolly"></i>fa-dolly<br>
							<i class="fa fa-dolly-flatbed"></i>fa-dolly-flatbed<br>
							<i class="fa fa-donate"></i>fa-donate<br>
							<i class="fa fa-door-closed"></i>fa-door-closed<br>
							<i class="fa fa-door-open"></i>fa-door-open<br>
							<i class="fa fa-dot-circle"></i>fa-dot-circle<br>
							<i class="fa fa-dove"></i>fa-dove<br>
							<i class="fa fa-download"></i>fa-download<br>
							<i class="fa fa-drafting-compass"></i>fa-drafting-compass<br>
							<i class="fa fa-dragon"></i>fa-dragon<br>
							<i class="fa fa-draw-polygon"></i>fa-draw-polygon<br>
							<i class="fa fa-drum"></i>fa-drum<br>
							<i class="fa fa-drum-steelpan"></i>fa-drum-steelpan<br>
							<i class="fa fa-drumstick-bite"></i>fa-drumstick-bite<br>
							<i class="fa fa-dumbbell"></i>fa-dumbbell<br>
							<i class="fa fa-dumpster"></i>fa-dumpster<br>
							<i class="fa fa-dumpster-fire"></i>fa-dumpster-fire<br>
							<i class="fa fa-dungeon"></i>fa-dungeon<br>
							<i class="fa fa-edit"></i>fa-edit<br>
							<i class="fa fa-egg"></i>fa-egg<br>
							<i class="fa fa-eject"></i>fa-eject<br>
							<i class="fa fa-ellipsis-v"></i>fa-ellipsis-v<br>
							<i class="fa fa-envelope"></i>fa-envelope<br>
							<i class="fa fa-envelope-open"></i>fa-envelope-open<br>
							<i class="fa fa-envelope-open-text"></i>fa-envelope-open-text<br>
							<i class="fa fa-envelope-square"></i>fa-envelope-square<br>
							<i class="fa fa-equals"></i>fa-equals<br>
							<i class="fa fa-eraser"></i>fa-eraser<br>
							<i class="fa fa-ethernet"></i>fa-ethernet<br>
							<i class="fa fa-euro-sign"></i>fa-euro-sign<br>
							<i class="fa fa-exchange-alt"></i>fa-exchange-alt<br>
							<i class="fa fa-exclamation"></i>fa-exclamation<br>
							<i class="fa fa-exclamation-circle"></i>fa-exclamation-circle<br>
							<i class="fa fa-exclamation-triangle"></i>fa-exclamation-triangle<br>
							<i class="fa fa-expand"></i>fa-expand<br>
							<i class="fa fa-expand-alt"></i>fa-expand-alt<br>
							<i class="fa fa-expand-arrows-alt"></i>fa-expand-arrows-alt<br>
							<i class="fa fa-external-link-alt"></i>fa-external-link-alt<br>
							<i class="fa fa-external-link-square-alt"></i>fa-external-link-square-alt<br>
							<i class="fa fa-eye"></i>fa-eye<br>
							<i class="fa fa-eye-dropper"></i>fa-eye-dropper<br>
							<i class="fa fa-eye-slash"></i>fa-eye-slash<br>
							<i class="fa fa-fan"></i>fa-fan<br>
							<i class="fa fa-fast-backward"></i>fa-fast-backward<br>
							<i class="fa fa-fast-forward"></i>fa-fast-forward<br>
							<i class="fa fa-faucet"></i>fa-faucet<br>
							<i class="fa fa-fax"></i>fa-fax<br>
							<i class="fa fa-feather"></i>fa-feather<br>
							<i class="fa fa-feather-alt"></i>fa-feather-alt<br>
							<i class="fa fa-female"></i>fa-female<br>
							<i class="fa fa-fighter-jet"></i>fa-fighter-jet<br>
							<i class="fa fa-file"></i>fa-file<br>
							<i class="fa fa-file-alt"></i>fa-file-alt<br>
							<i class="fa fa-file-archive"></i>fa-file-archive<br>
							<i class="fa fa-file-audio"></i>fa-file-audio<br>
							<i class="fa fa-file-code"></i>fa-file-code<br>
							<i class="fa fa-file-contract"></i>fa-file-contract<br>
							<i class="fa fa-file-csv"></i>fa-file-csv<br>
							<i class="fa fa-file-download"></i>fa-file-download<br>
							<i class="fa fa-file-excel"></i>fa-file-excel<br>
							<i class="fa fa-file-export"></i>fa-file-export<br>
							<i class="fa fa-file-image"></i>fa-file-image<br>
							<i class="fa fa-file-import"></i>fa-file-import<br>
							<i class="fa fa-file-invoice"></i>fa-file-invoice<br>
							<i class="fa fa-file-invoice-dollar"></i>fa-file-invoice-dollar<br>
							<i class="fa fa-file-medical"></i>fa-file-medical<br>
							<i class="fa fa-file-medical-alt"></i>fa-file-medical-alt<br>
							<i class="fa fa-file-pdf"></i>fa-file-pdf<br>
							<i class="fa fa-file-powerpoint"></i>fa-file-powerpoint<br>
							<i class="fa fa-file-prescription"></i>fa-file-prescription<br>
							<i class="fa fa-file-signature"></i>fa-file-signature<br>
							<i class="fa fa-file-upload"></i>fa-file-upload<br>
							<i class="fa fa-file-video"></i>fa-file-video<br>
							<i class="fa fa-file-word"></i>fa-file-word<br>
							<i class="fa fa-fill"></i>fa-fill<br>
							<i class="fa fa-fill-drip"></i>fa-fill-drip<br>
							<i class="fa fa-film"></i>fa-film<br>
							<i class="fa fa-filter"></i>fa-filter<br>
							<i class="fa fa-fingerprint"></i>fa-fingerprint<br>
							<i class="fa fa-fire"></i>fa-fire<br>
							<i class="fa fa-fire-alt"></i>fa-fire-alt<br>
							<i class="fa fa-fire-extinguisher"></i>fa-fire-extinguisher<br>
							<i class="fa fa-firefox-browser"></i>fa-firefox-browser<br>
							<i class="fa fa-first-aid"></i>fa-first-aid<br>
							<i class="fa fa-fish"></i>fa-fish<br>
							<i class="fa fa-fist-raised"></i>fa-fist-raised<br>
							<i class="fa fa-flag"></i>fa-flag<br>
							<i class="fa fa-flag-checkered"></i>fa-flag-checkered<br>
							<i class="fa fa-flag-usa"></i>fa-flag-usa<br>
							<i class="fa fa-flask"></i>fa-flask<br>
							<i class="fa fa-flushed"></i>fa-flushed<br>
							<i class="fa fa-folder"></i>fa-folder<br>
							<i class="fa fa-folder-minus"></i>fa-folder-minus<br>
							<i class="fa fa-folder-open"></i>fa-folder-open<br>
							<i class="fa fa-folder-plus"></i>fa-folder-plus<br>
							<i class="fa fa-font"></i>fa-font<br>
							<i class="fa fa-football-ball"></i>fa-football-ball<br>
							<i class="fa fa-forward"></i>fa-forward<br>
							<i class="fa fa-frog"></i>fa-frog<br>
							<i class="fa fa-frown"></i>fa-frown<br>
							<i class="fa fa-frown-open"></i>fa-frown-open<br>
							<i class="fa fa-funnel-dollar"></i>fa-funnel-dollar<br>
							<i class="fa fa-futbol"></i>fa-futbol<br>
							<i class="fa fa-gamepad"></i>fa-gamepad<br>
							<i class="fa fa-gas-pump"></i>fa-gas-pump<br>
							<i class="fa fa-gavel"></i>fa-gavel<br>
							<i class="fa fa-gem"></i>fa-gem<br>
							<i class="fa fa-genderless"></i>fa-genderless<br>
							<i class="fa fa-ghost"></i>fa-ghost<br>
							<i class="fa fa-gitter"></i>fa-gitter<br>
							<i class="fa fa-glass-cheers"></i>fa-glass-cheers<br>
							<i class="fa fa-glass-martini"></i>fa-glass-martini<br>
							<i class="fa fa-glass-martini-alt"></i>fa-glass-martini-alt<br>
							<i class="fa fa-glass-whiskey"></i>fa-glass-whiskey<br>
							<i class="fa fa-glasses"></i>fa-glasses<br>
							<i class="fa fa-globe"></i>fa-globe<br>
							<i class="fa fa-globe-africa"></i>fa-globe-africa<br>
							<i class="fa fa-globe-americas"></i>fa-globe-americas<br>
							<i class="fa fa-globe-asia"></i>fa-globe-asia<br>
							<i class="fa fa-globe-europe"></i>fa-globe-europe<br>
							<i class="fa fa-golf-ball"></i>fa-golf-ball<br>
							<i class="fa fa-gopuram"></i>fa-gopuram<br>
							<i class="fa fa-graduation-cap"></i>fa-graduation-cap<br>
							<i class="fa fa-greater-than"></i>fa-greater-than<br>
							<i class="fa fa-greater-than-equal"></i>fa-greater-than-equal<br>
							<i class="fa fa-grimace"></i>fa-grimace<br>
							<i class="fa fa-grin"></i>fa-grin<br>
							<i class="fa fa-grin-alt"></i>fa-grin-alt<br>
							<i class="fa fa-grin-beam"></i>fa-grin-beam<br>
							<i class="fa fa-grin-beam-sweat"></i>fa-grin-beam-sweat<br>
							<i class="fa fa-grin-hearts"></i>fa-grin-hearts<br>
							<i class="fa fa-grin-squint"></i>fa-grin-squint<br>
							<i class="fa fa-grin-squint-tears"></i>fa-grin-squint-tears<br>
							<i class="fa fa-grin-stars"></i>fa-grin-stars<br>
							<i class="fa fa-grin-tears"></i>fa-grin-tears<br>
							<i class="fa fa-grin-tongue"></i>fa-grin-tongue<br>
							<i class="fa fa-grin-tongue-squint"></i>fa-grin-tongue-squint<br>
							<i class="fa fa-grin-tongue-wink"></i>fa-grin-tongue-wink<br>
							<i class="fa fa-grin-wink"></i>fa-grin-wink<br>
							<i class="fa fa-grip-horizontal"></i>fa-grip-horizontal<br>
							<i class="fa fa-grip-lines"></i>fa-grip-lines<br>
							<i class="fa fa-grip-lines-vertical"></i>fa-grip-lines-vertical<br>
							<i class="fa fa-grip-vertical"></i>fa-grip-vertical<br>
							<i class="fa fa-guitar"></i>fa-guitar<br>
							<i class="fa fa-h-square"></i>fa-h-square<br>
							<i class="fa fa-hamburger"></i>fa-hamburger<br>
							<i class="fa fa-hammer"></i>fa-hammer<br>
							<i class="fa fa-hamsa"></i>fa-hamsa<br>
							<i class="fa fa-hand-holding"></i>fa-hand-holding<br>
							<i class="fa fa-hand-holding-heart"></i>fa-hand-holding-heart<br>
							<i class="fa fa-hand-holding-medical"></i>fa-hand-holding-medical<br>
							<i class="fa fa-hand-holding-usd"></i>fa-hand-holding-usd<br>
							<i class="fa fa-hand-holding-water"></i>fa-hand-holding-water<br>
							<i class="fa fa-hand-lizard"></i>fa-hand-lizard<br>
							<i class="fa fa-hand-middle-finger"></i>fa-hand-middle-finger<br>
							<i class="fa fa-hand-paper"></i>fa-hand-paper<br>
							<i class="fa fa-hand-peace"></i>fa-hand-peace<br>
							<i class="fa fa-hand-point-down"></i>fa-hand-point-down<br>
							<i class="fa fa-hand-point-left"></i>fa-hand-point-left<br>
							<i class="fa fa-hand-point-right"></i>fa-hand-point-right<br>
							<i class="fa fa-hand-point-up"></i>fa-hand-point-up<br>
							<i class="fa fa-hand-pointer"></i>fa-hand-pointer<br>
							<i class="fa fa-hand-rock"></i>fa-hand-rock<br>
							<i class="fa fa-hand-scissors"></i>fa-hand-scissors<br>
							<i class="fa fa-hand-sparkles"></i>fa-hand-sparkles<br>
							<i class="fa fa-hand-spock"></i>fa-hand-spock<br>
							<i class="fa fa-hands"></i>fa-hands<br>
							<i class="fa fa-hands-helping"></i>fa-hands-helping<br>
							<i class="fa fa-hands-wash"></i>fa-hands-wash<br>
							<i class="fa fa-handshake"></i>fa-handshake<br>
							<i class="fa fa-handshake-alt-slash"></i>fa-handshake-alt-slash<br>
							<i class="fa fa-handshake-slash"></i>fa-handshake-slash<br>
							<i class="fa fa-hanukiah"></i>fa-hanukiah<br>
							<i class="fa fa-hard-hat"></i>fa-hard-hat<br>
							<i class="fa fa-hashtag"></i>fa-hashtag<br>
							<i class="fa fa-hat-cowboy"></i>fa-hat-cowboy<br>
							<i class="fa fa-hat-cowboy-side"></i>fa-hat-cowboy-side<br>
							<i class="fa fa-hat-wizard"></i>fa-hat-wizard<br>
							<i class="fa fa-hdd"></i>fa-hdd<br>
							<i class="fa fa-head-side-cough"></i>fa-head-side-cough<br>
							<i class="fa fa-head-side-cough-slash"></i>fa-head-side-cough-slash<br>
							<i class="fa fa-head-side-mask"></i>fa-head-side-mask<br>
							<i class="fa fa-head-side-virus"></i>fa-head-side-virus<br>
							<i class="fa fa-heading"></i>fa-heading<br>
							<i class="fa fa-headphones"></i>fa-headphones<br>
							<i class="fa fa-headphones-alt"></i>fa-headphones-alt<br>
							<i class="fa fa-headset"></i>fa-headset<br>
							<i class="fa fa-heart"></i>fa-heart<br>
							<i class="fa fa-heart-broken"></i>fa-heart-broken<br>
							<i class="fa fa-heartbeat"></i>fa-heartbeat<br>
							<i class="fa fa-helicopter"></i>fa-helicopter<br>
							<i class="fa fa-highlighter"></i>fa-highlighter<br>
							<i class="fa fa-hiking"></i>fa-hiking<br>
							<i class="fa fa-hippo"></i>fa-hippo<br>
							<i class="fa fa-history"></i>fa-history<br>
							<i class="fa fa-hockey-puck"></i>fa-hockey-puck<br>
							<i class="fa fa-holly-berry"></i>fa-holly-berry<br>
							<i class="fa fa-home"></i>fa-home<br>
							<i class="fa fa-horse"></i>fa-horse<br>
							<i class="fa fa-horse-head"></i>fa-horse-head<br>
							<i class="fa fa-hospital"></i>fa-hospital<br>
							<i class="fa fa-hospital-alt"></i>fa-hospital-alt<br>
							<i class="fa fa-hospital-symbol"></i>fa-hospital-symbol<br>
							<i class="fa fa-hospital-user"></i>fa-hospital-user<br>
							<i class="fa fa-hot-tub"></i>fa-hot-tub<br>
							<i class="fa fa-hotdog"></i>fa-hotdog<br>
							<i class="fa fa-hotel"></i>fa-hotel<br>
							<i class="fa fa-hourglass"></i>fa-hourglass<br>
							<i class="fa fa-hourglass-end"></i>fa-hourglass-end<br>
							<i class="fa fa-hourglass-half"></i>fa-hourglass-half<br>
							<i class="fa fa-hourglass-start"></i>fa-hourglass-start<br>
							<i class="fa fa-house-damage"></i>fa-house-damage<br>
							<i class="fa fa-house-user"></i>fa-house-user<br>
							<i class="fa fa-hryvnia"></i>fa-hryvnia<br>
							<i class="fa fa-i-cursor"></i>fa-i-cursor<br>
							<i class="fa fa-ice-cream"></i>fa-ice-cream<br>
							<i class="fa fa-icicles"></i>fa-icicles<br>
							<i class="fa fa-icons"></i>fa-icons<br>
							<i class="fa fa-id-badge"></i>fa-id-badge<br>
							<i class="fa fa-id-card"></i>fa-id-card<br>
							<i class="fa fa-id-card-alt"></i>fa-id-card-alt<br>
							<i class="fa fa-igloo"></i>fa-igloo<br>
							<i class="fa fa-image"></i>fa-image<br>
							<i class="fa fa-images"></i>fa-images<br>
							<i class="fa fa-inbox"></i>fa-inbox<br>
							<i class="fa fa-indent"></i>fa-indent<br>
							<i class="fa fa-industry"></i>fa-industry<br>
							<i class="fa fa-infinity"></i>fa-infinity<br>
							<i class="fa fa-info"></i>fa-info<br>
							<i class="fa fa-info-circle"></i>fa-info-circle<br>
							<i class="fa fa-italic"></i>fa-italic<br>
							<i class="fa fa-key"></i>fa-key<br>
							<i class="fa fa-keyboard"></i>fa-keyboard<br>
							<i class="fa fa-kiss"></i>fa-kiss<br>
							<i class="fa fa-kiss-beam"></i>fa-kiss-beam<br>
							<i class="fa fa-kiss-wink-heart"></i>fa-kiss-wink-heart<br>
							<i class="fa fa-kiwi-bird"></i>fa-kiwi-bird<br>
							<i class="fa fa-landmark"></i>fa-landmark<br>
							<i class="fa fa-language"></i>fa-language<br>
							<i class="fa fa-laptop"></i>fa-laptop<br>
							<i class="fa fa-laptop-code"></i>fa-laptop-code<br>
							<i class="fa fa-laptop-house"></i>fa-laptop-house<br>
							<i class="fa fa-laptop-medical"></i>fa-laptop-medical<br>
							<i class="fa fa-laugh"></i>fa-laugh<br>
							<i class="fa fa-laugh-beam"></i>fa-laugh-beam<br>
							<i class="fa fa-laugh-squint"></i>fa-laugh-squint<br>
							<i class="fa fa-laugh-wink"></i>fa-laugh-wink<br>
							<i class="fa fa-layer-group"></i>fa-layer-group<br>
							<i class="fa fa-leaf"></i>fa-leaf<br>
							<i class="fa fa-lemon"></i>fa-lemon<br>
							<i class="fa fa-less-than"></i>fa-less-than<br>
							<i class="fa fa-less-than-equal"></i>fa-less-than-equal<br>
							<i class="fa fa-level-down-alt"></i>fa-level-down-alt<br>
							<i class="fa fa-level-up-alt"></i>fa-level-up-alt<br>
							<i class="fa fa-life-ring"></i>fa-life-ring<br>
							<i class="fa fa-lightbulb"></i>fa-lightbulb<br>
							<i class="fa fa-link"></i>fa-link<br>
							<i class="fa fa-lira-sign"></i>fa-lira-sign<br>
							<i class="fa fa-list"></i>fa-list<br>
							<i class="fa fa-list-alt"></i>fa-list-alt<br>
							<i class="fa fa-list-ol"></i>fa-list-ol<br>
							<i class="fa fa-list-ul"></i>fa-list-ul<br>
							<i class="fa fa-location-arrow"></i>fa-location-arrow<br>
							<i class="fa fa-lock"></i>fa-lock<br>
							<i class="fa fa-lock-open"></i>fa-lock-open<br>
							<i class="fa fa-long-arrow-alt-down"></i>fa-long-arrow-alt-down<br>
							<i class="fa fa-long-arrow-alt-left"></i>fa-long-arrow-alt-left<br>
							<i class="fa fa-long-arrow-alt-right"></i>fa-long-arrow-alt-right<br>
							<i class="fa fa-long-arrow-alt-up"></i>fa-long-arrow-alt-up<br>
							<i class="fa fa-low-vision"></i>fa-low-vision<br>
							<i class="fa fa-luggage-cart"></i>fa-luggage-cart<br>
							<i class="fa fa-lungs"></i>fa-lungs<br>
							<i class="fa fa-lungs-virus"></i>fa-lungs-virus<br>
							<i class="fa fa-magic"></i>fa-magic<br>
							<i class="fa fa-magnet"></i>fa-magnet<br>
							<i class="fa fa-mail-bulk"></i>fa-mail-bulk<br>
							<i class="fa fa-male"></i>fa-male<br>
							<i class="fa fa-map"></i>fa-map<br>
							<i class="fa fa-map-marked"></i>fa-map-marked<br>
							<i class="fa fa-map-marked-alt"></i>fa-map-marked-alt<br>
							<i class="fa fa-map-marker"></i>fa-map-marker<br>
							<i class="fa fa-map-marker-alt"></i>fa-map-marker-alt<br>
							<i class="fa fa-map-pin"></i>fa-map-pin<br>
							<i class="fa fa-map-signs"></i>fa-map-signs<br>
							<i class="fa fa-marker"></i>fa-marker<br>
							<i class="fa fa-mars"></i>fa-mars<br>
							<i class="fa fa-mars-double"></i>fa-mars-double<br>
							<i class="fa fa-mars-stroke"></i>fa-mars-stroke<br>
							<i class="fa fa-mars-stroke-h"></i>fa-mars-stroke-h<br>
							<i class="fa fa-mars-stroke-v"></i>fa-mars-stroke-v<br>
							<i class="fa fa-mask"></i>fa-mask<br>
							<i class="fa fa-medal"></i>fa-medal<br>
							<i class="fa fa-medkit"></i>fa-medkit<br>
							<i class="fa fa-meh"></i>fa-meh<br>
							<i class="fa fa-meh-blank"></i>fa-meh-blank<br>
							<i class="fa fa-meh-rolling-eyes"></i>fa-meh-rolling-eyes<br>
							<i class="fa fa-memory"></i>fa-memory<br>
							<i class="fa fa-menorah"></i>fa-menorah<br>
							<i class="fa fa-mercury"></i>fa-mercury<br>
							<i class="fa fa-meteor"></i>fa-meteor<br>
							<i class="fa fa-microchip"></i>fa-microchip<br>
							<i class="fa fa-microphone"></i>fa-microphone<br>
							<i class="fa fa-microphone-alt"></i>fa-microphone-alt<br>
							<i class="fa fa-microphone-alt-slash"></i>fa-microphone-alt-slash<br>
							<i class="fa fa-microphone-slash"></i>fa-microphone-slash<br>
							<i class="fa fa-microscope"></i>fa-microscope<br>
							<i class="fa fa-minus"></i>fa-minus<br>
							<i class="fa fa-minus-circle"></i>fa-minus-circle<br>
							<i class="fa fa-minus-square"></i>fa-minus-square<br>
							<i class="fa fa-mitten"></i>fa-mitten<br>
							<i class="fa fa-mobile"></i>fa-mobile<br>
							<i class="fa fa-mobile-alt"></i>fa-mobile-alt<br>
							<i class="fa fa-money-bill"></i>fa-money-bill<br>
							<i class="fa fa-money-bill-alt"></i>fa-money-bill-alt<br>
							<i class="fa fa-money-bill-wave"></i>fa-money-bill-wave<br>
							<i class="fa fa-money-bill-wave-alt"></i>fa-money-bill-wave-alt<br>
							<i class="fa fa-money-check"></i>fa-money-check<br>
							<i class="fa fa-money-check-alt"></i>fa-money-check-alt<br>
							<i class="fa fa-monument"></i>fa-monument<br>
							<i class="fa fa-moon"></i>fa-moon<br>
							<i class="fa fa-mortar-pestle"></i>fa-mortar-pestle<br>
							<i class="fa fa-mosque"></i>fa-mosque<br>
							<i class="fa fa-motorcycle"></i>fa-motorcycle<br>
							<i class="fa fa-mountain"></i>fa-mountain<br>
							<i class="fa fa-mouse"></i>fa-mouse<br>
							<i class="fa fa-mouse-pointer"></i>fa-mouse-pointer<br>
							<i class="fa fa-mug-hot"></i>fa-mug-hot<br>
							<i class="fa fa-music"></i>fa-music<br>
							<i class="fa fa-network-wired"></i>fa-network-wired<br>
							<i class="fa fa-neuter"></i>fa-neuter<br>
							<i class="fa fa-newspaper"></i>fa-newspaper<br>
							<i class="fa fa-not-equal"></i>fa-not-equal<br>
							<i class="fa fa-notes-medical"></i>fa-notes-medical<br>
							<i class="fa fa-object-group"></i>fa-object-group<br>
							<i class="fa fa-object-ungroup"></i>fa-object-ungroup<br>
							<i class="fa fa-oil-can"></i>fa-oil-can<br>
							<i class="fa fa-osi"></i>fa-osi<br>
							<i class="fa fa-otter"></i>fa-otter<br>
							<i class="fa fa-outdent"></i>fa-outdent<br>
							<i class="fa fa-pager"></i>fa-pager<br>
							<i class="fa fa-paint-brush"></i>fa-paint-brush<br>
							<i class="fa fa-paint-roller"></i>fa-paint-roller<br>
							<i class="fa fa-palette"></i>fa-palette<br>
							<i class="fa fa-pallet"></i>fa-pallet<br>
							<i class="fa fa-paper-plane"></i>fa-paper-plane<br>
							<i class="fa fa-paperclip"></i>fa-paperclip<br>
							<i class="fa fa-parachute-box"></i>fa-parachute-box<br>
							<i class="fa fa-paragraph"></i>fa-paragraph<br>
							<i class="fa fa-parking"></i>fa-parking<br>
							<i class="fa fa-passport"></i>fa-passport<br>
							<i class="fa fa-pastafarianism"></i>fa-pastafarianism<br>
							<i class="fa fa-paste"></i>fa-paste<br>
							<i class="fa fa-pause"></i>fa-pause<br>
							<i class="fa fa-pause-circle"></i>fa-pause-circle<br>
							<i class="fa fa-paw"></i>fa-paw<br>
							<i class="fa fa-peace"></i>fa-peace<br>
							<i class="fa fa-pen"></i>fa-pen<br>
							<i class="fa fa-pen-alt"></i>fa-pen-alt<br>
							<i class="fa fa-pen-fancy"></i>fa-pen-fancy<br>
							<i class="fa fa-pen-nib"></i>fa-pen-nib<br>
							<i class="fa fa-pen-square"></i>fa-pen-square<br>
							<i class="fa fa-pencil-alt"></i>fa-pencil-alt<br>
							<i class="fa fa-pencil-ruler"></i>fa-pencil-ruler<br>
							<i class="fa fa-people-arrows"></i>fa-people-arrows<br>
							<i class="fa fa-people-carry"></i>fa-people-carry<br>
							<i class="fa fa-pepper-hot"></i>fa-pepper-hot<br>
							<i class="fa fa-percent"></i>fa-percent<br>
							<i class="fa fa-percentage"></i>fa-percentage<br>
							<i class="fa fa-person-booth"></i>fa-person-booth<br>
							<i class="fa fa-phone"></i>fa-phone<br>
							<i class="fa fa-phone-alt"></i>fa-phone-alt<br>
							<i class="fa fa-phone-slash"></i>fa-phone-slash<br>
							<i class="fa fa-phone-square"></i>fa-phone-square<br>
							<i class="fa fa-phone-square-alt"></i>fa-phone-square-alt<br>
							<i class="fa fa-phone-volume"></i>fa-phone-volume<br>
							<i class="fa fa-photo-video"></i>fa-photo-video<br>
							<i class="fa fa-piggy-bank"></i>fa-piggy-bank<br>
							<i class="fa fa-pills"></i>fa-pills<br>
							<i class="fa fa-pizza-slice"></i>fa-pizza-slice<br>
							<i class="fa fa-place-of-worship"></i>fa-place-of-worship<br>
							<i class="fa fa-plane"></i>fa-plane<br>
							<i class="fa fa-plane-arrival"></i>fa-plane-arrival<br>
							<i class="fa fa-plane-departure"></i>fa-plane-departure<br>
							<i class="fa fa-plane-slash"></i>fa-plane-slash<br>
							<i class="fa fa-play"></i>fa-play<br>
							<i class="fa fa-play-circle"></i>fa-play-circle<br>
							<i class="fa fa-plug"></i>fa-plug<br>
							<i class="fa fa-plus"></i>fa-plus<br>
							<i class="fa fa-plus-circle"></i>fa-plus-circle<br>
							<i class="fa fa-plus-square"></i>fa-plus-square<br>
							<i class="fa fa-podcast"></i>fa-podcast<br>
							<i class="fa fa-poll"></i>fa-poll<br>
							<i class="fa fa-poll-h"></i>fa-poll-h<br>
							<i class="fa fa-poo"></i>fa-poo<br>
							<i class="fa fa-poo-storm"></i>fa-poo-storm<br>
							<i class="fa fa-poop"></i>fa-poop<br>
							<i class="fa fa-portrait"></i>fa-portrait<br>
							<i class="fa fa-pound-sign"></i>fa-pound-sign<br>
							<i class="fa fa-power-off"></i>fa-power-off<br>
							<i class="fa fa-pray"></i>fa-pray<br>
							<i class="fa fa-praying-hands"></i>fa-praying-hands<br>
							<i class="fa fa-prescription"></i>fa-prescription<br>
							<i class="fa fa-prescription-bottle"></i>fa-prescription-bottle<br>
							<i class="fa fa-prescription-bottle-alt"></i>fa-prescription-bottle-alt<br>
							<i class="fa fa-print"></i>fa-print<br>
							<i class="fa fa-procedures"></i>fa-procedures<br>
							<i class="fa fa-project-diagram"></i>fa-project-diagram<br>
							<i class="fa fa-pump-medical"></i>fa-pump-medical<br>
							<i class="fa fa-pump-soap"></i>fa-pump-soap<br>
							<i class="fa fa-puzzle-piece"></i>fa-puzzle-piece<br>
							<i class="fa fa-qrcode"></i>fa-qrcode<br>
							<i class="fa fa-question"></i>fa-question<br>
							<i class="fa fa-question-circle"></i>fa-question-circle<br>
							<i class="fa fa-quidditch"></i>fa-quidditch<br>
							<i class="fa fa-quinscape"></i>fa-quinscape<br>
							<i class="fa fa-quote-left"></i>fa-quote-left<br>
							<i class="fa fa-quote-right"></i>fa-quote-right<br>
							<i class="fa fa-quran"></i>fa-quran<br>
							<i class="fa fa-radiation"></i>fa-radiation<br>
							<i class="fa fa-radiation-alt"></i>fa-radiation-alt<br>
							<i class="fa fa-rainbow"></i>fa-rainbow<br>
							<i class="fa fa-random"></i>fa-random<br>
							<i class="fa fa-receipt"></i>fa-receipt<br>
							<i class="fa fa-record-vinyl"></i>fa-record-vinyl<br>
							<i class="fa fa-recycle"></i>fa-recycle<br>
							<i class="fa fa-redo"></i>fa-redo<br>
							<i class="fa fa-redo-alt"></i>fa-redo-alt<br>
							<i class="fa fa-registered"></i>fa-registered<br>
							<i class="fa fa-remove-format"></i>fa-remove-format<br>
							<i class="fa fa-reply"></i>fa-reply<br>
							<i class="fa fa-reply-all"></i>fa-reply-all<br>
							<i class="fa fa-republican"></i>fa-republican<br>
							<i class="fa fa-restroom"></i>fa-restroom<br>
							<i class="fa fa-retweet"></i>fa-retweet<br>
							<i class="fa fa-ribbon"></i>fa-ribbon<br>
							<i class="fa fa-ring"></i>fa-ring<br>
							<i class="fa fa-road"></i>fa-road<br>
							<i class="fa fa-robot"></i>fa-robot<br>
							<i class="fa fa-rocket"></i>fa-rocket<br>
							<i class="fa fa-route"></i>fa-route<br>
							<i class="fa fa-rss"></i>fa-rss<br>
							<i class="fa fa-rss-square"></i>fa-rss-square<br>
							<i class="fa fa-ruble-sign"></i>fa-ruble-sign<br>
							<i class="fa fa-ruler"></i>fa-ruler<br>
							<i class="fa fa-ruler-combined"></i>fa-ruler-combined<br>
							<i class="fa fa-ruler-horizontal"></i>fa-ruler-horizontal<br>
							<i class="fa fa-ruler-vertical"></i>fa-ruler-vertical<br>
							<i class="fa fa-running"></i>fa-running<br>
							<i class="fa fa-rupee-sign"></i>fa-rupee-sign<br>
							<i class="fa fa-sad-cry"></i>fa-sad-cry<br>
							<i class="fa fa-sad-tear"></i>fa-sad-tear<br>
							<i class="fa fa-satellite"></i>fa-satellite<br>
							<i class="fa fa-satellite-dish"></i>fa-satellite-dish<br>
							<i class="fa fa-save"></i>fa-save<br>
							<i class="fa fa-school"></i>fa-school<br>
							<i class="fa fa-screwdriver"></i>fa-screwdriver<br>
							<i class="fa fa-scroll"></i>fa-scroll<br>
							<i class="fa fa-sd-card"></i>fa-sd-card<br>
							<i class="fa fa-search"></i>fa-search<br>
							<i class="fa fa-search-dollar"></i>fa-search-dollar<br>
							<i class="fa fa-search-location"></i>fa-search-location<br>
							<i class="fa fa-search-minus"></i>fa-search-minus<br>
							<i class="fa fa-search-plus"></i>fa-search-plus<br>
							<i class="fa fa-seedling"></i>fa-seedling<br>
							<i class="fa fa-server"></i>fa-server<br>
							<i class="fa fa-shapes"></i>fa-shapes<br>
							<i class="fa fa-share"></i>fa-share<br>
							<i class="fa fa-share-alt"></i>fa-share-alt<br>
							<i class="fa fa-share-alt-square"></i>fa-share-alt-square<br>
							<i class="fa fa-share-square"></i>fa-share-square<br>
							<i class="fa fa-shekel-sign"></i>fa-shekel-sign<br>
							<i class="fa fa-shield-alt"></i>fa-shield-alt<br>
							<i class="fa fa-shield-virus"></i>fa-shield-virus<br>
							<i class="fa fa-ship"></i>fa-ship<br>
							<i class="fa fa-shipping-fast"></i>fa-shipping-fast<br>
							<i class="fa fa-shoe-prints"></i>fa-shoe-prints<br>
							<i class="fa fa-shopping-bag"></i>fa-shopping-bag<br>
							<i class="fa fa-shopping-basket"></i>fa-shopping-basket<br>
							<i class="fa fa-shopping-cart"></i>fa-shopping-cart<br>
							<i class="fa fa-shower"></i>fa-shower<br>
							<i class="fa fa-shuttle-van"></i>fa-shuttle-van<br>
							<i class="fa fa-sign"></i>fa-sign<br>
							<i class="fa fa-sign-in-alt"></i>fa-sign-in-alt<br>
							<i class="fa fa-sign-language"></i>fa-sign-language<br>
							<i class="fa fa-sign-out-alt"></i>fa-sign-out-alt<br>
							<i class="fa fa-signal"></i>fa-signal<br>
							<i class="fa fa-signature"></i>fa-signature<br>
							<i class="fa fa-sim-card"></i>fa-sim-card<br>
							<i class="fa fa-sink"></i>fa-sink<br>
							<i class="fa fa-sitemap"></i>fa-sitemap<br>
							<i class="fa fa-skating"></i>fa-skating<br>
							<i class="fa fa-skiing"></i>fa-skiing<br>
							<i class="fa fa-skiing-nordic"></i>fa-skiing-nordic<br>
							<i class="fa fa-skull"></i>fa-skull<br>
							<i class="fa fa-skull-crossbones"></i>fa-skull-crossbones<br>
							<i class="fa fa-slash"></i>fa-slash<br>
							<i class="fa fa-sleigh"></i>fa-sleigh<br>
							<i class="fa fa-sliders-h"></i>fa-sliders-h<br>
							<i class="fa fa-smile"></i>fa-smile<br>
							<i class="fa fa-smile-beam"></i>fa-smile-beam<br>
							<i class="fa fa-smile-wink"></i>fa-smile-wink<br>
							<i class="fa fa-smog"></i>fa-smog<br>
							<i class="fa fa-smoking"></i>fa-smoking<br>
							<i class="fa fa-smoking-ban"></i>fa-smoking-ban<br>
							<i class="fa fa-sms"></i>fa-sms<br>
							<i class="fa fa-snowboarding"></i>fa-snowboarding<br>
							<i class="fa fa-snowflake"></i>fa-snowflake<br>
							<i class="fa fa-snowman"></i>fa-snowman<br>
							<i class="fa fa-snowplow"></i>fa-snowplow<br>
							<i class="fa fa-soap"></i>fa-soap<br>
							<i class="fa fa-socks"></i>fa-socks<br>
							<i class="fa fa-solar-panel"></i>fa-solar-panel<br>
							<i class="fa fa-sort"></i>fa-sort<br>
							<i class="fa fa-sort-alpha-down"></i>fa-sort-alpha-down<br>
							<i class="fa fa-sort-alpha-down-alt"></i>fa-sort-alpha-down-alt<br>
							<i class="fa fa-sort-alpha-up"></i>fa-sort-alpha-up<br>
							<i class="fa fa-sort-alpha-up-alt"></i>fa-sort-alpha-up-alt<br>
							<i class="fa fa-sort-amount-down"></i>fa-sort-amount-down<br>
							<i class="fa fa-sort-amount-down-alt"></i>fa-sort-amount-down-alt<br>
							<i class="fa fa-sort-amount-up"></i>fa-sort-amount-up<br>
							<i class="fa fa-sort-amount-up-alt"></i>fa-sort-amount-up-alt<br>
							<i class="fa fa-sort-down"></i>fa-sort-down<br>
							<i class="fa fa-sort-numeric-down"></i>fa-sort-numeric-down<br>
							<i class="fa fa-sort-numeric-down-alt"></i>fa-sort-numeric-down-alt<br>
							<i class="fa fa-sort-numeric-up"></i>fa-sort-numeric-up<br>
							<i class="fa fa-sort-numeric-up-alt"></i>fa-sort-numeric-up-alt<br>
							<i class="fa fa-sort-up"></i>fa-sort-up<br>
							<i class="fa fa-spa"></i>fa-spa<br>
							<i class="fa fa-space-shuttle"></i>fa-space-shuttle<br>
							<i class="fa fa-spell-check"></i>fa-spell-check<br>
							<i class="fa fa-spider"></i>fa-spider<br>
							<i class="fa fa-spinner"></i>fa-spinner<br>
							<i class="fa fa-splotch"></i>fa-splotch<br>
							<i class="fa fa-spray-can"></i>fa-spray-can<br>
							<i class="fa fa-square"></i>fa-square<br>
							<i class="fa fa-square-full"></i>fa-square-full<br>
							<i class="fa fa-square-root-alt"></i>fa-square-root-alt<br>
							<i class="fa fa-stamp"></i>fa-stamp<br>
							<i class="fa fa-star"></i>fa-star<br>
							<i class="fa fa-star-and-crescent"></i>fa-star-and-crescent<br>
							<i class="fa fa-star-half"></i>fa-star-half<br>
							<i class="fa fa-star-half-alt"></i>fa-star-half-alt<br>
							<i class="fa fa-star-of-david"></i>fa-star-of-david<br>
							<i class="fa fa-star-of-life"></i>fa-star-of-life<br>
							<i class="fa fa-step-forward"></i>fa-step-forward<br>
							<i class="fa fa-stethoscope"></i>fa-stethoscope<br>
							<i class="fa fa-sticky-note"></i>fa-sticky-note<br>
							<i class="fa fa-stop"></i>fa-stop<br>
							<i class="fa fa-stop-circle"></i>fa-stop-circle<br>
							<i class="fa fa-stopwatch"></i>fa-stopwatch<br>
							<i class="fa fa-stopwatch-20"></i>fa-stopwatch-20<br>
							<i class="fa fa-store"></i>fa-store<br>
							<i class="fa fa-store-alt"></i>fa-store-alt<br>
							<i class="fa fa-store-alt-slash"></i>fa-store-alt-slash<br>
							<i class="fa fa-store-slash"></i>fa-store-slash<br>
							<i class="fa fa-stream"></i>fa-stream<br>
							<i class="fa fa-street-view"></i>fa-street-view<br>
							<i class="fa fa-strikethrough"></i>fa-strikethrough<br>
							<i class="fa fa-stroopwafel"></i>fa-stroopwafel<br>
							<i class="fa fa-subscript"></i>fa-subscript<br>
							<i class="fa fa-subway"></i>fa-subway<br>
							<i class="fa fa-suitcase"></i>fa-suitcase<br>
							<i class="fa fa-suitcase-rolling"></i>fa-suitcase-rolling<br>
							<i class="fa fa-sun"></i>fa-sun<br>
							<i class="fa fa-superscript"></i>fa-superscript<br>
							<i class="fa fa-surprise"></i>fa-surprise<br>
							<i class="fa fa-swatchbook"></i>fa-swatchbook<br>
							<i class="fa fa-swimmer"></i>fa-swimmer<br>
							<i class="fa fa-swimming-pool"></i>fa-swimming-pool<br>
							<i class="fa fa-synagogue"></i>fa-synagogue<br>
							<i class="fa fa-sync"></i>fa-sync<br>
							<i class="fa fa-sync-alt"></i>fa-sync-alt<br>
							<i class="fa fa-syringe"></i>fa-syringe<br>
							<i class="fa fa-table"></i>fa-table<br>
							<i class="fa fa-table-tennis"></i>fa-table-tennis<br>
							<i class="fa fa-tablet"></i>fa-tablet<br>
							<i class="fa fa-tablet-alt"></i>fa-tablet-alt<br>
							<i class="fa fa-tablets"></i>fa-tablets<br>
							<i class="fa fa-tachometer-alt"></i>fa-tachometer-alt<br>
							<i class="fa fa-tag"></i>fa-tag<br>
							<i class="fa fa-tags"></i>fa-tags<br>
							<i class="fa fa-tape"></i>fa-tape<br>
							<i class="fa fa-tasks"></i>fa-tasks<br>
							<i class="fa fa-taxi"></i>fa-taxi<br>
							<i class="fa fa-teeth"></i>fa-teeth<br>
							<i class="fa fa-teeth-open"></i>fa-teeth-open<br>
							<i class="fa fa-temperature-high"></i>fa-temperature-high<br>
							<i class="fa fa-temperature-low"></i>fa-temperature-low<br>
							<i class="fa fa-tenge"></i>fa-tenge<br>
							<i class="fa fa-terminal"></i>fa-terminal<br>
							<i class="fa fa-text-height"></i>fa-text-height<br>
							<i class="fa fa-text-width"></i>fa-text-width<br>
							<i class="fa fa-th"></i>fa-th<br>
							<i class="fa fa-th-large"></i>fa-th-large<br>
							<i class="fa fa-th-list"></i>fa-th-list<br>
							<i class="fa fa-theater-masks"></i>fa-theater-masks<br>
							<i class="fa fa-thermometer"></i>fa-thermometer<br>
							<i class="fa fa-thermometer-empty"></i>fa-thermometer-empty<br>
							<i class="fa fa-thermometer-full"></i>fa-thermometer-full<br>
							<i class="fa fa-thermometer-half"></i>fa-thermometer-half<br>
							<i class="fa fa-thermometer-quarter"></i>fa-thermometer-quarter<br>
							<i class="fa fa-thermometer-three-quarters"></i>fa-thermometer-three-quarters<br>
							<i class="fa fa-thumbs-down"></i>fa-thumbs-down<br>
							<i class="fa fa-thumbs-up"></i>fa-thumbs-up<br>
							<i class="fa fa-thumbtack"></i>fa-thumbtack<br>
							<i class="fa fa-ticket-alt"></i>fa-ticket-alt<br>
							<i class="fa fa-times"></i>fa-times<br>
							<i class="fa fa-times-circle"></i>fa-times-circle<br>
							<i class="fa fa-tint"></i>fa-tint<br>
							<i class="fa fa-tint-slash"></i>fa-tint-slash<br>
							<i class="fa fa-tired"></i>fa-tired<br>
							<i class="fa fa-toggle-off"></i>fa-toggle-off<br>
							<i class="fa fa-toggle-on"></i>fa-toggle-on<br>
							<i class="fa fa-toilet"></i>fa-toilet<br>
							<i class="fa fa-toilet-paper"></i>fa-toilet-paper<br>
							<i class="fa fa-toilet-paper-slash"></i>fa-toilet-paper-slash<br>
							<i class="fa fa-toolbox"></i>fa-toolbox<br>
							<i class="fa fa-tools"></i>fa-tools<br>
							<i class="fa fa-tooth"></i>fa-tooth<br>
							<i class="fa fa-torah"></i>fa-torah<br>
							<i class="fa fa-torii-gate"></i>fa-torii-gate<br>
							<i class="fa fa-tractor"></i>fa-tractor<br>
							<i class="fa fa-trademark"></i>fa-trademark<br>
							<i class="fa fa-traffic-light"></i>fa-traffic-light<br>
							<i class="fa fa-trailer"></i>fa-trailer<br>
							<i class="fa fa-train"></i>fa-train<br>
							<i class="fa fa-tram"></i>fa-tram<br>
							<i class="fa fa-transgender"></i>fa-transgender<br>
							<i class="fa fa-transgender-alt"></i>fa-transgender-alt<br>
							<i class="fa fa-trash"></i>fa-trash<br>
							<i class="fa fa-trash-alt"></i>fa-trash-alt<br>
							<i class="fa fa-trash-restore"></i>fa-trash-restore<br>
							<i class="fa fa-trash-restore-alt"></i>fa-trash-restore-alt<br>
							<i class="fa fa-tree"></i>fa-tree<br>
							<i class="fa fa-trophy"></i>fa-trophy<br>
							<i class="fa fa-truck"></i>fa-truck<br>
							<i class="fa fa-truck-loading"></i>fa-truck-loading<br>
							<i class="fa fa-truck-monster"></i>fa-truck-monster<br>
							<i class="fa fa-truck-moving"></i>fa-truck-moving<br>
							<i class="fa fa-truck-pickup"></i>fa-truck-pickup<br>
							<i class="fa fa-tshirt"></i>fa-tshirt<br>
							<i class="fa fa-tty"></i>fa-tty<br>
							<i class="fa fa-tv"></i>fa-tv<br>
							<i class="fa fa-umbrella-beach"></i>fa-umbrella-beach<br>
							<i class="fa fa-underline"></i>fa-underline<br>
							<i class="fa fa-undo"></i>fa-undo<br>
							<i class="fa fa-undo-alt"></i>fa-undo-alt<br>
							<i class="fa fa-universal-access"></i>fa-universal-access<br>
							<i class="fa fa-university"></i>fa-university<br>
							<i class="fa fa-unlink"></i>fa-unlink<br>
							<i class="fa fa-unlock"></i>fa-unlock<br>
							<i class="fa fa-unlock-alt"></i>fa-unlock-alt<br>
							<i class="fa fa-upload"></i>fa-upload<br>
							<i class="fa fa-user"></i>fa-user<br>
							<i class="fa fa-user-alt"></i>fa-user-alt<br>
							<i class="fa fa-user-alt-slash"></i>fa-user-alt-slash<br>
							<i class="fa fa-user-astronaut"></i>fa-user-astronaut<br>
							<i class="fa fa-user-check"></i>fa-user-check<br>
							<i class="fa fa-user-circle"></i>fa-user-circle<br>
							<i class="fa fa-user-clock"></i>fa-user-clock<br>
							<i class="fa fa-user-cog"></i>fa-user-cog<br>
							<i class="fa fa-user-edit"></i>fa-user-edit<br>
							<i class="fa fa-user-friends"></i>fa-user-friends<br>
							<i class="fa fa-user-graduate"></i>fa-user-graduate<br>
							<i class="fa fa-user-injured"></i>fa-user-injured<br>
							<i class="fa fa-user-lock"></i>fa-user-lock<br>
							<i class="fa fa-user-md"></i>fa-user-md<br>
							<i class="fa fa-user-minus"></i>fa-user-minus<br>
							<i class="fa fa-user-ninja"></i>fa-user-ninja<br>
							<i class="fa fa-user-nurse"></i>fa-user-nurse<br>
							<i class="fa fa-user-plus"></i>fa-user-plus<br>
							<i class="fa fa-user-secret"></i>fa-user-secret<br>
							<i class="fa fa-user-shield"></i>fa-user-shield<br>
							<i class="fa fa-user-slash"></i>fa-user-slash<br>
							<i class="fa fa-user-tag"></i>fa-user-tag<br>
							<i class="fa fa-user-tie"></i>fa-user-tie<br>
							<i class="fa fa-user-times"></i>fa-user-times<br>
							<i class="fa fa-users"></i>fa-users<br>
							<i class="fa fa-users-cog"></i>fa-users-cog<br>
							<i class="fa fa-users-slash"></i>fa-users-slash<br>
							<i class="fa fa-utensil-spoon"></i>fa-utensil-spoon<br>
							<i class="fa fa-utensils"></i>fa-utensils<br>
							<i class="fa fa-vector-square"></i>fa-vector-square<br>
							<i class="fa fa-venus"></i>fa-venus<br>
							<i class="fa fa-venus-double"></i>fa-venus-double<br>
							<i class="fa fa-venus-mars"></i>fa-venus-mars<br>
							<i class="fa fa-vial"></i>fa-vial<br>
							<i class="fa fa-vials"></i>fa-vials<br>
							<i class="fa fa-video"></i>fa-video<br>
							<i class="fa fa-video-slash"></i>fa-video-slash<br>
							<i class="fa fa-vihara"></i>fa-vihara<br>
							<i class="fa fa-virus"></i>fa-virus<br>
							<i class="fa fa-virus-slash"></i>fa-virus-slash<br>
							<i class="fa fa-viruses"></i>fa-viruses<br>
							<i class="fa fa-voicemail"></i>fa-voicemail<br>
							<i class="fa fa-volleyball-ball"></i>fa-volleyball-ball<br>
							<i class="fa fa-volume-down"></i>fa-volume-down<br>
							<i class="fa fa-volume-mute"></i>fa-volume-mute<br>
							<i class="fa fa-volume-off"></i>fa-volume-off<br>
							<i class="fa fa-volume-up"></i>fa-volume-up<br>
							<i class="fa fa-vote-yea"></i>fa-vote-yea<br>
							<i class="fa fa-vr-cardboard"></i>fa-vr-cardboard<br>
							<i class="fa fa-walking"></i>fa-walking<br>
							<i class="fa fa-wallet"></i>fa-wallet<br>
							<i class="fa fa-warehouse"></i>fa-warehouse<br>
							<i class="fa fa-water"></i>fa-water<br>
							<i class="fa fa-wave-square"></i>fa-wave-square<br>
							<i class="fa fa-weight"></i>fa-weight<br>
							<i class="fa fa-weight-hanging"></i>fa-weight-hanging<br>
							<i class="fa fa-wheelchair"></i>fa-wheelchair<br>
							<i class="fa fa-wifi"></i>fa-wifi<br>
							<i class="fa fa-wind"></i>fa-wind<br>
							<i class="fa fa-window-close"></i>fa-window-close<br>
							<i class="fa fa-window-maximize"></i>fa-window-maximize<br>
							<i class="fa fa-window-minimize"></i>fa-window-minimize<br>
							<i class="fa fa-window-restore"></i>fa-window-restore<br>
							<i class="fa fa-wine-bottle"></i>fa-wine-bottle<br>
							<i class="fa fa-wine-glass"></i>fa-wine-glass<br>
							<i class="fa fa-wine-glass-alt"></i>fa-wine-glass-alt<br>
							<i class="fa fa-won-sign"></i>fa-won-sign<br>
							<i class="fa fa-wrench"></i>fa-wrench<br>
							<i class="fa fa-x-ray"></i>fa-x-ray<br>
							<i class="fa fa-yen-sign"></i>fa-yen-sign<br>
							<i class="fa fa-yin-yang"></i>fa-yin-yang<br>
				</div>
			</div>		  
		  
      </div>
   </div>
   <div class="gute-cluster-code"></div>
</div>

<?php } 	

add_action('admin_enqueue_scripts', 'asap_add_shortcodes_js');




?>