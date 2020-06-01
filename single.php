<?php get_header(); ?>

<main role="main">

		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :
				the_post();

				?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<div class="container">
						<?php
						the_title( '<h1>', '</h1>' );
						the_post_thumbnail( 'full' );
						?>
					</div>
				</header><!-- .entry-header -->
				<div class="content">
					<div class="container">
						<?php
						the_content();
						?>
						<div class="meta">
							<?php the_category( ', ' ); ?>
							<?php
							echo sprintf( '<p>%s<b>%1s</b></p>', __( 'Escrito por ', 'model' ), get_the_author() );
							echo sprintf( '<p>%s%1s</p>', __( 'em ', 'model' ), get_the_date() );
							?>
						</div>
					</div>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->
				<?php

			endwhile;

			else :

				?>
			<div class="no-results not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'model' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<?php if ( is_search() ) : ?>

						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'model' ); ?></p>
						<?php get_search_form(); ?>

					<?php else : ?>

						<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'model' ); ?></p>
						<?php get_search_form(); ?>

					<?php endif; ?>
				</div><!-- .page-content -->
			</div><!-- .no-results -->

				<?php

		endif;
			?>
	</div>
</main><!-- #main -->


<?php get_footer(); ?>
