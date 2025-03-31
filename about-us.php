<?php

/**
 * Template Name: About NDS 
 */

get_header(); ?>
<div class="head_section d-flex align-items-center justify-content-center">
    <h1 class="header_txt"><?php the_title(); ?></h1>
</div>
<div class="sec flex items-center justify-center" id="about_sec">
    <div class="md:w-[85%] md:grid md:grid-cols-7 md:gap-4">
        <div class="md:col-span-4">
            <?php echo do_shortcode('[marqueText smTxt="About Us" bgTxt="NDS Academy" align=""]'); ?>
            <p class="text-justify md:w-[90%]">Founded in 2013, NDS Chefs Academy was established to bridge the gap for students unable to meet traditional university admission requirements. We provide an alternative pathway to quality education, helping students build rewarding careers in hospitality.<br><br>
                Our executive leadership brings over 20 years of experience across Hospitality, Tourism, Information Technology, Business Management, and Education and Training. This expertise drives our hands-on approach, focused on achieving outstanding results and building lasting relationships that speak to our commitment to quality and professionalism.</p>
        </div>
        <div class="md:col-span-3">
            <div class="">
                <div>
                    <img class="about-logo w-full" src="<?php bloginfo('template_directory'); ?>/img/logo/logo.jpeg" alt="sssss">
                    <p class="xxxxx">Est. 2013</p>
                </div>
                <img src="<?php bloginfo('template_directory'); ?>/img/about/img1.png" alt="sssss">
            </div>
        </div>
    </div>
</div>
<?php include get_template_directory() . '/includes/cta2.php'; ?>
<div class="sec flex items-center justify-center p-6">
    <div class="md:w-[85%]">
        <?php echo do_shortcode('[marqueText smTxt="Meet The Team" bgTxt="Our Team" align=""]'); ?>
        <div>
            <?php echo do_shortcode('[show_staff_members]'); ?>
        </div>
    </div>
</div>
<div class="bglight">
    <?php require get_template_directory() . '/includes/recipe_blog.php'; ?>
</div>
<?php get_footer(); ?>