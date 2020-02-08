<?php

//  Support thumbnail, logo, backgorund, title are here

add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('title-tag');

// All css and js file are here

function boighor_scripts() {

	wp_enqueue_style( 'boighor_bootstrap_min', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'boighor_pluginse', get_template_directory_uri() . '/css/plugins.css');
	wp_enqueue_style( 'boighor_style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style( 'boighor_custom', get_template_directory_uri() . '/main.css');
	wp_enqueue_style( 'boighor_fonts.googleapis', get_template_directory_uri() . 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800');
	wp_enqueue_style( 'boighor_fonts.googleapis', get_template_directory_uri() . 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800');
	wp_enqueue_style( 'boighor_googleapis', get_template_directory_uri() . 'https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800');
	wp_enqueue_style( 'boighor_google_fonts', get_template_directory_uri() . 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900');


	wp_enqueue_script( 'boighor_modernizr', get_template_directory_uri() . '/js/vendor/modernizr-3.5.0.min.js', array('jquery'), '', false );
	wp_enqueue_script( 'boighor_jquery-3.2.1.min', get_template_directory_uri() . '/js/vendor/jquery-3.2.1.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'boighor_popper', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'boighor_bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'boighor_plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '', true );
	wp_enqueue_script( 'boighor_active', get_template_directory_uri() . '/js/active.js', array('jquery'), '', true );

}
add_action( 'wp_enqueue_scripts', 'boighor_scripts' );


//Nav walker add this section 
if ( ! file_exists( get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php' ) ) {
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}


// Registered menu are here

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'boighor' ),
) );

// Footer menue here
register_nav_menus( array(
    'footer_menu' => __( 'Footer Menu', 'boighor' ),
) );

// Mobile menu here
register_nav_menus( array(
    'mobile_menu' => __( 'Mobile Menu', 'boighor' ),
) );


//Framework include here..

require_once('lib/ReduxCore/framework.php');
require_once('lib/sample/sample-config.php');




// search components are here

add_theme_support(
	'html5',
	array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'script',
		'style',
	)
);


// Custom post feature products


// register_post_type('feature_products', array(

// 	'labels' => array(
// 	'name' => 'Feature Product',
// 	'add_new_item'=> 'Add feature products'
// 	),
// 	'public' => true,
// 	'supports' => array('title', 'editor','thumbnail'),
// 	'menu_position' =>10,
// 	'rewrite'     => false,
// 	'menu_icon' => 'dashicons-video-alt3'
// 	));








// Dynamic sidebar are here


add_action( 'widgets_init', 'blog_iteam_custom_widget' );
function blog_iteam_custom_widget() {
    register_sidebar( array(
        'name' => __( 'Blog Iteam Custom Widget', 'theme-slug' ),
        'id' => 'blog_item',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => ' <div class="wn__sidebar widget ">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}





add_action( 'widgets_init', 'product_iteam_custom_widget' );
function product_iteam_custom_widget() {
    register_sidebar( array(
        'name' => __( 'Products Iteam Custom Widget', 'theme-slug' ),
        'id' => 'product_item',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => ' <div class="wedget__categories">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="wedget__title">',
        'after_title'   => '</h3>',
    ) );
}



/*=============================================
=            BREADCRUMBS			            =
=============================================*/

//  to include in functions.php
function the_breadcrumb() {

    $sep = ' > ';

    if (!is_front_page()) {
	
	// Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;
	
	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            the_category('title_li=');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'text_domain' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
            } else {
                _e( 'Blog Archives', 'text_domain' );
            }
        }
	
	// If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }
	
	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }
	
	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
}



// Portfolio custom posts

	

function boighor_custom_portfolio() {
    $labels = array(
        'name'                  => _x( 'Portfolio', 'boighor' ),
        'singular_name'         => _x( 'Portfolio', 'boighor' ),
        'menu_name'             => _x( 'Portfolio Item', 'boighor' ),
        'name_admin_bar'        => _x( 'Portfolio', 'boighor' ),
        'add_new'               => __( 'Add New Portfolio', 'boighor' ),
        'add_new_item'          => __( 'Add New Portfolio', 'boighor' ),
        'new_item'              => __( 'New Portfolio', 'boighor' ),
        'edit_item'             => __( 'Edit Portfolio', 'boighor' ),
        'view_item'             => __( 'View Portfolio', 'boighor' ),
        'all_items'             => __( 'All Portfolio', 'boighor' ),
        'search_items'          => __( 'Search Portfolio', 'boighor' ),
        'parent_item_colon'     => __( 'Parent Portfolio:', 'boighor' ),
        'not_found'             => __( 'No Portfolio found.', 'boighor' ),
        'not_found_in_trash'    => __( 'No Portfolio found in Trash.', 'boighor' ),
        'featured_image'        => _x( 'Portfolio Cover Image',  'boighor' ),
        'set_featured_image'    => _x( 'Set Portfolio image', 'boighor' ),
        'remove_featured_image' => _x( 'Remove Portfolio image', 'boighor' ),
        'use_featured_image'    => _x( 'Use as Portfolio image', 'boighor' ),
        'archives'              => _x( 'Portfolio archives', 'boighor' ),
        'insert_into_item'      => _x( 'Insert into Portfolio', 'boighor' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Portfolio', 'boighor' ),
        'filter_items_list'     => _x( 'Filter Portfolio list', 'boighor' ),
        'items_list_navigation' => _x( 'Portfolio list navigation', 'boighor' ),
        'items_list'            => _x( 'Portfolio list', 'boighor' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true, 
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'portfolio' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
		//'taxonomies'         => array('category', 'post_tag'),
		'exclude_from_search'=> false
    );
 
    register_post_type( 'portfolio', $args );
}
 
add_action( 'init', 'boighor_custom_portfolio' );


function create_portfolio_taxonomies() {

	$labels = array(
		'name'              => _x( 'Portfolio Categories', 'boighor' ),
		'singular_name'     => _x( 'Portfolio Category', 'boighor' ),
		'search_items'      => __( 'Search Portfolio Category', 'boighor' ),
		'all_items'         => __( 'All Portfolio Category', 'boighor' ),
		'parent_item'       => __( 'Parent Portfolio Category', 'boighor' ),
		'parent_item_colon' => __( 'Parent Portfolio Category:', 'boighor' ),
		'edit_item'         => __( 'Edit Portfolio Category', 'boighor' ),
		'update_item'       => __( 'Update Portfolio Category', 'boighor' ),
		'add_new_item'      => __( 'Add New Portfolio Category', 'boighor' ),
		'new_item_name'     => __( 'New Portfolio Category Name', 'boighor' ),
		'menu_name'         => __( 'Portfolio Category', 'boighor' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfolio_category' ),
	);

	register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );
}

add_action( 'init', 'create_portfolio_taxonomies');



// woocommerce support

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );

// custom single page


add_action( 'after_setup_theme', 'boighor_product_gallary' );
 
function boighor_product_gallary() {
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}