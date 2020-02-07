<?php get_header();

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Hook Woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>



<div class="ht__bradcaump__area bg-image--6" style="background-image: url(<?php echo get_template_directory_uri()?>/images/bg/6.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                        	<h2 class="bradcaump-title"><?php woocommerce_page_title(); ?> Single</h2>
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

       <!-- Start main Content -->
	   <div class="maincontent bg--white pt--80 pb--55"  id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-9 col-12"> <?php while ( have_posts() ) : the_post(); ?>
        				<div class="wn__single__product">
        					<div class="row">
        						<div class="col-lg-6 col-12">
        							<div class="wn__fotorama__wrapper">
	        							<div class="fotorama wn__fotorama__action" data-nav="thumbs">
		        							  <a href="1.jpg"><?php woocommerce_show_product_images()?></a>
	        							</div>
        							</div>
        						</div>
        						<div class="col-lg-6 col-12">
        							<div class="product__info__main">
        								<h1><?php woocommerce_template_single_title()?></h1>
        								<div class="product-reviews-summary d-flex">
        									<ul class="rating-summary d-flex">
    											<li><?php woocommerce_template_single_rating ()?></li>
        									</ul>
        								</div>
        								<div class="price-box">
        									<span><?php woocommerce_template_single_price()?></span>
        								</div>
										<div class="product__overview">
        									<p><?php the_excerpt()?></p>
        								</div>
        								<div class="box-tocart d-flex">
											<span>Qty</span>
        									<div class="addtocart__actions">
        										<?php woocommerce_template_single_add_to_cart()?>
        									</div>
											<div class="product-addto-links clearfix">
												<a class="wishlist" href="#"></a>
												<a class="compare" href="#"></a>
											</div>
        								</div>
										<div class="product_meta">
											<span class="posted_in">Categories: 
												<a href="#">Adventure</a>, 
												<a href="#">Kids' Music</a>
											</span>
										</div>
										<div class="product-share">
											<ul>
												<li class="categories-title">Share :</li>
												<li>
													<a href="#">
														<i class="icon-social-twitter icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-tumblr icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-facebook icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-linkedin icons"></i>
													</a>
												</li>
											</ul>
										</div>
        							</div>
        						</div>
        					</div>
        				</div>
        				<div class="product__info__detailed">
							<div class="pro_details_nav nav justify-content-start" role="tablist">
	                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab"></a>
	                          
	                        </div>
	                        <div class="tab__container">
	                        	<!-- Start Single Tab Content -->
	                        	<div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
									<div class="description__attribute">
										<p><?php woocommerce_output_product_data_tabs()?></p>
									</div>
	                        	</div>
	                        	<!-- End Single Tab Content -->
	                        	<!-- Start Single Tab Content -->
	                        	<div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
									<div class="review__attribute">
										<h1>Customer Reviews</h1>
										<h2>Hastech</h2>
										<div class="review__ratings__type d-flex">
											<div class="review-ratings">
												<div class="rating-summary d-flex">
													<span>Quality</span>
			    									<ul class="rating d-flex">
														<li><i class="zmdi zmdi-star"></i></li>
														<li><i class="zmdi zmdi-star"></i></li>
														<li><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
			    									</ul>
												</div>

												<div class="rating-summary d-flex">
													<span>Price</span>
			    									<ul class="rating d-flex">
														<li><i class="zmdi zmdi-star"></i></li>
														<li><i class="zmdi zmdi-star"></i></li>
														<li><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
			    									</ul>
												</div>
												<div class="rating-summary d-flex">
													<span>value</span>
			    									<ul class="rating d-flex">
														<li><i class="zmdi zmdi-star"></i></li>
														<li><i class="zmdi zmdi-star"></i></li>
														<li><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
			    									</ul>
												</div>
											</div>
											<div class="review-content">
												<p>Hastech</p>
												<p>Review by Hastech</p>
												<p>Posted on 11/6/2018</p>
											</div>
										</div>
									</div>
									<div class="review-fieldset">
										<h2>You're reviewing:</h2>
										<h3>Chaz Kangeroo Hoodie</h3>
										<div class="review-field-ratings">
											<div class="product-review-table">
												<div class="review-field-rating d-flex">
													<span>Quality</span>
													<ul class="rating d-flex">
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
			    									</ul>
												</div>
												<div class="review-field-rating d-flex">
													<span>Price</span>
													<ul class="rating d-flex">
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
			    									</ul>
												</div>
												<div class="review-field-rating d-flex">
													<span>Value</span>
													<ul class="rating d-flex">
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
			    									</ul>
												</div>
											</div>
										</div>
										<div class="review_form_field">
											<div class="input__box">
												<span>Nickname</span>
												<input id="nickname_field" type="text" name="nickname">
											</div>
											<div class="input__box">
												<span>Summary</span>
												<input id="summery_field" type="text" name="summery">
											</div>
											<div class="input__box">
												<span>Review</span>
												<textarea name="review"></textarea>
											</div>
											<div class="review-form-actions">
												<button>Submit Review</button>
											</div>
										</div>
									</div>
	                        	</div>
	                        	<!-- End Single Tab Content -->
	                        </div>
        				</div>
						<div class="wn__related__product pt--80 pb--50">
							<div class="section__title text-center">
								<h2 class="title__be--2">Related Products</h2>
							</div>
							<div class="row mt--60">
								<div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
									<!-- Start Single Product -->
									<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
										<?php  woocommerce_output_related_products()?>
									</div>
								</div>
							</div>
						</div>
						<div class="wn__related__product">
							<div class="section__title text-center">
								<h2 class="title__be--2">upsell products</h2>
							</div>
							<div class="row mt--60">
								<div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
									<!-- Start Single Product -->
									<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
										<?php 
											$upsell= woocommerce_upsell_display();
											if(!empty($upsell)){
												echo $upsell;
											}else{
												echo "Currently not found upsell products";
											}
										?>
									</div>
								</div>
							</div>
                    <?php endwhile; // end of the loop. ?>
						</div>
        			</div>
        			<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
							<?php dynamic_sidebar( 'product_item' ); ?>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End main Content -->
		<!-- Start Search Popup -->
		<div class="box-search-content search_active block-bg close__top">
			<form id="search_mini_form--2" class="minisearch" action="#">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here...">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div>
		<!-- End Search Popup -->

		<?php do_action( 'woocommerce_after_single_product' ); ?>
<?php get_footer()?>