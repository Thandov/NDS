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
                            <div class="head_and_desc scp">
                                <p class="desc_descript">We are happy to hear from you</p>
                                <h2 class="head_header">Get in touch</h2>
                            </div>
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
                            <?php echo do_shortcode('[contact-form-7 id="3e264d7" title="contact_form"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col bg-primary">
            Map
        </div>
    </div>
</div>

<?php get_footer(); ?>