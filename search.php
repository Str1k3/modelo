<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container">
			<h1><?php echo __( 'Resultado da busca', 'model' ); ?></h1>
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
				</header>
				<div class="entry-content">
				<?php
				the_excerpt();
				?>
				</div>
			</article>
				<?php
			endwhile;
			else :
				?>
			<div class="no-results not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'model' ); ?></h1>
				</header>
				<div class="page-content">
					<?php if ( is_search() ) : ?>
						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'model' ); ?></p>
						<?php get_search_form(); ?>
					<?php else : ?>
						<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'model' ); ?></p>
						<?php get_search_form(); ?>
					<?php endif; ?>
				</div>
			</div>
				<?php
		endif;
			?>
		</div>
	</main>
</div>

<?php get_footer(); ?>
