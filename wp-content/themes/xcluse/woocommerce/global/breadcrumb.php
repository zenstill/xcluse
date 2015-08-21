<?php
/**
 * Shop breadcrumb
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $breadcrumb ) {

	//echo $wrap_before;
	//print_r($breadcrumb);
	$breadcrumb1 = array();
	foreach ( $breadcrumb as $key => $crumb ) {
		 $sdadsa = stristr($crumb[0], 'page');
		  if(empty($sdadsa)){
		$breadcrumb1[$key] = $crumb;
	      }
		 //}
	}
	//print_r($breadcrumb1);exit;
	//echo $size = sizeof( $breadcrumb1 );
	foreach ( $breadcrumb1 as $key => $crumb ) {

		//echo $before;

		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
			$term = get_term_by('name', $crumb[0], 'product_cat');
			if($crumb[0] == 'Home'){
				echo '<a href="'.HOME.'">' . esc_html( $crumb[0] );
			}else{
				$term_link = get_term_link( $term->term_id,'product_cat' );
			echo '<a data-id='.$term->term_id.' data-url='.$term_link.' class="detail_bred_ajax">' . esc_html( $crumb[0] );
			}
		} else {
			echo esc_html( $crumb[0] );
			$term = get_term_by('name', $crumb[0], 'product_cat');
			//print_r($term);
		}

		//echo $after;
		
		/*if ( sizeof( $breadcrumb ) !== $key + 1 ) {
			echo $delimiter;
		}*/

		if ( sizeof( $breadcrumb1 ) !== $key + 1 ) {
			echo '<span> > </span>';
		}
		echo '</a>';

	}

	//echo $wrap_after;

}