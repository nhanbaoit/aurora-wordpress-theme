<?php
/**
 * Template Name: Contact Page
 * Contact page with details and a plain HTML form that posts to admin-post.php.
 *
 * @package Aurora
 */

get_header();

$email = get_theme_mod( 'aurora_email', 'hello@example.com' );
?>

<div class="container section narrow">
	<header class="page-header">
		<h1 class="page-header__title"><?php the_title(); ?></h1>
	</header>

	<div class="contact">
		<div class="contact__info entry-content">
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>
			<p class="contact__email">
				<?php esc_html_e( 'Email:', 'aurora' ); ?>
				<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
			</p>
		</div>

		<form class="contact__form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="aurora_contact">
			<?php wp_nonce_field( 'aurora_contact', 'aurora_contact_nonce' ); ?>

			<div class="field">
				<label for="contact-name"><?php esc_html_e( 'Họ tên', 'aurora' ); ?></label>
				<input id="contact-name" type="text" name="name" required>
			</div>

			<div class="field">
				<label for="contact-email"><?php esc_html_e( 'Email', 'aurora' ); ?></label>
				<input id="contact-email" type="email" name="email" required>
			</div>

			<div class="field">
				<label for="contact-message"><?php esc_html_e( 'Nội dung', 'aurora' ); ?></label>
				<textarea id="contact-message" name="message" rows="5" required></textarea>
			</div>

			<button class="btn btn--primary" type="submit"><?php esc_html_e( 'Gửi tin nhắn', 'aurora' ); ?></button>
		</form>
	</div>
</div>

<?php
get_footer();
