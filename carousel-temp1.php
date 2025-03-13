<div class="carwrap">
    <div class="bgfloat">
        <p class="bold">Our Partners: </p><?php dynamic_sidebar('partners'); ?>
    </div>
    <div class="owl-carousel owl-theme p-0" id="headercara">
        <?php
    global $wpdb;
    $query = 'SELECT * FROM `wp_carkit`';
    $out = '';
    $subout = '';
    $result = $wpdb->get_results($query);

    foreach ($result as $key => $caritem) {
    ?>
        <div class="item d-flex justify-content-center align-items-center">
            <?php showitemslide($caritem->banner); ?>
            <div class="black-overlay"></div>
            <div class="container  hero-content d-flex align-items-center">
                <div class="text-start">
                    <p class="topTxt parag"><?php echo $caritem->toptxt; ?></p>
                    <h1 class="middleTxt"> <?php echo $caritem->middletxt; ?></h1>
                    <p class="btmTxt parag"><?php echo $caritem->btmtxt; ?></p>
                </div>
            </div>
        </div>

        <?php } ?>

    </div>
</div>