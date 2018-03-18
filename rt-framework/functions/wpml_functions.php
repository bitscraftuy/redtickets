<?php
#-----------------------------------------
#	RT-Theme wpml_functions.php 
#-----------------------------------------

#
# WPML match page id 
# returns the page of default language
# @returns $id 
#
if( ! function_exists("rt_wpml_page_id") ){
	function rt_wpml_page_id($id){	 
		$default_language = apply_filters( 'wpml_default_language', null );
		return apply_filters( 'wpml_object_id', $id, 'page', true, $default_language);
	}
}

#
# WPML match page id 
# returns the current language version of the page
# @returns $id 
#
if( ! function_exists("rt_wpml_translated_page_id") ){
	function rt_wpml_translated_page_id($id){	 
		return apply_filters( 'wpml_object_id', $id, 'page' );
	}
}


#
# WPML match post id
#
if( ! function_exists("rt_wpml_post_id") ){
	function rt_wpml_post_id($id){
		global $post;
		$default_language = apply_filters( 'wpml_default_language', null );
		$post_type = isset( $post->post_type ) ? $post->post_type : 'post';

		return apply_filters( 'wpml_object_id', $id, $post_type, true, $default_language);
	}
}

#
# WPML match category id
#
if( ! function_exists("rt_wpml_category_id") ){
	function rt_wpml_category_id($id){
		$default_language = apply_filters( 'wpml_default_language', null );
		return apply_filters( 'wpml_object_id', $id, 'category', true, $default_language);
	}
}


#
# WPML match product category id
#
if( ! function_exists("rt_wpml_product_category_id") ){
	function rt_wpml_product_category_id($id){
		$default_language = apply_filters( 'wpml_default_language', null );
		return apply_filters( 'wpml_object_id', $id, 'product_categories', true, $default_language);		
	}
}

#
# WPML match portfolio category id
#
if( ! function_exists("rt_wpml_portfolio_category_id") ){
	function rt_wpml_portfolio_category_id($id){
		$default_language = apply_filters( 'wpml_default_language', null );
		return apply_filters( 'wpml_object_id', $id, 'portfolio_categories', true, $default_language);
	}
}


#
# WPML match categories
#
if( ! function_exists("rt_wpml_lang_object_ids") ){
	function rt_wpml_lang_object_ids($ids_array, $type) {
		if(function_exists('icl_object_id')) {
			global $sitepress;
			$get_default_language =  apply_filters( 'wpml_default_language', null );

			$res = array();
			foreach ($ids_array as $id) {
				$xlat = apply_filters( 'wpml_object_id', $id, $type, false, $get_default_language);				
				if(!is_null($xlat)) $res[] = $xlat;
			}
			return $res;
		} else {
			return $ids_array;
		}
	}
}

#
# Get WPML Plugin Flags
#
if( ! function_exists("rt_wpml_languages_list") ){
	function rt_wpml_languages_list(){
	    $languages = icl_get_languages('skip_missing=0&orderby=code'); 

		if(!empty($languages)){
			echo '<li class="languages icon-globe-1">'.ICL_LANGUAGE_NAME.' <span class="icon-angle-down"></span>';
			echo '<ul class="flags">';
			foreach($languages as $l){
				echo '<li>';
				if($l['country_flag_url']){
					echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" /> <a href="'.$l['url'].'" title="'.$l['native_name'].'"><span>'.$l['native_name'].'</span></a>';
				}
				echo '</li>';
			}
			echo '</ul>';
			echo '</li>';
		}
	}
}


#
#	WPML Home URL
#
if( ! function_exists("rt_wpml_get_home_url") ){
	function rt_wpml_get_home_url(){
		$home_url = apply_filters( 'wpml_home_url', home_url() );
		return rtrim( $home_url, '/') . '/';		
	}
}

#
#	WPML String Register
#
if( ! function_exists("rt_wpml_register_string") ){
	function rt_wpml_register_string($context, $name, $value){
		if ( trim( $value ) ){
			do_action( 'wpml_register_single_string', $context, $name, $value );
		}  
	}
}

#
#	WPML Get Registered String
#
if( ! function_exists("rt_wpml_t") ){
	/**
	 * Get string translation of a theme mod value
	 * @return string 
	 */
	function rt_wpml_t($name="", $field="", $value=""){
		if(function_exists('icl_translate')) {			
			return apply_filters( 'wpml_translate_single_string', $value, $field, $name );
		}

		return $value;
	}
}

#
# WPML match attachment id 
# returns the current language version of the attachment
# @returns $id 
#
if( ! function_exists("rt_wpml_translated_attachment_id") ){
	function rt_wpml_translated_attachment_id($id){	 
		return apply_filters( 'wpml_object_id', $id, 'attachment' );
	}
}
?>