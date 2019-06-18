<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-KMMWZRP');</script>
	<!-- End Google Tag Manager -->
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=1411080325867149&ev=PageView&noscript=1"
	/></noscript>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KMMWZRP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php if ( is_page( 'home') ) { ?>

<header class="position-absolute w-100 py-4">
	<div class="container-fluid">
		<nav>
			<div class="row">
				<div class="col-sm-12 col-xl-10 mx-auto">
					<div class="d-flex align-items-center">
						<div class="mr-auto" style="line-height: normal;">
							<a href="<?php echo home_url('/'); ?>" class="white-logo header-logo" style="line-height: normal;"></a>
						</div>
						<div>
							<ul class="list-unstyled m-0 p-0">
								<li class="nav-item d-none d-lg-inline-block dropdown">
									<button data-toggle="dropdown" data-offset="0,10" class="btn btn-outline-light dropdown-toggle">Shop</button>
									<div class="dropdown-menu">
										<div class="dropdown-item">
											<a href="/shop">All Products</a>
										</div>
										<div class="dropdown-divider"></div>
										<h6 class="dropdown-header">Diet Type</h6>
										<?php wp_nav_menu( array( 
											'theme_location' => 'site_nav_diet',
											'container'       => 'div',
											'menu_class' => 'list-unstyled' 
										) ); ?>
										<div class="dropdown-divider"></div>
										<h6 class="dropdown-header">Popular Categories</h6>
										<?php wp_nav_menu( array( 
											'theme_location' => 'site_nav_categories',
											'container'       => 'div',
											'menu_class' => 'list-unstyled' 
										) ); ?>	
									</div>
								</li>
								<li class="nav-item d-none d-lg-inline-block">
									<a href="/blog" class="btn btn-outline-light ">Blog</a>
								</li>
								<li class="d-none d-lg-inline-block">
									<a href="/my-account" class="btn btn-outline-light">My Account</a>
								</li>
								<li class="d-inline-block">
									<a href="<?php echo wc_get_cart_url(); ?>" class="btn btn-link text-white"><i class="icon-shopping-cart"></i> <sup><?php echo WC()->cart->get_cart_contents_count(); ?></sup></a>
								</li>
								<li class="d-inline-block">
									<a href="javascript:void(0)" class="btn btn-link text-white lockscroll" onclick="openSearch()"><i class="icon-search"></i></a>
								</li>
								<li class="d-none d-lg-inline-block">
									<button data-toggle="dropdown" class="btn btn-link text-white"><i class="icon-more"></i></button>
									<?php wp_nav_menu( array( 
										'theme_location' => 'site_nav_more',
										'container'       => '',
										'menu_class' => 'dropdown-menu dropdown-menu-right' 
									) ); ?>
								</li>
								<li class="d-inline-block d-lg-none">
									<a href="#" class="btn btn-link text-white"><i class="icon-bars"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</div>
</header>

<?php

} else { 

$args = array(
'post_type' => 'jb_homepage_hero',
'posts_per_page' => 1,
'orderby' => 'date'
);
$myquery = new WP_Query($args);
// The Loop
while ( $myquery->have_posts() ) { $myquery->the_post();

$color = rwmb_meta( 'jb_homepage_hero_background_color' );
$value = rwmb_meta( 'jb_homepage_hero_color_value' );

?>

<header class="w-100 py-4 <?php echo $color;?>50">

	<div class="container-fluid">
		<nav>
			<div class="row">
				<div class="col-sm-12 col-xl-10 mx-auto">
					<div class="d-flex align-items-center">
						<div class="mr-auto" style="line-height: normal;">
							<a href="<?php echo home_url('/'); ?>" class="color-logo header-logo" style="line-height: normal;"></a>
						</div>
						<div>
							<ul class="list-unstyled m-0">
								<li class="nav-item d-none d-lg-inline-block dropdown">
									<button data-toggle="dropdown" data-offset="0,10" class="btn btn-outline-dark dropdown-toggle">Shop</button>
									<div class="dropdown-menu">
										<div class="dropdown-item">
											<a href="/shop">All Products</a>
										</div>
										<div class="dropdown-divider"></div>
										<h6 class="dropdown-header">Diet Type</h6>
										<?php wp_nav_menu( array( 
											'theme_location' => 'site_nav_diet',
											'container'       => 'div',
											'menu_class' => 'list-unstyled' 
										) ); ?>
										<div class="dropdown-divider"></div>
										<h6 class="dropdown-header">Popular Categories</h6>
										<?php wp_nav_menu( array( 
											'theme_location' => 'site_nav_categories',
											'container'       => 'div',
											'menu_class' => 'list-unstyled' 
										) ); ?>	
									</div>
								</li>
								<li class="nav-item d-none d-lg-inline-block">
									<a href="/blog" class="btn btn-outline-dark ">Blog</a>
								</li>
								<li class="d-none d-lg-inline-block">
									<a href="/my-account" class="btn btn-outline-dark">My Account</a>
								</li>
								<li class="d-inline-block">
									<a href="<?php echo wc_get_cart_url(); ?>" class="btn btn-link text-dark"><i class="icon-shopping-cart"></i> <sup><?php echo WC()->cart->get_cart_contents_count(); ?></sup></a>
								</li>
								<li class="d-inline-block">
									<a href="javascript:void(0)" class="btn btn-link text-dark lockscroll" onclick="openSearch()"><i class="icon-search"></i></a>
								</li>
								<li class="d-none d-lg-inline-block">
									<button data-toggle="dropdown" data-offset="0,10" class="btn btn-link text-dark"><i class="icon-more"></i></button>
									<?php wp_nav_menu( array( 
										'theme_location' => 'site_nav_more',
										'container'       => '',
										'menu_class' => 'dropdown-menu dropdown-menu-right' 
									) ); ?>
								</li>
								<li class="d-inline-block d-lg-none">
									<a href="#" class="btn btn-link text-dark"><i class="icon-bars"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</div>
</header>
<div class="brand-strip <?php echo $color;?><?php echo $value;?>"></div>

<?php } 

wp_reset_postdata(); 

}   
?>









<div id="siteSearch" class="overlay">
	<div class="overlay-container d-flex justify-content-center align-items-center">
	
		<a href="javascript:void(0)" onclick="closeSearch()" class="lockscroll close circle"><i class="icon-times"></i></a>

		<div class="container">
			<div class="row">
				<div class="col-sm-8 m-auto">
					<form role="search" method="get" class="search" action="<?php echo home_url( '/' ); ?>" >
						<label class="text-uppercase">Search</label>
						<input type="search" class="search-field" placeholder="What are you looking for?" value="" name="s" title="Search Julian Bakery" data-swplive="true" data-swpconfig />
						<button type="submit" class="btn btn-link search-btn"><i class="icon-search" aria-hidden="true"></i></button>
					</form>
				</div>
				
			</div>
		</div>

	</div>
</div>