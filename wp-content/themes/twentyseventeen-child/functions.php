<?php
function my_theme_enqueue_styles() {

    $parent_style = 'twentyseventeen-style'; // This is 'twentyseventeen-style' for the Twenty Seventeen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), wp_get_theme()->get('Version') );
    if (is_rtl()) {
        wp_enqueue_style( $parent_style, get_stylesheet_directory_uri() . '/rtl.css', array(), wp_get_theme()->get('Version') );
    }
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );



// Re-ordering items on product page
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 20 );
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 30 );
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 40 );

// Adding Books custom post type
function custom_post_type_books() {
    $labels = array(
        'name'                  => _x('Books', 'post type general name'),
        'singular_name'         => _x('Book', 'post type singular name'),
        'add_new'               => _x('Add New', 'Books'),
        'add_new_item'          => __('Add New Book'),
        'edit_item'             => __('Edit Book'),
        'new_item'              => __('New Book'),
        'all_items'             => __('All Books'),
        'view_item'             => __('View Book'),
        'search_items'          => __('Search Books'),
        'not_found'             => __('No books found'),
        'not_found_in_trash'    => __('No books found in the Trash'),
        'parent_item_colon'     => '',
        'menu_name'             => 'Books'
    );
    $supports = array(
        'editor',
        'author',
        'custom fields',
        'post-formats'
    );
    $details = array(
        'labels'        => $labels,
        'description'   => 'The Books',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => $supports,
        'has_archive'   => true
    );
    register_post_type('books',$details);

    // 404 issue one time quick fix:
    //flush_rewrite_rules( false );
}
add_action('init','custom_post_type_books');

// Adding taxonomies for Books custom post type
function taxonomies_books() {
    $labels = array (
        'name'                  => _x('Books Genres', 'taxonomy general name'),
        'singular_name'         => _x('Books Genre', 'taxonomy singular name'),
        'search_items'          => __('Search Books Genres'),
        'all_items'             => __('All Books Genres'),
        'parent_item'           => __('Parent Books Genre'),
        'parent_item_colon'     => __('Parent Books Genre:'),
        'edit_item'             => __('Edit Books Genre'),
        'update_item'           => __('Update Books Genre'),
        'add_new_item'          => __('Add New Books Genre'),
        'new_item_name'         => __('New Books Genre'),
        'menu_name'             => __('Genre')
    );
    $args = array(
        'labels'        => $labels,
        'heirarchial'   => true
    );
    register_taxonomy('book_genres', 'books', $args);
}
add_action('init','taxonomies_books', 0);





