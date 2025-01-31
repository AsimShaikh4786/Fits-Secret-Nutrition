<?php
/*************************************************
## Tab View
*************************************************/ 

add_action( 'wp_ajax_nopriv_tab_view_grid2', 'blonwe_tab_view_grid2_callback' );
add_action( 'wp_ajax_tab_view_grid2', 'blonwe_tab_view_grid2_callback' );
function blonwe_tab_view_grid2_callback() {
	
	global $product;
	global $woocommerce;
	$catid = intval( $_POST['catid'] );
	$post_count = intval( $_POST['post_count'] );
	$producttype = $_POST['producttype'];
	$productclass = $_POST['productclass'];
	$best_selling = $_POST['best_selling'];
	$featured = $_POST['featured'];
	$on_sale = $_POST['on_sale'];
	$stockprogressbar = $_POST['stockprogressbar'];
	$stockstatus = $_POST['stockstatus'];
	$shippingclass = $_POST['shippingclass'];
	$countdown = $_POST['countdown'];
	
	$output = '';		

	$args = array(
		'post_type' => 'product',
		'posts_per_page'         => $post_count,
		'order'          => 'DESC',
		'orderby'        => 'date',
		'post_status'    => 'publish',
	);

	$args['tax_query'][] = array(
		'taxonomy' 	=> 'product_cat',
		'field' 	=> 'term_id',
		'terms' 	=> $catid,
	);
	
	if($best_selling == 'true'){
		$args['meta_key'] = 'total_sales';
		$args['orderby'] = 'meta_value_num';
	}

	if($featured == 'true'){
		$args['tax_query'] = array( array(
			'taxonomy' => 'product_visibility',
			'field'    => 'name',
			'terms'    => array( 'featured' ),
				'operator' => 'IN',
		) );
	}
	
	if($on_sale == 'true'){
		$args['meta_key'] = '_sale_price';
		$args['meta_value'] = array('');
		$args['meta_compare'] = 'NOT IN';
	}
	
     query_posts( $loop );
		
		$output .= '<div id="'.esc_attr($catid).'" class="'.esc_attr($productclass).'" data-producttype="'.esc_attr($producttype).'" data-perpage="'.esc_attr($post_count).'" data-best_selling="'.esc_attr($best_selling).'" data-featured="'.esc_attr($featured).'" data-onsale="'.esc_attr($on_sale).'" data-stockprogressbar="'.esc_attr($stockprogressbar).'"  data-countdown="'.esc_attr($countdown).'" data-stockstatus="'.esc_attr($stockstatus).'" data-shippingclass="'.esc_attr($shippingclass).'">';
		
		$loop = new \WP_Query( $args );
			if ( $loop->have_posts() ) {
				while ( $loop->have_posts() ) : $loop->the_post();
					global $product;
					global $post;
					global $woocommerce;
			
					
					$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
					if($producttype == 'type13'){
						$output .= blonwe_product_type13($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($producttype == 'type12'){
						$output .= blonwe_product_type12($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($producttype == 'type11'){
						$output .= blonwe_product_type11($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($producttype == 'type10'){
						$output .= blonwe_product_type10($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($producttype == 'type9'){
						$output .= blonwe_product_type9($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($producttype == 'type8'){
						$output .= blonwe_product_type8($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($producttype == 'type7'){
						$output .= blonwe_product_type7($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($producttype == 'type6'){
						$output .= blonwe_product_type6($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($producttype == 'type5'){
						$output .= blonwe_product_type5($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($producttype == 'type4'){
						$output .= blonwe_product_type4($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($producttype == 'type3'){
						$output .= blonwe_product_type3($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($producttype == 'type2'){
						$output .= blonwe_product_type2($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} else {
						$output .= blonwe_product_type1($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					}
					$output .= '</div>';
					
				endwhile;
			}
			wp_reset_postdata();
			
		$output .= '</div>';
		
	 	$output_escaped = $output;
	 	echo $output_escaped;

	
		wp_die();
}