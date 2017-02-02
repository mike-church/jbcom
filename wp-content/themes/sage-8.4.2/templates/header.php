<header class="cbp-spmenu-push">
  <nav class="navbar navbar-fixed-top">

      <a class="logo header-logo" href="<?php echo home_url('/'); ?>"></a>
      <a class="cart hidden-xs" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a> 
      <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>"><?php echo WC()->cart->get_cart_contents_count(); ?></a>
      <button id="showRightPush" type="button" class="collapsed" data-toggle="collapse" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="ui-menu__content">
        <i class="ui-menu__line ui-menu__line_1"></i>
        <i class="ui-menu__line ui-menu__line_2"></i>
        <i class="ui-menu__line ui-menu__line_3"></i>
      </span>
      </button>

  </nav>
  <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
    <?php wp_nav_menu( array( 
    'theme_location' => 'primary_navigation',
    'container'       => 'div',
    'container_class' => 'primary-nav'
    ) ); ?>
    <?php wp_nav_menu( array( 
    'theme_location' => 'secondary_navigation',
    'container'       => 'div',
    'container_class' => 'secondary-nav'
    ) ); ?>
    <div class="address hidden-xs">
      <span>Julian Bakery</span><br>624 Garrison St., Suite 102<br>Oceanside, CA 92054<br>Ph. 760-721-5200
    </div>
  </nav>
</header>