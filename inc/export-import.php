<?php
final class asap_Export_Import_Core
{

    private static $core_options = array(
        'blogname',
        'blogdescription',
        'show_on_front',
        'page_on_front',
        'page_for_posts',
    );

    public static function init($wp_customize)
    {
        if (current_user_can('edit_theme_options'))
        {
            if (isset($_REQUEST['asap-ei-export']))
            {
                self::_export($wp_customize);
            }
            if (isset($_REQUEST['asap-ei-import']) && isset($_FILES['asap-ei-import-file']))
            {
                self::_import($wp_customize);
            }
        }
    }

    public static function controls_enqueue_scripts()
    {

        wp_register_style('asap-ei-css', get_template_directory_uri() . '/assets/css/export-import.css', array() , '1.9.0');
        wp_register_script('asap-ei-js', get_template_directory_uri() . '/assets/js/export-import.js', array(
            'jquery'
        ) , '1.5.0', true);

        wp_localize_script('asap-ei-js', 'asapeiImport', array(
            'emptyImport' => __('Choose a file to import.', 'asap')
        ));

        wp_localize_script('asap-ei-js', 'asapeiConfig', array(
            'customizerURL' => admin_url('customize.php') ,
            'exportNonce' => wp_create_nonce('asap-ei-exporting')
        ));

        wp_enqueue_style('asap-ei-css');
        wp_enqueue_script('asap-ei-js');
    }

    public static function register($wp_customize)
    {
        require get_template_directory() . '/inc/ei/control.php';

        $wp_customize->add_section('asap-ei-section', array(
            'title' => __('Import and export', 'asap') ,
            'panel' => 'custom_options',
            'priority' => 17
        ));

        $wp_customize->add_setting('asap-ei-setting', array(
            'default' => '',
            'type' => 'none',
            'sanitize_callback' => '',
        ));

        $wp_customize->add_control(new asap_Export_Import_Control($wp_customize, 'asap-ei-setting', array(
            'section' => 'asap-ei-section',
            'priority' => 1
        )));
    }

    private static function _export($wp_customize)
    {
        if (!wp_verify_nonce($_REQUEST['asap-ei-export'], 'asap-ei-exporting'))
        {
            return;
        }

        $theme = get_stylesheet();
        $template = get_template();
        $charset = get_option('blog_charset');
        $mods = get_theme_mods();
        $data = array(
            'template' => $template,
            'mods' => $mods ? $mods : array() ,
            'options' => array()
        );

        $settings = $wp_customize->settings();

        foreach ($settings as $key => $setting)
        {
            if ('option' == $setting->type)
            {
                if ('widget_' === substr(strtolower($key) , 0, 7))
                {
                    continue;
                }

                if ('sidebars_' === substr(strtolower($key) , 0, 9))
                {
                    continue;
                }

                if (in_array($key, self::$core_options))
                {
                    continue;
                }

                $data['options'][$key] = $setting->value();
            }
        }

        $option_keys = apply_filters('asap_Export_Import_export_option_keys', array());

        foreach ($option_keys as $option_key)
        {
            $data['options'][$option_key] = get_option($option_key);
        }

        if (function_exists('wp_get_custom_css_post'))
        {
            $data['wp_css'] = wp_get_custom_css();
        }

        header('Content-disposition: attachment; filename=' . $theme . '-export.dat');
        header('Content-Type: application/octet-stream; charset=' . $charset);

        echo serialize($data);

        die();
    }

    private static function _import($wp_customize)
    {
        if (!wp_verify_nonce($_REQUEST['asap-ei-import'], 'asap-ei-importing'))
        {
            return;
        }

        if (!function_exists('wp_handle_upload'))
        {
            require_once (ABSPATH . 'wp-admin/includes/file.php');
        }

        require get_template_directory() . '/inc/ei/option.php';

        global $wp_customize;
        global $asap_Export_Import_error;

        $asap_Export_Import_error = false;
        $template = get_template();
        $overrides = array(
            'test_form' => false,
            'test_type' => false,
            'mimes' => array(
                'dat' => 'text/plain'
            )
        );
        $file = wp_handle_upload($_FILES['asap-ei-import-file'], $overrides);

        if (isset($file['error']))
        {
            $asap_Export_Import_error = $file['error'];
            return;
        }
        if (!file_exists($file['file']))
        {
            $asap_Export_Import_error = __('An error occurred importing the configuration. Please try again.', 'asap');
            return;
        }

        $raw = wp_remote_get($file['url'], array(
            'sslverify' => false
        ));
        $raw = wp_remote_retrieve_body($raw);
        $raw = str_replace('s:12:"asap-lite"', 's:7:"asap"', $raw);
        $data = @unserialize($raw);

        unlink($file['file']);

        if ('array' != gettype($data))
        {
            $asap_Export_Import_error = __('An error occurred importing the configuration. Check that you have uploaded a customizer export file.', 'asap');
            return;
        }
        if (!isset($data['template']) || !isset($data['mods']))
        {
            $asap_Export_Import_error = __('An error occurred importing the configuration. Check that you have uploaded a customizer export file.', 'asap');
            return;
        }
        if ($data['template'] != $template)
        {
            $asap_Export_Import_error = __('An error occurred importing the configuration. The configuration you uploaded is not for the current theme.', 'asap');
            return;
        }

        if (isset($_REQUEST['asap-ei-import-images']))
        {
            $data['mods'] = self::_import_images($data['mods']);
        }

        if (isset($data['options']))
        {
            foreach ($data['options'] as $option_key => $option_value)
            {
                $option = new asap_Export_Import_Option($wp_customize, $option_key, array(
                    'default' => '',
                    'type' => 'option',
                    'capability' => 'edit_theme_options'
                ));

                $option->import($option_value);
            }
        }

        if (function_exists('wp_update_custom_css_post') && isset($data['wp_css']) && '' !== $data['wp_css'])
        {
            wp_update_custom_css_post($data['wp_css']);
        }

        do_action('customize_save', $wp_customize);

        foreach ($data['mods'] as $key => $val)
        {
            do_action('customize_save_' . $key, $wp_customize);
            set_theme_mod($key, $val);
        }

        do_action('customize_save_after', $wp_customize);
    }

    private static function _import_images($mods)
    {
        foreach ($mods as $key => $val)
        {
            if (self::_is_image_url($val))
            {
                $data = self::_sideload_image($val);

                if (!is_wp_error($data))
                {
                    $mods[$key] = $data->url;

                    if (isset($mods[$key . '_data']))
                    {
                        $mods[$key . '_data'] = $data;
                        update_post_meta($data->attachment_id, '_wp_attachment_is_custom_header', get_stylesheet());
                    }
                }
            }
        }

        return $mods;
    }

    private static function _sideload_image($file)
    {
        $data = new stdClass();

        if (!function_exists('media_handle_sideload'))
        {
            require_once (ABSPATH . 'wp-admin/includes/media.php');
            require_once (ABSPATH . 'wp-admin/includes/file.php');
            require_once (ABSPATH . 'wp-admin/includes/image.php');
        }
        if (!empty($file))
        {
            preg_match('/[^\?]+\.(jpe?g|jpe|gif|png)\b/i', $file, $matches);
            $file_array = array();
            $file_array['name'] = basename($matches[0]);
            $file_array['tmp_name'] = download_url($file);

            if (is_wp_error($file_array['tmp_name']))
            {
                return $file_array['tmp_name'];
            }

            $id = media_handle_sideload($file_array, 0);

            if (is_wp_error($id))
            {
                @unlink($file_array['tmp_name']);
                return $id;
            }

            $meta = wp_get_attachment_metadata($id);
            $data->attachment_id = $id;
            $data->url = wp_get_attachment_url($id);
            $data->thumbnail_url = wp_get_attachment_thumb_url($id);
            $data->height = $meta['height'];
            $data->width = $meta['width'];
        }

        return $data;
    }

    private static function _is_image_url($string = '')
    {
        if (is_string($string))
        {
            if (preg_match('/\.(jpg|jpeg|png|gif)/i', $string))
            {
                return true;
            }
        }

        return false;
    }
}

add_action('customize_controls_enqueue_scripts', 'asap_Export_Import_Core::controls_enqueue_scripts');
add_action('customize_register', 'asap_Export_Import_Core::init', 999999);
add_action('customize_register', 'asap_Export_Import_Core::register');

?>
