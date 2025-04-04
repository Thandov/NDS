<?php

/**
 * Template Name: Front Page
 */

get_header();
require 'carousel-temp1.php';
?>

<div class="sec grid md:grid-cols-5">
    <div class="md:col-span-2" id="landsideimg"></div>
    <div class="py-12 md:col-span-3 flex items-center justify-center">
        <div class="w-[100%]">
            <?php echo do_shortcode('[marqueText smTxt="Culinary Arts & Hospitality" bgTxt="Excellence" align="center"]'); ?>

            <div class="grid grid-span-2 sm:grid-cols-3 sm:space-y-0 md:grid-cols-3">
                <div class="md:col">
                    <div class="imgbox text-center">
                        <div class="circles circleOverlay mx-auto overflow-hidden relative" id="grads">
                            <h3 class="font-black absolute inset-0 flex items-center justify-center z-30 m-0">23</h3>
                            <img class="w-full h-full object-cover object-center"
                                src="<?php bloginfo('template_directory'); ?>/img/front/p1.jpg"
                                alt="p1.jpg">
                        </div>
                        <p class="imgbox_p font-bold">Total Graduates</p>
                    </div>
                </div>
                <div class="md:col">
                    <div class="imgbox text-center">
                        <div class="circles mx-auto" id="lectures">
                            <img style="width: 100%; height: auto; object-fit: cover;" src="<?php bloginfo('template_directory'); ?>/img/front/p2.jpg" alt="p1.jpg">
                        </div>
                        <p class="imgbox_p fw-bold">Experienced Lecturers</p>
                    </div>
                </div>
                <div class="col-span-2 sm:col-span-1 md:col-span-1">
                    <div class="imgbox text-center">
                        <div class="circles mx-auto" id="employ">
                            <img style="width: 100%; height: auto; object-fit: cover;" src="<?php bloginfo('template_directory'); ?>/img/front/p3.jpg" alt="p1.jpg">
                        </div>
                        <p class="imgbox_p fw-bold">Employment Guaranteed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sec bglight flex items-center justify-center text-center">
    <div class="py-12 w-[85%]">
        <?php echo do_shortcode('[marqueText smTxt="Taking you on a your culinary & hospitality journey" bgTxt="Our Courses" align="center"]'); ?>
        <div class="mt-6 space-y-6">
            <div class="grid grid-rows-2 grid-cols-2 gap-y-4 md:grid-rows-1 md:grid-cols-4 md:gap-4">
                <?php echo do_shortcode('[displayPathPage]'); ?>

            </div>
            <div class="mt-6 flex justify-center items-center">
                <div class="md:w-3/4 flex items-center justify-center">
                    <button class="nds_btn me-3">Apply Here</button>
                    <button class="nds_outline_btn">View More</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class=" flex items-center justify-center md:h-[500px]">
    <div class="py-12 w-[85%] sm:w-[100%] sm:py-0 md:grid md:grid-cols-5 h-[100%]">
        <div class="md:col-span-3 flex items-center justify-center">
            <div class="md:grid md:grid-cols-12">
                <div class="col-start-3 col-span-11 space-y-4">
                    <?php echo do_shortcode('[marqueText smTxt="Walk With Us" bgTxt="Walk with Us" align=""]'); ?>
                    <div class="space-y-4">
                        <p>At NDSCA we pride ourselves with our excellent customer and personal service which ensures we meet and exceed our students and clients expectations. </p>
                        <div class="videobox h-[550px] md:h-[200px] w-[100%] grid sm:grid-cols-3 gap-4">
                            <div class="rounded img-wrap overflow-hidden">
                                <img src="<?php bloginfo('template_directory'); ?>/img/videobox/v1.jpg" alt="v1" class="mx-auto w-full h-full object-cover opacity-80 hover:opacity-100">
                            </div>
                            <div class="rounded img-wrap overflow-hidden">
                                <img src="<?php bloginfo('template_directory'); ?>/img/videobox/v2.jpg" alt="v2" class="mx-auto w-full h-full object-cover opacity-80 hover:opacity-100">
                            </div>
                            <div class="rounded img-wrap overflow-hidden">
                                <img src="<?php bloginfo('template_directory'); ?>/img/videobox/v3.jpg" alt="v3" class="mx-auto w-full h-full object-cover opacity-80 hover:opacity-100">
                            </div>
                        </div>
                        <button class=" nds_btn">Book Visit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-2" id="sideright"></div>
    </div>
</div>

<div class="secsmall flex items-center justify-center bgprimary position-relative">
    <div class="py-12 md:py-0 md:w-[85%]">
        <div class="row">
            <div class="col">
                <h3 class="ctaspecialhead fw-bold text-white">Lets begin your journey</h3>
            </div>
        </div>
        <div class="grid md:grid-cols-3 sm:h-[300px]">
            <div class="ctarel">
                <p class="ctaspecial text-center md:text-left">1</p>
                <p class="ctatxtspc text-center md:text-left">Choose a course</p>
            </div>
            <div class="ctarel">
                <p class="ctaspecial text-center md:text-left">2</p>
                <p class="ctatxtspc text-center md:text-left">Enroll Online</p>
            </div>
            <div class="ctarel">
                <p class="ctaspecial text-center md:text-left">3</p>
                <div class="ctatxtspc text-center md:text-left"><button class="nds_btn">Start Journey</button></div>
            </div>
        </div>
    </div>
</div>

<!-- Gallery Section -->
<!-- <div class="h-[500px] flex items-center justify-center" id="gallery">
    <div class="md:w-[85%]">
        <?php echo do_shortcode('[marqueText smTxt="We’ve been cooking up a storm" bgTxt="Our Gallery" align="center"]'); ?>
        <?php echo do_shortcode('[custom_gallery]'); ?>
    </div>
</div> -->
<?php require get_template_directory() . '/includes/recipe_blog.php'; ?>
<?php get_footer(); ?>