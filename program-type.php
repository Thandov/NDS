<?php
/**
 * Template Name: Programs Page
 */
get_header();
$page_name = get_post_field('post_name', get_queried_object_id());
$pagename = ucwords(str_replace('-', ' ', $page_name));
$page_slug = sanitize_title($page_name);
?>

<div class="head_section d-flex align-items-center justify-content-center">
    <h1 class="header_txt"><?php echo $pagename; ?></h1>
</div>
<div class="sec">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="head_and_desc scp">
                    <p class="desc_descript">We Have</p>
                    <h2 class="head_header"><?php echo $pagename; ?></h2>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">
            <?php echo do_shortcode('[displaySelectedPathPrgramTypes slug="' . $page_slug . '"]'); ?>
        </div>
    </div>
</div>
<?php

get_footer(); ?>