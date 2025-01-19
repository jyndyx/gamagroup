<?php
    // Contact Details
    $phone = get_field('company_phone', 'option');
    $email = get_field('company_email', 'option');

    add_action( 'wp_footer', 
    function() { ?>
        <script src="<?php echo get_site_url(); ?>/wp-content/themes/perlemedia/js/slider-min.js"></script>
    <?php }
    );

?>
    
<div class="slider-block fullwidth-row">
    <div class="carousel-wrapper">
        <div class="carousel">

            <?php if( have_rows('slider') ):
                $count = 0;
                while( have_rows('slider') ) : the_row();
                    $logo = get_sub_field('slider_logo');
                    $type = get_sub_field('slider_type');

                    if ($type == 'page') :
                        $page = get_sub_field('slider_page');
                        $title = get_the_title( $page );
                        $url = get_permalink( $page );

                        if (has_post_thumbnail( $page )) :
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $page ), 'single-post-thumbnail' )[0];
                        else :
                            $image = get_site_url() . "/wp-content/uploads/2025/01/slideshow-1.jpg";
                        endif;

                        if (get_sub_field('slider_image')) :
                            $image = get_sub_field('slider_image')['url'];
                        endif;

                        if (get_sub_field('slider_subheading')) :
                            $subheading = get_sub_field('slider_subheading');
                        endif;

                    else : 
                        $page = null;
                        $image = get_sub_field('slider_image')['url'];
                        $title = get_sub_field('slider_title');
                        $subheading = get_sub_field('slider_subheading');
                        $button = get_sub_field('slider_button');
                        $icon = get_sub_field('slider_icon');

                    endif;

                    // $url = get_permalink( $page );
            ?>

            <div class="slide-wrapper <?php if ($count === 0) : echo 'initial'; endif;?>">
                <img class="background" src="<?php echo $image; ?>">
                <div class="slide-content flex">
                    <?php if ($logo == "Yes") : ?>
                        <?php the_custom_logo(); ?>
                    <?php endif; ?>

                    <h2><?php echo $title; ?></h2>
                    <p>
                        <?php echo $subheading; ?>
                    </p>
                    <?php if ($type == "page") : ?>
                        <a class="button" href="<?php if ($type == "page") : echo $url; endif; ?>">
                        
                            <svg data-bbox="13 205 966 998" viewBox="0 0 992 1280" height="20" width="11" fill="#fff" xmlns="http://www.w3.org/2000/svg" data-type="shape">
                                <g>
                                    <path d="M397 1120q0 13 10 23l50 50q10 10 23 10t23-10l466-466q10-10 10-23t-10-23L503 215q-10-10-23-10t-23 10l-50 50q-10 10-10 23t10 23l393 393-393 393q-10 10-10 23zm-384 0q0 13 10 23l50 50q10 10 23 10t23-10l466-466q10-10 10-23t-10-23L119 215q-10-10-23-10t-23 10l-50 50q-10 10-10 23t10 23l393 393-393 393q-10 10-10 23z"></path>
                                </g>
                            </svg> 
                            <?php echo $title; ?>
                        </a>

                    <?php else : ?>

                        <?php if ($button != "none") : ?>
                            <?php if ($button == "phone") : ?>
                                <a href="tel:<?php echo $phone; ?>" class="button" style="color:<?php echo $color;?>">
                                    <?php if ($icon == "Yes") : ?>
                                        <svg data-bbox="0 0 1408 1408" viewBox="0 0 1408 1408" height="17" width="13" xmlns="http://www.w3.org/2000/svg" data-type="shape" fill="#fff" >
                                            <g>
                                                <path d="M1408 1112q0 27-10 70.5t-21 68.5q-21 50-122 106-94 51-186 51-27 0-53-3.5t-57.5-12.5-47-14.5T856 1357t-49-18q-98-35-175-83-127-79-264-216T152 776q-48-77-83-175-3-9-18-49t-20.5-55.5-14.5-47T3.5 392 0 339q0-92 51-186Q107 52 157 31q25-11 68.5-21T296 0q14 0 21 3 18 6 53 76 11 19 30 54t35 63.5 31 53.5q3 4 17.5 25t21.5 35.5 7 28.5q0 20-28.5 50t-62 55-62 53-28.5 46q0 9 5 22.5t8.5 20.5 14 24 11.5 19q76 137 174 235t235 174q2 1 19 11.5t24 14 20.5 8.5 22.5 5q18 0 46-28.5t53-62 55-62 50-28.5q14 0 28.5 7t35.5 21.5 25 17.5q25 15 53.5 31t63.5 35 54 30q70 35 76 53 3 7 3 21z"></path>
                                            </g>
                                        </svg>
                                    <?php endif;  ?>
                                    <?php echo $phone; ?>
                                </a>

                            <?php elseif ($button == "email") : ?>
                                <a href="mailto:<?php echo $email; ?>" class="button" style="color:<?php echo $color;?>">
                                    <?php if ($icon == "Yes") : ?>
                                        <svg data-bbox="0 0 1792 1408" viewBox="0 0 1792 1408" height="17" width="17" xmlns="http://www.w3.org/2000/svg" data-type="shape" fill="#fff" >
                                            <g>
                                                <path d="M1792 454v794q0 66-47 113t-113 47H160q-66 0-113-47T0 1248V454q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48T1194 886q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38T639 759q-91-64-262-182.5T172 434q-62-42-117-115.5T0 182q0-78 41.5-130T160 0h1472q65 0 112.5 47t47.5 113z"></path>
                                            </g>
                                        </svg>
                                    <?php endif;  ?>
                                    <?php echo $email; ?>
                                </a>

                            <?php elseif ($button == "contact") : ?>
                                <a href="#" class="button" style="color:<?php echo $color;?>">
                                    <?php if ($icon == "Yes") : ?>
                                        <svg data-bbox="0 0 1792 1408" viewBox="0 0 1792 1408" height="17" width="17" xmlns="http://www.w3.org/2000/svg" data-type="shape" fill="#fff" >
                                            <g>
                                                <path d="M1792 454v794q0 66-47 113t-113 47H160q-66 0-113-47T0 1248V454q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48T1194 886q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38T639 759q-91-64-262-182.5T172 434q-62-42-117-115.5T0 182q0-78 41.5-130T160 0h1472q65 0 112.5 47t47.5 113z"></path>
                                            </g>
                                        </svg>
                                    <?php endif;  ?>
                                    Contact Us
                                </a>

                            <?php endif;  ?>
                        <?php endif;  ?>

                    <?php endif; ?>
                </div>
            </div>

            <?php 
                $count++;
                endwhile; endif;
            ?>

            <div class="carousel-button-next"></div>
            <div class="carousel-button-prev"></div>
            
        </div><!-- .carousel -->
    </div><!-- .carousel-wrapper -->
</div><!-- .slider-block -->
