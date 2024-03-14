<?php

add_action('wp_head', 'asap_fonts_local');

function asap_fonts_local() {
    $options_fonts = get_theme_mod('asap_options_fonts', 2);

    if ($options_fonts != 2) {
        return;
    }

    $asap_font_text = get_theme_mod('asap_font_text', 'Poppins.300');
    $asap_font_title = get_theme_mod('asap_font_title', 'Poppins.400');
    $asap_font_loop = get_theme_mod('asap_font_loop', 'Poppins.300');

    $asap_font_text_bold = str_replace($asap_font_text, explode('.', $asap_font_text)[0] . '.700', $asap_font_text);

    $font_settings = array_unique([
        $asap_font_text,
        $asap_font_text_bold,
        $asap_font_title,
        $asap_font_loop
    ]);

    echo '<style>';
    foreach ($font_settings as $font_setting) {
        echo asap_generate_font_face($font_setting);
    }
    echo '</style>';
}

function asap_generate_font_face($font_setting) {
    list($name, $weight) = explode('.', $font_setting);

    $url_name = strtolower(str_replace(' ', '-', $name));

    return sprintf(
        '@font-face {
            font-family: "%s";
            font-style: normal;
            font-weight: %s;
            src: local(""),
            url("%s/assets/fonts/%s-%s.woff2") format("woff2"),
            url("%s/assets/fonts/%s-%s.woff") format("woff");
            font-display: swap;
        } ',
        $name,
        $weight,
        get_template_directory_uri(),
        $url_name,
        $weight,
        get_template_directory_uri(),
        $url_name,
        $weight
    );
}


?>