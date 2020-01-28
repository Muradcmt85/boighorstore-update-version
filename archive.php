<?php get_header()?>
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Blog Details</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.html">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Blog-Details</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
		<div class="page-blog-details section-padding--lg bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-12">
						<div class="blog-details content">
							<article class="blog-post-details">
								<div class="post-thumbnail">
									<img src="images/blog/big-img/1.jpg" alt="blog images">
								</div>
								<div class="post_wrapper">
									<div class="post_header">
										<h2>International activities of the Book</h2>
										<div class="blog-date-categori">
											<ul>
												<li>June 27, 2018</li>
												<li><a href="#" title="Posts by boighor" rel="author">boighor</a></li>
											</ul>
										</div>
									</div>
									<div class="post_content">
										<p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Crastoup pretium arcu ex. Aenean posuere libero eu augue rhoncus. Praesent ornare tortor ac ante egestas hendrerit. Aliquam et metus pharetra, bibendum massa nec, fermentum odio. Nunc id leo ultrices, mollis ligula in, finibus tortor. Mauris eu dui ut lectus fermentum eleifend. Pellentesque faucibus sem ante, non malesuada odio varius nec. Suspendisse potenti. Proin consectetur aliquam odio nec fringilla. Sed interdum at justo in efficitur. Vivamus gravida volutpat sodales. Fusce ornare sit amet ligula condimentum sagittis.</p>

										<blockquote>Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor deo incididunt labo dolor magna aliqua. Ut enim ad minim veniam quis nostrud geolans work.</blockquote>

										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehendrit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore of to magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehnderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dser mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>

									</div>
									<ul class="blog_meta">
										<li><a href="#">3 comments</a></li>
										<li> / </li>
										<li>Tags:<span>fashion</span> <span>t-shirt</span> <span>white</span></li>
									</ul>
								</div>
							</article>
							<div class="comments_area">
								<h3 class="comment__title">1 comment</h3>
								<ul class="comment__list">
									<li>
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
							<div class="comment_respond">
								<h3 class="reply_title">Leave a Reply <small><a href="#">Cancel reply</a></small></h3>
								<form class="comment__form" action="#">
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
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
						<div class="wn__sidebar">
						<?php dynamic_sidebar( 'blog_item' ); ?>  
						</div>
					</div>
				</div>
			</div>
		</div>

<?php get_footer()?>