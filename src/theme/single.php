<?php
/**
 * Single post template
 *
 * This template is called if a a post is shown in single view. I.e. by visiting the post URL.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage sciolism-2019
 * @since sciolism-2019 1.0.0
 */

get_header();
?>

<main id="primaryContent" role="main">
	<article <?php post_class(); ?>>
		<div class="articleMiniMeta">
			<time class="meta dashicons-before dashicons-calendar-alt" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time>
			<?php if ( has_category() ) : ?>
				<span class="metaSeparator">&mdash;</span><span class="screenReaderText"><?php esc_html_e( 'Categories', 'sciolism-2019' ); ?>: </span><span class="meta dashicons-before dashicons-category"><?php the_category( ', ' ); ?></span>
			<?php endif; ?>
		</div>
			<?php the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<?php
			the_post_thumbnail();
			the_content();
			wp_link_pages();
			?>
	</article>
	<div id="articleMeta">
		<h2 class="screenReaderText"><?php esc_html_e( 'Article info', 'sciolism-2019' ); ?></h2>
		<div class="articleMetaContainer">
			<?php
			$categories = get_the_category();
			if ( $categories ) :
				?>
			<h4 class="dashicons-before dashicons-category"><?php esc_html_e( 'Categories', 'sciolism-2019' ); ?></h4>
			<ul id="articleCategories">
				<?php
				foreach ( $categories as $category ) {
					printf(
						'<li><a href="%s">%s</a></li>',
						esc_url( get_category_link( $category->term_id ) ),
						esc_html( $category->name )
					);
				}
				?>
			</ul>
			<?php endif; ?>
		</div><div class="articleMetaContainer">
			<?php 
			$tags = get_the_tags();
			if ( $tags ) :
				?>
			<h4 class="dashicons-before dashicons-tag"><?php esc_html_e( 'Tags', 'sciolism-2019' ); ?></h4>
			<ul id="articleTags">
				<?php
				foreach ( $tags as $single_tag ) { // If we name this variable $tag, themsniffer will throw an error: Overriding WordPress globals is prohibited. Found assignment to $tag.
					printf(
						'<li><a href="%s">%s</a></li>',
						esc_url_raw( get_tag_link( $single_tag->term_id ) ),
						esc_html( $single_tag->name )
					);
				}
				?>
			</ul>
			<?php endif; ?>
		</div>
	</div>
	<hr class="separator" />
	<div id="postNavigation">
		<?php
		previous_post_link(
			'<span class="post-navigation previous-post">%link</span>',
			'<span class="dashicons dashicons-arrow-left-alt"></span>' . esc_html__( 'Previous post', 'sciolism-2019' )
		);
		?>
		<?php
		next_post_link(
			'<span class="post-navigation next-post">%link</span>',
			esc_html__( 'Next post', 'sciolism-2019' ) . '<span class="dashicons dashicons-arrow-right-alt"></span>'
		);
		?>
	</div>
	<?php
	comments_template( '/comments.php', true );
	?>
</main>


<?php get_footer(); ?>
