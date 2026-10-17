<?php
/**
 * Site header.
 *
 * @package Aurora
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'aurora' ); ?></a>

<header class="site-header" data-header>
	<div class="container site-header__inner">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a class="site-branding__link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<span class="site-branding__mark" aria-hidden="true">A</span>
					<span class="site-branding__name"><?php bloginfo( 'name' ); ?></span>
				</a>
			<?php endif; ?>
		</div>

		<nav class="site-nav" id="site-nav" aria-label="<?php esc_attr_e( 'Primary', 'aurora' ); ?>" data-nav>
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'site-nav__list',
						'depth'          => 2,
					)
				);
			}
			?>
		</nav>

		<button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="site-nav">
			<span class="nav-toggle__bar" aria-hidden="true"></span>
			<span class="nav-toggle__bar" aria-hidden="true"></span>
			<span class="nav-toggle__bar" aria-hidden="true"></span>
			<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'aurora' ); ?></span>
		</button>
	</div>
</header>

<main id="content" class="site-main">
