<?php
  $key = 'news';
  $custom_css = '';

  $sections = oneda_public_content_default(); 
  $default = $sections[$key];

  $default_content = oneda_section_content_default($key);  
  $repeater_value = get_theme_mod( 'repeater_'.$key,$default_content);	


  $enable_parallax_background = get_theme_mod( $key.'_enable_parallax_background',$default['parallax']); 
  
  $section_background_image     = ''; 
  
  $parallax_str = '';
  
  if($enable_parallax_background && $section_background_image !=''){  
	  $parallax_str ='data-parallax="scroll" data-image-src="'.$section_background_image.'" '; 
  }
  
  $button_arr  = oneda_button_default_arr($key);  
  $button_url = esc_url(get_theme_mod( $key.'_button_url',''));  
  $button_text = esc_html(get_theme_mod( $key.'_button_text',$button_arr['button_text']));  
  
  $article_number = get_theme_mod( $key.'_article_number',3);
  $oneda_categories = get_theme_mod( $key.'_categories',''); 
  

?>
<section id="ct_<?php echo $key;?>" class="ct_section ct_<?php echo $key;?> ct_section_<?php echo $key;?> ">
	<div  id="<?php echo $key;?>" class="section_content "   <?php echo $parallax_str;?> >
    	
        <div class="ct-title container">
        	<?php if ( get_theme_mod( $key.'_section_title', $default['title'] ) != '' ) : ?>
            <h1 class="section_title "><?php echo esc_html( get_theme_mod( $key.'_section_title', $default['title'] ) );  ?></h1>
           
			<?php endif; ?>
			<?php if ( get_theme_mod( $key.'_section_description', $default['description'] ) != '' ) : ?>
				<p class="section_text"><?php echo esc_html( get_theme_mod( $key.'_section_description', $default['description'] ) ); ?></p>
			<?php endif; ?>
            
        </div>


        <div class="ct_<?php echo $key;?>_list ">
 			<div class="row">
 
                 <div id="myCarousel<?php echo $key;?>" class="carousel slide ct_<?php echo $key;?>_warp" data-ride="carousel"  data-interval="5000" >
                    
                    <div class="carousel-inner" role="listbox">
                    <?php  

						$options_categories = array();
						$options_categories_obj = get_categories();
						foreach ($options_categories_obj as $category) {
							$options_categories[$category->cat_name] = $category->cat_ID;
						}
	
						$options_cat_id = array();
	
	
						if($options_categories){
							foreach ( $options_categories as $cat_name => $cat ) {
								if(!empty($blog_categories)){	
								if (!in_array($cat_name, $oneda_categories)){$options_cat_id[]= $cat;}	
								}
							}
						}		
					
						
						if(empty($options_cat_id)){
							
							$query_posts = array( 
							'showposts' => $article_number,
							'ignore_sticky_posts' => 1,
							
							 ); 
	
						}else{
						
							$query_posts =  array( 
							  'showposts' => $article_number, 
							  'ignore_sticky_posts' => 1,
							  'category__in' => $options_cat_id,
							 );
						}
						$the_query = new WP_Query( $query_posts );
						 $k=0;
						if ($the_query->have_posts()) :  while ($the_query->have_posts()) : $the_query->the_post(); 
						          
						$exclude_id = get_the_ID();
						$thumb_array = oneda_get_blog_thumbnail($exclude_id);               
                     ?>       
                            
                    <div class="item <?php if($k==0){echo 'active';}?>">
                        <div class="container">
                            <div class="carousel-caption">
                            
                                <div class="ct_news_img col-md-6">
                                    <img src="<?php if($thumb_array['fullpath'] != ''){echo esc_url($thumb_array['fullpath']);}?>" >
                                </div>                                    
                            
                                <div class="ct_news_info col-md-6">
									<p class="ct_news_title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></p>
									<p class="ct_news_meta"><i class="ct ct-time-r" aria-hidden="true"></i> <?php the_time('M d, y');?></p>

									<div class="ct_news_text"><?php the_excerpt();  ?></div>
                                    
                                    <p class="ct_news_a"><a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod( 'news_read_more', __('Read More','oneda') ));?></a></p>
                                </div>

                                <p class="clear"></p> 
                            </div>
                        </div>
                    </div>           
                        
                        
                     <?php
					 $k++;
						endwhile; 
						wp_reset_postdata();
						endif;
						
                    ?>
                
                    </div>
                    <a class="left carousel-control" href="#myCarousel<?php echo $key;?>" role="button" data-slide="prev">
                        <i class="ct ct-angle-left ct-1-5x" aria-hidden="true"></i>
                        <span class="sr-only"><?php esc_html_e('Previous', 'oneda');?></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel<?php echo $key;?>" role="button" data-slide="next">
                        <i class="ct ct-angle-right ct-1-5x" aria-hidden="true"></i>
                        <span class="sr-only"><?php esc_html_e('Next', 'oneda');?></span>
                    </a>  
                    
                  </div>
 

                <p class="clear"></p>                             

             	<p><a class="btn btn-lg btn-primary" href="<?php echo $button_url; ?>" role="button">
                	<?php echo $button_text; ?> 
                </a></p>                  
                
                
                                                          
            </div>	
        </div>
        

	</div>
	<div class="clear"></div>
</section>