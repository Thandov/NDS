<?php

/**
 * Template Name: Path Page
 */
get_header();
?>
<div class="head_section d-flex align-items-center justify-content-center">
    <h2 class="header-txt">Lets begin your Journey</h2>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="bb py-5">
                <?php echo do_shortcode('[displayPathPage]'); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>