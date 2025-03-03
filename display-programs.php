<?php

/**
 ** Template Name: Programs Course
 * * Template Post Type: post
 */

get_header();

if (is_page() || is_single()) {
    global $post;
    $post_id = $post->ID; // Get the current page or post ID
    $post_title = $post->post_title; // Get the current page or post title
    $post_content = $post->post_content; // Get the current page or post content

    echo 'Post ID: ' . $post_id . '<br>';
    echo 'Post Title: ' . $post_title . '<br>';
    echo 'Post Content: ' . $post_content . '<br>';
}
?>
<div class="head_section d-flex align-items-center justify-content-center">
    <h1 class="header_txt"><?php echo $post_title; ?></h1>
</div>
<div class="" id="">
    <div class="row h-100">
        <div class="col-md-6 bg-primary">
            <h3 class="ssss"><?php echo $post_title; ?></h3>
            <h4>Description</h4>
        </div>
        <div class="col-md-6 bg-primary">

            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Curriculium
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                </ul>
            </div>
        </div>

        <h4>Curriculium</h4>
        <h4>Cost</h4>
        <h4>Gallery</h4>
        <h4>Actions</h4>
        <h4>Links</h4>
    </div>
</div>
<?php get_footer(); ?>