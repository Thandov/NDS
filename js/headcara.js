jQuery(document).ready(function () {
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

});