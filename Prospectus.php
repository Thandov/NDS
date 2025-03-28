<?php

/**
 * Template Name: Prospectus Page
 */


get_header(); ?>

<div class="p-6 bg-gray-100 space-y-4">    
    <?php include(get_template_directory() . '/includes/prospectus_tables/qualifications_level_1.php'); ?>
    <?php include(get_template_directory() . '/includes/prospectus_tables/qualifications_level_2.php'); ?>
    <?php include(get_template_directory() . '/includes/prospectus_tables/qualifications_level_3.php'); ?>
    <?php include(get_template_directory() . '/includes/prospectus_tables/special_needs.php'); ?>
    <?php include(get_template_directory() . '/includes/prospectus_tables/seta_programme.php'); ?>
    <?php include(get_template_directory() . '/includes/prospectus_tables/arpl_trade_test.php'); ?>
</div>

<?php get_footer(); ?>