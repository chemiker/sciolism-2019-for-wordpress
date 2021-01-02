<?php
/**
 * Index template
 *
 * This is the template the template that is usually shown when visiting an archive page or the index page of your blog.
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
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
		<article <?php post_class(); ?>>
			<div class="articleMiniMeta">
				<a href="<?php the_permalink(); ?>"><time class="meta dashicons-before dashicons-calendar-alt" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time></a>
				<?php if ( has_category() ) : ?>
					<span class="metaSeparator">&mdash;</span><span class="screenReaderText">{{ i18n "categories" }}: </span><span class="meta dashicons-before dashicons-category"><?php the_category( ', ' ); ?></span>
				<?php endif; ?>
			</div>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php 
			if ( has_excerpt() ) {
				the_excerpt();
			} else {
				the_post_thumbnail();
				the_content(
					sprintf(
						// Translators: %1$s is replaced the title of the post.
						'<span class="readMore">' . esc_html__( 'Continue reading%1$s…', 'sciolism-2019' ) . '</span>', 
						'<span class="screenReaderText"> ' . get_the_title() . '</span>' 
					)
				);
				wp_link_pages(); 
			}
			?>
		</article>
		<hr class="separator" />
	<?php endwhile; ?>
	<?php
		the_posts_pagination(
			array(
				'type'      => 'list',
				'prev_text' => '<span class="dashicons dashicons-arrow-left-alt"></span><span class="screenReaderText">' . esc_html__( 'Previous page', 'sciolism-2019' ) . '</span>',
				'next_text' => '<span class="screenReaderText">' . esc_html__( 'Next page', 'sciolism-2019' ) . '</span><span class="dashicons dashicons-arrow-right-alt"></span>',
			)
		);
	?>
<?php else : ?>
	<article>
		<h2><?php esc_html_e( 'Couldn\'t find any articles!', 'sciolism-2019' ); ?></h2>
		<?php esc_html_e( 'Something went wrong. Looking for something? Try a search.', 'sciolism-2019' ); ?>
	</article>
<?php endif; ?>
</main>

<?php get_footer(); ?>
