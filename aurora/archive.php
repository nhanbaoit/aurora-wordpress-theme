<?php
/**
 * Archive template.
 *
 * @package Aurora
 */

get_header();
?>

<div class="container section page-layout">
	<header class="page-header">
		<h1 class="page-header__title"><?php the_archive_title(); ?></h1>
		<?php the_archive_description( '<p class="page-header__lede">', '</p>' ); ?>
	</header>

	<div class="page-layout__grid">
		<div class="page-layout__content">
			<?php if ( have_posts() ) : ?>
				<div class="card-grid card-grid--two">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/card' );
					endwhile;
					?>
				</div>

				<?php
				the_posts_pagination(
					array(
						'mid_size'  => 1,
						'prev_text' => '&larr;',
						'next_text' => '&rarr;',
					)
				);
				?>
			<?php else : ?>
				<p class="empty-state"><?php esc_html_e( 'Không tìm thấy nội dung.', 'aurora' ); ?></p>
			<?php endif; ?>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>

<?php
get_footer();
