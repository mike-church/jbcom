<?php

require_once( __DIR__ . '/woocommerce/theme-support.php');
require_once( __DIR__ . '/woocommerce/base.php');
require_once( __DIR__ . '/woocommerce/hooks.php');
require_once( __DIR__ . '/woocommerce/cards.php');
require_once( __DIR__ . '/woocommerce/single-product.php');
require_once( __DIR__ . '/woocommerce/cart.php');
require_once( __DIR__ . '/woocommerce/alerts.php');

add_filter('apto/interface_query_args', 'apto_interface_query_args', 99, 2);
function  apto_interface_query_args($args, $current_sort_view_ID)
    {
        
        global $APTO;
        
        //check if WooCommerce sort
        if  ( $APTO->functions->is_woocommerce ( $args['sort_id'] ) === FALSE )
            return $args;
            
        $additional_query   =   array(
                                        'taxonomy' =>   'product_visibility',
                                        'field'    =>   'slug',
                                        'terms'    =>   array('exclude-from-search', 'exclude-from-catalog'),
                                        'operator' =>   'NOT IN',
                            );

        if  ( isset($args['tax_query']) )
            $args['tax_query'][]    =   $additional_query;
            else
            $args['tax_query']  =   array ( $additional_query ) ;
            
        return $args;   
    }