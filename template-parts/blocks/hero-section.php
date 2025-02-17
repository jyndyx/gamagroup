<?php
    $background_image = get_sub_field('hero_image');
    $heading = get_sub_field('hero_heading');
    $subheading = get_sub_field('hero_subheading');
    $gradient = get_sub_field('hero_gradient');
    $colorOne = $gradient['first_color'];
    $colorTwo = $gradient['second_color'];
    $textColor = get_sub_field('hero_text_color');
    $logo = get_sub_field('hero_logo');
    $cta = get_sub_field('hero_phone_number');
    
    // Contact Details
    $phone = get_field('company_phone', 'option');
    $email = get_field('company_email', 'option');
?>
    
    <div class="hero-block fullwidth-row">

        <?php if ($background_image) : ?>
            <div class="block-wrapper" style="background-image:url('<?php echo $background_image['url'];?>');">
        <?php else : ?>
            <div class="block-wrapper" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>')">
        <?php endif;  ?>

        <?php if ($gradient) : ?>
            <div class="overlay <?php echo $textColor;?>" style="background: <?php echo $colorOne?>; background: linear-gradient(140deg, <?php echo $colorOne?> 0%, <?php echo $colorTwo?> 100%);">
        <?php else : ?>
            <div class="overlay <?php echo $textColor;?>"> 
        <?php endif; ?>  
        
        <?php if ($logo == "Yes") : ?>
            <?php the_custom_logo(); ?>
        <?php endif; ?>

        <?php if ($heading) : ?>
            <h1 class="banner-heading"><?php echo $heading; ?></h1>
        <?php else : ?>
            <h1 class="banner-heading"><?php the_title(); ?></h1>
        <?php endif; ?>
        
        <p><?php echo $subheading;?></p>

        <?php if ($cta == "Yes") : ?>
            <div class="cta-wrapper">
                
                <a href="#" class="button">
                    <svg data-bbox="0 0 1408 1408" viewBox="0 0 1408 1408" height="17" width="13" xmlns="http://www.w3.org/2000/svg" data-type="shape" fill="<?php echo $color;?>">
                        <g>
                            <path d="M1408 1112q0 27-10 70.5t-21 68.5q-21 50-122 106-94 51-186 51-27 0-53-3.5t-57.5-12.5-47-14.5T856 1357t-49-18q-98-35-175-83-127-79-264-216T152 776q-48-77-83-175-3-9-18-49t-20.5-55.5-14.5-47T3.5 392 0 339q0-92 51-186Q107 52 157 31q25-11 68.5-21T296 0q14 0 21 3 18 6 53 76 11 19 30 54t35 63.5 31 53.5q3 4 17.5 25t21.5 35.5 7 28.5q0 20-28.5 50t-62 55-62 53-28.5 46q0 9 5 22.5t8.5 20.5 14 24 11.5 19q76 137 174 235t235 174q2 1 19 11.5t24 14 20.5 8.5 22.5 5q18 0 46-28.5t53-62 55-62 50-28.5q14 0 28.5 7t35.5 21.5 25 17.5q25 15 53.5 31t63.5 35 54 30q70 35 76 53 3 7 3 21z"></path>
                        </g>
                    </svg>
                    <?php echo $phone; ?>
                </a>
            </div>
        <?php endif; ?>
        </div><!-- .overlay -->
    </div><!-- .block-wrapper -->
</div><!-- .hero-block -->

