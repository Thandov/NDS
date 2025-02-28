<?php
if (! function_exists('NDStheme_setup')) :
	/**
	 * Sets up theme defaults and registers support for various
	 * WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme
	 * hook, which runs before the init hook. The init hook is too late
	 * for some features, such as indicating support post thumbnails.
	 */
	function NDStheme_setup()
	{

		/**
		 * Make theme available for translation.
		 * Translations can be placed in the /languages/ directory.
		 */
		load_theme_textdomain('NDStheme', get_template_directory() . '/languages');

		/**
		 * Add default posts and comments RSS feed links to <head>.
		 */
		add_theme_support('automatic-feed-links');

		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support('post-thumbnails');

		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus(array(
			'primary'   => __('Primary Menu', 'NDStheme'),
			'secondary' => __('Secondary Menu', 'NDStheme'),
		));

		register_sidebar(array(
			'name'          => 'Navbar Logo',
			'id'            => 'navbar_logo',
			'description'   => 'Add the logo for the company',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		));
		register_sidebar(array(
			'name'          => 'Partners',
			'id'            => 'partners',
			'description'   => 'Our partners',
			'before_widget' => '<div class="partner_wrapper">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		));
		/**
		 * Enable support for the following post formats:
		 * aside, gallery, quote, image, and video
		 */
		add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));

		function load_stylesheets()
		{
			wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', [], 1, 'all');
			
			wp_enqueue_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1');


			wp_register_style('styles', get_stylesheet_directory_uri() . '/css/styles.css', [], 1, 'all');
			wp_enqueue_style('styles');
			
			wp_register_style('style', get_stylesheet_directory_uri() . '/style.css', [], 1, 'all');
			wp_enqueue_style('style');

			wp_register_style('headcara', get_stylesheet_directory_uri() . '/css/headcara.css', [], 1, 'all');
			wp_enqueue_style('headcara');

			wp_register_style('owlcarousel', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', [], 1, 'all');
			wp_enqueue_style('owlcarousel');
			
			wp_enqueue_style('icons-css','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', [], 1, 'all');
		}
		add_action('wp_enqueue_scripts', 'load_stylesheets');

		function addjs()
		{
			wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', [], 1, 1, 1);
			wp_enqueue_script('bootstrap');
			
			wp_register_script('owl', get_template_directory_uri() . '/js/owl.carousel.min.js', [], 1, 1, 1);
			wp_enqueue_script('owl');
		
			wp_register_script('headcara', get_template_directory_uri() . '/js/headcara.js', [], 1, 1, 1);
			wp_enqueue_script('headcara');
		
			wp_enqueue_script('jquery-form');
			
			wp_localize_script('custom', 'ajax_object', ['ajax_url' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('ajax-nonce')]);
		}
		add_action('wp_enqueue_scripts', 'addjs');

		if (!file_exists(get_template_directory() . '/class-wp-bootstrap-navwalker.php')) {
			// file does not exist... return an error.
			return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
		} else {
			// file exists... require it.
			require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
		}
		// Define the Custom Nav Walker class to modify dropdown with tooltips
		class Custom_Nav_Walker extends WP_Bootstrap_Navwalker {
			public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
				parent::start_el( $output, $item, $depth, $args, $id );

				// Add tooltip only to menu items with children (dropdowns)
				if (in_array('menu-item-has-children', $item->classes)) {
					$output = str_replace('<a', '<a data-bs-toggle="tooltip" title="Click to view more options"', $output);
				}
			}
		}
		function showitemslide($attachment_id)
		{
			$image_src = wp_get_attachment_image_src($attachment_id, 'full');
			if ($image_src) {
				//echo '<div class="showitemslide"><div class="lpic" style="background: url(' . $image_src[0] . '); background-repear: no-reapeat; background-size: cover; background-position: center; transition: all 50s;"></div></div>';
				echo '<div class="zoom-container"><img class="caraimg" src="' . $image_src[0] . '" alt="' . $image_src[0] . '"></div>';
			} else {
				echo 'Image has not been uploaded yet.';
			}
		}

		function wpb_displayTagDestination() {
			static $has_run = false; // Prevent multiple executions

    if ($has_run) {
        return ''; // Stop duplicate rendering
    }
    $has_run = true;

    global $wpdb;

    $query = "SELECT * FROM `wp_kit_services`";
    $out = '';

    $result = $wpdb->get_results($query);

	$out .= '<div class="serviceContainer">';
    if (!empty($result)) {
        foreach ($result as $row) {
            $out .= '<div class="serviceWrp">';
            $out .= '<img src="' . esc_url($row->image) . '" alt="Service Image">';
            $out .= '<h5 class="fw-bold mt-4">' . esc_html($row->name) . '</h5>';
            $out .= '</div>';
        }
    }
	$out .= '</div>';

    return $out;
}
		
		add_shortcode('displayTagDestination', 'wpb_displayTagDestination');
		

		function getEduPaths(){

			global $wpdb;

			$query = "SELECT * FROM `wp_nds_education_paths`";
			$out = '';

			$result = $wpdb->get_results($query);
			$paths = $result;

			$out .= '<div class="container pathContainer">';
			$out .= '<div class="row">';
			if (!empty($paths)) {
				foreach ($paths as $path) {
					$out .= '<div class="col-sm-12 col-md-4"><a href="'. sanitize_title_with_dashes($path->name). '" class="pathlink text-decoration-none">';
					$out .= '<div class="circles mx-auto"></div>';
					$out .= '<div class="text-center"><h5 id="'. $path->id .'" class="theSelectedPath mt-3 fw-bold">'. $path->name.'</h5></a></div>';
					$out .= '</div>';
				}
			}
			$out .= '</div>';
			$out .= '</div>';

			return $out;

		}
		function wpb_path_page() {
			
			echo getEduPaths();
		}
		add_shortcode('displayPathPage', 'wpb_path_page');

		function getEduPaths_byPrograms()
		{

			global $wpdb;

			// Fetch all program types grouped by path_id
			$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}nds_program_types ORDER BY path_id");

			$grouped_programs = [];

			// Group the programs by path_id
			foreach ($results as $program) {
				$grouped_programs[$program->path_id][] = $program->name;
			}

			// Print out each group and its program names
			foreach ($grouped_programs as $path_id => $program_names) {
				echo "<h3>Path ID: $path_id</h3><ul>";
				foreach ($program_names as $program_name) {
					echo "<li>$program_name</li>";
				}
				echo "</ul>";
			}


			return $out;
		}

		function wpb_displaySelectedPathPrgramTypes($slug) {

			$slu = str_replace('-', ' ', $slug['slug']);

			global $wpdb;
			
			$query = "SELECT * FROM `wp_nds_education_paths` WHERE `name` = '$slu';";
			$out = '';
			$result = $wpdb->get_row($query);
			$query2 = "SELECT * FROM `wp_nds_program_types` WHERE `path_id` = '$result->id';";
			$program_types = $wpdb->get_results($query2);
			$out .= '<div class="">';
			$out .= '<div class="row">';
			foreach ($program_types as $key => $program_type) {
				$out .= '<div class="col-md-4">';
				$path_slug = sanitize_title_with_dashes($result->name);
				$program_slug = sanitize_title_with_dashes($program_type->name);

				$out .= '<a href="' . site_url('/education-path/' . $path_slug . '/' . $program_slug) . '" class="text-decoration-none text-reset">';
				$out .= '<div class="coursecard">';
				$out .= '<div class="row">';
				$out .= '<div class="col-5">';
				$out .= '<div class="imgsq">';
				$out .= '</div>';
				$out .= '</div>';
				$out .= '<div class="col-7 d-flex align-items-center">';
				$out .= '<div class="bdrleft ps-2">';
				$out .= '<div class="Bigtitle"><h5 class="fw-bold">' . $program_type->name . '</h5></div>';
				$out .= '<div class="smallTitle">';
				$out .= '<p class="m-0 p-0 fafd">';
				$out .=  !empty($program_type->duration) ? $program_type->duration : "Duration";
				$out .= '</p>';
				$out .= '</div>';
				$out .= '<div class="durationTitle">';
				$out .= '<p class="m-0 p-0 fafd">';
				$out .=  !empty($program_type->duration) ? $program_type->duration : "Duration"; 
				$out .= '</p>';
				$out .= '</div>';
				$out .= '</div>';
				$out .= '</div>';
				$out .= '</div>';
				$out .= '</div>';
				$out .= '</a>';
				$out .= '</div>';
			}
			
			$out .= '</div>';
			$out .= '</div>';
			
			return $out;



		}
		add_shortcode('displaySelectedPathPrgramTypes', 'wpb_displaySelectedPathPrgramTypes');

	}


	function nds_custom_rewrite_rule()
	{
		// This tells WordPress to look for the URL structure /education-path/{slug}
		add_rewrite_rule(
			'^education-path/([^/]+)/?$',
			'index.php?education_path_slug=$matches[1]',
			'top'
		);
	}
	add_action('init', 'nds_custom_rewrite_rule');

	function custom_rewrite_rules()
	{
		add_rewrite_rule(
			'^education-path/([^/]+)/([^/]+)/?$',
			'index.php?post_type=course&name=$matches[2]',
			'top'
		);
	}
	add_action('init', 'custom_rewrite_rules');

	function nds_add_query_vars($vars)
	{
		$vars[] = 'education_path_slug';
		return $vars;
	}
	add_filter('query_vars', 'nds_add_query_vars');

	function nds_template_redirect()
	{
		// Check if the education_path_slug is set
		$education_path_slug = get_query_var('education_path_slug');

		if ($education_path_slug) {
			// Check if a page or custom post type exists for the slug
			$template = locate_template('program-type.php'); // Locate the program-type.php file in the theme directory

			if ($template) {
				include($template);
				exit; // Ensure WordPress doesn't continue processing and uses this template
			}
		}
	}
	add_action('template_redirect', 'nds_template_redirect');

	function register_course_post_type()
	{
		$args = array(
			'labels'      => array(
				'name'          => __('Courses'),
				'singular_name' => __('Course'),
			),
			'public'      => true,
			'has_archive' => false,
			'rewrite'     => false,  // Disable default rewrite, we will add a custom one
			'supports'    => array('title', 'editor', 'thumbnail'),
		);
		register_post_type('course', $args);
	}
	add_action('init', 'register_course_post_type');



endif; // NDStheme_setup
add_action('after_setup_theme', 'NDStheme_setup');

function display_recipes_blog(){
	return "No Recipe Blogs Yet";
}
add_shortcode('recipes_blog', 'display_recipes_blog');