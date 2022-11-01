<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="position-relative" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?> p-0" id="content">

		<div class="">

			<div class="content-area" id="primary">

				<main class="site-main" id="main" role="main">
          <?php
          $image_1 = get_field('image_1');
          $image_2 = get_field('image_2');
          $image_3 = get_field('image_3');
          $image_4 = get_field('image_4');
          $image_5 = get_field('image_5');
          $slideCount = 0;
          if( $image_1['image'] || $image_2['image'] || $image_3['image'] || $image_4['image'] || $image_5['image'] ): ?>
              <div id="carouselExampleCaptions" class="carousel ox-carousel carousel-dark slide" data-bs-ride="carousel" data-bs-interval="15000">
                <div class="carousel-indicators">
                  <?php if( $image_1['image'] ): ?>
                  <?php $slideCount = $slideCount + 1; ?>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slideCount - 1; ?>" class="active" aria-current="true" aria-label="Slide <?php echo $slideCount; ?>"></button>
                  <?php endif; ?>
                  <?php if( $image_2['image'] ): ?>
                  <?php $slideCount = $slideCount + 1; ?>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slideCount - 1; ?>" class="<?php if( !$image_1['image'] ): echo "active"; endif;?>" aria-current="true" aria-label="Slide <?php echo $slideCount; ?>"></button>
                  <?php endif; ?>
                  <?php if( $image_3['image'] ): ?>
                  <?php $slideCount = $slideCount + 1; ?>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slideCount - 1; ?>" class="<?php if( !$image_1['image'] && !$image_2['image']): echo "active"; endif;?>" aria-current="true" aria-label="Slide <?php echo $slideCount; ?>"></button>
                  <?php endif; ?>
                  <?php if( $image_4['image'] ): ?>
                  <?php $slideCount = $slideCount + 1; ?>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slideCount - 1; ?>" class="<?php if( !$image_1['image'] && !$image_2['image'] && !$image_3['image']): echo "active"; endif;?>" aria-current="true" aria-label="Slide <?php echo $slideCount; ?>"></button>
                  <?php endif; ?>
                  <?php if( $image_5['image'] ): ?>
                  <?php $slideCount = $slideCount + 1; ?>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slideCount - 1; ?>" class="<?php if( !$image_1['image'] && !$image_2['image'] && !$image_3['image'] && !$image_4['image']): echo "active"; endif;?>" aria-current="true" aria-label="Slide <?php echo $slideCount; ?>"></button>
                  <?php endif; ?>
                </div>
                <div class="carousel-inner">
                  <?php if( $image_1['image'] ): ?>
                    <div class="carousel-item active">
                      <img src="<?php echo esc_url( $image_1['image']['url'] ); ?>" class="d-block w-100" alt="<?php echo esc_attr( $image_1['image']['alt'] ); ?>" />
                      <div class="carousel-caption d-block">
                        <?php if( $image_1['links_to'] && $image_1['slide_title']): ?>
                          <a href="<?php echo esc_url( $image_1['links_to']['url'] ); ?>"><h5><?php echo $image_1['slide_title']; ?></h5></a>
                        <?php elseif( $image_1['slide_title']): ?>
                          <h5><?php echo $image_1['slide_title']; ?></h5>
                        <?php endif; ?>
                        <?php if( $image_1['slide_text'] ): ?>
                          <p class="d-none d-md-block"><?php echo $image_1['slide_text']; ?></p>
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php endif; ?>
                  <?php if( $image_2['image'] ): ?>
                    <div class="carousel-item <?php if( !$image_1['image']): echo "active"; endif;?>">
                      <img src="<?php echo esc_url( $image_2['image']['url'] ); ?>" class="d-block w-100" alt="<?php echo esc_attr( $image_2['image']['alt'] ); ?>" />
                      <div class="carousel-caption d-block">
                        <?php if( $image_2['links_to'] && $image_2['slide_title']): ?>
                          <a href="<?php echo esc_url( $image_2['links_to']['url'] ); ?>"><h5><?php echo $image_2['slide_title']; ?></h5></a>
                        <?php elseif( $image_2['slide_title']): ?>
                          <h5><?php echo $image_2['slide_title']; ?></h5>
                        <?php endif; ?>
                        <?php if( $image_2['slide_text'] ): ?>
                          <p class="d-none d-md-block"><?php echo $image_2['slide_text']; ?></p>
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php endif; ?>
                  <?php if( $image_3['image'] ): ?>
                    <div class="carousel-item <?php if( !$image_1['image'] && !$image_2['image']): echo "active"; endif;?>">
                      <img src="<?php echo esc_url( $image_3['image']['url'] ); ?>" class="d-block w-100" alt="<?php echo esc_attr( $image_3['image']['alt'] ); ?>" />
                      <div class="carousel-caption d-block">
                        <?php if( $image_3['links_to'] && $image_3['slide_title']): ?>
                          <a href="<?php echo esc_url( $image_3['links_to']['url'] ); ?>"><h5><?php echo $image_3['slide_title']; ?></h5></a>
                        <?php elseif( $image_3['slide_title']): ?>
                          <h5><?php echo $image_3['slide_title']; ?></h5>
                        <?php endif; ?>
                        <?php if( $image_3['slide_text'] ): ?>
                          <p class="d-none d-md-block"><?php echo $image_3['slide_text']; ?></p>
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php endif; ?>
                  <?php if( $image_4['image'] ): ?>
                    <div class="carousel-item <?php if( !$image_1['image'] && !$image_2['image'] && !$image_3['image']): echo "active"; endif;?>">
                      <img src="<?php echo esc_url( $image_4['image']['url'] ); ?>" class="d-block w-100" alt="<?php echo esc_attr( $image_4['image']['alt'] ); ?>" />
                      <div class="carousel-caption d-block">
                        <?php if( $image_4['links_to'] && $image_4['slide_title']): ?>
                          <a href="<?php echo esc_url( $image_4['links_to']['url'] ); ?>"><h5><?php echo $image_4['slide_title']; ?></h5></a>
                        <?php elseif( $image_4['slide_title']): ?>
                          <h5><?php echo $image_4['slide_title']; ?></h5>
                        <?php endif; ?>
                        <?php if( $image_4['slide_text'] ): ?>
                          <p class="d-none d-md-block"><?php echo $image_4['slide_text']; ?></p>
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php endif; ?>
                  <?php if( $image_5['image'] ): ?>
                    <div class="carousel-item <?php if( !$image_1['image'] && !$image_2['image'] && !$image_3['image'] && !$image_4['image']): echo "active"; endif;?>">
                      <img src="<?php echo esc_url( $image_5['image']['url'] ); ?>" class="d-block w-100" alt="<?php echo esc_attr( $image_5['image']['alt'] ); ?>" />
                      <div class="carousel-caption d-block">
                        <?php if( $image_5['links_to'] && $image_5['slide_title']): ?>
                          <a href="<?php echo esc_url( $image_5['links_to']['url'] ); ?>"><h5><?php echo $image_5['slide_title']; ?></h5></a>
                        <?php elseif( $image_5['slide_title']): ?>
                          <h5><?php echo $image_5['slide_title']; ?></h5>
                        <?php endif; ?>
                        <?php if( $image_5['slide_text'] ): ?>
                          <p class="d-none d-md-block"><?php echo $image_5['slide_text']; ?></p>
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
          <?php endif; ?>


					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', 'home-page' );
					}
					?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer('home');
