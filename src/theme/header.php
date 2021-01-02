<?php
/**
 * Header
 *
 * This is a template that is used on all pages. It deals with the website header etc.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage sciolism-2019
 * @since sciolism-2019 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<a href="#primaryContent" class="screenReaderText">
		<?php esc_html_e( 'Skip to content', 'sciolism-2019' ); ?>
	</a>
	<a href="#primaryNavigation" class="screenReaderText">
		<?php esc_html_e( 'Skip to navigation', 'sciolism-2019' ); ?>
	</a>
	<header<?php echo ( get_user_meta( get_current_user_id(), 'show_admin_bar_front', true ) === 'true' ? ' style="margin-top: 31px;"' : '' ); ?> role="banner">
		<h1>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php
				$logo = get_theme_mod( 'custom_logo' );
				
				if ( $logo ) :
					?>
					<img src="<?php echo esc_url( wp_get_attachment_image_src( $logo )[0] ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
				<?php else : ?>
					<?php bloginfo( 'name' ); ?>
				<?php endif; ?>
			</a>
		</h1>
		<span id="siteDescription"><?php bloginfo( 'description' ); ?></span>
	</header>
