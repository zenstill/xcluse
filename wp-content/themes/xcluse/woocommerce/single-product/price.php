<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>
<!--<li>  <span id="productPrice_del"><del> $125.00 </del>&nbsp;</span><span id="productPrice"> $125.00 </span> </li>-->
<!--<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">-->

	<?php echo $product->get_single_price_html(); ?>

	<!--<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

</div>-->
