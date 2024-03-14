<?php

function asap_insert_google_fonts() {
    $options_fonts = get_theme_mod('asap_options_fonts', 2);
    
    if ($options_fonts != 1) {
        return;
    }

    $font_settings = [
        'text' => get_theme_mod('asap_font_text', 'Poppins.300'),
        'title' => get_theme_mod('asap_font_title', 'Poppins.400'),
        'loop' => get_theme_mod('asap_font_loop', 'Poppins.300')
    ];

    $font_families = [];

    foreach ($font_settings as $type => $setting) {
        list($font, $weight) = explode('.', $setting);
        $font = strtr($font, " ", "+");
        
        if (!isset($font_families[$font])) {
            $font_families[$font] = [];
        }

        $font_families[$font][] = $weight;

        // Añadir el peso 700 solo a la fuente que corresponde a asap_font_text
        if ($type == 'text') {
            $font_families[$font][] = '700';
        }
    }

    // Eliminar pesos duplicados y ordenar
    foreach ($font_families as $font => $weights) {
        $font_families[$font] = array_unique($weights);
        sort($font_families[$font]);
    }

    $font_links = [];
    foreach ($font_families as $font => $weights) {
        $font_links[] = 'family=' . $font . ':wght@' . implode(';', $weights);
    }

    $fonts_url = 'https://fonts.googleapis.com/css2?' . implode('&', $font_links) . '&display=swap';

    wp_enqueue_style('asap-google-fonts', esc_url_raw($fonts_url), [], null);
}

add_action("wp_enqueue_scripts", "asap_insert_google_fonts");

?>