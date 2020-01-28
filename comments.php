<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>

<div class="comments_area">
                        <h3 class="comment__title"><?php echo get_comments_number();?> Comment</h3>
                        <ul class="comment__list">
                            <li>
                                <div class="wn__comment">
                                    <div class="thumb">

                                        <?php
                                        $user = wp_get_current_user();
                                        
                                        if ( $user ) :
                                            ?>
                                            <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="content">
                                        <div class="comnt__author d-block d-sm-flex">
                                            <span><a href="#"><?php the_author()?></a> Post author</span>
                                            <span><?php echo get_the_date()?></span>
                                            <div class="reply__btn">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <p>	<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: Post title. */
				printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'twentyseventeen' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: Number of comments, 2: Post title. */
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'twentyseventeen'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?></p>
                                    </div>
                                </div>
                            </li>
                            <li class="comment_reply">
                                <div class="wn__comment">
                                    <div class="thumb">
                                        <img src="images/blog/comment/1.jpeg" alt="comment images">
                                    </div>
                                    <div class="content">
                                        <div class="comnt__author d-block d-sm-flex">
                                            <span><a href="#">admin</a> Post author</span>
                                            <span>October 6, 2014 at 9:26 am</span>
                                            <div class="reply__btn">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <p>Sed interdum at justo in efficitur. Vivamus gravida volutpat sodales. Fusce ornare sit</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
	

		<ol class="comment-list">
			<?php
				wp_list_comments(
					array(
						'avatar_size' => 100,
						'style'       => 'ol',
						'short_ping'  => true,
					)
				);
			?>
		</ol>

		<?php
	

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyseventeen' ); ?></p>
		<?php
	endif;

	comment_form();
	?>

</div><!-- #comments -->
