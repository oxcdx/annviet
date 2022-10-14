<?php
/**
 * Template Name: Events Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}
?>

<div class="wrapper position-relative" id="full-width-page-wrapper position-relative">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="">

			<div class="content-area" id="primary">

				<main class="site-main" id="main" role="main">
          <?php
            $the_query = new WP_Query([
              'post_type' => 'events',
              'posts_per_page' => -1,
              'order_by' => 'date',
              'order' => 'desc',
            ]);
          ?>
          <?php if ( $the_query->have_posts() ) : ?>
            <div class="project-tiles main-grid">
              <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

              <?php 
              get_template_part( 'loop-templates/content', 'event' ); ?>
            
              <?php endwhile; ?>
            </div>

          <?php endif; ?>
				  <?php wp_reset_postdata(); ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
