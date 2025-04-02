<div class="carwrap">
    <div class="bgfloat">
        <div class="grid grid-cols-3">
            <div class="col-span-1 flex items-center justify-center">
                <p class="bold font-sm m-0">Our Partners: </p>
            </div>
            <div class="col-span-2 flex items-center justify-center p-1">
                <?php dynamic_sidebar('partners'); ?>
            </div>
        </div>
    </div>
    <div class="owl-carousel owl-theme p-0" id="headercara">
        <?php
        global $wpdb;
        $query = 'SELECT * FROM '. $wpdb->prefix.'carkit';
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
<script>
    jQuery(document).ready(function() {
        var headerCarousel = jQuery("#headercara");
        var timer = 10000; // 10s cycle
        var textDelay = timer * 0.05; // 5% of timer for each text

        headerCarousel.owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: timer, // 10s cycle
            autoplayHoverPause: false,
            animateOut: "fadeOut",
            animateIn: "fadeIn",
            dots: false,
            nav: false,
            smartSpeed: 1000, // Smooth transition
            onInitialized: startZoomAnimation,
            onTranslated: startZoomAnimation,
        });

        function startZoomAnimation(event) {
            var activeSlide = jQuery(event.target).find(".owl-item.active");

            // Remove zoom from non-active slides
            jQuery(event.target)
                .find(".owl-item")
                .not(".active")
                .find(".caraimg")
                .removeClass("zoom-effect");

            // Add zoom effect
            activeSlide.find(".caraimg").addClass("zoom-effect");

            // Handle text visibility
            activeSlide.find(".topTxt").addClass("animate__animated animate__fadeIn").removeClass("hide-text");

            setTimeout(() => {
                activeSlide.find(".middleTxt").addClass("animate__animated animate__fadeIn").removeClass("hide-text");
            }, textDelay * 1);

            setTimeout(() => {
                activeSlide.find(".btmTxt").addClass("animate__animated animate__fadeIn").removeClass("hide-text");
            }, textDelay * 1.5);

            // Ensure other slides have hidden text
            jQuery(event.target)
                .find(".owl-item")
                .not(".active")
                .find(".topTxt, .middleTxt, .btmTxt")
                .removeClass("animate__animated animate__fadeIn")
                .addClass("hide-text");
        }
        var slider = jQuery('#courses-slider');
        slider.owlCarousel({
            items: 3,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true
        });
    });
</script>