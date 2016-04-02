<?php 

/*
enqueue child css and scripts
*/
function theme_enqueue_styles() {
	$parent_style = '_s';
  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function load_vendor_javascript() {
	// wp_register_script('modernizr', get_stylesheet_directory_uri() . '/js/modernizr-custom.min.js');
	wp_register_script('scrollreveal', get_stylesheet_directory_uri() . '/js/scrollreveal.js');
  wp_register_script('interactions', get_stylesheet_directory_uri() . '/js/interactions.js', 'jquery', false );
	
	wp_enqueue_script('jquery');
	wp_enqueue_script('scrollreveal');
	wp_enqueue_script('interactions');
}
add_action( 'wp_enqueue_scripts', 'load_vendor_javascript' );

/*
register post formats
*/
add_action( 'after_setup_theme', 'wpsites_child_theme_posts_formats', 11 );
function wpsites_child_theme_posts_formats(){
 add_theme_support( 'post-formats', array(
    'video',
    'audio',
    'gallery',
    'image',
    'link',
    'quote'
    ) );
}

/*
enable shortcodes in excerpt
*/
add_filter('the_excerpt', 'do_shortcode');

/*
removing admin bar
*/
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_filter('show_admin_bar', '__return_false');

/*
removing 'Category' title prefix
*/
add_filter( 'get_the_archive_title', function ($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
	}
	return $title;
});

/*
adding shortcodes
*/
function callout_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
        'link' => 'home',
        'button' => 'Learn More',
        'color' => 'pink'
    ), $atts );
	$button = '<a href="' . get_site_url() . '/' . $a['link'] . '" class="button cta ' . $a['color'] . '">' . $a['button'] . '</a>';
	
	return '<div class="callout js-scrollreveal"><h1>' . $content . '</h1>' . $button . '</div>';

}
add_shortcode( 'callout', 'callout_shortcode' );

function link_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
        'link' => 'home'
    ), $atts );
	$link = '<p><a class="link-style" href="' . get_site_url() . '/' . $a['link'] . '">' . do_shortcode($content) . '</a></p>';	
	return $link;

}
add_shortcode( 'link', 'link_shortcode' );


function feature_shortcode($atts, $content = null ) {
	$a = shortcode_atts( array(
        'title' => ''
    ), $atts );

	//GET POST ID BY TITLE ARG PASSED IN SHORTCODE
	$page = get_page_by_title($a['title'], OBJECT, 'post');
	$post_id = $page->ID;
	$post = get_post($post_id);
	$url = get_site_url() . '/' . $a['title'];

	$header = '<h1 class="feature-header"><a href="' . $url . '">' . $post->post_title . '</a></h1>';
	$media = '<div class="feature-media">' . get_the_post_thumbnail($post) . '</div>';
	$excerpt = '<div class="feature-excerpt">' . $post->post_excerpt . '</div>';
	$button = '<div class="feature-cta"><a class="button feature-button" href="' . $url . '">Learn More</a></div>';

	// return '<div class="feature js-scrollreveal">' . $header . $media . $excerpt . $button . '</div>';
	return '<div class="feature js-scrollreveal">' . $media . $excerpt . $button . '</div>';

}
add_shortcode('feature', 'feature_shortcode');

function scrollreveal_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
        'link' => 'home'
    ), $atts );
	$link = '<div class="js-scrollreveal"' . do_shortcode($content) . '</div>';	
	return $link;

}
add_shortcode( 'scrollreveal', 'scrollreveal_shortcode' );

