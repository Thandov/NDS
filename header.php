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

<nav class="navbar navbar-light bg-light" id="navbar">
    <a class="navbar-brand" href="/home">Austin</a>


    <?php wp_nav_menu([
            'theme_location' => 'primary',
            'depth' => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'container' => 'div',
            'container_class' => 'sidenav',
            'menu_class' => 'list-unstyled components mb-5',
            'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
            'walker' => new WP_Bootstrap_Navwalker(),
        ]);
        ?>
</nav>

<body <?php body_class(); ?> id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
