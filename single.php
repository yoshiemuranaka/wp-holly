<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package holly
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main js-scrollreveal" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );
			// echo get_the_post_thumbnail();
			// the_post_navigation();
			echo next_post_link( '%link', 'Next post', TRUE );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
