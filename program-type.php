<?php

/**
 * Template Name: Programs Page
 */
get_header();
$page_name = get_post_field('post_name', get_queried_object_id());
$pagename = ucwords(str_replace('-', ' ', $page_name));
$page_slug = sanitize_title($page_name);

$page_title = get_the_title();
$imgpp = (ucwords($pagename) == ucwords($page_title)) ? "fulltime.jpeg" : "adasd";
?>

<div class="head_section d-flex align-items-center justify-content-center">
    <div class="">
        <h1 class="header_txt"><?php echo $pagename; ?></h1>
        <?php $breadlinks = [
            ["name" => "Home", "slug" => "?page=home"],
            ["name" => "Academy", "slug" => "academy"],
            ["name" => $pagename, "slug" => "?page="],
        ];
        $breadlinks_json = urlencode(json_encode($breadlinks));
        echo do_shortcode('[nds_breadcrumb2 data="' . $breadlinks_json . '"]'); ?>
    </div>
</div>
<div class="">
    <div class="grid md:grid-cols-3 h-full">
        <div class="md:col-span-1 overlayglow relative" style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/img/' . $imgpp); ?>); background-position: center; background-repeat: no-repeat; background-size: cover; "></div>
        <div class="md:col-span-2">
            <div class="space-y-4 p-4">
                <?php echo do_shortcode('[marqueText smTxt="We are here for" bgTxt="Our Courses" align=""]'); ?>
                <?php echo do_shortcode('[displaySelectedPathList slug="' . $page_slug . '"]'); ?>
                <div class="grid grid-cols-3 gap-3">
                    <div class="randpix"><img src="<?php bloginfo('template_directory'); ?>/img/paths/<?php echo $page_slug; ?>/img1.png" alt="sssss"></div>
                    <div class="randpix"><img src="<?php bloginfo('template_directory'); ?>/img/paths/<?php echo $page_slug; ?>/img2.png" alt="sssss"></div>
                    <div class="randpix"><img src="<?php bloginfo('template_directory'); ?>/img/paths/<?php echo $page_slug; ?>/img3.png" alt="sssss"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>