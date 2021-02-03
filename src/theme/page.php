<?php
/**
 * Page template
 *
 * This is the tempalte for pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sciolism-2019
 * @since sciolism-2019 1.0.0
 */

get_header();
?>

<main id="primaryContent" role="main">
	<article <?php post_class(); ?>>
		<?php 
		while ( have_posts() ) :
			the_post();
			?>
			<h2><?php the_title(); ?></h2>
			<?php 
			the_post_thumbnail();
			the_content();
			wp_link_pages();
			?>
			<?php
		endwhile;
		?>
	</article>
	<?php
	comments_template( '/comments.php', true );
	?>
</main>

<?php get_footer(); ?>
