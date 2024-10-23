<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('text-center pb-5 px-2 px-lg-0'); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title sr-only">', '</h1>' ); ?>

	</header><!-- .entry-header -->
  <div class="ox-featured">
	  <?php // echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
  </div>
	<div class="entry-content pb-5">

		<?php
		the_content();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
