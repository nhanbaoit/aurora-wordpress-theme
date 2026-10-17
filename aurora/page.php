<?php
/**
 * Static page template.
 *
 * @package Aurora
 */

get_header();
?>

<div class="container section narrow">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article <?php post_class( 'single' ); ?>>
			<header class="single__header">
				<h1 class="single__title"><?php the_title(); ?></h1>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="single__thumbnail">
					<?php the_post_thumbnail( 'large' ); ?>
				</figure>
			<?php endif; ?>

			<div class="single__content entry-content">
				<?php the_content(); ?>
			</div>
		</article>
	endwhile;
	?>
</div>

<?php
get_footer();
