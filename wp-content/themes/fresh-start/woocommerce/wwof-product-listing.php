<?php
/**
 * The template for displaying product listing
 *
 * Override this template by copying it to yourtheme/woocommerce/wwof-product-listing.php
 *
 * @author      Rymera Web Co
 * @package     WooCommerceWholeSaleOrderForm/Templates
 * @version     1.8.1
 */

if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// NOTE: Don't Remove any ID or Classes inside this template when overriding it.
// Some JS Files Depend on it. You are free to add ID and Classes without any problem.

$labels = array(
    'product'         =>  __( 'Product' , 'woocommerce-wholesale-order-form' ),
    'sku'             =>  __( 'SKU' , 'woocommerce-wholesale-order-form' ),
    'price'           =>  __( 'Price' , 'woocommerce-wholesale-order-form' ),
    'stock_quantity'  =>  __( 'In Stock' , 'woocommerce-wholesale-order-form' ),
    'quantity'        =>  __( 'Quantity' , 'woocommerce-wholesale-order-form' )
);
?>

    
    <table class="table wholesale-order-table">

        <tbody><?php

        $_REQUEST[ 'tab_index_counter' ] = 1;
        $thumbnail_size = $product_listing->wwof_get_product_thumbnail_dimension();
        $wholesale_role = $wholesale_prices->_get_current_user_wholesale_role();

        if ( $product_loop->have_posts() ) {

            // Ensure that available variations always show their price HTML even if the prices are the same
            add_filter( 'woocommerce_show_variation_price', function() { return true; } );

            while ( $product_loop->have_posts() ) { $product_loop->the_post();

                global $product;

                $product_id             = get_the_ID();
                $product                = wc_get_product( $product_id );
                $product_type           = WWOF_Functions::wwof_get_product_type( $product );
                $available_variations   = array();

                if ( $product_type == 'variable' ) {

                    $available_variations = WWOF_Product_Listing_Helper::wwof_get_available_variations( $product , $product_id , $wholesale_role );

                    if ( !empty( $wholesale_role ) ) {

                        // get wholesale price for all variations
                        WWOF_Product_Listing_Helper::wwof_get_variations_wholesale_price( $available_variations , $wholesale_role );

                    }

                    // update available variations input arguments
                    WWOF_Product_Listing_Helper::wwof_update_variations_input_args( $available_variations );

                }

                if( $product_type == 'grouped' )
                    continue;
                else{ ?>

                    <tr>
                        <td class="product_meta_col" style="display: none !important;" data-product_variations="<?php if ( isset( $available_variations ) ) echo htmlspecialchars( wp_json_encode( $available_variations ) ); ?>">
                            <?php echo $product_listing->wwof_get_product_meta( $product ); ?>
                        </td>

                        <td>
                            <?php echo $product_listing->wwof_get_product_image( $product , get_the_permalink( $product_id ) , $thumbnail_size ); ?>
                        </td>
                        
                        <td>
                            
                            
                            
                            
                            <?php echo $product_listing->wwof_get_product_title( $product , get_the_permalink( $product_id ) ); ?>
                            <?php echo $product_listing->wwof_get_product_variation_field( $product , $product_type , $available_variations ); ?>
                            <?php echo $product_listing->wwof_get_product_variation_selected_options( $product , $product_type ); ?>
                            <?php echo $product_listing->wwof_get_product_addons( $product , $product_id , $product_type ); ?>

                            <?php echo $wholesale_prices->wwof_get_product_price( $product ); ?>
                        </td>
                        <td>
                            <label><small>QTY</small></label>
                            <div class="product_quantity_col">
                                <?php echo $wholesale_prices->wwof_get_product_quantity_field( $product , $product_id , $product_type , $wholesale_role ); ?>
                            </div>
                            <div class="actions">
                                <?php echo $product_listing->wwof_get_product_row_action_fields( $product ); ?>
                            </div>
                        
                        </td>

                        
                        
                        
                  
                    </tr><?php

                }
                
                $_REQUEST[ 'tab_index_counter' ] += 1;

            }// End while loop

        } else { ?>

            <tr class="no-products">
                <td colspan="4">
                    <span><?php _e( 'No Products Found' , 'woocommerce-wholesale-order-form' ); ?></span>
                </td>
            </tr> <?php

        } ?>
        </tbody>

    </table><!--#wwof_product_listing_table-->


<?php echo $product_listing->wwof_get_cart_subtotal(); ?>

<div id="wwof_product_listing_pagination" data-max-pages="<?php echo $product_loop->max_num_pages; ?>">

    <div class="total_products_container">
        <span class="total_products"><?php
            echo sprintf( __( '%1$s Product/s Found' , 'woocommerce-wholesale-order-form' ) , $product_loop->found_posts ); ?>
        </span>
    </div>

    <?php echo $product_listing->wwof_get_gallery_listing_pagination( $paged , $product_loop->max_num_pages , $search , $cat_filter ); ?>

</div><!--#wwof_product_listing_pagination-->
