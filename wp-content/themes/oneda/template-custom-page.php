<?php
/**
 *
 * Template name: Custom Page
 * The template for displaying homepage.
 *
 * @package oneda
 */

get_header(); ?>
    
   <div class="warp">

					<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>


                            <?php the_content(); ?>

                    
                    <?php endwhile;endif; ?> 

    </div>
 
<?php get_footer(); ?>