<?php
/**
 * Front page: hero, highlights and latest posts.
 *
 * @package Aurora
 */

get_header();
?>

<section class="hero">
	<div class="container hero__inner">
		<p class="hero__eyebrow"><?php esc_html_e( 'Chào mừng trở lại', 'aurora' ); ?></p>
		<h1 class="hero__title"><?php echo esc_html( get_theme_mod( 'aurora_hero_title', get_bloginfo( 'name' ) ) ); ?></h1>
		<p class="hero__lede"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
		<div class="hero__actions">
			<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/blog' ) ); ?>">
				<?php esc_html_e( 'Xem bài viết mới', 'aurora' ); ?>
			</a>
			<a class="btn btn--ghost" href="<?php echo esc_url( home_url( '/lien-he' ) ); ?>">
				<?php esc_html_e( 'Liên hệ', 'aurora' ); ?>
			</a>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<h2 class="section__title"><?php esc_html_e( 'Bài viết mới nhất', 'aurora' ); ?></h2>

		<?php
		$latest = new WP_Query(
			array(
				'post_type'           => 'post',
				'posts_per_page'      => 6,
				'ignore_sticky_posts' => true,
				'no_found_rows'       => true,
			)
		);
		?>

		<?php if ( $latest->have_posts() ) : ?>
			<div class="card-grid">
				<?php
				while ( $latest->have_posts() ) :
					$latest->the_post();
					get_template_part( 'template-parts/card' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php else : ?>
			<p class="empty-state"><?php esc_html_e( 'Chưa có bài viết nào.', 'aurora' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
