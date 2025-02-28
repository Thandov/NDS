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

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-topa" id="navbar">
    <div class="container h-100">
        <!-- Brand Name -->
        <a class="navbar-brand" href="/home"><?php dynamic_sidebar('navbar_logo'); ?></a>

        <!-- Toggler Button for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible Menu -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <?php 
                wp_nav_menu([
                    'theme_location' => 'primary', 
                    'depth' => 2, // Allow dropdowns
                    'container' => false,
                    'menu_class' => 'navbar-nav ms-auto', 
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker()
                ]); 
            ?>
        </div>
    </div>
</nav>

<!-- Initialize Tooltip in Bootstrap 5 -->
<script>
    var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
</script>

<body <?php body_class(); ?> id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
