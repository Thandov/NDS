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

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="navbar">
    <div class="container">
        <!-- Brand Name -->
        <a class="navbar-brand" href="/home">Austin</a>
        
        <!-- Toggler Button for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Collapsible Menu -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <?php 
                wp_nav_menu([
                    'theme_location' => 'primary', // Register this location in functions.php
                    'depth' => 2, // Supports dropdowns
                    'container' => true, // No extra container
                    'menu_class' => 'navbar-nav ms-auto', // Align menu to the right
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', // Fallback if no menu assigned
                    'walker' => new WP_Bootstrap_Navwalker(), // Use Bootstrap Navwalker for dropdown functionality
                ]); 
            ?>
        </div>
    </div>
</nav>


<body <?php body_class(); ?> id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
