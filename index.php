<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php
	if ( have_posts() ) :

		while ( have_posts() ) :
			the_post();

			?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
			<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			}
			?>
			</header><!-- .entry-header -->
			<div class="entry-content">
			<?php
			the_content(
				sprintf(
					/* translators: %s: post title */
					__( 'Continue reading %s', 'autoviacao' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'autoviacao' ),
					'after'  => '</div>',
				)
			);
			?>
			</div><!-- .entry-content -->

		</article><!-- #post-## -->
			<?php

		endwhile;

	else :

		?>
		<div class="no-results not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'autoviacao' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<?php if ( is_search() ) : ?>

					<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'autoviacao' ); ?></p>
					<?php get_search_form(); ?>

				<?php else : ?>

					<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'autoviacao' ); ?></p>
					<?php get_search_form(); ?>

				<?php endif; ?>
			</div><!-- .page-content -->
		</div><!-- .no-results -->

		<?php

	endif;
	?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
