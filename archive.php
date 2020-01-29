<?php get_header()?>
<div class="ht__bradcaump__area bg-image--6" style="background-image: url(<?php echo get_template_directory_uri()?>/images/bg/6.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="bradcaump__inner text-center">
					<h2 class="bradcaump-title">Archive Page</h2>
					<nav class="bradcaump-content">
					<?php the_breadcrumb(); ?>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
        <!-- Start Blog Area -->
        <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        	<div class="container">
        		<div class="row">
				
        			<div class="col-lg-9 col-12">
				<?php if (have_posts()) : while (have_posts()) : the_post();?>
        				<div class="blog-page">
        					<!-- Start Single Post -->
        					<article class="blog__post d-flex flex-wrap">
        						<div class="thumb">
        							<a href="<?php echo get_the_permalink()?>">
        								<?php echo get_the_post_thumbnail()?>
        							</a>
        						</div>
        						<div class="content">
        							<h4><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
        							<ul class="post__meta">
        								<li>Posts by : <a href="<?php echo get_the_permalink()?>"><?php the_author()?></a></li>
        								<li class="post_separator">/</li>
        								<li><?php echo get_the_date()?></li>
        							</ul>
        							<p><?php echo get_the_excerpt()?></p>
        							<div class="blog__btn">
        								<a href="<?php echo get_the_permalink()?>">read more</a>
        							</div>
        						</div>
        					</article>
        					<!-- End Single Post -->
        				</div>
						
					<?php
                    endwhile;        
                    endif;
                ?>
        				<ul class="wn__pagination">
						<?php paginate_links(); ?>
        					<!-- <li class="active"><a href="#">1</a></li>
        					<li><a href="#">2</a></li>
        					<li><a href="#">3</a></li>
        					<li><a href="#">4</a></li>
        					<li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li> -->
        				</ul>
        			</div>	
        			<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
						<aside>
						<?php dynamic_sidebar( 'blog_item' ); ?>  
						</aside>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End Blog Area -->

	<?php get_footer()?>