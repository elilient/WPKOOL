<?php
  $key = 'fact';
  $custom_css = '';

  $sections = oneda_public_content_default(); 
  $default = $sections[$key];

  $default_content = oneda_section_content_default($key);  
  $repeater_value = get_theme_mod( 'repeater_'.$key,$default_content);	


  $enable_parallax_background = get_theme_mod( $key.'_enable_parallax_background',$default['parallax']); 
  
  $section_background_image     = esc_url(get_theme_mod( $key.'_section_background_image', THEME_IMG_URL.'fact.jpg')); 
  
  $parallax_str = '';
  
  if($enable_parallax_background && $section_background_image !=''){  
	  $parallax_str ='data-parallax="scroll" data-image-src="'.$section_background_image.'" '; 
  }

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

       <div class="ct_fact_list container">
            <div class="row ct_fact_content"> 
            
             <?php if( get_theme_mod( 'fact_layout', 'circle' ) == 'column'   )  {?>
                       
				 <?php  
                  $k=0;
    
                  if ( ! empty( $repeater_value ) ) :	
                    foreach ( $repeater_value as $row ) : 
                      if ( isset( $row[ 'fact_icon' ] ) && !empty( $row[ 'fact_icon' ] ) ) :
                 ?>
                    <div class="col-xs-12 col-sm-6 col-lg-3 ct_clear_margin_padding fact-col">
                        <p class="faoneda_icon"><i class="ct <?php echo esc_html( $row[ 'fact_icon' ] ); ?> ct-4x" aria-hidden="true"></i></p>               
                        <span class="fact" data-fact="<?php echo esc_html( $row[ 'fact_number' ] ); ?>">0</span>
                        <p class="faoneda_item"><?php echo esc_html( $row[ 'fact_item' ] ); ?></p>
                    </div>	
                 <?php
                      $k++;
                      endif;
                    endforeach;	
                  endif;
                ?>
            <?php }else if( get_theme_mod( 'fact_layout', 'circle' ) == 'circle'   ){?>


				<?php  
                  $k=0;
    
                  if ( ! empty( $repeater_value ) ) :	
                    foreach ( $repeater_value as $row ) : 
                      if ( isset( $row[ 'fact_number' ] ) && !empty( $row[ 'fact_number' ] ) ) :
                 ?>            
                <div class="col-xs-12 col-sm-6 col-lg-3 ct_clear_margin_padding fact-col">
                
                	<canvas class="loader<?php echo $k;?>"></canvas>
                
                	<p class="faoneda_item"><?php echo esc_html( $row[ 'fact_item' ] ); ?></p>
                </div>
                
                 <?php
                      $k++;
                      endif;
                    endforeach;	
                  endif;
                ?>           
            

            
            <?php }?>            
            </div>	 
        </div> 

	</div>
	<div class="clear"></div>
</section>