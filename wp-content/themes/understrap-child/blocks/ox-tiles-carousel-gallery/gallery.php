<?php
/**
 * Gallery Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$images = get_field('tiles_carousel_gallery');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

$background_color  = get_field( 'background_color' ); // ACF's color picker.
$text_color        = get_field( 'text_color' ); // ACF's color picker.

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'ox-tile-gallery';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Build a valid style attribute for background and text colors.
$styles = array( 'background-color: ' . $background_color, 'color: ' . $text_color );
$style  = implode( '; ', $styles );

if( $images ): ?>
  <div <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>" style="<?php echo esc_attr( $style ); ?>">
    <div>
      <figure className="ox-tile-gallery-inner-container">
        <?php foreach( $images as $key=>$image ): ?>
          <img 
            src="<?php echo esc_url($image['url']); ?>" 
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
  </div>
<?php endif; ?>