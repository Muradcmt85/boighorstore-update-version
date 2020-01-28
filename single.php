<?php

    get_header();
    /* Start the Loop */
    while ( have_posts() ) : the_post();?>

    <section id="blog">

        <div class="blog container">
            <div class="row">
                <div class="col-md-12">

                    <div class="blog-item">
                        <a href="#"><img class="img-responsive img-blog" src="<?php echo get_the_post_thumbnail_url();?>" width="100%" alt="" /></a>
                        <div class="blog-content">
                            <br>
                            <h2><?php  the_title();?></h2>
                            <div class="post-meta">
                                <p><i class="fa fa-clock-o"></i> <a href="#">Starting: <?php echo get_the_date();?></a></p>
                                <p><i class="fa fa-clock-o"></i> <a href="#">Ending: <?php echo get_the_date();?></a></p>
                                <p>By <a href="#"><?php the_author();?></a></p> 
                            </div>
                            <h3><?php the_content();?></h3>
                            <br>
                            </div>
                            <?php if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;?>
                        </div>
                    </div>
                    <!--/.blog-item-->
                </div>
                <!--/.col-md-8-->
            </div>
            <!--/.row-->
        </div>
    </section>
    <!--/#blog-->






<?php

    endwhile; // End of the loop.





    get_footer();
?>