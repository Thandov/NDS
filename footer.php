
</body>
<footer class="footer-04" style="background:#2A344E">
        <div class="w-100 border-top py-3">
            <div class="container">
            <div class="row p-3"> 
                    <div class="col-sm-3">
                        <h5 class="text-white fw-bold">Education</h5>
                        <ul class="list-unstyled">
                            <li>Short courses</li>
                            <li>Full Qualification</li>
                            <li>Skills Program</li>
                            <li>Trade Test</li>
                            <li>Learnerships</li>
                            
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h5 class="text-white fw-bold" >Information</h5>
                        <ul class="list-unstyled">
                        <li>FAQ</li>
                        <li>Blog</li>
                        <li>Support</li>
                      </ul> 
                    </div>
                    <div class="col-sm-3">
                        <h5 class="text-white fw-bold">Company</h5>
                        <ul class="list-unstyled">
                            <li>About us</li>
                            <li>Careers</li>
                            <li>Contacts</li>
                        </UL>
                    </div>
                    <div class="col-sm-3">
    <div class="subscribe-container" style="background-color: #979797; padding: 10px; border-radius: 8px;">
        <h5 class="text-white fw-bold">Subscribe</h5>
        
        <!-- Subscription form -->
        <!-- Subscription form -->
<form method="POST" style="display: flex; overflow: hidden; border-radius: 8px;">
    <!-- Email Input Field -->
    <input type="email" name="email" placeholder="Enter your email" required 
        style="flex-grow: 1; padding: 10px; border: none; border-top-left-radius: 8px; border-bottom-left-radius: 8px;">

    <!-- Subscribe Button (with arrow) -->
    <button type="submit" 
        style="background-color: #FFC500; color: black; padding: 10px 20px; border: none; 
               border-top-right-radius: 8px; border-bottom-right-radius: 8px;">
        &#8594;
    </button>
</form>

        <?php
        // PHP code to handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<p class='text-white'>Thank you for subscribing!</p>";
            } else {
                echo "<p class='text-white'>Please enter a valid email address.</p>";
            }
        }
        ?>
    </div>
</div>

                </div>

                </div>
                <div class="row p-3">
                    <div class="col-sm-2">Logo here </div>
                    <div class="col-sm-8">
                    <ul class="list-inline text-center text-white" style="text-color: #F5F5F5">
                    <li class="list-inline-item p-3 fs-7">Terms</li>
                    <li class="list-inline-item p-3 fs-7">Privacy</li>
                    <li class="list-inline-item p-3 fs-7">Cookies</li>
                </ul>
                </div>
                    <div class="col-sm-2">Social media links here</div>
                    </div>
            </div>
        </div>
    </footer>

<?php wp_footer(); ?>

</html>