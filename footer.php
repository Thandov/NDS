</body>
<footer class="footer-04" style="background:#2A344E">
    <div class="w-100 border-top py-3">
        <div class="container">
            <div class="p-3 grid grid-cols-1 md:flex gap-4 ">
                <!-- Education Section -->
                <div class="md:w-[21%]">
                    <h5 class="font-bold text-white">Education</h5>
                    <ul class="list-none text-[#F5F5F5] opacity-50">
                        <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'footer',
                            'depth'           => 1, // Allows dropdowns.
                            'container'       => 'ul', // Wraps the menu in a nav tag.
                            'container_class' => 'xwxw', // Add Bootstrap navbar class.
                            'menu_class'      => 'metismenu', // Bootstrap compatible class.
                            'menu_id'         => 'mobile-menu',
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker(),
                        ));
                        ?>
                    </ul>
                </div>

                <!-- Information Section -->
                <div class="md:w-[21%]">
                    <h5 class="font-bold text-white">Information</h5>
                    <ul class="list-none text-[#F5F5F5] opacity-50">
                        <li class="block"><a class="shutup" href="#ssssssssss">FAQ</a></li>
                        <li class="block"><a class="shutup" href="#ssssssssss">Blog</a></li>
                        <li class="block"><a class="shutup" href="#ssssssssss">Support</a></li>
                    </ul>
                </div>

                <!-- Company Section -->
                <div class="md:w-[21%]">
                    <h5 class="font-bold text-white">Company</h5>
                    <ul class="list-none text-[#F5F5F5] opacity-50">
                        <li class="block"><a class="shutup" href="#ssssssssss">About us</a></li>
                        <li class="block"><a class="shutup" href="#ssssssssss">Careers</a></li>
                        <li class="block"><a class="shutup" href="#ssssssssss">Contacts</a></li>
                    </ul>
                </div>

                <!-- Contact Form Section with Background -->
                <div class="md:w-[35%]">
                    <!-- PHP shortcode for form -->
                    <div class="mb-4">
                        <!-- Assuming you have your contact form code here -->
                        <?php echo do_shortcode('[contact-form-7 id="a260e6f" title="footerContact"]'); ?>
                    </div>

                    <p class="text-white text-sm">
                        At NDSCA we pride ourselves on our excellent customer and personal service.
                    </p>
                </div>
            </div>

            <!-- Footer Section -->
            <div class="p-3 flex items-center justify-between">
                <!-- Logo -->
                <div>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyymzm38d1o9TCnSZVDPm8kyV3n4A-UzSovw&s" alt="Logo" class="w-[74px] h-[71.49px] rounded-full object-cover">
                </div>

                <!-- Footer Links -->
                <div class="flex justify-center items-center py-4 space-x-4">
                    <ul class="list-none text-[#F5F5F5] flex space-x-3 text-xs">
                        <li>Terms</li>
                        <li>Privacy</li>
                        <li>Cookies</li>
                    </ul>
                </div>

                <!-- Social Media Links -->
                <div class="flex justify-center items-center space-x-2">
                    <a href="https://linkedin.com" target="_blank" class="text-white hover:text-gray-400"><i class="fab fa-linkedin fa-lg"></i></a>
                    <a href="https://facebook.com" target="_blank" class="text-white hover:text-gray-400"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="https://twitter.com" target="_blank" class="text-white hover:text-gray-400"><i class="fab fa-twitter fa-lg"></i></a>
                </div>
            </div>

        </div>
        <?php wp_footer(); ?>
    </div>
</footer>

</html>