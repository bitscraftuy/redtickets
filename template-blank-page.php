<?php
/**
 * 
 * Template Name: Blank Page
 * Template Post Type: post, page, products, portfolio
 *
 */
?>

<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head> 
<meta charset="<?php bloginfo( 'charset' ); ?>" />  
<?php if(get_option( RT_THEMESLUG."_close_responsive")):?><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><?php endif;?>
<?php if (get_option( RT_THEMESLUG.'_favicon_url')):?><link rel="icon" type="image/png" href="<?php echo get_option( RT_THEMESLUG.'_favicon_url');?>"><?php endif;?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php echo stripcslashes(get_option(RT_THEMESLUG.'_space_for_head'));?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action("rt_after_body"); ?>

<!-- background wrapper -->
<div id="container">   


<?php
/**
 * 
 * The template for displaying all pages
 *
 */
global $rt_sidebar_location; ?>
<section class="content_block_background">
	<section id="row-<?php the_ID(); ?>" class="content_block clearfix">
		<section id="post-<?php the_ID(); ?>" <?php post_class("content ".$rt_sidebar_location[0]); ?> >		
			<div class="row">
				<?php do_action( "get_info_bar", apply_filters( 'get_info_bar_pages', array( "called_for" => "inside_content" ) ) ); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php if(comments_open() && get_option(RT_THEMESLUG."_allow_page_comments")):?>
					<div class='entry commententry'>
						<?php comments_template(); ?>
					</div>
				<?php endif;?>
			</div>
		</section><!-- / end section .content -->  
		<?php get_sidebar(); ?>
	</section>
</section>

</div><!-- end div #container --> 
 
<?php echo get_option( RT_THEMESLUG.'_google_analytics');?>  
<?php echo stripcslashes(get_option(RT_THEMESLUG.'_space_for_footer'));?>

<?php wp_footer(); ?>
</body>
</html>