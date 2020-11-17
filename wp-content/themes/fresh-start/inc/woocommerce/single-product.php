<?php

// PRODUCT PAGE


// Hook woocommerce_before_single_product_summary

// Title
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action('woocommerce_product_title_rating', 'woocommerce_template_single_title', 5);
function woocommerce_template_single_title() { ?>
  <h1 class="product_title entry-title mb-3"><?php the_title();?></h1>
  <?php
}

// Rating
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_product_title_rating', 'woocommerce_template_single_rating', 10);

// Content
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_product_description', 30 );
function woocommerce_template_product_description() {
	wc_get_template( 'single-product/tabs/description.php' );
}

// Additional Information
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_product_additional', 40 );
function woocommerce_template_product_additional() {
  wc_get_template( 'single-product/tabs/additional-information.php' );
}

// Product Video and Product Gallery
add_action( 'woocommerce_before_single_product_summary', 'fresh_start_product_gallery', 40 );
function fresh_start_product_gallery() {

  global $product;
  $video = rwmb_meta( 'video_youtube_id' );
  $video_url = $video;
  $video_id = preg_replace('#^https?://youtu.be/#', '', $video_url);
  $attachment_ids = $product->get_gallery_attachment_ids();

  if (!empty($video)  && !empty($attachment_ids)) {

    echo '<div class="border-bottom py-4">';

    if (!empty($video)) { ?>
      <div class="iframe-container mb-4">
        <iframe src="https://www.youtube.com/embed/<?php echo $video_id;?>?rel=0&enablejsapi=1&showinfo=0" frameborder="0" allowfullscreen></iframe>
      </div>
      <?php }
    
    if (!empty($attachment_ids)) { ?>
      <h5 class="font-regular">Gallery</h5>
      <div class="product-gallery row" itemscope itemtype="http://schema.org/ImageGallery">
        <?php foreach( $attachment_ids as $attachment_id ) { ?> 
          <div class="col-4 col-sm-3">
            <figure class="border" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a href="<?php echo wp_get_attachment_url($attachment_id, 'product-image');?>" itemprop="contentUrl" data-size="600x600">
            <?php echo wp_get_attachment_image($attachment_id, 'thumbnail'); ?>
            </a>
            </figure>
          </div>
        <?php } ?>
      </div>
      <!-- Modal -->
      <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <!-- Slides wrapper -->
        <div class="pswp__scroll-wrap">
          <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
          </div>
          <!-- Slide UI -->
          <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
              <div class="pswp__counter"></div>
              <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
              <button class="pswp__button pswp__button--share" title="Share"></button>
              <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
              <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
              <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
              <!-- element will get class pswp__preloader--active when preloader is running -->
              <div class="pswp__preloader">
                <div class="pswp__preloader__icn">
                  <div class="pswp__preloader__cut">
                    <div class="pswp__preloader__donut"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
              <div class="pswp__share-tooltip"></div> 
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
              <div class="pswp__caption__center"></div>
            </div>
          </div>
        </div>
      </div>
    <?php }

    echo '</div>';

  } else {

    if (!empty($video)) { ?>
      <div class="border-bottom py-4">
        <div class="iframe-container mb-4">
          <iframe src="https://www.youtube.com/embed/<?php echo $video_id;?>?rel=0&enablejsapi=1&showinfo=0" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    <?php }
    
    if (!empty($attachment_ids)) { ?>
      <div class="border-bottom py-4">
        <h5 class="font-regular">Gallery</h5>
        <div class="product-gallery row" itemscope itemtype="http://schema.org/ImageGallery">
          <?php foreach( $attachment_ids as $attachment_id ) { ?> 
            <div class="col-4 col-sm-3">
              <figure class="border" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
              <a href="<?php echo wp_get_attachment_url($attachment_id, 'product-image');?>" itemprop="contentUrl" data-size="600x600">
              <?php echo wp_get_attachment_image($attachment_id, 'thumbnail'); ?>
              </a>
              </figure>
            </div>
          <?php } ?>
        </div>
        <!-- Modal -->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="pswp__bg"></div>
          <!-- Slides wrapper -->
          <div class="pswp__scroll-wrap">
            <div class="pswp__container">
              <div class="pswp__item"></div>
              <div class="pswp__item"></div>
              <div class="pswp__item"></div>
            </div>
            <!-- Slide UI -->
            <div class="pswp__ui pswp__ui--hidden">
              <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                  <div class="pswp__preloader__icn">
                    <div class="pswp__preloader__cut">
                      <div class="pswp__preloader__donut"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
              </div>
              <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
              <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
              <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php }

  }
}

// Reviews
add_action( 'woocommerce_before_single_product_summary', 'comments_template', 80 );

remove_action('woocommerce_review_before', 'woocommerce_review_display_gravatar', 10);
add_action( 'woocommerce_review_meta', 'woocommerce_review_display_gravatar', 10 );

remove_action('woocommerce_review_meta', 'woocommerce_review_display_meta', 10);
add_action( 'woocommerce_review_meta', 'woocommerce_review_display_meta', 20 );

remove_action('woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10);
add_action( 'woocommerce_review_meta', 'woocommerce_review_display_rating', 30 );

// Move Sale Flash to Summary
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 5);

// Change Cart Form Position
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 40);

// Add Cart Form Wrapper
add_action( 'woocommerce_before_add_to_cart_quantity', 'fresh_start_start_cart_wrapper' );
function fresh_start_start_cart_wrapper() {
   echo '<div class="d-flex justify-content-between add-to-cart-wrap">';
}
add_action( 'woocommerce_after_add_to_cart_button', 'fresh_start_end_cart_wrapper', 10 );
function fresh_start_end_cart_wrapper() {
   echo '</div>';
}

remove_action( 'woocommerce_after_single_product_summary', 'wc_mnm_template_add_to_cart_after_summary', -1000 );

// Remove Category Taxonomy Links

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

// Remove WooCommerce Default Product Image and Gallery
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

// Change Order of Upsell and Related Products
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 20 );
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 30 );

// Remove Short Description
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action('add_meta_boxes', 'remove_short_description', 999);
function remove_short_description() {
     remove_meta_box( 'postexcerpt', 'product', 'normal');
}

// Add Product Page Scripts
 
add_action( 'wp_footer', 'fresh_start_add_cart_quantity_plus_minus', 100 );
function fresh_start_add_cart_quantity_plus_minus() {
   // Only run this on the single product page
   if ( ! is_product() ) return;
   ?>
      <script type="text/javascript">

      // Photo Swipe for Product Gallery

      var initPhotoSwipeFromDOM = function(gallerySelector) {

      // parse slide data (url, title, size ...) from DOM elements 
      // (children of gallerySelector)
      var parseThumbnailElements = function(el) {
          var thumbElements = el.childNodes,
              numNodes = thumbElements.length,
              items = [],
              figureEl,
              linkEl,
              size,
              item;

          for(var i = 0; i < numNodes; i++) {

              figureEl = thumbElements[i]; // <figure> element

              // include only element nodes 
              if(figureEl.nodeType !== 1) {
                  continue;
              }

              linkEl = figureEl.children[0]; // <a> element

              size = linkEl.getAttribute('data-size').split('x');

              // create slide object
              item = {
                  src: linkEl.getAttribute('href'),
                  w: parseInt(size[0], 10),
                  h: parseInt(size[1], 10)
              };



              if(figureEl.children.length > 1) {
                  // <figcaption> content
                  item.title = figureEl.children[1].innerHTML; 
              }

              if(linkEl.children.length > 0) {
                  // <img> thumbnail element, retrieving thumbnail url
                  item.msrc = linkEl.children[0].getAttribute('src');
              } 

              item.el = figureEl; // save link to element for getThumbBoundsFn
              items.push(item);
          }

          return items;
        };

        // find nearest parent element
        var closest = function closest(el, fn) {
            return el && ( fn(el) ? el : closest(el.parentNode, fn) );
        };

        // triggers when user clicks on thumbnail
        var onThumbnailsClick = function(e) {
            e = e || window.event;
            e.preventDefault ? e.preventDefault() : e.returnValue = false;

            var eTarget = e.target || e.srcElement;

            // find root element of slide
            var clickedListItem = closest(eTarget, function(el) {
                return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
            });

            if(!clickedListItem) {
                return;
            }

            // find index of clicked item by looping through all child nodes
            // alternatively, you may define index via data- attribute
            var clickedGallery = clickedListItem.parentNode,
                childNodes = clickedListItem.parentNode.childNodes,
                numChildNodes = childNodes.length,
                nodeIndex = 0,
                index;

            for (var i = 0; i < numChildNodes; i++) {
                if(childNodes[i].nodeType !== 1) { 
                    continue; 
                }

                if(childNodes[i] === clickedListItem) {
                    index = nodeIndex;
                    break;
                }
                nodeIndex++;
            }



            if(index >= 0) {
                // open PhotoSwipe if valid index found
                openPhotoSwipe( index, clickedGallery );
            }
            return false;
        };

        // parse picture index and gallery index from URL (#&pid=1&gid=2)
        var photoswipeParseHash = function() {
            var hash = window.location.hash.substring(1),
            params = {};

            if(hash.length < 5) {
                return params;
            }

            var vars = hash.split('&');
            for (var i = 0; i < vars.length; i++) {
                if(!vars[i]) {
                    continue;
                }
                var pair = vars[i].split('=');  
                if(pair.length < 2) {
                    continue;
                }           
                params[pair[0]] = pair[1];
            }

            if(params.gid) {
                params.gid = parseInt(params.gid, 10);
            }

            return params;
        };

        var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
        var pswpElement = document.querySelectorAll('.pswp')[0],
            gallery,
            options,
            items;

        items = parseThumbnailElements(galleryElement);

        // define options (if needed)
        options = {

            // define gallery index (for URL)
            galleryUID: galleryElement.getAttribute('data-pswp-uid'),

            getThumbBoundsFn: function(index) {
                // See Options -> getThumbBoundsFn section of documentation for more info
                var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                    pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                    rect = thumbnail.getBoundingClientRect(); 

                return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
            }

        };

        // PhotoSwipe opened from URL
        if(fromURL) {
            if(options.galleryPIDs) {
                // parse real index when custom PIDs are used 
                // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                for(var j = 0; j < items.length; j++) {
                    if(items[j].pid == index) {
                        options.index = j;
                        break;
                    }
                }
            } else {
                // in URL indexes start from 1
                options.index = parseInt(index, 10) - 1;
            }
        } else {
            options.index = parseInt(index, 10);
        }

        // exit if index not found
        if( isNaN(options.index) ) {
            return;
        }

        if(disableAnimation) {
            options.showAnimationDuration = 0;
        }

        // Pass data to PhotoSwipe and initialize it
        gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.init();
        };

        // loop through all gallery elements and bind events
        var galleryElements = document.querySelectorAll( gallerySelector );

        for(var i = 0, l = galleryElements.length; i < l; i++) {
            galleryElements[i].setAttribute('data-pswp-uid', i+1);
            galleryElements[i].onclick = onThumbnailsClick;
        }

        // Parse URL and open gallery if it contains #&pid=3&gid=1
        var hashData = photoswipeParseHash();
        if(hashData.pid && hashData.gid) {
            openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
        }
    };

    // execute above function
    initPhotoSwipeFromDOM('.product-gallery');


    </script>

   <?php
}

//Variable Product Price 

//Remove Price Range
add_filter( 'woocommerce_variable_sale_price_html', 'detect_variation_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'detect_variation_price_format', 10, 2 );
function detect_variation_price_format( $price, $product ) {
// Main Price
$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
if ($prices[0] !== $prices[1] && is_product()) {
$price = $prices[0] !== $prices[1] ? sprintf( __( '', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
}
// Sale Price
$prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
sort( $prices );
$saleprice = $prices[0] !== $prices[1] ? sprintf( __( '', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
if ( $price !== $saleprice ) {
$price = '<del>' . $saleprice . '</del> <ins>' . $price . '</ins>';
}
return $price;
}
remove_action('woocommerce_single_variation', 'woocommerce_single_variation', 10 );
add_action('woocommerce_before_variations_form', 'woocommerce_single_variation', 10 );

