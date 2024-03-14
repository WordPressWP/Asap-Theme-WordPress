<?php

function asap_cluster_ini()
{
    if (function_exists('register_block_type'))
    {
        add_action('init', 'asap_register_clusters_block');
    }
}
add_action('init', 'asap_cluster_ini');

function asap_register_clusters_block()
{
    register_block_type('asap/clusters', array(
        'editor_script' => 'asap-clusters-block-editor',
        'editor_style' => 'asap-clusters-block-editor',
    ));
}

function asap_clusters_scripts()
{
    wp_enqueue_script('react-transition-group', get_template_directory_uri() . '/inc/gutenberg/assets/js/webpack.js', array(
        'wp-blocks',
        'wp-element'
    ) , '0101062021');

    wp_register_script('asap-clusters-block-editor', get_template_directory_uri() . '/inc/gutenberg/assets/js/main.min.js', array(
        'wp-blocks',
        'wp-element',
        'react-transition-group',
        'wp-editor'
    ) , '130202293');

    wp_enqueue_script('asap-clusters-block-editor');

    wp_enqueue_style('asap-clusters-block-editor', get_template_directory_uri() . '/inc/gutenberg/assets/css/main.min.css', array(
        'wp-edit-blocks'
    ) , '06010113062021');
}
add_action('enqueue_block_editor_assets', 'asap_clusters_scripts');

function asap_gutenberg_categories($categories, $post)
{

    $asap_category = array(
        'slug' => 'asap',
        'title' => __('ASAP', 'asap') ,
    );
    array_unshift($categories, $asap_category);
    return $categories;
}

add_filter('block_categories_all', 'asap_gutenberg_categories', 10, 2);

require get_template_directory() . '/inc/gutenberg/output.php';

?>