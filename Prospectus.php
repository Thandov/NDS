<?php

/**
 * Template Name: Prospectus Page
 */


get_header(); ?>

<div class="p-6 bg-gray-100 space-y-4">
    <div class="bg-white rounded p-6 flex items-center">
        Download our Prospectus here: <a class="nds_btn ms-3" href="http://" target="_blank" rel="noopener noreferrer">Download</a>
    </div>
    <?php include(get_template_directory() . '/includes/prospectus_tables/qualifications_level_1.php'); ?>
    <?php include(get_template_directory() . '/includes/prospectus_tables/qualifications_level_2.php'); ?>
    <?php include(get_template_directory() . '/includes/prospectus_tables/qualifications_level_3.php'); ?>
    <?php include(get_template_directory() . '/includes/prospectus_tables/special_needs.php'); ?>
    <?php include(get_template_directory() . '/includes/prospectus_tables/seta_programme.php'); ?>
    <?php include(get_template_directory() . '/includes/prospectus_tables/arpl_trade_test.php'); ?>
</div>
<?php include get_template_directory() . '/includes/cta2.php'; ?>
<?php get_footer(); ?>