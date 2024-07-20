<?php
/*----------------------------
  Product Type Header
 ----------------------------*/
if(!function_exists('blonwe_product_type_header')){ 
	function blonwe_product_type_header($stockprogressbar = '', $stockstatus = '', $shippingclass = ''){
		global $product;
		global $post;
		global $woocommerce;
		
		$output = '';
		
		$id = get_the_ID();
		$allproduct = wc_get_product( get_the_ID() );

		$cart_url = wc_get_cart_url();
		$price = $allproduct->get_price_html();
		$weight = $product->get_weight();
		$stock_status = $product->get_stock_status();
		$stock_text = $product->get_availability();
		$short_desc = $product->get_short_description();
		$rating = wc_get_rating_html($product->get_average_rating());
		$ratingcount = $product->get_review_count();
		$ratingaverage  = $product->get_average_rating();

		$wishlist = get_theme_mod( 'blonwe_wishlist_button', '0' );
		$compare = get_theme_mod( 'blonwe_compare_button', '0' );
		$quickview = get_theme_mod( 'blonwe_quick_view_button', '0' );

		$managestock = $product->managing_stock();
		$stock_quantity = $product->get_stock_quantity();
		$stock_format = esc_html__('Only %s left in stock','blonwe');
		$stock_poor = '';
		if($managestock && $stock_quantity < 10) {
			$stock_poor .= '<div class="product-inventory color-red">'.sprintf($stock_format, $stock_quantity).'</div>';
		}

		$postview  = isset( $_POST['shop_view'] ) ? $_POST['shop_view'] : '';

			$output .= '<div class="product">';
			$output .= '<div class="product-wrapper style-1">';
			$output .= '<div class="product-inner">';

			$output .= '<div class="thumbnail-wrapper entry-media">';
			$output .= blonwe_sale_percentage();
			
			$output .= '<a class="product-thumbnail" href="'.get_permalink().'">';
			$output .= blonwe_product_image();
			$output .= '</a>';
			
			$output .= '</div>';

			$output .= '<div class="content-wrapper price-filled">';
			$output .= '<span class="price">';
			$output .= $price;
			$output .= '</span>';         
			$output .= '<h2 class="product-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';	
						
			if(blonwe_vendor_name()){
				$output .= '<div class="product-content-switcher">';
				$output .= '<div class="switcher-wrapper">';
				
				$output .= blonwe_vendor_name(); 
				
				if($ratingcount){	
				$output .= '<div class="product-rating style-2">';
				$output .= '<div class="product-rating-inner">';
				$output .= '<i class="klb-icon-star"></i>';
				$output .= '<div class="review-count">'.esc_html($ratingaverage).'</div>';
				$output .= '</div><!-- product-rating-inner -->';
				$output .= '<div class="rating-count">';
				$output .= '<span class="count-text">'.sprintf(_n('%d Review', '%d Reviews', $ratingcount, 'blonwe'), $ratingcount).'</span>';
				$output .= '</div><!-- rating-count -->';
				$output .= '</div><!-- product-rating -->';
				
				}        
				
				$output .= '</div><!-- switcher-wrapper -->';
				$output .= '</div><!-- product-content-switcher -->';
			} else {
				if($ratingcount){	
					$output .= '<div class="product-rating style-2">';
					$output .= '<div class="product-rating-inner">';
					$output .= '<i class="klb-icon-star"></i>';
					$output .= '<div class="review-count">'.esc_html($ratingaverage).'</div>';
					$output .= '</div><!-- product-rating-inner -->';
					$output .= '<div class="rating-count">';
					$output .= '<span class="count-text">'.sprintf(_n('%d Review', '%d Reviews', $ratingcount, 'blonwe'), $ratingcount).'</span>';
					$output .= '</div><!-- rating-count -->';
					$output .= '</div><!-- product-rating -->';
					
				}
			}
			
			ob_start();
			do_action('blonwe_product_box_footer', $stockprogressbar, $stockstatus, $shippingclass);
			$output .= ob_get_clean();
					
			$output .= '</div><!-- content-wrapper -->';

			$output .= '</div><!-- product-inner -->';
			$output .= '</div><!-- product-wrapper -->';
			$output .= '</div><!-- product -->';
		
		return $output;
	}
}