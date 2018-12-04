<section id="ct_slider" class="ct_section ct_slider ct_section_1">

<div  class="section_slider ">
  <div id="myCarousel" class="carousel slide ct_slider_warp" data-ride="carousel"  data-interval="<?php echo esc_attr(get_theme_mod( 'slide_time','5000')); ?> " >
  
    <div class="carousel-inner" role="listbox">
	<?php  
	 for($k=1;$k<4;$k++){
		 if(get_theme_mod( 'slider_page'.$k,'') == '' ){continue;}
		 $sliders[$k] = oneda_get_slider_details(get_theme_mod( 'slider_page'.$k,'') );

     ?>         
      <div class="item ct_slider_item_<?php echo $k;?>  <?php if($k==1){echo 'active';}?> " >
 
              <div class="carousel-caption">
                  <div class="carousel_caption_warp">

                      <div class="slider_text">
						<?php if ( isset( $sliders[$k][ 'title' ] ) && !empty( $sliders[$k][ 'title' ] ) ) : ?>
                            <h1 class="slider_title">
                                <?php echo esc_html( $sliders[$k][ 'title' ] ); ?>
                            </h1>
                        <?php endif; ?>                      

						<?php if ( isset( $sliders[$k][ 'content' ] ) && !empty($sliders[$k][ 'content' ] ) ) : ?>
                            <p class="ct_slider_text">
                                <?php echo esc_html( $sliders[$k][ 'content' ] ); ?>
                            </p>
                        <?php endif; ?>
                      </div>
					  
                      <p class="slider_btn"><a class="btn btn-lg btn-primary" href="<?php echo esc_url(get_theme_mod( 'slider_url_1'.$k,'')  );  ?>" role="button">
                      <?php if ( get_theme_mod( 'slider_button_text_1'.$k,'') !='' ){echo esc_html(get_theme_mod( 'slider_button_text_1'.$k,'')  );  }else{esc_html_e( 'View More', 'oneda' );} ?>
                      </a>
                      
                      <?php  if (  get_theme_mod( 'slider_button_text_2'.$k,'') !='' ){  ?>
					  <a class="btn btn-lg btn-primary" href="<?php echo esc_url( get_theme_mod( 'slider_url_2'.$k,'') );  ?>" role="button">
                        <?php if ( get_theme_mod( 'slider_button_text_2'.$k,'') !='' ){echo esc_html(get_theme_mod( 'slider_button_text_2'.$k,'')  );  }else{esc_html_e( 'Try It Now', 'oneda' );} ?>                     </a>                      
                      <?php }?>
                      </p>


                  </div>
                  <div class="clear"></div>


              </div>
          
      </div>     
        
        
    <?php
	  }
    ?>

    </div>
   	<?php   if($k > 1){  ?>   
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <i class="ct ct-angle-left ct-1-5x" aria-hidden="true"></i>
        <span class="sr-only"><?php esc_html_e('Previous', 'oneda');?></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <i class="ct ct-angle-right ct-1-5x" aria-hidden="true"></i>
        <span class="sr-only"><?php esc_html_e('Next', 'oneda');?></span>
    </a>  
  	<?php   }  ?>    
  </div>

</div>
<div class="clear"></div>
</section>