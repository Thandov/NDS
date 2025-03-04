<?php

/**
 * Template Name: Front Page
 */

get_header();
require 'carousel-temp1.php';
?>
<div class="sec" id="landsideimg">
    <div class="row">
        <div class="col-md-3">
            img
        </div>
        <div class="col-md-9 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php echo do_shortcode('[marqueText smTxt="Culinary Arts & Hospitality" bgTxt="Excellence"]'); ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="imgbox text-center">
                                    <a class="shutup" href="#">
                                        <div class="circles mx-auto" id="grads"></div>
                                        <h4 class="imgbox_p fw-bold">Total Graduates</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="imgbox text-center">
                                    <a class="shutup" href="#">
                                        <div class="circles mx-auto" id="lectures"></div>
                                        <h4 class="imgbox_p fw-bold">Experienced Lecturers</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="imgbox text-center">
                                    <a class="shutup" href="#">
                                        <div class="circles mx-auto" id="employ"></div>
                                        <h4 class="imgbox_p fw-bold">Employment Guaranteed</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sec bglight fv500 d-flex align-items-center text-center">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php echo do_shortcode('[marqueText smTxt="Taking you on a your culinary & hospitality journey" bgTxt="Our Courses"]'); ?>
                <div class="container scp">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="imgbox text-center">
                                <a class="shutup" href="#">
                                    <div class="mx-auto" id=""><img
                                            src="<?php bloginfo('template_directory'); ?>/img/course_icons/1.svg"
                                            alt="1"></div>
                                    <h4 class="imgbox_p fw-bold">Reception Management</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="imgbox text-center">
                                <a class="shutup" href="#">
                                    <div class="mx-auto" id=""><img
                                            src="<?php bloginfo('template_directory'); ?>/img/course_icons/2.svg"
                                            alt="1"></div>
                                    <h4 class="imgbox_p fw-bold">Hospitality Management</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="imgbox text-center">
                                <a class="shutup" href="#">
                                    <div class="mx-auto" id=""><img
                                            src="<?php bloginfo('template_directory'); ?>/img/course_icons/3.svg"
                                            alt="1"></div>
                                    <h4 class="imgbox_p fw-bold">Culinary Arts</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="imgbox text-center">
                                <a class="shutup" href="#">
                                    <div class="mx-auto" id=""><img
                                            src="<?php bloginfo('template_directory'); ?>/img/course_icons/4.svg"
                                            alt="1"></div>
                                    <h4 class="imgbox_p fw-bold">Food & Beverage</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <button class="nds_btn me-3">Apply Here</button>
                    <button class="nds_outline_btn">Apply Here</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="sec d-flex align-items-center" id="sideright">
    <div class="container h-100">
        <div class="row">
            <div class="col-md-5 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <?php echo do_shortcode('[marqueText smTxt="Walk With Us" bgTxt="Walk with Us"]'); ?>
                        </div>
                        <div class="row">
                            <div class="col scp">
                                <p>At NDSCA we pride ourselves with our excellent customer and personal service which
                                    ensures we meet and exceed our students and clients expectations. </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col scp">
                                <div class="videobox"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="nds_btn">Book Visit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7"></div>
        </div>
    </div>
</div>
<div class="secsmall bgprimary position-relative">
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="ctaspecialhead fw-bold">Lets begin your journey</h3>
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
<div class="sec" id="gallery">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php echo do_shortcode('[marqueText smTxt="We’ve been cooking up a storm" bgTxt="Our Gallery"]'); ?>
                <?php echo do_shortcode('[custom_gallery]'); ?>
            </div>
        </div>
    </div>
</div>
<div class="sec d-flex align-items-center bgsecondary">
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-1">
            <img src="<?php bloginfo('template_directory'); ?>/img/students.png" alt="Students">
        </div>
        <div class="col-span-2 flex items-center" style="color: #fff">
            <div class="">
                <div class="testimonials_head">
                    <h3>Testimonials</h3>
                </div>
                <div class="testimonials_body">
                    <figure class="text-center">
                        <blockquote class="blockquote" style="color: #ffc500;">
                            <p>A well-known quote, contained in a blockquote element.</p>
                        </blockquote>
                        <figcaption class="blockquote-footer text-white">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require get_template_directory() . '/includes/recipe_blog.php';

get_footer(); ?>