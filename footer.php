
</body>
<footer class="footer-04" style="background:#2A344E">
        <div class="w-100 border-top py-3">
            <div class="container">
            <div class="row p-3"> 
                    <div class="col-sm-3">
                    <h5 class="fw-bold" style="color: #FFFFFF;">Education</h5>
                        <ul class="list-unstyled" style="color: #F5F5F5; opacity: 0.5;">
                            <li>Short courses</li>
                            <li>Full Qualification</li>
                            <li>Skills Program</li>
                            <li>Trade Test</li>
                            <li>Learnerships</li>
                            
                        </ul>
                    </div>
                    <div class="col-sm-3">
                    <h5 class="fw-bold" style="color: #FFFFFF;">Information</h5>
    <ul class="list-unstyled" style="color: #F5F5F5; opacity: 0.5;">
        <li>FAQ</li>
        <li>Blog</li>
        <li>Support</li>
    </ul> 
</div>

                    <div class="col-sm-3">
                    <h5 class="fw-bold" style="color: #FFFFFF;">Company</h5>
                        <ul class="list-unstyled" style="color: #F5F5F5; opacity: 0.5;">
                            <li>About us</li>
                            <li>Careers</li>
                            <li>Contacts</li>
                        </UL>
                    </div>
                    <div class="col-sm-3">
    <div class="subscribe-container" style="padding: 10px; border-radius: 8px;">
    <h5 class="fw-bold" style="color: #FFFFFF; ">Subscribe</h5>
   

        
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
        <br>
        <p style="color: rgba(245, 245, 245, 0.5);">
    At NDSCA we pride ourselves with our excellent customer and personal service.
</p>

    </div>
    
</div>
      
                <div class="row p-3">
                <div class="col-sm-2">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyymzm38d1o9TCnSZVDPm8kyV3n4A-UzSovw&s" 
     alt="Logo" 
     style="width: 74px; height: 71.49px; border-radius: 50%; object-fit: cover;">

            </div>
            
            <div class="col-sm-8 d-flex justify-content-center align-items-center py-4">
            <ul class="list-unstyled" style="color: #F5F5F5;">
                <li class="list-inline-item p-3 fs-7">Terms</li>
                <li class="list-inline-item p-3 fs-7">Privacy</li>
                <li class="list-inline-item p-3 fs-7">Cookies</li>
            </ul>
        </div>

        <div class="col-sm-2 d-flex justify-content-center align-items-center">
        <a href="https://linkedin.com" target="_blank" class="text-white mx-2">
        <i class="fab fa-linkedin fa-lg"></i>
    </a>
        <a href="https://facebook.com" target="_blank" class="text-white mx-2">
        <i class="fab fa-facebook fa-lg"></i>
    </a>
   
    <a href="https://twitter.com" target="_blank" class="text-white mx-2">
        <i class="fab fa-twitter fa-lg"></i>
    </a>
</div>

<?php wp_footer(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

                </div>
            </div>
        </div>
        

<?php wp_footer(); ?>

</html>