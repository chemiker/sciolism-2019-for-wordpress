<?php
/**
 * Footer
 *
 * This template features the website footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sciolism-2019
 * @since sciolism-2019 1.0.0
 */

?>
	<footer>
		<nav id="primaryNavigation" role="navigation">
			<?php
			printf(
				'<h2 class="dashicons-before %s">%s</h2>',
				esc_html( 
					get_theme_mod(
						'sciolism_2019_footer_main_navigation_custom_css_class',
						esc_html__( 'dashicons-menu-alt3', 'sciolism-2019' )
					)
				),
				esc_html( 
					get_theme_mod(
						'sciolism_2019_footer_main_navigation_string',
						esc_html__( 'Navigation', 'sciolism-2019' )
					)
				)
			);

			wp_nav_menu(
				array(
					'theme_location' => 'main_menu',
					'container'      => false,
				)
			);
			?>
		</nav>
		<aside id="sideNavigation" role="complementary">
			<?php
			printf(
				'<h2 class="dashicons-before %s">%s</h2>',
				esc_html( 
					get_theme_mod(
						'sciolism_2019_footer_side_navigation_custom_css_class',
						esc_html__( 'dashicons-admin-users', 'sciolism-2019' )
					) 
				),
				esc_html( 
					get_theme_mod(
						'sciolism_2019_footer_side_navigation_string',
						esc_html__( 'Social', 'sciolism-2019' )
					)
				)
			);

			wp_nav_menu(
				array(
					'theme_location' => 'side_menu',
					'container'      => false,
				)
			);
			?>
		</aside>
		<?php $form_id = wp_rand( 100, 999 ); ?>
		<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
			<label for="s-<?php echo esc_attr( $form_id ); ?>">
				<span class="dashicons dashicons-search"></span>
				<span class="screenReaderText">
					<?php esc_html_e( 'Search for:', 'sciolism-2019' ); ?>
				</span>
				<input id="s-<?php echo esc_attr( $form_id ); ?>" type="search" class="searchField" placeholder="<?php esc_attr_e( 'Search', 'sciolism-2019' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
			</label>
			<input type="submit" class="screenReaderText searchSubmit" value="<?php echo esc_attr( 'Search', 'sciolism-2019' ); ?>" />
		</form>
		</footer>
	<div id="copyright">
		<p>
		<?php
		printf(
			'%1$s <a href="%2$s">%3$s</a> %4$s <a href="%5$s">%6$s</a>.',
			esc_html__( 'Powered by', 'sciolism-2019' ),
			esc_url( __( 'https://sciolism.de', 'sciolism-2019' ) ),
			esc_html__( 'sciolism 2019', 'sciolism-2019' ),
			esc_html__( 'and', 'sciolism-2019' ),
			esc_url( __( 'https://wordpress.org', 'sciolism-2019' ) ),
			esc_html__( 'WordPress', 'sciolism-2019' )
		);
		?>
		</p>
	</div>
	<?php wp_footer(); ?>
</body>
</html>
