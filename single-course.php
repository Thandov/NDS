<?php

/**
 ** Template Name: Single Course
 * * Template Post Type: post
 */

get_header();

$category_id = $_GET['category_id'];
?>
<div class="head_section d-flex align-items-center justify-content-center">
    <h1 class="header_txt"><?php the_title(); ?></h1>
</div>
<div class="" id="">
    <div class="row h-100">
        <div class="col-md-5 bg-primary">
            Gallery
        </div>
        <div class="col h-100 sec">
            <div class="head_and_desc scp">
                <?php echo do_shortcode('[wpd_showCourses id="' . $category_id . '"]'); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>