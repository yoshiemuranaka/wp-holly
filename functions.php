<?php 

/*
enqueue child css and scripts
*/
function theme_enqueue_styles() {
	$parent_style = '_s';
  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


/*
removing admin bar
*/
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_filter('show_admin_bar', '__return_false');
/*
removing autofilter that adds empty <p> tags 
*/
remove_filter('the_content', 'wpautop');

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
        'link' => 'home'
    ), $atts );
	$button = '<a href="' . get_site_url() . '/' . $a['link'] . '" class="button cta">Learn More</a>';
	
	return '<div class="callout"><h1>' . $content . '</h1>' . $button . '</div>';

}
add_shortcode( 'callout', 'callout_shortcode' );

function cta_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
        'link' => 'home'
    ), $atts );
	return '<a href="' . get_site_url() . '/' . $a['link'] . '"><a class="button cta">' . $content . '</a></a>';
}
add_shortcode( 'cta', 'cta_shortcode' );

function feature_shortcode($atts, $content = null ) {
	$a = shortcode_atts( array(
        'title' => ''
    ), $atts );

	//GET POST ID BY TITLE ARG PASSED IN SHORTCODE
	$page = get_page_by_title($a['title'], OBJECT, 'post');
	$post_id = $page->ID;
	$post = get_post($post_id);
	$url = get_site_url() . '/' . $a['title'];

	$header = '<h1 class="feature-header">' . $post->post_title . '</h1>';
	$media = '<div class="feature-media">' . get_the_post_thumbnail($post) . '</div>';
	$excerpt = '<div class="feature-excerpt">' . $post->post_excerpt . '</div>';
	$button = '<a class="button feature-button" href="' . $url . '">Learn More</a>';

	return '<div class="feature">' . $header . $media . $excerpt . $button . '</div>';
}
add_shortcode('feature', 'feature_shortcode');



