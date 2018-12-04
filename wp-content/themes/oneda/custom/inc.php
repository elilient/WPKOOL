<?php
function oneda_section_default_order() 
{
	$section_default = array( 	
		'slider',
		'fact',	
		'news',		
	);		
	return $section_default;
}


if ( !function_exists( 'oneda_get_default_title_font' ) ){
  function oneda_get_default_title_font($key)
  { 
	switch($key){
		  
		  	  
		case 'tool':		
		  $section_title_default_font     = array(
				  'font-family'    => 'Montserrat',
				  'variant'        => 'lighter',
				  'font-size'      => '30px',
				  'color'          => '#ffffff',
				  'text-transform' => 'none',
				  'text-align'     => 'left'
			  ); 
		  break;	
		

	
		default:
		  $section_title_default_font     = array(
				  'font-family'    => 'Montserrat',
				  'variant'        => 'lighter',
				  'font-size'      => '40px',
				  'color'          => '#000000',
				  'text-transform' => 'Uppercase',
				  'text-align'     => 'center'
			  ); 
	}
	return $section_title_default_font;	
	 
  }
}

if ( !function_exists( 'oneda_get_description_font' ) ){
  function oneda_get_description_font($key)
  {  
	switch($key){

	  
	case 'fact':
	  $section_description_default_font     = array(
			  'font-family'    => 'Roboto',
			  'variant'        => 'regular',
			  'font-size'      => '14px',
			  'color'          => '#353535',
			  'text-transform' => 'none',
			  'text-align'     => 'center'
		  );
	  break;	  
	  
	case 'tool':	
	  $section_description_default_font     = array(
			  'font-family'    => 'Roboto',
			  'variant'        => 'regular',
			  'font-size'      => '16px',
			  'color'          => '#dedede',
			  'text-transform' => 'none',
			  'text-align'     => 'left'
		  );
	  break;

	default:
	  $section_description_default_font     = array(
			  'font-family'    => 'Roboto',
			  'variant'        => 'regular',
			  'font-size'      => '14px',
			  'color'          => '#666666',
			  'text-transform' => 'none',
			  'text-align'     => 'center'
		);   
	}
	return $section_description_default_font;
	 
  }
}

function oneda_public_content_default()
{   
  return $sections_default = array(
 
	
   	'tool'		 => array(
		'title'		 => '',
		'description'	=> '',
  		'menu'		 => 'tool',				
  		'color'		 => '#252425',
  		'opacity'		 => 1,	
  		'parallax'		 => 0,	
  		'img'	 => '',
  		'padding_top'	 => '60px',
  		'padding_bottom'	 => '40px',
		
  	),		
	
 
   	'fact'		 => array(
		'title'		 => __( 'Our Skills', 'oneda' ),
		'description'	=> __( 'You can write a description of the section here! You can write a description of the section here!', 'oneda' ),
  		'menu'		 => 'fact',				
  		'color'		 => '#ffffff',
  		'opacity'		 => 1,
  		'parallax'		 => 0,
		'img'	 => '',
  		'padding_top'	 => '100px',
  		'padding_bottom'	 => '80px',
		
  	), 
	 


   	'news'		 => array(
		'title'		 => __( 'Events of The Month', 'oneda' ),
		'description'	=> __( 'You can write a description of the section here! You can write a description of the section here!', 'oneda' ),
  		'menu'		 => 'news',				
  		'color'		 => '#f3f3f3',
  		'opacity'		 => 1,	
  		'parallax'		 => 0,		
  		'img'	 => '',
  		'padding_top'	 => '100px',
  		'padding_bottom'	 => '80px',
		
  	),  

 	
  );
}

function oneda_section_content_default($key)
{  

  switch($key){


	case 'tool':	
		$default     = array(
			array(
				'tool_2_icon' => 'ct-home-alt',
				'tool_2_text' => esc_attr__( 'here is your location', 'oneda' ),												
			),
	
			array(
				'tool_2_icon' => 'ct-telephone-o',
				'tool_2_text' => esc_attr__( 'here is your phone number', 'oneda' ),											
			),
	
			array(
				'tool_2_icon' => 'ct-envelope-o',
				'tool_2_text' => esc_attr__( 'here is your email address', 'oneda' ),									
			),
	
	
			array(
				'tool_2_icon' => 'ct-internet-explorer',
				'tool_2_text' => esc_attr__( 'here is your website URL', 'oneda' ),											
			),
	
		);
 	  break;
	  

	  
	case 'fact':
	  $default     = array(
		array(
			'fact_icon' => 'ct-calendar-check-o',				
			'fact_item' => esc_attr__( 'Years of Experience', 'oneda' ),
			'fact_number' => 88,							
		),

		array(
			'fact_icon' => 'ct-star-alt',				
			'fact_item' => esc_attr__( 'Special Dishes', 'oneda' ),
			'fact_number' => 75,							
		),

		array(
			'fact_icon' => 'ct-coffee-s',				
			'fact_item' => esc_attr__( 'Cups of coffee', 'oneda' ),
			'fact_number' => 90,							
		),
		
		array(
			'fact_icon' => 'ct-badge',				
			'fact_item' => esc_attr__( 'happy customers', 'oneda' ),
			'fact_number' => 65,							
		),		  
	  );  
 	  break;


	default:
	  $default     = array();	
	  	  

  }
  return $default;
}


function oneda_button_default_arr($key) 
{
	$default     = array();	
 switch($key){

	case 'news':	
	  $default     = array(
		'key'=>'news',
		'button_text'=>__( 'View All Events', 'oneda' ),
		'opacity'=>0,
		'button_font'=>array(
				'font-family'    => 'Roboto',
				'variant'        => '300',
				'font-size'      => '16px',
				'color'          => THEME_COLOR,
				'text-transform' => 'Uppercase',
				'text-align'     => 'center'
			),
		'button_radius'=>30,	
			
		'button_spacing'=>array(
				  'top'    => '12px',
				  'bottom' => '12px',
				  'left'   => '30px',
				  'right'  => '30px',
			  )
	  );
 	  break;	  

	
	default:
	  $default     = array();	
	  	  

  }
  return $default;
}

?>