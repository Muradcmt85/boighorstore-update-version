<!doctype html>
<html class="no-js" lang="<?php language_attributes(); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="<?php bloginfo ('description'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri( )?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri( )?>/images/icon.png">

    <?php wp_head()?>
</head>
<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="wn__header" class="header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<div class="logo">
							<a href="<?php echo home_url('')?>"><?php the_custom_logo();?></a>
						</div>
					</div>
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
								<?php
										wp_nav_menu( array(
										'theme_location'	=> 'primary',
										'depth'             =>'9',
										'container'			=> 'div',
										'container_class'	=> 'container-fluid',
										'container_id'		=> ' ',
										'menu_class'		=> 'meninmenu d-flex justify-content-start drop',
										'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
										'walker'			=> new WP_Bootstrap_Navwalker(),
										
									) );
								?>
						</nav>
					</div>
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
						<li class="shop_search"><a class="search__active" href="#"></a></li>
							<li class="wishlist"><a href="#"></a></li>
							<li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
								<!-- Start Shopping Cart -->
								<div class="block-minicart minicart__active">
									<div class="minicart-content-wrapper">
										<div class="micart__close">
											<span>close</span>
										</div>
										<div class="items-total d-flex justify-content-between">
											<span>3 items</span>
											<span>Cart Subtotal</span>
										</div>
										<div class="total_amount text-right">
											<span>$66.00</span>
										</div>
										<div class="mini_action checkout">
											<a class="checkout__btn" href="http://localhost/wordpress/cart/">Go to Checkout</a>
										</div>
										<div class="single__items">
											<div class="miniproduct">
												<div class="item01 d-flex">
													<div class="thumb">
														<a href="product-details.html"><img src="images/product/sm-img/1.jpg" alt="product images"></a>
													</div>
													<div class="content">
														<h6><a href="product-details.html">Voyage Yoga Bag</a></h6>
														<span class="prize">$30.00</span>
														<div class="product_prize d-flex justify-content-between">
															<span class="qun">Qty: 01</span>
															<ul class="d-flex justify-content-end">
																<li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
																<li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="mini_action cart">
											<a class="cart__btn" href="cart.html">View and edit cart</a>
										</div>
									</div>
								</div>
								<!-- End Shopping Cart -->
							</li>
							<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
								<div class="searchbar__content setting__block">
									<div class="content-inner">
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>Currency</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<span class="currency-trigger">USD - US Dollar</span>
													<ul class="switcher-dropdown">
														<li>GBP - British Pound Sterling</li>
														<li>EUR - Euro</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>My Account</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
														<span><a href="#">Compare Product</a></span>
														<span><a href="#">My Account</a></span>
														<span><a href="#">My Wishlist</a></span>
														<span><a href="#">Sign In</a></span>
														<span><a href="#">Create An Account</a></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<?php
								wp_nav_menu( array(
								'theme_location'	=> 'mobile_menu',
								'container'			=> 'div',
								'container_class'	=> '',
								'container_id'		=> ' ',
								'menu_class'		=> 'meninmenu',
								'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
								'walker'			=> new WP_Bootstrap_Navwalker(),
									
								) );
							?>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
	            <div class="mobile-menu d-block d-lg-none">
	            </div>
	            <!-- Mobile Menu -->	
			</div>		
		</header>
		<!-- //Header -->

			<!-- Start Search Popup -->
			<div class="brown--color box-search-content search_active block-bg close__top">
			<form id="search_mini_form" method="get" role="search" class="minisearch" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="field__search">
				<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
					<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s">
					<div class="action">
						<button type="submit" id="searchsubmit"
									value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>"><i class="zmdi zmdi-search"></i></button>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div>
		<!-- End Search Popup -->

		
