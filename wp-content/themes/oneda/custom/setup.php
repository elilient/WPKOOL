<?php

function theta_themes_pro(){
	//theta pro
}

$template_directory = get_template_directory();


function oneda_generate_public_css($key,$default){
	

	$custom_css = '';

	$title_iocn_image = get_theme_mod( $key.'_iocn_image', THEME_IMG_URL.'divider.png' ) ;	
	$custom_css .='section.ct_'.$key.' .section_title{background-image:url('.$title_iocn_image.');background-position:center bottom; background-repeat:no-repeat;padding-bottom: 30px;}';
	  
	$section_background_color     = get_theme_mod( $key.'_section_background_color',$default['color']); 
	$section_background_opacity     = get_theme_mod( $key.'_section_background_opacity',$default['opacity']); 
  
	$background                    = theta_get_background( $section_background_color , $section_background_opacity );	
	$custom_css .='section.ct_section_'.$key.' {'.$background.' background-size: 100% auto;}';  

	$enable_parallax_background = get_theme_mod( $key.'_enable_parallax_background',$default['parallax']); 

	if(!$enable_parallax_background){	
		$section_background_image     = get_theme_mod( $key.'_section_background_image',$default['img']); 
		if ( $section_background_image != '' ){$custom_css .='section.ct_section_'.$key.' {background-image:url('.$section_background_image.');}';  } 
	}
		
	if ( defined( 'ISMOBILE' ) && ISMOBILE ) {
		$padding_default = array( 'top' => '60px' ,'bottom' => '60px' ,'left' => '0' ,'right' => '0' );
		$section_padding     = get_theme_mod( $key.'_section_moblie_padding',$padding_default);
		  
		$custom_css .='section.ct_section_'.$key.' .section_content{padding:'.$section_padding['top'].' '.$section_padding['right'].' '.$section_padding['bottom'].' '.$section_padding['left'].';}'; 		  
	}else{	 
		$padding_default = array( 'top' => $default['padding_top'] ,'bottom' => $default['padding_bottom'] ,'left' => '0' ,'right' => '0' );
		$section_padding     = get_theme_mod( $key.'_section_padding',$padding_default);
		  
		$custom_css .='section.ct_section_'.$key.' .section_content{padding:'.$section_padding['top'].' '.$section_padding['right'].' '.$section_padding['bottom'].' '.$section_padding['left'].';}';  
	}
  
	$button_arr  = oneda_button_default_arr($key);
	  
	if( !empty($button_arr) ){
	  
	  $button_background = esc_attr(get_theme_mod( $key.'_button_background', THEME_COLOR ));  
	  
	  $button_background_hover = theta_change_color($button_background,0.8);
	  $button_background_font_hover = theta_change_color($button_background,0.1);	  

	  $button_opacity = esc_attr(get_theme_mod( $key.'_button_opacity', $button_arr['opacity'] )); 
	  $button_background_rbg = theta_get_background($button_background,$button_opacity);	
	  
	  $button_radius = esc_attr(get_theme_mod( $key.'_button_radius', $button_arr['button_radius'] ));  
	  
	  $section_padding     = get_theme_mod( $key.'_button_padding',$button_arr['button_spacing']);	  
	  	    
	  $custom_css .='.ct_'.$key.' a.btn-primary{margin-top:40px;  '.$button_background_rbg.' border-color:'.$button_background_hover.';border-radius: '.$button_radius.'px;padding:'.$section_padding['top'].' '.$section_padding['right'].' '.$section_padding['bottom'].' '.$section_padding['left'].';}
	  .ct_'.$key.' a:hover.btn-primary{ background-color:'.$button_background_hover.'; color:'.$button_background_font_hover.';}';	
	}

	return $custom_css;
}


function oneda_section_live_css($key){
  $custom_css ='';
    	
  switch($key){

	case 'slider':	
	  $i=1;
	  $key = 'slider';
	  
	  $default_content = oneda_section_content_default($key);
	
	  $slider_title_typography_default     = array(
		  'font-family'    => 'Montserrat',
		  'variant'        => 'lighter',
		  'font-size'      => '56px',
		  'color'          => '#ffffff',
		  'text-transform' => 'Uppercase',
		  'text-align'     => 'center'
	  );
	  $slider_description_typography_default     = array(
			'font-family'    => 'Roboto',
			'variant'        => 'regular',
			'font-size'      => '20px',
			'color'          => '#ffffff',
			'text-transform' => 'none',
			'text-align'     => 'center'
		);	
	  $slider_button_typography_default     = array(
			'font-family'    => 'Roboto',
			'variant'        => '300',
			'font-size'      => '20px',
			'color'          => '#ffffff',
			'text-transform' => 'Uppercase',
			'text-align'     => 'center'
		);
		
	  $slider_title_typography = theta_get_typography( 'slider_title_typography', $slider_title_typography_default );
	  $slider_description_typography = theta_get_typography( 'slider_description_typography', $slider_description_typography_default );  
	  $slider_button_typography = theta_get_typography( 'slider_button_typography', $slider_button_typography_default );  
	  
	  $slider_button_background = esc_attr(get_theme_mod( 'slider_button_background', THEME_COLOR ));  
	  
	  $slider_button_background_hover = theta_change_color($slider_button_background,0.8);;
	
	

	
	  $custom_css .=".ct_slider .ct_slider_warp .carousel-caption h1.slider_title{ $slider_title_typography font-weight: lighter;}.ct_slider .ct_slider_warp .carousel-caption p.ct_slider_text{  $slider_description_typography font-weight: lighter;}.ct_slider .ct_slider_warp  a.btn{ $slider_button_typography background-color: $slider_button_background; border-color:$slider_button_background_hover;border-radius: 4px;font-weight: lighter; }.ct_slider .ct_slider_warp a:hover.btn{ background-color:$slider_button_background_hover;}";

	 for($j=1;$j<4;$j++){
	
		$sliders = oneda_get_slider_details( get_theme_mod( 'slider_page'.$j,'') );
			
			$slide_image = $sliders['images'];
			
			$custom_css .=".ct_slider .ct_slider_item_".$j."{background-image: url(".esc_url($slide_image).");background-size:auto 100%;background-position: center;}.ct_slider .ct_slider_item_".$j.":after {content: '';position: absolute;width: 100%;height: 100%;top: 0;left: 0;background-color: rgba(37, 46, 53, 0.5);}";
	 }

 	  break;


	  
	case 'fact':
	  $key = 'fact';

	  $sections = oneda_public_content_default(); 
	  $default = $sections[$key];
	  
	  $custom_css .= oneda_generate_public_css($key,$default);
	  
 	  break;	  
	
	  	  
	case 'news':
	  $key = 'news';

	  $sections = oneda_public_content_default(); 
	  $default = $sections[$key];
	  
	  $custom_css .= oneda_generate_public_css($key,$default);
	  
 	  break;		  


	  
	case 'tool':
	  $key = 'tool';

	  $sections = oneda_public_content_default(); 
	  $default = $sections[$key];
	  
	  $custom_css .= oneda_generate_public_css($key,$default);


	  $title_typography_value = get_theme_mod( $key.'_title_typography',oneda_get_default_title_font($key) );

	  
	  $description_typography_value = get_theme_mod( $key.'_title_typography',oneda_get_description_font($key) );	  
	  $description_hr_color  = theta_change_color($description_typography_value['color'],0.8);	  
	  
	  $custom_css .='.ct_tool_row h2{ font-family:'.$title_typography_value['font-family'].'; color:'.$title_typography_value['color'].';text-transform:'.$title_typography_value['text-transform'].';text-align:'.$title_typography_value['text-align'].';font-size:'.$title_typography_value['font-size'].';font-weight:'.$title_typography_value['variant'].'; }
.tool-content-1 .tool-1-text,.tool-content-2 ul li{ font-family:'.$description_typography_value['font-family'].'; color:'.$description_typography_value['color'].';text-transform:'.$description_typography_value['text-transform'].';text-align:'.$description_typography_value['text-align'].';font-size:'.$description_typography_value['font-size'].';font-weight:'.$description_typography_value['variant'].'; }	  
	  
	  ';
	  
 	  break;		  
	  

		
	default:
	  $custom_css  = '';	
	  	  

  }
  
  return $custom_css;	
}



function oneda_section_live_js($key){
  $custom_js ='';
    	
  switch($key){

	case 'slider': 
		
		$enable_slider = oneda_section_check_enabled('slider');	
		$slider_video = get_theme_mod( 'slider_video',0);	
		if( $enable_slider && $slider_video>0){		
		  $custom_js .= 'jQuery(".ct_slider_video").YTPlayer({align:"center,center"});';
		}
		$animate_type =get_theme_mod( $key.'_animate_type','slideInUp');
		if(get_theme_mod( $key.'_enable_animate',1) && $animate_type !='noAnimate'){
		  $custom_js .= 'var waypoint = new Waypoint({
			  element: jQuery(".ct_'.$key.'"),
			  handler: function(direction) {
				jQuery(".ct_'.$key.' .carousel_caption_warp").addClass("animated '.$animate_type.'"); 
			  },
			  offset: "80%"
			});';
		}		
		
 	  break;
	  

	case 'fact':

		if( get_theme_mod( 'fact_layout', 'circle' ) == 'column'   ){											
											
	  		$custom_js .= 'var decimal_places = 0;var k_n = 0;var decimal_factor = decimal_places === 0 ? 1 : decimal_places * 10;
	
				jQuery(".fact").waypoint(function(down)
					{
						if(k_n == 0)
						{
							jQuery(".fact").each(function () {
								var $this = jQuery(this);
								jQuery({ Counter: 0 }).animate({ Counter: parseInt(jQuery(this).data("fact")) },{
									duration: 2000,
									 easing: "swing",
									step: function ()
									{
										$this.text(Math.ceil(this.Counter));
									}
								});//$({ Counter: 0 }).animate({ Counter: parseInt($(this).data("fact")) },{
							});//$(".fact").each(function () {
							k_n =1;
						}			
						jQuery(".fact").animateNumber({color: "'.get_theme_mod( 'fact_circle_color',THEME_COLOR).'"},3000);
					},	
					{
						offset: "70%",
						triggerOnce: true
					}
				);		  
	  		';
		}else if( get_theme_mod( 'fact_layout', 'circle' ) == 'circle'   ){
			$key = 'fact';	
  			$default_content = oneda_section_content_default($key);  
  			$repeater_value = get_theme_mod( 'repeater_'.$key,$default_content);					 
			$k=0;
			
			$color_rbg = theta_hex2rgb( get_theme_mod( 'fact_circle_color',THEME_COLOR) );

			if ( ! empty( $repeater_value ) ) :	
			  foreach ( $repeater_value as $row ) : 
				if ( isset( $row[ 'fact_number' ] ) && !empty( $row[ 'fact_number' ] ) ) :
						  
					  $custom_js .= 'jQuery(\'.loader'.$k.'\').ClassyLoader({
										  speed: 50,
										  diameter: 80,
										  fontSize: \'30px\',
										  fontFamily: \'Courier\',
										  fontColor: \'rgba(0,0,0,0.6)\',
										  lineColor: \'rgba('.$color_rbg[0].','.$color_rbg[1].','.$color_rbg[2].',1)\',
										  percentage: '.$row[ 'fact_number' ].',
										  lineWidth: 12,
										  remainingLineColor: \'rgba(200,200,200,0.3)\'
									  });		
					  ';				
		  
				$k++;
				endif;
			  endforeach;	
			endif;
		}
		
		$animate_type =get_theme_mod( $key.'_animate_type','slideInUp');
		if(get_theme_mod( $key.'_enable_animate',1) && $animate_type !='noAnimate'){
		  $custom_js .= 'var waypoint = new Waypoint({
			  element: jQuery(".ct_'.$key.'"),
			  handler: function(direction) {
				jQuery(".ct_'.$key.' .ct_'.$key.'_list").addClass("animated '.$animate_type.'"); 
			  },
			  offset: "80%"
			});';
		}
 	  break;

	case 'tool':						
		$animate_type =get_theme_mod( $key.'_animate_type','slideInUp');
		if(get_theme_mod( $key.'_enable_animate',1) && $animate_type !='noAnimate'){
		  $custom_js .= 'var waypoint = new Waypoint({
			  element: jQuery(".ct_'.$key.'"),
			  handler: function(direction) {
				jQuery(".ct_'.$key.' .ct_'.$key.'_list").addClass("animated '.$animate_type.'"); 
			  },
			  offset: "80%"
			});';
		}		
 	  break;

	case 'news':
	  $custom_js .= '	  
		var nheigh = jQuery(".ct_news .ct_news_img img").height();
		jQuery(".ct_news .ct_news_info").css("height",nheigh);
		';
		$animate_type =get_theme_mod( $key.'_animate_type','slideInUp');
		if(get_theme_mod( $key.'_enable_animate',1) && $animate_type !='noAnimate'){
		  $custom_js .= 'var waypoint = new Waypoint({
			  element: jQuery(".ct_'.$key.'"),
			  handler: function(direction) {
				jQuery(".ct_'.$key.' .container").addClass("animated '.$animate_type.'"); 
			  },
			  offset: "80%"
			});';
		}		
		
	 break;	

	default:
	  $custom_js  = '';	

  }
  return $custom_js;	

	
}

function oneda_section_check_enabled($key){
	
  $section_default = oneda_section_default_order();
  
  $sortable_value = maybe_unserialize( get_theme_mod( 'home_layout',$section_default ) );
 
  $return = false;
  
  if ( ! empty( $sortable_value ) ) : 
	foreach ( $sortable_value as $checked_value ) :
		
	  if($key ==$checked_value ){$return = true;break;}
	  	  
	endforeach;
  endif; 	
		
  return $return;	
	
}