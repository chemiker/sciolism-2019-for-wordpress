<?php
/**
 * Header
 *
 * This is a template that is used on all pages. It deals with the website header etc.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sciolism-2019
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
	<a href="#primaryContent" class="screenReaderText skipLinks">
		<?php esc_html_e( 'Skip to content', 'sciolism-2019' ); ?>
	</a>
	<a href="#primaryNavigation" class="screenReaderText skipLinks">
		<?php esc_html_e( 'Skip to navigation', 'sciolism-2019' ); ?>
	</a>
	<header<?php echo ( is_admin_bar_showing() === true ? ' class="withToolBar"' : '' ); ?> role="banner">
		<h1>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php
				$logo = get_theme_mod( 'custom_logo' );
				
				if ( $logo ) :
					?>
					<img src="<?php echo esc_url( wp_get_attachment_image_src( $logo )[0] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
				<?php else : ?>
					<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>
				<?php endif; ?>
			</a>
		</h1>
		<span id="siteDescription"><?php bloginfo( 'description' ); ?></span>
	</header>
