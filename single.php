<?php

// Template Name: Custom page Template
get_header();
?>

<div class="page-blog-details section-padding--lg bg--white">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="blog-details content">
            
            
                <?php   if ( have_posts() ) : while ( have_posts() ) : the_post();?>
                    <article class="blog-post-details">
                        <div class="post-thumbnail">
                            <img src="<?php echo get_the_post_thumbnail_url();?>" alt="blog images">
                        </div>
                        <div class="post_wrapper">
                            <div class="post_header">
                                <h2><?php the_title()?></h2>
                                <div class="blog-date-categori">
                                    <ul>
                                        <li><?php echo get_the_date()?></li>
                                        <li><a href="<?php echo get_the_permalink()?>" title="Posts by boighor" rel="author"><?php the_author();?></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="post_content">
                                <p><?php echo get_the_content();?></p>

                            </div>
                            <ul class="blog_meta">
                                <li><a href="<?php echo get_the_permalink()?>">c</a></li>
                                <li> / </li>
                                <li>Tags:<span>fashion</span> <span>t-shirt</span> <span>white</span></li>
                            </ul>
                        </div>
                    </article>       <?php endwhile; 
                    the_posts_pagination();
                 else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>
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
                                                <!-- <a href="#">Reply</a> -->
                                            </div>
                                        </div>
                                        <p>
                                        <?php
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
			?>

                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="comment_respond">
                        <h3 class="reply_title">Leave a Reply <small><a href="#">Cancel reply</a></small></h3>
                        <?php	if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;?>
                        <!-- <form class="comment__form" action="#">
                            <p>Your email address will not be published.Required fields are marked </p>
                            <div class="input__box">
                                <textarea name="comment" placeholder="Your comment here"></textarea>
                            </div>
                            <div class="input__wrapper clearfix">
                                <div class="input__box name one--third">
                                    <input type="text" placeholder="name">
                                </div>
                                <div class="input__box email one--third">
                                    <input type="email" placeholder="email">
                                </div>
                                <div class="input__box website one--third">
                                    <input type="text" placeholder="website">
                                </div>
                            </div>
                            <div class="submite__btn">
                                <a href="#">Post Comment</a>
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                <?php dynamic_sidebar( 'blog_item' ); ?>  
            </div>
        </div>
    </div>
</div>

<?php get_footer()?>