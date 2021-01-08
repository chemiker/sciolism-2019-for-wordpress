<?php
/**
 * Comments
 *
 * This template is used to display comments and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage sciolism-2019
 * @since sciolism-2019 1.0.0
 */

if ( have_comments() ) : ?>
	<hr class="separator" />
	<aside id="comments">
		<h3 class="center"><?php esc_html_e( 'Comments', 'sciolism-2019' ); ?></h3>
		<ol class="commentlist">
			<?php
				wp_list_comments( array( 'avatar_size' => 32 ) );
			?>
			<li>
				<?php if ( get_option( 'page_comments' ) ) : ?>
				<div class="pagebar comment">
					<?php the_comments_pagination(); ?>
				</div>
				<?php endif; ?>
			</li>
		</ol>
	</aside>
	<?php
endif;
if ( comments_open() ) :
	?>
	<hr class="separator" />
	<div id="commentForm">
		<div id="commentReplyForm">
			<?php comment_form(); ?>
		</div>
	</div>
<?php endif; ?>
