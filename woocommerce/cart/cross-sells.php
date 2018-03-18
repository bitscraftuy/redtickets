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

if ( $cross_sells ) : ?>
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
	',"woo-cross-sells",3,"");		
	?>

	<div class="products cross-sells">

		<div class="title_line margin-b20">
			<h3 class="featured_article_title">
				<span class="icon-link heading_icon"></span> <?php esc_html_e( 'You may be interested in&hellip;', 'woocommerce' );?>
			</h3>
		</div>


		<?php 
			echo '<div id="woo-cross-sells" class="carousel-holder clearfix margin-b20">';
			echo '<section class="carousel_items"><div class="owl-carousel">';
		?>		

			<?php foreach ( $cross_sells as $cross_sell ) : ?>

				<?php
				 	$post_object = get_post( $cross_sell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product-carousel' ); ?>

			<?php endforeach; ?>

			<?php 
				echo '</div></section></div>';
			?>
	</div>

<?php endif;

wp_reset_postdata();
