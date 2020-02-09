<?php


get_header();
?>

<div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        	<div class="container">
        		<div class="row">
		<div class="col-lg-9 col-12">
		<?php if ( have_posts() ) : ?>

				<h1>
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'boighor' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				// get_template_part( '', 'search' );
				
				the_post_thumbnail();
			the_content();

			endwhile;

			the_posts_navigation();

			else :?>
				<div class="container">
		<?php	get_template_part( ' ', 'none' );

		endif;
		?>
	</div>
</div>
</div>
</div>

<?php
get_sidebar();
get_footer();
