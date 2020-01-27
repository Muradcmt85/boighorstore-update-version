<?php


get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

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

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
