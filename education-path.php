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
                <div class="head_and_desc scp">
                    <p class="desc_descript">About Us</p>
                    <h2 class="head_header">NDS Academy</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php echo do_shortcode('[displayPathPage]'); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>