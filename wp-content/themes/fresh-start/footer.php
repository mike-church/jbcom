<?php if ( is_page( array('signup', 'wholesale-login', 'wholesale-registration-page') ) ) { ?>

	<?php wp_footer(); ?>

<?php

} else { ?>

	<footer class="py-5">

		<div class="container my-5">
			<div class="row">
				<div class="col-sm-12 col-md-4 col-xl-4 mb-4 mr-xl-auto">
					<div class="seal mb-3"></div>
					<p>All Julian Bakery products are <span class="font-bold">100% Gluten Free, Grain Free, and Non GMO!</span></p>
					<p><span class="font-bold">FREE SHIPPING</span> on all orders over $29.</p>
				</div>
				<div class="col-sm-12 col-md-4 col-xl-3 mb-4">
					<h6 class="text-uppercase font-bold">Quick Links</h6>
					<?php wp_nav_menu( array( 
						'theme_location' => 'footer_nav_quick',
						'container'       => 'div',
						'menu_class' => 'list-unstyled' 
					) ); ?>

					<h6 class="text-uppercase font-bold">Additional Links</h6>
					<?php wp_nav_menu( array( 
						'theme_location' => 'footer_nav_additional',
						'container'       => 'div',
						'menu_class' => 'list-unstyled' 
					) ); ?>
					
				</div>
				<div class="col-sm-12 col-md-4 col-xl-3 mb-4">
					<h6 class="text-uppercase font-bold">Julian Bakery, Inc.</h6>
					<p>624 Garrison St.<br>Oceanside, CA 92054</p>
					<p><span class="font-bold">Phone:</span> (760) 721-5200<br><span class="font-bold">Hours:</span> Monday - Friday, 8AM to 4PM PST</p>
					<h6 class="text-uppercase font-bold">Customer Service</h6>
					<p><a href="mailto:customerservice@julianbakery.com">customerservice@julianbakery.com</a></p>
					<h6 class="text-uppercase font-bold">Wholesale Accounts</h6>
					<p><a href="mailto:wholesale@julianbakery.com">wholesale@julianbakery.com</a></p>
					<h6 class="text-uppercase font-bold">Find Us On</h6>
					<div class="d-flex">
						<a href="https://www.facebook.com/julianbakery" target="_blank" class="social mr-4"><i class="icon-facebook"></i></a>
						<a href="https://www.instagram.com/julianbakery/" target="_blank" class="social mr-4"><i class="icon-instagram"></i></a>
						<a href="https://www.youtube.com/user/JulianBakery" target="_blank" class="social mr-4"><i class="icon-youtube"></i></a>
						<a href="https://twitter.com/JulianBakery" target="_blank" class="social"><i class="icon-twitter"></i></a>
					</div>
					<small>&copy; <?php echo date("Y");?> Julian Bakery. All rights reserved.</small>
				</div>
				
			</div>
		</div>

	</footer>

	<?php wp_footer(); ?>

	<script>AOS.init();</script>

<?php } ?>

</body>
</html>
