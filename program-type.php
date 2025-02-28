<?php


get_header();
$path_slug = get_query_var('education_path_slug');
$pagename = ucwords(str_replace('-', ' ', $path_slug));
?>
<div class="head_section d-flex align-items-center justify-content-center">
    <h2 class="header-txt"><?php echo $pagename; ?></h2>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="bb pt-5">
                <h6 class="smltxt">We Have</h6>
                <h2 class="bigtxt"><?php echo $pagename; ?></h2>

                <?php

                echo do_shortcode('[displaySelectedPathPrgramTypes slug="' . $path_slug . '"]');

                $education_path_slug = get_query_var('education_path_slug');
                if ($education_path_slug) {
                    // Query the database or display the content based on the slug
                    // For example, you can get posts or custom post types based on the slug
                    $args = array(
                        'post_type' => 'education_path', // Your custom post type, if used
                        'name' => $education_path_slug, // The slug we got from the URL
                        'posts_per_page' => 1
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            // Output the content of the education path here
                            the_content();
                        }
                    } else {
                        echo 'No education path found.';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php

get_footer(); ?>