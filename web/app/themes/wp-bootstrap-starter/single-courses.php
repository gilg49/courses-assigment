<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-course
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-lg-12">
		<div id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/single-course', get_post_format() );

			    the_post_navigation();
		

		endwhile; // End of the loop.
		?>

		</div><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();
