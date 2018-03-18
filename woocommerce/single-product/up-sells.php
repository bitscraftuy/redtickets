<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author   WooThemes
 * @package  WooCommerce/Templates
 * @version  3.0.0
 */

if ( $upsells ) : ?>
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
	',"woo-upsells-products",3,"");		
	?>

	<div class="upsells products margin-b40">

		<div class="title_line margin-b20">
			<h3 class="featured_article_title">
				<span class="icon-link heading_icon"></span> <?php esc_html_e( 'You may also like&hellip;', 'woocommerce' );?>
			</h3>
		</div>


		<?php 
			echo '<div id="woo-upsells-products" class="carousel-holder clearfix margin-b20">';
			echo '<section class="carousel_items"><div class="owl-carousel">';
		?>		

			<?php foreach ( $upsells as $upsell ) : ?>

				<?php
				 	$post_object = get_post( $upsell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product-carousel' ); ?>

			<?php endforeach; ?>

			<?php 
				echo '</div></section></div>';
			?>
	</div>

<?php endif;

wp_reset_postdata();