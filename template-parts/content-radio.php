<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package holly
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h2 class="entry-title">', '</h2>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="link-style">', '</a></h2>' );
			}
		?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<div class="grid">
			<?php
				if (has_post_thumbnail())
				echo '<div class="col one-third"><div class="cover-art">' .  get_the_post_thumbnail() . '</div></div>';

				?>
				<div class="col two-thirds">
					<div class="content-excerpt">
					<?php 
						the_excerpt( sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', '_s' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
							
						) );
					?>
					</div>
				</div>
		</div>
		<?php 
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
