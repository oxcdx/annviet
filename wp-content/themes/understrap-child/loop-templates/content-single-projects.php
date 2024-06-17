<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header text-left mb-4">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<!-- .entry-meta <div class="entry-meta"></div> -->

	</header><!-- .entry-header -->

  <div class="mb-5">
	  <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
  </div>

	<div class="entry-content">

		<?php
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
