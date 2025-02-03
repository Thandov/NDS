jQuery(document).ready(function () {
    var headerCarousel = jQuery("#headercara");
    var timer = 10000; // 10s cycle
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
        activeSlide.find(".middleTxt").addClass("animate__animated animate__fadeIn").removeClass("hide-text");

        // Ensure other slides have hidden text
        jQuery(event.target)
            .find(".owl-item")
            .not(".active")
            .find(".topTxt, .middleTxt")
            .removeClass("animate__animated animate__fadeIn")
            .addClass("hide-text");
    }

});