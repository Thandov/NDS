<?php

/**
 * Template Name: Contact Us
 */

get_header(); ?>
<div class="head_section d-flex align-items-center justify-content-center">
    <h1 class="header_txt"><?php the_title(); ?></h1>
</div>

<div class="container-fluid" style="height: 563px;">
    <div class="row h-100">
        <div class="col h-100 d-flex align-items-center justify-content-center">
            <div class="contact_width">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <?php echo do_shortcode('[marqueText smTxt="We are happy to hear from you" bgTxt="Get In Touch"]'); ?>

                            <div class="row scp">
                                <div class="col">
                                    <div class="row iconbox">
                                        <div class="col-4">
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/icons/phone.svg" alt="Phone">
                                        </div>
                                        <div class="col-8">
                                            <h6>Phone:</h6>
                                            <h6>0870041310</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row iconbox">
                                        <div class="col-4">
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/icons/email.svg" alt="Email">
                                        </div>
                                        <div class="col-8">
                                            <h6>E-MAIL:</h6>
                                            <h6>info@ndsacademy.co.za</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo do_shortcode('[contact-form-7 id="2e32542" title="contact us"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col p-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3564.934446949029!2d27.941213911929584!3d-26.68257893353251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sOld%20Sasolburg%20Road%20Maccauvlei%2C%20Vereeniging%2C%201930!5e0!3m2!1sen!2sza!4v1741083476551!5m2!1sen!2sza" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

<?php get_footer(); ?>