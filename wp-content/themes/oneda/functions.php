<?php
define( 'THEME_COLOR', '#fd5e29' );

define( 'THEME_DIR', get_stylesheet_directory() );
define( 'THEME_URL', get_stylesheet_directory_uri() );
define( 'THEME_IMG_URL',  get_stylesheet_directory_uri() . '/images/' );

function oneda_setup(){

	require_once( THEME_DIR.'/custom/inc.php');
	require_once( THEME_DIR . '/custom/setup.php');		
	require_once( THEME_DIR.'/custom/cts-config.php');	

		
	if ( !function_exists('oneda_themes_pro')) {  
		require_once( THEME_DIR.'/custom/customizer-pro/class-customize.php');		
	}
	
	require_once( THEME_DIR.'/custom/tgm-plugin.php');		

	
	load_child_theme_textdomain( 'oneda', THEME_DIR . '/languages' );
}
add_action( 'after_setup_theme', 'oneda_setup' );

function theta_about_page(){
	require_once( THEME_DIR.'/custom/ct-about-page/about-page.php');	
}
add_action( 'after_setup_theme', 'theta_about_page' );		
	
	
function oneda_custom_scripts()
{
	$theme_info = wp_get_theme();
	
	wp_enqueue_style('coothemes-icon',  THEME_URL.'/css/cts-icon/coothemes-icon.css', false,"1.0.0", false);	
	wp_enqueue_style('animate',  THEME_URL.'/css/animate.min.css', false,"3.6.0", false);			


	wp_enqueue_style('theta-style',  get_template_directory_uri().'/style.css',array('theta-base','font-awesome','bootstrap'),$theme_info->get( 'Version' ), false);
	wp_enqueue_style('oneda-style', get_stylesheet_directory_uri().'/style.css',array('theta-style'), $theme_info->get( 'Version' ) );	

	wp_enqueue_style(
		'oneda-custom-style',
		THEME_URL . '/css/custom_script.css'
	);
	
	$custom_css = '';
	$color = THEME_COLOR;
		
	//header css
 	if ( get_theme_mod( 'theme_color',$color) ){
		$color = esc_attr(get_theme_mod( 'theme_color',$color)) ;
	}	
				
	$color_hover = theta_change_color($color,0.8);
	$color_rbg = theta_hex2rgb( $color );

	$header_color_rbg = theta_hex2rgb( '#ffffff' );
	
	$custom_css .= '.ct_woocommerce .nav-tabs>li>a{  border: 1px solid '.$color.';   border-bottom-color:'.$color.';}	
					.ct_woocommerce .nav-tabs>li.active>a,.ct_woocommerce  .nav-tabs>li.active>a:focus,.ct_woocommerce  .nav-tabs>li.active>a:hover {
						background-color: '.$color.';border: 1px solid '.$color.';border-bottom-color:'.$color.' ;}
						
						
					.ct_portfolio .nav-tabs>li>a{  border: 1px solid '.$color.';   border-bottom-color:'.$color.';}	
					.ct_portfolio .nav-tabs>li.active>a,.ct_portfolio  .nav-tabs>li.active>a:focus,.ct_portfolio  .nav-tabs>li.active>a:hover {
						background-color: '.$color.';border: 1px solid '.$color.';border-bottom-color:'.$color.' ;}						
						
					section.ct_news p.ct_news_a a{color: '.$color.';}section.ct_news p.ct_news_a a:hover{color: '.$color_hover.';}
					
					.ct_slider .carousel-control .ct-angle-left,.ct_slider  .carousel-control .ct-angle-right {color: '.$color.';
						padding: 15px 4px 15px 4px;
						border-radius: 10px;
						/*background-color:#ffffff;*/
						 background-color: rgba(255,255,255,0.2);

						}					
					.ct_slider .carousel-control .ct-angle-left:hover,.ct_slider  .carousel-control .ct-angle-right:hover{color: '.$color_hover.';}
					
					';	

	
	if( is_front_page() ){	
		$custom_css .= '	
		#theta-top-search span.theta-close-search-field{ color:'.$color.';}#theta-top-search .theta-search-form input{ color:#EFEFEF;}
		header.fixed{background-color:transparent;}
		header.changeh{background-color:rgba(0,0,0,0.5) ;	}
		';
	}

	// get sction live css
	if(is_page_template( 'template-home.php' )){
		$sortable_value = maybe_unserialize( get_theme_mod( 'home_layout', oneda_section_default_order() ) );
		
	
		if ( ! empty( $sortable_value ) ) : 
		  foreach ( $sortable_value as $checked_value ) :
		  
			$custom_css .= oneda_section_live_css($checked_value);
	
		  endforeach;
		endif; 
	}

    wp_add_inline_style( 'oneda-custom-style', $custom_css );

	wp_enqueue_script('waypoints', THEME_URL.'/js/jquery.waypoints.min.js', array( 'jquery' ), '4.0.0', false );
	wp_enqueue_script('parallax', THEME_URL.'/js/parallax.min.js', array( 'jquery' ), '1.5', false );	



	
	if(oneda_section_check_enabled('fact') && is_page_template( 'template-home.php' )){
		if( get_theme_mod( 'fact_layout', 'circle' ) == 'column'   )  {	
			wp_enqueue_script( 'color', THEME_URL.'/js/jquery.color.js', array( 'jquery' ), $theme_info->get( 'Version' ), true );
			wp_enqueue_script('animateNumber', THEME_URL.'/js/jquery.animateNumber.min.js', array( 'jquery' ), $theme_info->get( 'Version' ), true );
		}else if(get_theme_mod( 'fact_layout', 'circle' ) == 'circle'   ){
			
			wp_enqueue_script( 'classyloader', THEME_URL.'/js/jquery.classyloader.min.js', array( 'jquery' ), '1.2.0', true );			
		}
	}

			
	wp_enqueue_script('oneda-main', THEME_URL.'/js/main.js', array( 'jquery','bootstrap','theta-main' ),$theme_info->get( 'Version' ), true );	
	
	if(is_page_template( 'template-home.php' )){
		wp_add_inline_script( 'oneda-main', oneda_script_method() );
	}
				
}

add_action( 'wp_enqueue_scripts', 'oneda_custom_scripts' );


function oneda_script_method() {	
	$custom_js = 'jQuery(document).ready(function($){';
	
	$custom_js .= 'var height = jQuery(window).height();
	var width = jQuery(window).width();';


		$sortable_value = maybe_unserialize( get_theme_mod( 'home_layout', oneda_section_default_order() ) );
		
	
		if ( ! empty( $sortable_value ) ) : 
		  foreach ( $sortable_value as $checked_value ) :
		  
			$custom_js .= oneda_section_live_js($checked_value);
	
		  endforeach;
		endif; 

	$custom_js .= '});';
	

	return $custom_js;
}



if ( ! function_exists( 'oneda_get_section_menu' ) ) {
	function oneda_get_section_menu(){
		$section_menu = '';
		$sortable_value = maybe_unserialize( get_theme_mod( 'home_layout',oneda_section_default_order() ) );	
		if ( ! empty( $sortable_value ) ) : 
		  foreach ( $sortable_value as $checked_value ) :
			$section_menu = '<li data-menuanchor="'.$checked_value.'"><a href="#'.$checked_value.'">'.ucfirst(esc_html(get_theme_mod( $checked_value.'_section_menu_title',$checked_value) )).'</a></li>'.$section_menu;
		  endforeach;
		endif; 
	
		return $section_menu;
	}

}

if ( ! function_exists( 'oneda_get_blog_thumbnail' ) ) {
	function oneda_get_blog_thumbnail($post_id)
	{
		if(has_post_thumbnail())
		{
			
			$ct_post_thumbnail_fullpath=wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), "Full");
			$thumb_array['fullpath'] = $ct_post_thumbnail_fullpath[0];
		
		}else{
			$post_content = get_post($post_id)->post_content;
			$thumb_array['fullpath'] = theta_catch_that_image($post_content);
		}	
		
		if($thumb_array['fullpath']=="" )
		{
			$thumb_array['fullpath'] = esc_url(get_theme_mod( 'blog_feature_img', THEME_URL."/custom/images/default.jpg"));		
		}		

		return $thumb_array;
		
	}
}

function oneda_get_slider_details($page_id)
{
	$slider = array();
 	$page_data = get_page( $page_id ); 	
	
	$slider['title'] = $page_data->post_title;
	$slider['content'] = $page_data->post_content;	
	
	$ct_post_thumbnail_fullpath=wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), "Full");
	$slider['images'] = $ct_post_thumbnail_fullpath[0];
	
	return 	$slider;
}


function oneda_get_page_details($page_id , $type)
{
	$return = '';
 	$page_data = get_post( $page_id ); 	
	
	if($type == 'title'){
		$return = $page_data->post_title;
	}
	if($type == 'content'){	
		$return = $page_data->post_content;	
	}
	if($type == 'image'){	
		$ct_post_thumbnail_fullpath=wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), "Full");
		$return = $ct_post_thumbnail_fullpath[0];
	}
	
	if($type == 'url'){	

		$return = $page_data->guid;	

	}	
	
	
	return 	$return;
}