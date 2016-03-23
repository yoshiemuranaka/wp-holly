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

