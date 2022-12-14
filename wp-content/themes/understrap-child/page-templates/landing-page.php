<?php
/**
 * Template Name: Landing Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('landing');
$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper position-relative" id="full-width-page-wrapper position-relative">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="">

			<div class="content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', 'landing-page' );
					}
					?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer('landing');
