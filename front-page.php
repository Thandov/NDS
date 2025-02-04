<?php
/**
 * Template Name: Front Page
 */

get_header();
require 'carousel-temp1.php';

if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
else:
    _e( 'Sorry, no pages matched your criteria.', 'textdomain' );
endif;

get_footer(); ?>