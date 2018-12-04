<?php
/**
 * Lite Manager
 *
 * @package oneda
 * @since 1.0.12
 */


/**
 * About page class
 */
require_once THEME_DIR. '/custom/ct-about-page/class-ct-about-page.php';

/*
* About page instance
*/
$config = array(
	// Menu name under Appearance.
	'menu_name'           => __( 'About Theta All (Oneda PRO)', 'oneda' ),
	// Page title.
	'page_name'           => __( 'About Theta All (Oneda PRO)', 'oneda' ),
	// Main welcome title
	/* translators: s - theme name */
	'welcome_title'       => sprintf( __( 'Welcome to %s! - Version ', 'oneda' ), 'oneda' ),
	// Main welcome content
	'welcome_content'     => esc_html__( 'Theta All (Oneda Pro) is a clean and beautiful, polished and feature-rich, robust and easy to use, fully responsive premium WordPress theme that is ideal for restaurant, cafe, bakery, cuisine, fast food, pizzerias, drinks and food related business. The theme is loaded with many pre-built home page sections to help you create an amazing modern one-page website without having to write a single line of code. The Theta All theme displays full screen image banner, About Us section, Service Section, Recent Posts Section and Contact Us form as well as Footer widgets. You have full control including home page section order, font, font size, color, button, opacity of every open section. The theme is optimized for fast loading and extremely responsive with various devices. You can see the demo at http://demo.coothemes.com/', 'oneda' ),
	/**
	 * Tabs array.
	 *
	 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
	 * the will be the name of the function which will be used to render the tab content.
	 */
	'tabs'                => array(
		'getting_started'     => __( 'Getting Started', 'oneda' ),
		/*'recommended_actions' => __( 'Recommended Actions', 'oneda' ),*/
		'recommended_plugins' => __( 'Recommended Plugins', 'oneda' ),
		/*'support'             => __( 'Support', 'oneda' ),*/
		/*'changelog'           => __( 'Changelog', 'oneda' ),*/
		'free_pro'            => __( 'Free vs PRO', 'oneda' ),
	),
	// Support content tab.
	'support_content'     => array(

	),
	// Getting started tab
	'getting_started'     => array(
		'first'  => array(
			'title'               => esc_html__( 'Recommended actions', 'oneda' ),
			'text'                => esc_html__( 'We have compiled a list of steps for you to take so we can ensure that the experience you have using one of our products is very easy to follow.', 'oneda' ),
			'button_label'        => esc_html__( 'Recommended actions', 'oneda' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=oneda-welcome&tab=recommended_plugins' ) ),
			'is_button'           => false,
			'recommended_actions' => true,
			'is_new_tab'          => false,
		),
		'second' => array(
			'title'               => esc_html__( 'Read full documentation', 'oneda' ),
			'text'                => esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use oneda.', 'oneda' ),
			'button_label'        => esc_html__( 'Documentation', 'oneda' ),
			'button_link'         => 'https://www.coothemes.com/theta-all-manual/',
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		'third'  => array(
			'title'               => esc_html__( 'Go to the Customizer', 'oneda' ),
			'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'oneda' ),
			'button_label'        => esc_html__( 'Go to the Customizer', 'oneda' ),
			'button_link'         => esc_url( admin_url( 'customize.php' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		
		'fourth'  => array(
			'title'        => esc_html__( 'Contact Support', 'oneda' ),
			'text'                => esc_html__( 'We want to make sure you have the best experience using  Theta All, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using  Theta All as much as we enjoy creating great products.', 'oneda' ),
			'button_label'        => esc_html__( 'Contact Support', 'oneda' ),
			'button_link'  => esc_url( 'https://www.coothemes.com/forum/theta-all-theme' ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		
		
	),
	// Free vs PRO array.
	'free_pro'            => array(
		'free_theme_name'     => 'oneda',
		'pro_theme_name'      => 'Theta All',
		'pro_theme_link'      => 'https://www.coothemes.com/theme-theta-all/',
		/* translators: s - theme name */
		'get_pro_theme_label' => sprintf( __( 'Upgrade to Pro!', 'oneda' ), 'Theta All (Oneda Pro)' ),
'features'            => array(
			array(
				'title'       => __( 'One-page Theme', 'oneda' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),
			array(
				'title'       => __( 'Text and Image Logos', 'oneda' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),
			
		
			array(
				'title'       => __( 'Parallax Backgrounds', 'oneda' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Front Page Section Reordering', 'oneda' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),
			
			array(
				'title'       => __( 'Unlimited Front Page Banner', 'oneda' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Front page Events Section', 'oneda' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),
			

			array(
				'title'       => __( 'Multiple Blog Layouts', 'oneda' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),			

			array(
				'title'       => __( 'Footer Widgets', 'oneda' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),


			array(
				'title'       => __( 'Footer Copyright Editor', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),	


			array(
				'title'       => __( 'Full Screen Front Page Banner', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),		

			array(
				'title'       => __( 'Front Page Image and Video Slider', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),			
			

			array(
				'title'       => __( 'Front page Service Section', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),			
			

			array(
				'title'       => __( 'Front page About Us Section', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),		


			array(
				'title'       => __( 'Front Page Portfolio Section', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),

			array(
				'title'       => __( 'Front Page HTML5 Video Section', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),
			
		
			
			array(
				'title'       => __( 'Front Page Pricing Section', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Front Page Team Section', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),		
						
			array(
				'title'       => __( 'Front Page Facts Section', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),		

			array(
				'title'       => __( 'Front Page Gallery Section', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),	
			
			array(
				'title'       => __( 'Front Page Testimonial Section', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Front Page Clients Section', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),	
			
			array(
				'title'       => __( 'Front Page WooCommerce Section', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Front Page Blog Section', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),		
						
			array(
				'title'       => __( 'Front Page CTA Section', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Google Maps', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),	
			
			array(
				'title'       => __( 'Google fonts', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Shortcode', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),				
			
			array(
				'title'       => __( 'Multiple Page Template', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),				
			
			array(
				'title'       => __( 'WooCommerce Compatible', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),				
			
			array(
				'title'       => __( 'Unlimited Color Choices', 'oneda' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),							
			array(
				'title'       => __( 'Automatic Updates', 'oneda' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),				
			
						
		),
	),
	
	// Plugins array.
	'recommended_plugins' => array(
		'already_activated_message' => esc_html__( 'Already activated', 'oneda' ),
		'version_label'             => esc_html__( 'Version: ', 'oneda' ),
		'install_label'             => esc_html__( 'Install and Activate', 'oneda' ),
		'activate_label'            => esc_html__( 'Activate', 'oneda' ),
		'deactivate_label'          => esc_html__( 'Deactivate', 'oneda' ),
		'content'                   => array(
			array(
				'slug' => 'kirki',
			),
			
			
			array(
				'slug' => 'one-click-demo-import',
			),				
								
		),
	),

);
Coothemes_About_Page::init( apply_filters( 'oneda_about_page_array', $config ) );

