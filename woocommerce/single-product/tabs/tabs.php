<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

//icons that matches with callback nanems
$tab_icons =  array(
		"description" => "icon-doc-alt",
		"reviews" => "icon-chat-empty",
		"additional_information" => "icon-info"
	);

if ( ! empty( $tabs ) ) : ?>
<div class="row clearfix wc-tabs">
<div class="box one first">

	<div class="tabs_wrap tab-style-three">
		<ul class="tabs clearfix">
			<?php foreach ( $tabs as $key => $tab ) : ?>

				<?php //icon class

					if ( isset( $tab_icons[$key] ) ){
						$add_class = "with_icon";
						$icon = '<span class="'.$tab_icons[$key].'"></span>';
					}else{
						$add_class = "";
						$icon = '';						
					}
				?>

				<li class="<?php echo $key ?>_tab <?php echo $add_class ?>">
					<a href="#tab-<?php echo $key ?>"><?php echo $icon ?><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></a>
				</li>

			<?php endforeach; ?>
		</ul>

		<div class="panes">
		<?php foreach ( $tabs as $key => $tab ) : ?>

			<div class="pane entry-content" id="tab-<?php echo $key ?>">				
				<?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
			</div>

		<?php endforeach; ?>
		</div>
	</div>
</div>
</div>
<div class="space margin-b40"></div>
<?php endif; ?>