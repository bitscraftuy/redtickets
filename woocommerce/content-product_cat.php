<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


global $woocommerce_loop, $woo_product_layout, $rt_new_row, $first_row, $last_row, $rt_woo_cat_counter;

//get the category count if it is a shop page or a product category
if( is_product_category() || is_shop() ){
	$term 			= get_queried_object();
	$parent_id 		= empty( $term->term_id ) ? 0 : $term->term_id;

	$product_categories = get_categories( apply_filters( 'woocommerce_product_subcategories_args', array(
		'parent'       => $parent_id,
		'menu_order'   => 'ASC',
		'hide_empty'   => 0,
		'hierarchical' => 1,
		'taxonomy'     => 'product_cat',
		'pad_counts'   => 1,
		'hide_empty'   => 1
	) ) );

	$rt_woo_cat_counter = count($product_categories); 
}
 

/*
*	add rt class namems
*/

$page_product_count = wc_get_loop_prop( 'total' ) + $rt_woo_cat_counter;

$first_row = $first_row ? "first-row" : "";
$last_row = $rt_woo_cat_counter - $woocommerce_loop['loop'] < $woocommerce_loop['columns'] ? "last-row" : ""; //add last row clas to boxes 

$column_names = array("5"=>"five","4"=>"four","3"=>"three","2"=>"two","1"=>"one"); 
$classes[] =  "box  product-category product ". $column_names[$woocommerce_loop['columns']];  
$classes[] =  $first_row;
$classes[] =  $last_row;

?>
<?php
	if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 && $woocommerce_loop['loop'] > 0 && $woocommerce_loop['loop'] > $woocommerce_loop['columns'] -1 && ! $rt_new_row ){
		$rt_new_row = true;
		$first_row = false;
		echo '<div class="row with_borders fluid clearfix woo-categories-row">';
	}
?>

	<div <?php wc_product_cat_class($classes, $category); ?> data-rt-animate="animate" data-rt-animation-type="fadeIn"> 

		<div class="product_item_holder">
			<?php
			/**
			 * woocommerce_before_subcategory hook.
			 *
			 * @hooked woocommerce_template_loop_category_link_open - 10
			 */
			do_action( 'woocommerce_before_subcategory', $category );
			?>

			<div class="featured_image">
				<?php
				/**
				 * woocommerce_before_subcategory_title hook.
				 *
				 * @hooked woocommerce_subcategory_thumbnail - 10
				 */
				do_action( 'woocommerce_before_subcategory_title', $category );
				?>
			</div>

			<div class="product_info">
				<?php
				/**
				 * woocommerce_shop_loop_subcategory_title hook.
				 *
				 * @hooked woocommerce_template_loop_category_title - 10
				 */
				do_action( 'woocommerce_shop_loop_subcategory_title', $category );

				/**
				 * woocommerce_after_subcategory_title hook.
				 */
				do_action( 'woocommerce_after_subcategory_title', $category );

				/**
				 * woocommerce_after_subcategory hook.
				 *
				 * @hooked woocommerce_template_loop_category_link_close - 10
				 */
				do_action( 'woocommerce_after_subcategory', $category ); 
				?>
				
			</div>
		</div>
	</div>

<?php
	if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 && $rt_new_row ){	
		echo '</div><!-- / end .row -->';
		$rt_new_row = false;
		$first_row = false;
	}
?>