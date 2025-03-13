<?php

/**
 * Template Name: Front Page
 */

get_header();
require 'carousel-temp1.php';
?>
<div class="sec grid md:grid-cols-5">
    <div class="md:col-span-2" id="landsideimg"></div>
    <div class="md:col-span-3 flex items-center justify-center">
        <div class="w-[100%] mr-32">
            <?php echo do_shortcode('[marqueText smTxt="Culinary Arts & Hospitality" bgTxt="Excellence" align="center"]'); ?>
            <div class="grid md:grid-cols-3">
                <div class="md:col">
                    <div class="imgbox text-center">
                        <a class="shutup space-y-3" href="#">
                            <div class="circles mx-auto" id="grads"></div>
                            <p class="imgbox_p fw-bold">Total Graduates</p>
                        </a>
                    </div>
                </div>
                <div class="md:col">
                    <div class="imgbox text-center">
                        <a class="shutup space-y-3" href="#">
                            <div class="circles mx-auto" id="lectures"></div>
                            <p class="imgbox_p fw-bold">Experienced Lecturers</p>
                        </a>
                    </div>
                </div>
                <div class="md:col">
                    <div class="imgbox text-center">
                        <a class="shutup space-y-3" href="#">
                            <div class="circles mx-auto" id="employ"></div>
                            <p class="imgbox_p fw-bold">Employment Guaranteed</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sec bglight fv500 flex items-center justify-center text-center">
    <div class="md:w-[85%]">
        <?php echo do_shortcode('[marqueText smTxt="Taking you on a your culinary & hospitality journey" bgTxt="Our Courses" align="center"]'); ?>
        <div class=" space-y-4">
            <div class="md:grid md:grid-cols-4 md:gap-4">
                <div class="col">
                    <div class="imgbox text-center">
                        <a class="shutup space-y-3" href="#">
                            <div class="mx-auto" id=""><img
                                    src="<?php bloginfo('template_directory'); ?>/img/course_icons/1.svg"
                                    alt="1"></div>
                            <p class="imgbox_p fw-bold">Reception <br> Management</p>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="imgbox text-center">
                        <a class="shutup space-y-3" href="#">
                            <div class="mx-auto" id=""><img
                                    src="<?php bloginfo('template_directory'); ?>/img/course_icons/2.svg"
                                    alt="1"></div>
                            <p class="imgbox_p fw-bold">Hospitality <br>Management</p>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="imgbox text-center">
                        <a class="shutup space-y-3" href="#">
                            <div class="mx-auto" id=""><img
                                    src="<?php bloginfo('template_directory'); ?>/img/course_icons/3.svg"
                                    alt="1"></div>
                            <p class="imgbox_p fw-bold">Culinary <br>Arts</p>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="imgbox text-center">
                        <a class="shutup space-y-3" href="#">
                            <div class="mx-auto" id=""><img
                                    src="<?php bloginfo('template_directory'); ?>/img/course_icons/4.svg"
                                    alt="1"></div>
                            <p class="imgbox_p fw-bold">Food & <br>Beverage</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center">
                <div class="md:w-3/4 flex items-center justify-center">
                    <button class="nds_btn me-3">Apply Here</button>
                    <button class="nds_outline_btn">Apply Here</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="h-[500px] flex items-center justify-center">
    <div class="md:grid md:grid-cols-5 h-[100%]">
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
    <div class="md:w-[85%]">
        <div class="row">
            <div class="col">
                <h3 class="ctaspecialhead fw-bold text-white">Lets begin your journey</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 ctarel">
                <p class="ctaspecial">1</p>
                <p class="ctatxtspc">Choose a course</p>
            </div>
            <div class="col-md-3 ctarel">
                <p class="ctaspecial">2</p>
                <p class="ctatxtspc">Enroll Online</p>
            </div>
            <div class="col-md-3 ctarel">
                <p class="ctaspecial">3</p>
                <div class="ctatxtspc"><button class="nds_btn">Start Journey</button></div>
            </div>
            <div class="col-md-3">
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
<div class="sec flex items-center justify-center bgsecondary">
    <div class="md:w-[85%] md:grid md:grid-cols-3 md:gap-4">
        <div class="col-span-1">
            <img src="<?php bloginfo('template_directory'); ?>/img/students.png" alt="Students">
        </div>
        <div class="col-span-2 flex items-center" style="color: #fff">
            <div class="relative isolate overflow-hidden px-6 py-24 sm:py-32 lg:px-8">
                <div class="mx-auto max-w-2xl lg:max-w-4xl">
                    <figure class="mt-10">
                        <blockquote class="text-center text-xl/8 font-semibold text-white sm:text-2xl/9">
                            <p>“Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.”</p>
                        </blockquote>
                        <figcaption class="mt-10">
                            <div class="mt-4 flex items-center justify-center space-x-3 text-base">
                                <div class="font-semibold text-white">Judith Black</div>
                                <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-gray-900">
                                    <circle cx="1" cy="1" r="1" />
                                </svg>
                                <div class="text-gray-600">CEO of Workcation</div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require get_template_directory() . '/includes/recipe_blog.php';

get_footer(); ?>