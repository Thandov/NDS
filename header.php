<!DOCTYPE html>
<html lang="en" class="m-0 p-0">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo get_bloginfo('name'); ?></title>
    <?php wp_head() ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-756812510"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'AW-756812510');
    </script>

</head>

<div id="header-sticky" class="header-area">
    <div class="navigation">
        <div class="container">
            <div class="header-inner-box">
                <div class="logo">
                    <a class="navbar-brand" href="home"><?php dynamic_sidebar('navbar_logo'); ?></a>
                </div>

                <div class="main-menu hidden md:block">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary', // Change this to your menu location
                        'menu_class'     => 'main-menu d-none d-lg-block',
                        'walker'         => new Custom_Navwalker()
                    ));
                    ?>
                </div>

                <div class="hidden md:block header-right-content">
                    <a href="/student-registration" class="nds_outline_btn">Login</a>

                </div>

                <div class="mobile-nav-bar block md:hidden">
                    <div class="mobile-nav-wrap">
                        <div id="hamburger">
                            <i class="fa fa-bars"></i>
                        </div>
                        <!-- mobile menu - responsive menu  -->
                        <div class="mobile-nav">
                            <button type="button" class="close-nav">
                                <i class="fa fa-times-circle"></i>
                            </button>
                            <nav class="sidebar-nav">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location'  => 'primary',
                                    'depth'           => 2, // Allows dropdowns.
                                    'container'       => 'ul', // Wraps the menu in a nav tag.
                                    'container_class' => 'xwxw', // Add Bootstrap navbar class.
                                    'menu_class'      => 'metismenu', // Bootstrap compatible class.
                                    'menu_id'         => 'mobile-menu',
                                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'          => new WP_Bootstrap_Navwalker(),
                                ));
                                ?>
                            </nav>
                            <div class="action-bar">
                                <a href="mailto:<?php echo esc_html(get_option('email_address', 'No address set')); ?>"><i class="fa fa-envelope"></i><?php echo esc_html(get_option('email_address', 'No address set')); ?></a>
                                <a href="tel:<?php echo esc_html(get_option('contact_1', 'No contact set')); ?>"><i class="fal fa-phone"></i><?php echo esc_html(get_option('contact_1', 'No contact set')); ?></a>
                                <a href="/contact" class="theme-btn bordered-btn">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Initialize Tooltip in Bootstrap 5 -->
<script>
    var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    document.addEventListener("DOMContentLoaded", function() {
        const hamburger = document.getElementById("hamburger");
        const mobileNav = document.querySelector(".mobile-nav");
        const closeNav = document.querySelector(".close-nav");

        if (hamburger && mobileNav && closeNav) {
            // Open menu
            hamburger.addEventListener("click", function() {
                mobileNav.classList.add("show");
            });

            // Close menu
            closeNav.addEventListener("click", function() {
                mobileNav.classList.remove("show");
            });

            // Close menu when clicking outside
            document.addEventListener("click", function(event) {
                if (!mobileNav.contains(event.target) && !hamburger.contains(event.target)) {
                    mobileNav.classList.remove("show");
                }
            });
        }
    });
</script>

<body <?php body_class(); ?> id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">