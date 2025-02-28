<?php

/**
 * Template Name: About NDS 
 */

get_header(); ?>
<div class="head_section d-flex align-items-center justify-content-center">
    <h1 class="header_txt"><?php the_title(); ?></h1>
</div>
<div class="sec" id="about_sec">
    <div class="row h-100">
        <div class="col h-100">
            <div class="head_and_desc scp">
                <p class="desc_descript">About Us</p>
                <h2 class="head_header">NDS Academy</h2>
            </div>
            <p>Founded in 2013, NDS Chefs Academy was established to bridge the gap for students unable to meet traditional university admission requirements. We provide an alternative pathway to quality education, helping students build rewarding careers in hospitality.<br><br>
                At NDS, we take pride in delivering exceptional customer service and fostering long-term partnerships. Our commitment to service excellence ensures that we exceed expectations for both students and industry clients, enhancing their experiences and supporting their success.<br><br>
                Our executive leadership brings over 20 years of experience across Hospitality, Tourism, Information Technology, Business Management, and Education and Training. This expertise drives our hands-on approach, focused on achieving outstanding results and building lasting relationships that speak to our commitment to quality and professionalism.</p>
        </div>
        <div class="col h-100 d-flex align-items-center">
            <div class="">
                <div>
                    <img class="about-logo" src="<?php bloginfo('template_directory'); ?>/img/logo/logo.jpeg" alt="sssss">
                    <p class="xxxxx">Est. 2013</p>
                </div>
                <img src="<?php bloginfo('template_directory'); ?>/img/about/img1.png" alt="sssss">
            </div>
        </div>
    </div>
</div>
<div class="cta2_wrp d-flex align-items-center bgprimary">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="cta2" style="color: #fff">
                    <div class="cta2_head">
                        <h3 class="head_header">Lets begin your Hospitality Journey?</h3>
                        <h5 class="ctap">Your are 3 steps away</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <img src="<?php bloginfo('template_directory'); ?>/img/about/knife.png" alt="sssss">
            </div>

        </div>
    </div>
</div>
<div class="sec d-flex align-items-center">
    <div>
        <div class="head_and_desc scp">
            <p class="desc_descript">Meet The Team</p>
            <h2 class="head_header">Our Team</h2>
        </div>
        <?php echo do_shortcode('[show_staff_members]'); ?>
    </div>
</div>
<div class="bglight">
    <?php require get_template_directory() . '/includes/recipe_blog.php'; ?>
</div>
<?php get_footer(); ?>