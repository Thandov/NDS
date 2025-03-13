<?php

/**
 * Template Name: Path Page
 */
get_header();
?>
<div class="head_section flex items-center justify-center">
    <h1 class="header_txt">Lets begin your Journey</h1>
</div>
<div class="">
    <div class="md:grid md:grid-cols-7 md:gap-4 h-full py-4">
        <div class="col-span-2" id="academyimg"></div>
        <div class="col-span-5 flex items-center justify-center">
            <div class="md:w-[85%]">
                <?php echo do_shortcode('[marqueText smTxt="Academy" bgTxt="NDS Academy" align=""]'); ?>
                <div class="md:grid md:grid-cols-4 md:gap-4">
                    <?php echo do_shortcode('[displayPathPage]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>