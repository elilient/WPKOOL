<?php
/**
 * Kirki Advanced Customizer
 * This is a sample configuration file to demonstrate all fields & capabilities.
 * @package Oneda
 */
 
  if ( !class_exists( 'Kirki' ) ) {
	return;
  }
  

  Kirki::add_config( 'oneda_settings', array(
  	'capability'	 => 'edit_theme_options',
  	'option_type'	 => 'theme_mod',
  ) );
 

  Kirki::add_panel( 'homepage', array(
  	'priority'	 => 10,
  	'title'		 => __( 'Feature Homepage Settings', 'oneda' ),
    'description'	 => __( 'Homepage options for Oneda theme', 'oneda' ),
  ) );
  
  Kirki::add_section( 'homepage_layout', array(
  	'title'		 => __( 'Homepage Layout', 'oneda' ),
  	'panel'		 => 'homepage',
  	'priority'	 => 10,
  ) );

  $sections = array(
	'slider'     => esc_attr__( 'Slider Section', 'oneda' ),
	'video'      => esc_attr__( 'Video Background Options', 'oneda' ),
	'service'    => esc_attr__( 'Service Section', 'oneda' ),		
	'gallery'    => esc_attr__( 'Gallery Section', 'oneda' ),	
	
	'fact'       => esc_attr__( 'Fact Section', 'oneda' ),	
	'team'       => esc_attr__( 'Team Section', 'oneda' ),		
	'feature'    => esc_attr__( 'Feature Section', 'oneda' ),		


	'portfolio'  => esc_attr__( 'Portfolio Section', 'oneda' ),
	
	'about'      => esc_attr__( 'About Section', 'oneda' ),	
		
	'buy'        => esc_attr__( 'Buy Section', 'oneda' ),	
	'price'      => esc_attr__( 'Price Section', 'oneda' ),			
	
	'woocommerce'=> esc_attr__( 'Woocommerce Section', 'oneda' ),
	'product'    => esc_attr__( 'Product Section', 'oneda' ),	
	
	'advantage'  => esc_attr__( 'Advantage Section', 'oneda' ),	
		
	
	'testimonial'=> esc_attr__( 'Testimonial Section', 'oneda' ),		
	
	
	'client'     => esc_attr__( 'Client Section', 'oneda' ),
	'news'       => esc_attr__( 'News Section', 'oneda' ),	
	'contact'    => esc_attr__( 'Contact Section', 'oneda' ),			
	
	'blog'       => esc_attr__( 'Blog Section', 'oneda' ),	
	'map'        => esc_attr__( 'Map Section', 'oneda' ),	
	'tool'       => esc_attr__( 'Footer Tool Section', 'oneda' ),		
			
  );

  foreach ( $sections as $section_id => $section ) {
	$section_args = array(
		'title'       => $section.' Setting',
		'panel'       => 'homepage',
		'priority'	 => 10,	
	);
	Kirki::add_section( str_replace( '-', '_', $section_id ) . '_section', $section_args );
  }

  Kirki::add_section( 'video_section', array(
  	'title'		 => __( 'video Background Options',  'oneda' ),
  	'panel'		 => 'homepage',
  	'priority'	 => 10,
  ));  


  function oneda_add_field( $args ) {
	Kirki::add_field( 'oneda_settings', $args );
  }  
 


  oneda_add_field( array(
		'type'			 => 'switch',
		'settings'		 => 'enable_section_header_menu',
		'label'			 => __( 'Enable section header menu in the feature homepage', 'oneda' ),
		'section'		 => 'header_option',
		'default'		 => 1,
		'priority'		 => 10,
  )); 

 
 
 
  oneda_add_field( array(
  	'type'				 => 'custom',
  	'settings'			 => 'front_page_info',
  	'label'				 => __( 'Switch "Front page displays" to "A static page"', 'oneda' ),
  	'section'			 => 'homepage_layout',
  	'description'		 => sprintf( __( 'Your homepage is not static page. In order to set up the home page as shown in the official demo on our website (one page front page with sections), you will need to set up your front page to use a static page instead of showing your latest blog posts. Check the %s page for more informations.', 'oneda' ), '<a href="' . esc_url(admin_url( 'options-reading.php' )) . '"><strong>' . __( 'Theme info', 'oneda' ) . '</strong></a>' ),
  	'priority'			 => 10,
  	'active_callback'	 => array(
  		array(
  			'setting'	 => 'show_on_front',
  			'operator'	 => '!=',
  			'value'		 => 'page',
  		),
  	),
  ) );

  oneda_add_field( array(
  	'type'		 => 'sortable',
  	'settings'	 => 'home_layout',
  	'label'		 => esc_attr__( 'Homepage Blocks', 'oneda' ),
  	'section'	 => 'homepage_layout',
  	'help'		 => esc_attr__( 'Drag and Drop and enable the homepage blocks.', 'oneda' ),
	'default'     => oneda_section_default_order(),
  	'choices'	 => $sections,
  	'priority'	 => 10,	
	
  ) );
  
  if ( !function_exists('oneda_themes_pro')) {   
  oneda_add_field( array(
		  'type'			 => 'custom',
		  'settings'		 => 'pro-features',
		  'label'			 => __( 'Theta All (Oneda PRO)', 'oneda' ),
		  'description'	 => __( 'Available in Theta All (Oneda PRO): Feature Section, Gallery Section, Service Section, Facts / Number Section, Our Team Section, Pricing Section, Testimonials Section, Clients Section,Contact Us Section,Download Section, Google Map, Custom Colors, Google Fonts, video(include Youtube) Backgrounds, Animations, Custom Footer Link and much more...', 'oneda' ),
		  'section'		 => 'homepage_layout',
		  'default'		 => '<a class="install-now button-primary button" href="' . esc_url( 'https://www.coothemes.com/theme-theta-all/' ) . '" aria-label="Theta All (Oneda PRO)" data-name="Theta All (Oneda PRO)">' . __( 'Discover Theta All (Oneda PRO)', 'oneda' ) . '</a>',
		  'priority'		 => 10,
	  ) ); 
  }
	
  
  oneda_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'slider_section_menu_title',
	  'label'		 => __( 'Main Menu Title', 'oneda' ),
	  'default'	 => 'slider',
	  'section'	 => 'slider_section',
	  'priority'	 => 10,
  ) ); 


  oneda_add_field( array(
	'type'        => 'number',
	'settings'    => 'slider_video',
	'label'       => esc_attr__( 'Apply background video to this slider', 'oneda' ),
	'description' => esc_attr__( 'If you enable video background, you need to set the setting "video background option" in the homepage settings', 'oneda' ),	
	'section'     => 'slider_section',
	'default'     => 0,
	'choices'     => array(
		'min'  => 0,
		'max'  => 2,
		'step' => 1,
	),
  ));

 for($i=1;$i<4;$i++){
  oneda_add_field( array(
	'type'        => 'dropdown-pages',
	'settings'    => 'slider_page'.$i,
	'label'       => esc_attr__( 'Select page', 'oneda' ).' '.$i,
	'section'     => 'slider_section',
	'default'     => '',
	'priority'    => 10,
  ) );

  oneda_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'slider_button_text_1'.$i,
	  'label'		 => esc_attr__( 'Button One Text', 'oneda' ).' '.$i,
	  'default'	     => esc_html__( 'View More', 'oneda' ),
	  'section'	     => 'slider_section',
	  'priority'	 => 10,
  ) ); 

  oneda_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'slider_url_1'.$i,
	  'label'		 => esc_attr__( 'Button One URL', 'oneda' ).' '.$i,
	  'default'	     => '#',
	  'section'	     => 'slider_section',
	  'priority'	 => 10,
  ) ); 
  
  oneda_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'slider_button_text_2'.$i,
	  'label'		 => esc_attr__( 'Button Two Text', 'oneda' ).' '.$i,
	  'default'	     => esc_html__( 'View More', 'oneda' ),
	  'section'	     => 'slider_section',
	  'priority'	 => 10,
  ) ); 

  oneda_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'slider_url_2'.$i,
	  'label'		 => esc_attr__( 'Button Two URL', 'oneda' ).' '.$i,
	  'default'	     => '#',
	  'section'	     => 'slider_section',
	  'priority'	 => 10,
  ) );   
 }

 
 
  oneda_add_field( array(
	'type'        => 'number',
	'settings'    => 'slide_time',
	'label'       => esc_attr__( 'Slide Time', 'oneda' ),
	'section'     => 'slider_section',
	'default'     => 5000,
	'choices'     => array(
		'min'  => 0,
		'max'  => 30000,
		'step' => 500,
	),
  ) );    

  oneda_add_field( array(
	'type'        => 'typography',
	'settings'    => 'slider_title_typography',
	'label'       => esc_attr__( 'Title Typography', 'oneda' ),
	'section'     => 'slider_section',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'font-size'      => '56px',
		'color'          => '#ffffff',
		'text-transform' => 'Uppercase',
		'text-align'     => 'center'
	),
	'priority'    => 10,


  ) );

  

  oneda_add_field( array(
	'type'        => 'typography',
	'settings'    => 'slider_description_typography',
	'label'       => esc_attr__( 'Description Typography', 'oneda' ),
	'section'     => 'slider_section',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '20px',

		'color'          => '#ffffff',
		'text-transform' => 'none',
		'text-align'     => 'center'
	),
	'priority'    => 10,

  ) );


  oneda_add_field( array(
	'type'        => 'color',
	'settings'    => 'slider_button_background',
	'label'       => __( 'Slider Button Background Color', 'oneda' ),
	'section'     => 'slider_section',
	'default'     => THEME_COLOR,
	'priority'    => 10,
	'choices'     => array(
		'alpha' => true,
	),
	
  ) ); 
  
  oneda_add_field( array(
	'type'        => 'typography',
	'settings'    => 'slider_button_typography',
	'label'       => esc_attr__( 'Button Text Typography', 'oneda' ),
	'section'     => 'slider_section',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '300',
		'font-size'      => '20px',
		'color'          => '#ffffff',
		'text-transform' => 'Uppercase',
		'text-align'     => 'center'
	),
	'priority'    => 10,

  ) );  
  

  $sections = oneda_public_content_default();
  foreach ( $sections as $keys => $values ) { 
    oneda_add_field( array(
  		'type'		 => 'text',
  		'settings'	 => $keys . '_section_title',
  		'label'		 => __( 'Section Title', 'oneda' ),
  		'default'	 => $values[ 'title' ],
  		'section'	 => $keys . '_section',
  		'priority'	 => 10,
  	) );
	
	oneda_add_field(
		array(
			'type'			 => 'image',
			'settings'		 => $keys.'_iocn_image',
			'label'			 => __( 'Title Iocn', 'oneda' ),
  			'section'		 => $keys . '_section',
			'default'		 => THEME_IMG_URL.'divider.png',
			'priority'		 => 10,
		)
	);	
	
  	oneda_add_field( array(
  		'type'		 => 'textarea',
  		'settings'	 => $keys . '_section_description',
  		'label'		 => __( 'Section Description', 'oneda' ),
  		'default'	 => $values[ 'description' ],
  		'section'	 => $keys . '_section',
  		'priority'	 => 10,
  	) ); 
 
  	 oneda_add_field( array(
  		'type'		 => 'text',
  		'settings'	 => $keys . '_section_menu_title',
  		'label'		 => __( 'Main Menu Title', 'oneda' ),
  		'default'	 => $values[ 'menu' ],
  		'section'	 => $keys . '_section',
  		'priority'	 => 10,
  	) ); 

     oneda_add_field( array(
    	'type'        => 'image',
    	'settings'    => $keys . '_section_background_image',
    	'label'       => __( 'Section Background Image', 'oneda' ),
    	'section'	 => $keys . '_section',
    	'default'     => $values[ 'img' ],
    	'priority'    => 10,

    ) );

  	 oneda_add_field( array(
  		'type'		 => 'color',
  		'settings'	 => $keys . '_section_background_color',
  		'label'		 => __( 'Section Background Color', 'oneda' ),
  		'section'	 => $keys . '_section',
  		'default'	 => $values[ 'color' ],
  		'priority'	 => 10,
  	) ); 

	 oneda_add_field( array(
		'type'        => 'slider',
		'settings'    => $keys . '_section_background_opacity',
		'label'       => __( 'Section Background Opacity', 'oneda' ),
    	'section'	 => $keys . '_section',
		'default'     => $values[ 'opacity' ],
		'choices'     => array(
			'min'  => '0',
			'max'  => '1',
			'step' => '0.1',
		),
	) );

	 oneda_add_field( array(
		'type'        => 'spacing',
		'settings'	 => $keys . '_section_padding',
		'label'       => __( 'Section Padding Control', 'oneda' ),
		'section'	 => $keys . '_section',
		'default'     => array(
			'top'    => $values[ 'padding_top' ],
			'bottom' => $values[ 'padding_bottom' ],
			'left'   => '0',
			'right'  => '0',
		),
		'priority'    => 10,
	) );

	 oneda_add_field( array(
		'type'        => 'spacing',
		'settings'	 => $keys . '_section_mobile_padding',
		'label'       => __( 'Section Mobile Padding Control', 'oneda' ),
		'section'	 => $keys . '_section',
		'default'     => array(
			'top'    => $values[ 'padding_top' ],
			'bottom' => $values[ 'padding_bottom' ],
			'left'   => '0',
			'right'  => '0',
		),
		'priority'    => 10,
	) );

	
	oneda_add_field( array(
		'type'			 => 'switch', 
		'settings'		 => $keys.'_enable_animate',
		'label'			 => __( 'Enable Animate', 'oneda' ),
		'section'		 => $keys . '_section',
		'default'		 => 1,
		'priority'		 => 10,
	));	

	
	oneda_add_field(
		array(
			'type'			 => 'switch', 
			'settings'		 => $keys.'_enable_parallax_background',
			'label'			 => __( 'Enable Parallax Background', 'oneda' ),
  			'section'		 => $keys . '_section',
			'default'		 => 0,
			'priority'		 => 10,	 			
			
		)
	);		
	


  	 oneda_add_field( array(
  		'type'			 => 'toggle',
  		'settings'		 => $keys . '_typography_setting_enable',
  		'label'			 => __( 'Title / Description Typography Setting', 'oneda' ),
  		'description'	 => __( 'Enable or disable Title / Description Typography', 'oneda' ),
  		'section'		 => $keys . '_section',
  		'default'		 => 1,
  		'priority'		 => 10,
  	) );

	 oneda_add_field( array(
	  'type'        => 'typography',
	  'settings'    => $keys . '_title_typography',
	  'label'       => $keys . esc_attr__( ' Title Typography', 'oneda' ),
  	  'section'	    => $keys . '_section',
	  'default'     => oneda_get_default_title_font($keys),
	  'priority'    => 10,
	  'output'      => array(
		array(
			'element' => 'section.ct_'.$keys.' .section_title',
		),
	  ), 
	  'required'	 => array(
		  array(
			  'setting'	 => $keys . '_typography_setting_enable',
			  'operator'	 => '==',
			  'value'		 => 1,
		  ),
	  )
	  
	) );

	 oneda_add_field( array(
	  'type'        => 'typography',
	  'settings'    => $keys . '_description_typography',
	  'label'       => $keys .esc_attr__( ' Description Typography', 'oneda' ),
  	  'section'	    => $keys . '_section',
	  'default'     => oneda_get_description_font($keys),
	  'priority'    => 10,
	  
	  
	  'output'      => array(
		array(
			'element' => 'section.ct_'.$keys.' .section_content,section.ct_'.$keys.' p',
		),
	  ),
	  
	  'required'	 => array(
		  array(
			  'setting'	 => $keys . '_typography_setting_enable',
			  'operator'	 => '==',
			  'value'		 => 1,
		  ),
	  )	  
	  	  
	  
	  
	) );
  }  


  oneda_add_field( array(
	'type'        => 'radio-image',
	'settings'    => 'fact_layout',
	'label'       => esc_html__( 'Fact Layout', 'oneda' ),
	'section'     => 'fact_section',
	'default'     => 'circle',
	'priority'    => 10,
	'choices'     => array(
		'column'     => THEME_IMG_URL . 'fact-column.jpg',
		'circle'  => THEME_IMG_URL . 'fact-circle.jpg',

	),
  ) );



  oneda_add_field( array(
  	'type'		 => 'repeater',
  	'label'		 => __( 'Facts / Number', 'oneda' ),
  	'section'	 => 'fact_section',
  	'priority'	 => 10,
  	'settings'	 => 'repeater_fact',
    'sanitize_callback' => 'esc_attr',
	
	'default'     => oneda_section_content_default('fact'),
  	'fields'	 => array(
  		'fact_icon'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'Facts Icon', 'oneda' ),
  			'default'	 =>'',
  		),		
	
	
  		'fact_item'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'Facts Item', 'oneda' ),
  			'default'	 =>'',
  		),	

  		'fact_number'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'Facts Number', 'oneda' ),
  			'default'	 => '',
			
  		),	
		
  	),
	
    'row_label'			 => array(
  		'type'	 => 'text',
  		'value'	 => __( 'Fact Item', 'oneda' ),
  	),
  ) ); 
  
  
   oneda_add_field( array(
	'type'        => 'color',
	'settings'    => 'fact_circle_color',
	'label'       => __( 'Fact Circle Color', 'oneda' ),
	'description' => __( 'Only apply to "Fact Layout"-> "Circle"', 'oneda' ),
	'section'     => 'fact_section',
	'default'     => THEME_COLOR,
	'priority'    => 10,
	'choices'     => array(
		'alpha' => true,
	),
 	
  ) );  

  
  oneda_add_field( array(
	'type'        => 'select',
	'settings'    => 'news_article_number',
	'label'			 => __( 'Number of rotation articles', 'oneda' ),
	'section'     => 'news_section',
	'default'     => '3',
	'priority'    => 10,

	'choices'     => array(
		'1' => 1,	
		'2' => 2,	
		'3' => 3,
		'4' => 4,		
		'5' => 5,
		'6' => 6,
	),
  ) );  
  
  $options_categories = array();
  $options_categories_obj = get_categories();

  foreach ($options_categories_obj as $category) {
	$options_categories[$category->cat_name] = $category->cat_name;
  }			  
   
  oneda_add_field( array(
	'type'        => 'multicheck',
	'settings'    => 'news_categories',
	'label'		  => __( 'The following catagories will display on news section in the Homepage.', 'oneda' ),
	'section'     => 'news_section',
	'default'     => '',
	'priority'    => 10,
	'choices'     => $options_categories,
	
	
  ) );    
   
  oneda_add_field( array(
	'type'        => 'image',
	'settings'    => 'news_feature_img',
	'label'       => __( 'Homepage Article Default Feature image', 'oneda' ),
	'section'     => 'news_section',
	'default'     => esc_url(THEME_IMG_URL.'default.jpg'),
	'priority'    => 10,
  ) );
 
  oneda_add_button_field( oneda_button_default_arr('news') );

  oneda_add_field( array(
	'type'		 => 'text',
	'settings'	 => 'news_read_more',
	'label'		 => __( 'Read More', 'oneda' ),
	'default'	 => __( 'Read More', 'oneda' ),
	'section'	 => 'news_section',
	'priority'	 => 10,
  ) ); 
 
  oneda_add_field( array(
	'type'        => 'image',
	'settings'    => 'tool_1_logo',
	'label'       => __( 'Footer Logo', 'oneda' ),
	'section'     => 'tool_section',
	'default'     => esc_url(THEME_IMG_URL.'logo.png'),
	'priority'    => 10,
  ) );
 

  oneda_add_field( array(
	  'type'		 => 'textarea',
	  'settings'	 => 'tool_1_description',
	  'label'		 => __( 'Tool 1 Description', 'oneda' ),
	  'default'	     => __( 'Donec at eui smod nibh, eu bibendum quam. Nullam  non gravida pDonec at eui smod nibh, eu bibendum quam. Nullam  non gravida peu bibendum quam. Nullam  non gravida peu bibendum quam. Nullam  non gravida p', 'oneda' ),
	  'section'	 => 'tool_section',
	  'priority'	 => 10,
  ) );


  oneda_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'tool_2_title',
	  'label'		 => __( 'Tool 2 Title', 'oneda' ),
	  'default'	 => __( 'Contact Us', 'oneda' ),
	  'section'	 => 'tool_section',
	  'priority'	 => 10,
  ) );


  oneda_add_field( array(
  	'type'		 => 'repeater',
  	'label'		 => __( 'Tool 2 Information', 'oneda' ),
  	'section'	 => 'tool_section',
  	'priority'	 => 10,
  	'settings'	 => 'repeater_tool_2',
    'sanitize_callback' => 'esc_attr',
	'description'	=> sprintf(__('Note: <br>Find Coothemes.com icon: <a href="%s" target="_blank">https://www.coothemes.com/icons/</a>, Example: "ct-address" ', 'oneda'),esc_url('https://www.coothemes.com/icons/')),	
	
	'default'     => oneda_section_content_default('tool'),
  	'fields'	 => array(
  		'tool_2_icon'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'tool 2 Coothmems.com Icon', 'oneda' ),
  			'default'	 =>'',
  		),
  		'tool_2_text'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'Tool 2 Text', 'oneda' ),
  			'default'	 =>'',
  		),
  	),
	
    'row_label'			 => array(
  		'type'	 => 'text',
  		'value'	 => __( 'Tool 2 Contact Item', 'oneda' ),
  	),
  ) );

  oneda_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'tool_3_title',
	  'label'		 => __( 'Tool 3 Title', 'oneda' ),
	  'default'	 => __( 'Opening Hours', 'oneda' ),
	  'section'	 => 'tool_section',
	  'priority'	 => 10,
  ) );


  oneda_add_field( array(
  	'type'		 => 'repeater',
  	'label'		 => __( 'Tool 3 Information', 'oneda' ),
  	'section'	 => 'tool_section',
  	'priority'	 => 10,
  	'settings'	 => 'repeater_tool_3',
    'sanitize_callback' => 'esc_attr',

	'default'     => array(
			array(
				'tool_3_text' => esc_attr__( 'Monday-Friday: 08:00AM - 10:00PM', 'oneda' ),//====pro====													
			),
	
			array(
				'tool_3_text' => esc_attr__( 'Saturday-Sunday: 10:00AM - 11:00PM', 'oneda' ),												
			),
	
		),
  	'fields'	 => array(
  		'tool_3_text'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'Tool 3 Text', 'oneda' ),
  			'default'	 =>'',
  		),
  	),
	
    'row_label'			 => array(
  		'type'	 => 'text',
  		'value'	 => __( 'Tool 3 Contact Item', 'oneda' ),
  	),
  ) );


  oneda_add_field( array(
		'type'        => 'editor',
		'settings'    => 'footer_copy_code',
		'label'       => esc_attr__( 'Footer Copyright 2', 'oneda' ),
		'section'     => 'footer_option',
		'default'     => __('Powered by <a href="http://wordpress.org/">WordPress</a>. Theta All theme by <a href="https://www.coothemes.com/">CooThemes.com</a>.','oneda')


  )); 

 
  oneda_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'facebook_link',
	  'label'		 => __( 'Facebook Link', 'oneda' ),
	  'default'	 => '#',
	  'section'	 => 'footer_option',
	  'priority'	 => 10,
  ) ); 
  
  oneda_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'twitter_link',
	  'label'		 => __( 'Twitter Link', 'oneda' ),
	  'default'	 => '#',
	  'section'	 => 'footer_option',
	  'priority'	 => 10,
  ) );   
  
  oneda_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'youtube_link',
	  'label'		 => __( 'Youtube Link', 'oneda' ),
	  'default'	 => '#',
	  'section'	 => 'footer_option',
	  'priority'	 => 10,
  ) );   
  
  oneda_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'pinterest_link',
	  'label'		 => __( 'Pinterest Link', 'oneda' ),
	  'default'	 => '#',
	  'section'	 => 'footer_option',
	  'priority'	 => 10,
  ) ); 
  
  oneda_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'google_plus_link',
	  'label'		 => __( 'Google Plus Link', 'oneda' ),
	  'default'	 => '#',
	  'section'	 => 'footer_option',
	  'priority'	 => 10,
  ) );   
  
  oneda_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'instagram_link',
	  'label'		 => __( 'Instagram Link', 'oneda' ),
	  'default'	 => '#',
	  'section'	 => 'footer_option',
	  'priority'	 => 10,
  ) ); 
  

function oneda_add_button_field( $button_arr) {
	
  $key = $button_arr['key'];

  oneda_add_field( array(
  		'type'		 => 'text',
  		'settings'	 => $key.'_button_text',
  		'label'		 => __( 'Button Text', 'oneda' ),
  		'default'	 => $button_arr['button_text'],
  		'section'	 => $key.'_section',
  		'priority'	 => 10,
  	) ); 
	
	  
  oneda_add_field( array(
  		'type'		 => 'text',
  		'settings'	 => $key.'_button_url',
  		'label'		 => __( 'Button URL', 'oneda' ),
  		'default'	 => '#',
  		'section'	 => $key.'_section',
  		'priority'	 => 10,
  	) );   
  
  
  oneda_add_field( array(
	'type'        => 'color',
	'settings'    => $key.'_button_background',
	'label'       => __( 'Button Background Color', 'oneda' ),
	'section'     => $key.'_section',
	'default'     => THEME_COLOR,
	'priority'    => 10,
	'choices'     => array(
		'alpha' => true,
	),
	
  ) ); 
  
	 oneda_add_field( array(
		'type'        => 'slider',
		'settings'    => $key . '_button_opacity',
		'label'       => __( 'Button Background Opacity', 'oneda' ),
    	'section'	 => $key . '_section',
		'default'     => $button_arr['opacity'],
		'choices'     => array(
			'min'  => '0',
			'max'  => '1',
			'step' => '0.1',
		),
	) );
	  
  
  
  
  oneda_add_field( array(
	'type'        => 'typography',
	'settings'    => $key.'_button_typography',
	'label'       => esc_attr__( 'Button Text Typography', 'oneda' ),
	'section'     => $key.'_section',
	'default'     => $button_arr['button_font'],
	'priority'    => 10,
	
	'output'      => array(
	  array(
		  'element' => 'section.ct_'.$key.' .btn-primary',
	  ),
	),	
  

  ) ); 
  
  oneda_add_field( array(
	'type'        => 'number',
	'settings'    => $key.'_button_radius',
	'label'       => esc_attr__( 'Button Border Radius', 'oneda' ),
	'section'     => $key.'_section',
	'default'     => $button_arr['button_radius'],
	'choices'     => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
  ) );  
  
  oneda_add_field( array(
	  'type'        => 'spacing',
	  'settings'	 => $key.'_button_padding',
	  'label'       => __( 'Section Button Padding Control', 'oneda' ),
	  'section'	 => $key.'_section',
	  'default'     => $button_arr['button_spacing'],
	  'priority'    => 10,
  ) ); 

}  