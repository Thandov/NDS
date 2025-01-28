<?php
/**
 * Template Name: Home
 */

get_header(); ?>

<main>
    <h1>Home</h1>
    <p>Content for Home goes here.</p>
</main>
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        the_title( '<h1>', '</h1>' );
        the_content();
    endwhile;
else:
    _e( 'Sorry, no pages matched your criteria.', 'textdomain' );
endif;
?>
<?php get_footer(); ?>