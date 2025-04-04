<?php

/**
 * Template Name: Prospectus Page
 */
get_header(); ?>
<?php require get_template_directory() . '/includes/herosec.php'; ?>
<div class="p-6 bg-gray-100 space-y-4">
    <div class="md:w-[70%] mx-auto space-y-4">
        <div class="px-6 py-2 bg-white shadow-md rounded-lg">
            <div class="flex justify-between items-center">
                Download our Prospectus here: <a class="nds_btn ms-3" href="<?php echo bloginfo('template_directory'); ?>/Assets/prospectus/prospectus.pdf" download target="_blank" rel="noopener noreferrer">Download</a>
            </div>
        </div>
        <?php include(get_template_directory() . '/includes/prospectus_tables/qualifications_level_1.php'); ?>
        <?php include(get_template_directory() . '/includes/prospectus_tables/qualifications_level_2.php'); ?>
        <?php include(get_template_directory() . '/includes/prospectus_tables/qualifications_level_3.php'); ?>
        <?php include(get_template_directory() . '/includes/prospectus_tables/special_needs.php'); ?>
        <?php include(get_template_directory() . '/includes/prospectus_tables/seta_programme.php'); ?>
        <?php include(get_template_directory() . '/includes/prospectus_tables/arpl_trade_test.php'); ?>
    </div>
</div>
<?php include get_template_directory() . '/includes/cta2.php'; ?>
<?php get_footer(); ?>