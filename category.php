<?php
get_header();
$category_id = get_queried_object_id();
$category = get_category($category_id);

if ($category) {
    // Get the category name and slug
    $program_name = $category->name;
    $program_slug = $category->slug;

    $breadlinks = [
        ["name" => "Home", "slug" => "home"],
        ["name" => "Courses", "slug" => "education-path"],
        ["name" => "$program_name", "slug" => $program_slug],
    ];
    $breadlinks_json = urlencode(json_encode($breadlinks));
}
?>
<div class="head_section d-flex align-items-center justify-content-center">
    <h1 class="header_txt"><?php echo $category->name; ?></h1>
</div>
<div class="py-3 bgprimary"><?php echo do_shortcode('[crumbs data="' . $breadlinks_json . '"]'); ?></div>
<div class="container" id="">
    <div class="row">
        <div class="col pt-3">
            <div class="head_and_desc scp">
                <?php echo do_shortcode('[showCoursesNavTabs id="' . $category_id . '"]'); ?>
            </div>
        </div>
    </div>
</div>
<div style="background-color: #F8F8F8;">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php echo do_shortcode('[showPanelCoursesNavTabs id="' . $category_id . '"]'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>