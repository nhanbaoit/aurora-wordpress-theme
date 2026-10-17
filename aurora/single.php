<?php
/**
 * Single post template.
 *
 * @package Aurora
 */

get_header();
?>

<div class="container section page-layout">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article <?php post_class( 'single' ); ?>>
			<header class="single__header">
				<h1 class="single__title"><?php the_title(); ?></h1>
				<p class="single__meta">
					<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
					<span aria-hidden="true">&middot;</span>
					<?php the_author(); ?>
				</p>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="single__thumbnail">
					<?php the_post_thumbnail( 'large' ); ?>
				</figure>
			<?php endif; ?>

			<div class="single__content entry-content">
				<?php
				the_content();
				wp_link_pages();
				?>
			</div>

			<footer class="single__footer">
				<?php
				if ( has_category() ) {
					the_category( ' ' );
				}
				the_tags( '<p class="single__tags">', ' ', '</p>' );
				?>
			</footer>
		</article>

		<?php
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	endwhile;
	?>

	<nav class="post-nav" aria-label="<?php esc_attr_e( 'Bài viết', 'aurora' ); ?>">
		<?php
		previous_post_link( '<span class="post-nav__prev">%link</span>', '&larr; %title' );
		next_post_link( '<span class="post-nav__next">%link</span>', '%title &rarr;' );
		?>
	</nav>
</div>

<?php
get_footer();
