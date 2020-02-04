<?php get_header();?>


        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--6" style="background-image: url(<?php echo get_template_directory_uri().'/images/bg/6.jpg'; ?>);  background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Portfolio Page</h2>
                            <nav class="bradcaump-content">
                            <?php the_breadcrumb(); ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
		<div class="page-blog-details pt--80 pb--45 bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-12">
						<div class="blog-details content">
                <?php   if ( have_posts() ) : while ( have_posts() ) : the_post();?>
							<article class="blog-post-details">
								<div class="post-thumbnail">
									<?php the_post_thumbnail()?>
								</div>
								<div class="post_wrapper">
									<div class="post_header">
										<h2><?php the_title()?></h2>
										<ul class="post_author">
											<li>Posts by : <a href="#"><?php the_author()?></a></li>
											<li class="post-separator">/</li>
											<li><?php echo get_the_date()?></li>
										</ul>
									</div>
									<div class="post_content">
										<p><?php the_content()?></p>

									</div>
									<ul class="blog_meta">
										<li><a href="#"><?php echo get_comments_number();?> comments</a></li>
										<li> / </li>
                                        <?php
                                            foreach(get_the_category( ) as $category):
                                            $catname = $category->cat_name;?>
										<li>Tags: <span><?php echo $catname.' ';?></span></li>
                                        <?php endforeach; ?>
									</ul>

									<ul class="social__net--4 d-flex justify-content-start">
										<li><a href="#"><i class="zmdi zmdi-rss"></i></a></li>
										<li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
										<li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
										<li><a href="#"><i class="zmdi zmdi-tumblr"></i></a></li>
										<li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
									</ul>
								</div>
							</article>
                            <?php endwhile; endif; ?>
							<div class="comment_respond">
									<?php
								
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;
									?>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                        <?php dynamic_sidebar( 'blog_item' ); ?> 
					</div>
				</div>
			</div>
		</div>




<?php get_footer(); ?>