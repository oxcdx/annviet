<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="">

			<main class="site-main main-grid" id="main">
				<?php
				  $the_query = new WP_Query([
						'post_type' => 'post',
				    'posts_per_page' => -1,
				    'order_by' => 'date',
				    'order' => 'desc',
				  ]);
				?>
				<?php if ( $the_query->have_posts() ) : ?>
					<div class="project-tiles main-grid">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

		          <?php
							get_template_part( 'loop-templates/content', 'excerpt' ); ?>

		    <?php endwhile; endif; ?>
			</div>
				<?php wp_reset_postdata(); ?>


			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
