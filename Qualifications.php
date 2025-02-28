<?php
/**
 * Template Name: Qualifications
 */

get_header(); ?>
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        the_title( '<h1>aUSTIN ', '</h1>' );
        the_content();
    endwhile;
else:
    _e( 'Sorry, no pages matched your criteria.', 'textdomain' );
endif;
?>
<?php get_footer(); ?>
