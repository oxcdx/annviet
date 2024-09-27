/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useRef } from 'react';
import { useBlockProps } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {Element} Element to render.
 */
export default function save(props) {
  console.log('save');

  console.log(props);

  let blockProps = useBlockProps.save({
		className: "ox-tile-gallery",
	});

	return (
    <div {...blockProps}>
      <div>
        <figure className="ox-tile-gallery-inner-container">
          {props.attributes.images.map((image, index) => {
            console.log(image)

            return (
              <img 
                key={image.id} 
                src={image.url} 
                data-mediaid={image.id}
                data-caption={image.caption[0]}
                data-slide-no={index}
                alt={image.alt}
                className='gallery-item'
                // aria-current={index === 0 ? 'true' : 'false'}
                aria-label={"Slide " + index} 
              />
            )
          })}
        </figure>
      </div>
      <div
        class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content ox-dark-modal">
            <div class="modal-header border-0">
              <h5 class="modal-title visually-hidden" id="exampleModalLabel">Image Gallery Carousel</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5">
              <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-interval="false">
                <div class="carousel-indicators">
                  {props.attributes.images.map((image, index) => (
                    <button 
                      type="button" 
                      data-bs-target="#carouselExampleCaptions" 
                      data-bs-slide-to={index}
                      class={index === 0 ? 'active' : ''}
                      aria-current={index === 0 ? 'true' : 'false'}
                      aria-label={"Slide " + index}>
                    </button>
                  ))}
                </div>
                <div class="carousel-inner h-100 position-relative">
                  {props.attributes.images.map((image, index) => (
                    <div 
                      class={index === 0 ? 'carousel-item h-100 active' : 'carousel-item h-100'}
                    >
                      <div class="d-flex justify-content-center align-items-center w-100 h-100">
                        <img src={image.url} class="d-block" alt={image.alt} />
                        <div class="carousel-caption d-none d-md-block">
                          {image.caption[0] ? <p>{image.caption[0]}</p> : ''}
                        </div>
                      </div>
                    </div>
                  ))}
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
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
	);
}
