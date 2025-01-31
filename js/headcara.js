jQuery(document).ready(function () {
    var headerCarousel = jQuery('#headercara');
    var topTxt = jQuery('.topTxt');
    var middleTxt = jQuery('.middleTxt');
    var btmTxt = jQuery('.btmTxt');

    headerCarousel.owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 10000,
        autoplayHoverPause: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        dots: false, // Hide navigation dots
        nav: false, // Hide navigation bars
        onInitialized: startZoomAnimation,
        onTranslated: startZoomAnimation,
    });

    function startZoomAnimation(event) {
        var activeSlide = jQuery(event.target).find('.owl-item.active');
        activeSlide.find('.caraimg').addClass('zoom-effect');

        // Remove zoom effect from other slides
        jQuery(event.target)
            .find('.owl-item')
            .not('.active')
            .find('.caraimg')
            .removeClass('zoom-effect');

        // Handle looped carousel
        if (event.item.index === 0) {
            var lastSlide = jQuery(event.target).find('.owl-item').last();
            lastSlide.find('.caraimg').addClass('zoom-effect');
        }

        // Add vela class to topTxt in the active slide
        activeSlide.find('.topTxt').addClass('vela');
        activeSlide.find('.middleTxt').addClass('vela');
        activeSlide.find('.btmTxt').addClass('vela');
    }
});
