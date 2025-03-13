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
<div class="sec flex items-start justify-center">
    <div class="w-[85%]">
        <?php echo do_shortcode('[marqueText smTxt="We Have" bgTxt="' . $pagename . '" align=""]'); ?>
        <div class="md:grid md:grid-cols-3">
            <?php echo do_shortcode('[displaySelectedPathPrgramTypes slug="' . $page_slug . '"]'); ?>
        </div>
    </div>
</div>
<?php

get_footer(); ?>