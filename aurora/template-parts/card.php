<?php
/**
 * Post card, used in grids on the front page, archive and search.
 *
 * @package Aurora
 */
?>
<article <?php post_class( 'card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="card__media" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
			<?php the_post_thumbnail( 'aurora-card', array( 'loading' => 'lazy' ) ); ?>
		</a>
	<?php endif; ?>

	<div class="card__body">
		<p class="card__meta">
			<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
		</p>
		<h3 class="card__title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<p class="card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
		<a class="card__link" href="<?php the_permalink(); ?>">
			<?php esc_html_e( 'Đọc tiếp', 'aurora' ); ?>
			<span aria-hidden="true">&rarr;</span>
		</a>
	</div>
</article>
