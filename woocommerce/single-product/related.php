<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>
	<?php

	$columns = $columns = get_option(RT_THEMESLUG."_woo_related_products_layout") ? get_option(RT_THEMESLUG."_woo_related_products_layout") : 3;
	//js script to run
	printf('
		<script type="text/javascript">
		 /* <![CDATA[ */ 
			// run carousel
				jQuery(document).ready(function() { 
					 jQuery("#%1$s").rt_start_carousels(%2$s);
				}); 
		/* ]]> */	
		</script>
	',"woo-related-products",3,"");		
	?>

	<div class="related products margin-b40">

		<div class="title_line margin-b20">
			<h3 class="featured_article_title">
				<span class="icon-link heading_icon"></span> <?php esc_html_e( 'Related Products', 'woocommerce' );?>
			</h3>
		</div>


		<?php 
			echo '<div id="woo-related-products" class="carousel-holder clearfix margin-b20">';
			echo '<section class="carousel_items"><div class="owl-carousel">';
		?>		

			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				 	$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product-carousel' ); ?>

			<?php endforeach; ?>

			<?php 
				echo '</div></section></div>';
			?>
	</div>

<?php endif;

wp_reset_postdata();
