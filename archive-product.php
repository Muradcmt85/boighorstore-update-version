<?php get_header();?>

<div class="ht__bradcaump__area bg-image--6" style="background-image: url(<?php echo get_template_directory_uri()?>/images/bg/6.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                        	<h2 class="bradcaump-title"><?php woocommerce_page_title(); ?> Page</h2>
                            <?php endif; ?>
                            
                            <nav class="bradcaump-content">
                            <?php
                                $args = array(
                                        'delimiter' => '/',
                                        'before' => '<span class="breadcrumb-title">' . __( '', 'woothemes' ) . '</span>'
                                );
                            ?>
                            <?php woocommerce_breadcrumb( $args ); ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>



     <!-- Start Shop Page -->
     <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
							<?php dynamic_sidebar( 'product_item' ); ?>  
        				</div>
        			</div>
        			<div class="col-lg-9 col-12 order-1 order-lg-2">
        				<div class="row">
        					<div class="col-lg-12">
								<div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
									<div class="shop__list nav justify-content-center" role="tablist">
			                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
			                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i class="fa fa-list"></i></a>
			                        </div>
			                        <p>Showing 1–12 of 40 results</p>
			                        <div class="orderby__wrapper">
			                        	<span>Sort By</span>
			                        	<select class="shot__byselect">
			                        		<option>Default sorting</option>
			                        		<option>HeadPhone</option>
			                        		<option>Furniture</option>
			                        		<option>Jewellery</option>
			                        		<option>Handmade</option>
			                        		<option>Kids</option>
			                        	</select>
			                        </div>
		                        </div>
        					</div>
        				</div>
        				<div class="tab__container">
	        				<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
	        					<div class="row">
	        						<!-- Start Single Product -->
									<?php
										$args = array(
											'post_type' => 'product',
											'posts_per_page' => 12
											);
										$loop = new WP_Query( $args );
										if ( $loop->have_posts() ) {
											while ( $loop->have_posts() ) : $loop->the_post();?>
		        					<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
										<?php	wc_get_template_part( 'content', 'product' ); ?>
		        					</div>
									
									<?php		
									endwhile;
										} else {
											echo __( 'No products found' );
										}
										wp_reset_postdata();
									?>
		        					<!-- End Single Product -->
	        					</div>
	        				</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End Shop Page -->

<?php get_footer()?>