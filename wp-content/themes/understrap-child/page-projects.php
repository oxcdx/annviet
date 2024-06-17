<?php
/*
Template Name: Projects Page
*/

$container = get_theme_mod('understrap_container_type');

get_header(); ?>

<div class="wrapper ox-left-pad" id="page-wrapper">

	<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

		<div class="">
      <main id="main" class="site-main" role="main">
        <div class="">
          <h1 class="page-title">Projects</h1>
          <div class="mb-5">
            <?php
            // Display the content of the page
            while (have_posts()) {
                the_post();
                the_content();
            }
            ?>
          </div> 

          <div class="row">
              <?php
              // Define the WP Query
              $args = [
                  'post_type' => 'projects',
                  'posts_per_page' => -1, // Show all posts
              ];
              $projects_query = new WP_Query($args);

                if ($projects_query->have_posts()) {
                    while ($projects_query->have_posts()) {
                        $projects_query->the_post(); ?>

                          <div class="col-6 col-md-4 col-lg-3">
                            <div class="card">
                              <?php if (has_post_thumbnail()) { ?>
                                <div class="ratio ratio-4x3">
                                    <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                                </div>
                              <?php } ?>
                              <div class="card-body">
                                <h5 class="card-title">
                                  <a class="stretched-link" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                </h5>
                              </div>
                            </div>
                          </div>

              <?php }
              } else { ?>

                <p><?php _e('Sorry, no projects were found.'); ?></p>

              <?php } wp_reset_postdata(); ?>
            </div>
        </div>
      </main>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>