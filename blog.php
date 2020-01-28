<?php get_header()?>


        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">mmmmmmmmmBlog Page</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.html">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Blog</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Blog Area -->
        <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-9 col-12">
                     
        <?php $query = new WP_Query();

if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();?>
        				<div class="blog-page">
                             <?php foreach(get_the_category( ) as $category):
			                     $catname = $category->cat_name;?>
        					<div class="page__header">
        						<h2>Category: <?php echo $catname.' ';?></h2>
        					</div>
                            	<?php endforeach; ?>
        					<!-- Start Single Post -->
        					<article class="blog__post d-flex flex-wrap">
        						<div class="thumb">
        							<a href="<?php echo get_the_permalink()?>">
        								<?php the_post_thumbnail()?>
        							</a>
        						</div>
        						<div class="content">
        							<h4><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
        							<ul class="post__meta">
        								<li>Posts by : <a href="#"><?php the_author()?></a></li>
        								<li class="post_separator">/</li>
        								<li><?php echo get_the_date()?></li>
        							</ul>
        							<p><?php the_content()?></p>
        							<div class="blog__btn">
        								<a href="blog-details.html">read more</a>
        							</div>
        						</div>
        					</article>
        					<!-- End Single Post -->
        				</div>
        				<ul class="wn__pagination">
        					<li class="active"><a href="#">1</a></li>
        					<li><a href="#">2</a></li>
        					<li><a href="#">3</a></li>
        					<li><a href="#">4</a></li>
        					<li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
        				</ul>
        			</div>	
                    <?php
                    endwhile;        
                    wp_reset_postdata();
                    endif;
                ?>
        			<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
					<?php dynamic_sidebar( 'blog_item' ); ?>  
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End Blog Area -->

<?php get_footer()?>