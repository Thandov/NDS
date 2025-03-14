<?php
get_header();
$category_id = get_queried_object_id();
$category = get_category($category_id);
$page_title = get_the_title();

if ($category) {
    // Get the category name and slug
    $program_name = $category->name;
    $program_slug = $category->slug;

    $breadlinks = [
        ["name" => "Home", "slug" => "home"],
        ["name" => "Short Courses", "slug" => "short-courses"],
        ["name" => "$program_name", "slug" => $program_slug],
    ];
    $breadlinks_json = urlencode(json_encode($breadlinks));
}
?>
<div class="head_section d-flex align-items-center justify-content-center">
    <h1 class="header_txt"><?php echo $category->name; ?></h1>
</div>
<div class="py-3 bgprimary"><?php echo do_shortcode('[crumbs data="' . $breadlinks_json . '"]'); ?></div>

<div style="background-color: #F8F8F8;">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php echo do_shortcode('[showCoursesNavTabs program="' . $page_title . '"]'); ?>
                <?php echo do_shortcode('[showPanelCoursesNavTabs program="' . $page_title . '"]'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>