<?php


get_header();
$path_slug = get_query_var('education_path_slug');
$pagename = ucwords(str_replace('-', ' ', $path_slug));

?>

<div class="head_section d-flex align-items-center justify-content-center">
    <h1 class="header_txt"><?php echo $pagename; ?></h1>
</div>
<div class="sec">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="head_and_desc scp">
                    <p class="desc_descript">We Have</p>
                    <h2 class="head_header"><?php echo $pagename; ?></h2>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">
            <?php echo do_shortcode('[displaySelectedPathPrgramTypes slug="' . $path_slug . '"]'); ?>
        </div>
    </div>
</div>
<?php

get_footer(); ?>