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
        <div class="w-[85%] md:mr-32">
            <?php echo do_shortcode('[marqueText smTxt="Culinary Arts & Hospitality" bgTxt="Excellence" align="center"]'); ?>

            <div class="grid md:grid-cols-3 space-y-12 sm:space-y-0">
                <div class="md:col">
                    <div class="imgbox text-center">
                        <a class="shutup space-y-3" href="#">
                            <div class="circles mx-auto overflow-hidden" id="grads">
                                <img style="width: 100%; height: 100%; object-fit: cover; object-position: center;" src="<?php bloginfo('template_directory'); ?>/img/front/p1.jpg" alt="p1.jpg">
                            </div>
                            <p class="imgbox_p fw-bold">Total Graduates</p>
                        </a>
                    </div>
                </div>
                <div class="md:col">
                    <div class="imgbox text-center">
                        <a class="shutup space-y-3" href="#">
                            <div class="circles mx-auto" id="lectures">
                                <img style="width: 100%; height: auto; object-fit: cover;" src="<?php bloginfo('template_directory'); ?>/img/front/p2.jpg" alt="p1.jpg">
                            </div>
                            <p class="imgbox_p fw-bold">Experienced Lecturers</p>
                        </a>
                    </div>
                </div>
                <div class="md:col">
                    <div class="imgbox text-center">
                        <a class="shutup space-y-3" href="#">
                            <div class="circles mx-auto" id="employ">
                                <img style="width: 100%; height: auto; object-fit: cover;" src="<?php bloginfo('template_directory'); ?>/img/front/p3.jpg" alt="p1.jpg">
                            </div>
                            <p class="imgbox_p fw-bold">Employment Guaranteed</p>
                        </a>
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
                    <button class="nds_outline_btn">Apply Here</button>
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
                        <div class="videobox h-[200px] w-[100%]"></div>
                        <button class="nds_btn">Book Visit</button>
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
        <div class="grid md:grid-cols-4 sm:h-[300px]">
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
            <div class="">
                <img src="<?php bloginfo('template_directory'); ?>/img/cheflady.png" alt="" srcset="">
            </div>
        </div>
    </div>
</div>

<!-- Gallery Section -->
<div class="h-[500px] flex items-center justify-center" id="gallery">
    <div class="md:w-[85%]">
        <?php echo do_shortcode('[marqueText smTxt="We’ve been cooking up a storm" bgTxt="Our Gallery" align="center"]'); ?>
        <?php echo do_shortcode('[custom_gallery]'); ?>
    </div>
</div>
<div class="hidden sm:block">
    <?php require get_template_directory() . '/includes/recipe_blog.php'; ?>
</div>
<div class="sm:hidden">
    <?php echo do_shortcode('[recipes_carousel]'); ?>
</div>
<?php get_footer(); ?>