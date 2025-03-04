<?php

/**
 * Template Name: Path Page
 */
get_header();
?>
<div class="head_section d-flex align-items-center justify-content-center">
    <h1 class="header_txt">Lets begin your Journey</h1>
</div>
<div class="sec d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php echo do_shortcode('[marqueText smTxt="About Us" bgTxt="NDS Academy"]'); ?>
            </div>
        </div>
        <div class="row">
            <?php echo do_shortcode('[displayPathPage]'); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>