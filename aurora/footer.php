<?php
/**
 * Site footer.
 *
 * @package Aurora
 */
?>
</main><!-- #content -->

<footer class="site-footer">
	<div class="container site-footer__inner">
		<div class="site-footer__brand">
			<span class="site-branding__mark" aria-hidden="true">A</span>
			<p class="site-footer__tagline"><?php bloginfo( 'description' ); ?></p>
		</div>

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav class="site-footer__nav" aria-label="<?php esc_attr_e( 'Footer', 'aurora' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'site-footer__menu',
						'depth'          => 1,
					)
				);
				?>
			</nav>
		<?php endif; ?>

		<p class="site-footer__copy">
			&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>
		</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
