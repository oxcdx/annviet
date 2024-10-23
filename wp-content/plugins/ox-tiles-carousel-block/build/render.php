<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

// Load values and assign defaults.
$images = get_field('tiles_carousel_gallery');

$background_color  = get_field( 'background_color' ); // ACF's color picker.
$text_color        = get_field( 'text_color' ); // ACF's color picker.

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "class" and "align" values.
$class_name = 'ox-tile-gallery';
if ( ! empty( $block['class'] ) ) {
    $class_name .= ' ' . $block['class'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Build a valid style attribute for background and text colors.
$styles = array( 'background-color: ' . $background_color, 'color: ' . $text_color );
$style  = implode( '; ', $styles );

// Generate a unique ID for the gallery modal and carousel
$unique_id = uniqid('gallery_');

if( $images ): ?>
  <div <?php echo esc_attr( $anchor ); ?> class="<?php echo esc_attr( $class_name ); ?> ox-tile-gallery" data-unique-id="<?php echo esc_attr( $unique_id ); ?>">
    <div>
      <figure class="ox-tile-gallery-inner-container">
        <?php foreach( $images as $key=>$image ): 
          $thumb = $image['sizes'][ 'medium' ];
          ?>
          <img 
            src="<?php echo esc_url($thumb); ?>" 
            alt="<?php echo esc_attr($image['alt']); ?>"
            class='gallery-item'
            data-slide-no="<?php echo $key; ?>"
            data-mediaid="<?php echo esc_attr($image['id']); ?>"
            data-caption="<?php echo esc_attr($image['caption']); ?>"
            aria-label="Slide <?php echo $key; ?>"
          />
        <?php endforeach; ?>
      </figure>
    </div>
    <div
      class="modal fade" id="<?php echo $unique_id; ?>Modal" tabindex="-1" aria-labelledby="<?php echo $unique_id; ?>ModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content ox-dark-modal">
          <div class="modal-header border-0">
            <h5 class="modal-title visually-hidden" id="<?php echo $unique_id; ?>ModalLabel">Image Gallery Carousel</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body pb-5">
            <div id="<?php echo $unique_id; ?>Carousel" class="carousel slide h-100" data-bs-interval="false">
              <div class="carousel-indicators">
                <?php foreach( $images as $key=>$image ): ?>
                  <button 
                    type="button" 
                    data-bs-target="#<?php echo $unique_id; ?>Carousel" 
                    data-bs-slide-to="<?php echo $key; ?>"
                    class="<?php echo ($key === 0) ? 'active' : ''; ?>"
                    aria-current="<?php echo ($key === 0) ? 'true' : 'false'; ?>"
                    aria-label="Slide <?php echo $key; ?>" 
                  >
                  </button>
                <?php endforeach; ?>
              </div>
              <div class="carousel-inner h-100 position-relative">
                <?php foreach( $images as $key=>$image ): ?>
                  <div 
                    class="<?php echo $key === 0 ? 'carousel-item h-100 active' : 'carousel-item h-100'; ?>"
                  >
                    <div class="d-flex justify-content-center align-items-center w-100 h-100">
                      <img 
                        src="<?php echo $image['url']; ?>"
                        class="d-block" 
                        alt="<?php echo $image['alt']; ?>"
                      />
                      <div class="carousel-caption d-none d-md-block">
                        <?php echo $image['caption'] ? $image['caption'] : ''; ?>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $unique_id; ?>Carousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $unique_id; ?>Carousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>