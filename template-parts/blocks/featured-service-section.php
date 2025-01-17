<?php
    $page = get_sub_field('featured_service_page');
?>
    
<div class="featured-service-block">
    
    <?php if( have_rows('featured_services') ):
        while( have_rows('featured_services') ) : the_row();
            
            if (get_sub_field('featured_service_page')) :
                $page = get_sub_field('featured_service_page');
            endif;

            if (has_post_thumbnail( $page ) ):
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $page ), 'single-post-thumbnail' )[0];
            endif;

            $url = get_permalink( $page );
            $excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $page));

            
        ?>


            <div class="featured-service-wrapper">

                <a href="<?php echo $url;?>" class="image">
                    <img src='<?php echo $image;?>' />
                </a>

                <h4>
                    <?php echo get_the_title( $page ); ?>
                </h4>
                
                <?php echo $excerpt;?>

                <a href="<?php echo $url;?>" class="button full-width">
                    <svg data-bbox="13 205 966 998" viewBox="0 0 992 1280" height="20" width="11" fill="#fff" xmlns="http://www.w3.org/2000/svg" data-type="shape">
                        <g>
                            <path d="M397 1120q0 13 10 23l50 50q10 10 23 10t23-10l466-466q10-10 10-23t-10-23L503 215q-10-10-23-10t-23 10l-50 50q-10 10-10 23t10 23l393 393-393 393q-10 10-10 23zm-384 0q0 13 10 23l50 50q10 10 23 10t23-10l466-466q10-10 10-23t-10-23L119 215q-10-10-23-10t-23 10l-50 50q-10 10-10 23t10 23l393 393-393 393q-10 10-10 23z"></path>
                        </g>
                    </svg> 
                    Read More
                </a>
            </div>
        <?php endwhile; endif;?>
    
</div><!-- .hero-block -->

