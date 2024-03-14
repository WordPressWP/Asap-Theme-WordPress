<?php

final class asap_Export_Import_Control extends WP_Customize_Control
{

    protected function render_content()
    {
?>
		<span class="customize-control-title">
			<?php _e('Export', 'asap'); ?>
		</span>
		<span class="description customize-control-description">
			<?php _e('Click to export the customization settings for this theme.', 'asap'); ?>
		</span>
		<input type="button" class="button asap-ei-button" name="asap-ei-export-button" value="<?php esc_attr_e('Export', 'asap'); ?>" />

		<hr class="asap-ei-hr" />

		<span class="customize-control-title">
			<?php _e('Import', 'asap'); ?>
		</span>
		<span class="description customize-control-description">
			<?php _e('Upload a file to import the customization settings for this theme.', 'asap'); ?>
		</span>
		<div class="asap-ei-import-controls">
			<input type="file" name="asap-ei-import-file" class="asap-ei-import-file" />
			<?php wp_nonce_field('asap-ei-importing', 'asap-ei-import'); ?>
		</div>
		<div class="asap-ei-uploading"><?php _e('Loading...', 'asap'); ?></div>
		<input type="button" class="button asap-ei-button" name="asap-ei-import-button"  value="<?php esc_attr_e('Import', 'asap'); ?>" />
		<?php
    }
}

