	</div><!-- #content -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-6 footer-widget">
					<?php
					if ( is_active_sidebar( 'footer_area_one' ) ) {
						dynamic_sidebar( 'footer_area_one' );
					}
					?>
				</div>
				<div class="col-12 col-lg-6 footer-widget">
					<?php
					if ( is_active_sidebar( 'footer_area_two' ) ) {
						dynamic_sidebar( 'footer_area_two' );
					}
					?>
				</div>
				<div class="col-12 col-lg-4 footer-widget">
					<?php
					if ( is_active_sidebar( 'footer_area_three' ) ) {
						dynamic_sidebar( 'footer_area_three' );
					}
					?>
				</div>
				<div class="col-12 col-lg-4 footer-widget">
					<?php
					if ( is_active_sidebar( 'footer_area_four' ) ) {
						dynamic_sidebar( 'footer_area_four' );
					}
					?>
				</div>
				<div class="col-12 col-lg-4 footer-widget">
					<?php
					if ( is_active_sidebar( 'footer_area_five' ) ) {
						dynamic_sidebar( 'footer_area_five' );
					}
					?>
				</div>
				<?php
				if ( get_theme_mod( 'copyright' ) ) :
					?>
				<div class="col-12">
					<p class="footer-copyright">
						<?php echo get_theme_mod( 'copyright' ); ?>
					</p>
				</div>
					<?php
				endif;
				?>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
