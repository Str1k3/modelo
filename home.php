<?php get_header();

$page_id = get_option( 'page_for_posts' ); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<header class="page-header">
			<h1><?php echo get_the_title( $page_id ); ?></h1>
		</header>
		<div class="container">
		<?php
		if ( have_posts() ) :
			?>
				<div class="row">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<a href="<?php the_permalink(); ?>">
						<header>
						<?php
						the_post_thumbnail( 'large' );
						the_title( '<h2>', '</h2>' );
						?>
						</header>
						<div class="content">
						<?php
						the_excerpt();
						?>
						</div>
					</a>
				</article>
					<?php
				endwhile;
				?>
				<div class="navigation">
				<?php echo paginate_links(); ?>
				</div>
			<?php
			else :
				?>
				<div class="no-results not-found">
					<header class="page-header">
						<h1><?php __( 'Nothing Found', 'model' ); ?></h1>
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
			</div>
				<?php
		endif;
			?>
		</div>
	</main>
</div>

<?php get_footer(); ?>
