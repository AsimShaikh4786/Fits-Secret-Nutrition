<?php

/*************************************************
## Scripts
*************************************************/
function blonwe_side_cart_scripts() {
	wp_enqueue_style( 'klb-side-cart',   plugins_url( 'css/side-cart.css', __FILE__ ), false, '1.0');
	wp_enqueue_script( 'klb-side-cart',   plugins_url( 'js/side-cart.js', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'blonwe_side_cart_scripts' );

if ( ! function_exists( 'blonwe_side_cart' ) ) {
	function blonwe_side_cart(){
		?>
			<div class="cart-widget-side">
				<div class="site-scroll">
					<div class="cart-side-header">
						<div class="cart-side-title"><?php esc_html_e('Shopping Cart', 'blonwe-core'); ?></div>
						<div class="cart-side-close"><i class="klb-icon-xmark-thin"></i></div>
					</div><!-- cart-side-header -->
					<div class="cart-side-body">
						<div class="fl-mini-cart-content">
							<?php woocommerce_mini_cart(); ?>
						</div>
					</div><!-- cart-side-body -->
				</div><!-- site-scroll -->
			</div><!-- cart-widget-side -->
			
			<div class="cart-side-overlay"></div>
		<?php 
	}
}
add_action('wp_footer', 'blonwe_side_cart');