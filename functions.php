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
			wp_enqueue_style('tailwindcss', get_stylesheet_directory_uri() . '/css/frontend.css', __FILE__);

			wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', [], 1, 'all');

			wp_enqueue_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1');

			wp_register_style('otherstyle', get_stylesheet_directory_uri() . '/css/otherstyle.css', [], 1, 'all');
			wp_enqueue_style('otherstyle');

			wp_register_style('styles', get_stylesheet_directory_uri() . '/css/styles.css', [], 1, 'all');
			wp_enqueue_style('styles');

			wp_register_style('style', get_stylesheet_directory_uri() . '/style.css', [], 1, 'all');
			wp_enqueue_style('style');

			wp_enqueue_style('flaticon', get_template_directory_uri() . '/css/flaticon.css', array(), null, 'all');

			wp_register_style('headcara', get_stylesheet_directory_uri() . '/css/headcara.css', [], 1, 'all');
			wp_enqueue_style('headcara');

			wp_register_style('owlcarousel', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', [], 1, 'all');
			wp_enqueue_style('owlcarousel');

			wp_enqueue_style('icons-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', [], 1, 'all');
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


		if (! file_exists(get_template_directory() . '/class-wp-bootstrap-navwalker.php')) {
			// file does not exist... return an error.
			return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
		} else {
			// file exists... require it.
			require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
			require_once get_template_directory() . '/class-custom-navwalker.php';
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

		function wpb_displayTagDestination()
		{
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


		function getEducationPaths()
		{
			global $wpdb;

			$query = "SELECT * FROM `{$wpdb->prefix}nds_education_paths`";
			$out = '';

			$result = $wpdb->get_results($query);
			$paths = $result;



			if (!empty($paths)) {
				foreach ($paths as $path) {
					$pathSlug = sanitize_title_with_dashes($path->name);
					// Split the name into words
					$words = explode(' ', $path->name);

					// Create an empty string to store the formatted name
					$formattedName = '';

					// Loop through the words and wrap each one in a <span> with a line break
					foreach ($words as $word) {
						$formattedName .= '<span class="block">' . $word . '</span>';
					}
					$out .= '<a href="/' . sanitize_title_with_dashes($path->name) . '" class="pathlink text-decoration-none">';
					$out .= '<div class="">';
					$out .= '<div class="circles mx-auto flex items-center justify-center">';
					$out .= '<img src="' . get_template_directory_uri() . '/img/paths/' . $pathSlug . '.jpg" alt="' . $pathSlug . '" class="mx-auto w-full h-full object-cover opacity-80 hover:opacity-100">';
					$out .= '</div>';
					$out .= '<div class="text-center">';
					$out .= '<h6 id="' . $path->id . '" class="theSelectedPath mt-3 fw-bold">' . $path->name . '</h6>';
					$out .= '</div>';
					$out .= '</div>';
					$out .= '</a>';
				}
			}
			$out .= '</div>';

			return $out;
		}

		function wpb_path_page()
		{

			echo getEducationPaths();
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
		}

		function progCards($out, $rname, $program_type)
		{
			$out .= '<div class="col-md-3 dfddf">';
			$path_slug = sanitize_title_with_dashes($rname);
			$program_slug = sanitize_title_with_dashes($program_type->name);

			$out .= '<a href="/' . site_url('/' . $path_slug . '/' . $program_slug) . '" class="text-decoration-none text-reset">';
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

			return $out;
		}

		function progCard($out, $rname, $program_type)
		{
			$path_slug = sanitize_title_with_dashes($rname);
			$program_slug = sanitize_title_with_dashes($program_type->name);
			ob_start();

?>
			<div class="card border-0 mb-3 recipe_card" style="max-width: 350px;">
				<a class="shutup" href="<?php echo site_url('/category/' . $program_slug); ?>">
					<div class="g-0 d-flex align-items-center">
						<div class="">
							<img src="<?php bloginfo('template_directory'); ?>/img/recipes/<?php echo (isset($program_type->image)) ? $program_type->image : "r1.png"; ?>" height="100" class="rounded" alt="recipe pic">
						</div>
						<div class="">
							<div class="card-body ms-3">
								<h5 class="card-title"><?php echo ($program_type) ? $program_type->name : "Program Name"; ?></h5>
								<p class="card-text m-0"><?php echo ($program_type) ? $program_type->name : "Description"; ?></p>
								<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							</div>
						</div>
					</div>
				</a>
			</div>
		<?php
			return ob_get_clean(); // Capture and return the output
		}

		function wpb_displaySelectedPathPrgramTypes($slug)
		{

			$slu = str_replace('-', ' ', $slug['slug']);

			global $wpdb;

			$query = "SELECT * FROM `{$wpdb->prefix}nds_education_paths` WHERE LOWER(`name`) = LOWER('$slu');";
			$out = '';
			$result = $wpdb->get_row($query);

			$query2 = "SELECT * FROM `{$wpdb->prefix}nds_program_types` WHERE `path_id` = '$result->id';";
			$program_types = $wpdb->get_results($query2);

			foreach ($program_types as $key => $program_type) {
				echo progCard($out, $result->name, $program_type);
			}

			return $out;
		}
		add_shortcode('displaySelectedPathPrgramTypes', 'wpb_displaySelectedPathPrgramTypes');

		function wpb_displaySelectedPathListPrgramTypes($slug)
		{

			$slu = str_replace('-', ' ', $slug['slug']);

			global $wpdb;

			$query = "SELECT * FROM `{$wpdb->prefix}nds_education_paths` WHERE LOWER(`name`) = LOWER('$slu');";
			$out = '';
			$result = $wpdb->get_row($query);
			if ($result):
				$query2 = "SELECT * FROM `{$wpdb->prefix}nds_program_types` WHERE `path_id` = '$result->id';";
				$program_types = $wpdb->get_results($query2);

				$out .= '<ul class="list-group list-group-flush">';
				foreach ($program_types as $key => $program_type) {
					$path_slug = sanitize_title_with_dashes($result->name);
					$program_slug = sanitize_title_with_dashes($program_type->name);

					$out .= '<li class="list-group-item"><a href="/category/' . $program_slug . '" class="text-blue-600 hover:underline m-0 shutup">' . $program_type->name . '</a></li>';
				}

				$out .= '</ul>';
			else:
				$out .= "<p>No courses added</p>";
			endif;
			return $out;
		}
		add_shortcode('displaySelectedPathList', 'wpb_displaySelectedPathListPrgramTypes');




		function recp_card($recipe = null)
		{
			// Unserialize the 'gallery' field
			$gallery = unserialize($recipe['gallery']);
			// Unserialize the 'the_recipe' field (which contains the steps and other details)
			$the_recipe = unserialize($recipe['the_recipe']);
			// You can also access individual fields from 'the_recipe', like steps:
			$steps = json_decode($the_recipe['steps']); // Decoding steps as it seems to be a JSON-encoded string
			ob_start(); ?>
			<div class="recipe_card">
				<div class="grid grid-cols-3 items-center space-x-3">
					<div class="w-full h-24 m-1">
						<img src="<?php echo ($recipe['image']) ? wp_get_attachment_url($recipe['image']) : 'r1.png'; ?>" class="w-full h-full object-cover rounded" alt="recipe pic">
					</div>
					<div class="col-span-2">
						<div class="py-3 px-1 border-l-2 border-yellow-300 space-y-2">
							<h6 class="text-md font-semibold"><?php echo ($recipe) ? $recipe["recipe_name"] : "Recipe Name"; ?></h6>
							<p class="secolor text-sm text-gray-500"><?php echo ($recipe) ? $recipe["recipe_desc"] : "Description"; ?></p>
							<p class="text-xs text-gray-400">Servings: <small><?php echo ($recipe) ? $the_recipe['servings'] : "Recipe Name"; ?></small></p>
						</div>
					</div>
				</div>
			</div>
		<?php
			return ob_get_clean(); // Capture and return the output
		}

		function display_recipes_carousel()
		{
			global $wpdb;
			$recipe = "";
			$recipes_query = "SELECT * FROM `{$wpdb->prefix}nds_recipes`";
			$recipes = $wpdb->get_results($recipes_query, ARRAY_A);

			// Begin the carousel structure with custom navigation controls
			echo '<div class="carousel-container relative">';
			echo '<div class="owl-carousel owl-theme">';

			// Loop through the recipes and display each card
			foreach ($recipes as $key => $recipe) {
				echo recp_card($recipe);  // Assuming recp_card() outputs the recipe card HTML
			}

			echo '</div>';

			// Arrows for navigation
			echo '<div class="carousel-nav absolute top-0 bottom-0 left-0 right-0 flex justify-between items-center">';
			echo '<span class="owl-prev bg-gray-600 p-4 text-white rounded-full cursor-pointer">←</span>';
			echo '<span class="owl-next bg-gray-600 p-4 text-white rounded-full cursor-pointer">→</span>';
			echo '</div>';

			echo '</div>';

			// Initialize Owl Carousel JavaScript
		?>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".owl-carousel").owlCarousel({
						items: 3, // Number of items to display
						loop: true,
						margin: 10, // Spacing between items
						nav: true, // Enable navigation
						navText: ['←', '→'], // Custom text for arrows
						autoplay: true, // Enable auto-play
						autoplayTimeout: 8000, // 8 seconds auto-change
						autoplayHoverPause: true, // Pause on hover
						smartSpeed: 500, // Smooth transition
						responsive: {
							0: {
								items: 1 // 1 item for small screens
							},
							600: {
								items: 2 // 2 items for medium screens
							},
							1000: {
								items: 3 // 3 items for large screens
							}
						}
					});
				});
			</script>
		<?php
		}
		add_shortcode('recipes_carousel', 'display_recipes_carousel');


		function display_recipes_blog()
		{
			global $wpdb;
			$recipe = "";
			$recipes_query = "SELECT * FROM `{$wpdb->prefix}nds_recipes`";
			$recipes = $wpdb->get_results($recipes_query, ARRAY_A);
			
			echo '<div class="grid sm:grid-cols-3 gap-4">';
			foreach ($recipes as $key => $recipe) {
				echo recp_card($recipe);
			}
			echo '</div>';
		}
		add_shortcode('recipes_blog', 'display_recipes_blog');

		function staff_card($staff_member = null)
		{
			$staff_member = json_decode(json_encode($staff_member)); // Convert to object
			$picture = "";
			if(is_int($staff_member->profile_picture)){
				$picture = wp_get_attachment_url($staff_member->profile_picture);
			} else {
				echo "asdasdsad";
				echo var_dump($staff_member->profile_picture);
				$picture = $staff_member->profile_picture;
			}
			ob_start(); ?>
			<div class="mb-4">
				<div class="team_wrp text-center space-y-2">
					<div class="circleprofile mx-auto">
						<img id="profile_picture_preview" src="<?php echo $picture; ?>" alt="<?php echo $staff_member->profile_picture; ?>" style="max-width: 150px; display: <?php echo $staff_member->profile_picture ? 'block' : 'none'; ?>;">
					</div>
					<h5 class="text-lg empname fw-bold"><?php echo ($staff_member) ? $staff_member->first_name . " " . $staff_member->last_name : "Recipe Name"; ?></h5>
					<div class="jobtitle text-sm"><?php echo ($staff_member) ? $staff_member->role : "Recipe Name"; ?></div>
				</div>
			</div>
		<?php
			return ob_get_clean(); // Capture and return the output
		}

		function display_staff()
		{
			/* Sort them out via alphabet */
			$staff_members = [
				[
					'profile_picture' => 'lebo_lekotokoto.jpg',
					'first_name' => 'Lebo',
					'last_name' => 'Lekotokoto',
					'role' => 'Founder & Director',
				],
				[
					'profile_picture' => 'tshepiso_tunzi.jpg',
					'first_name' => 'Mrs Tshepiso',
					'last_name' => 'Tunzi',
					'role' => 'Project Manager',
				],
				[
					'profile_picture' => 'estelle_holtzhausen.jpg',
					'first_name' => 'Mrs Estelle',
					'last_name' => 'Holtzhausen',
					'role' => 'Marketing Manager',
				],

				[
					'profile_picture' => 'pontsho_mogiwa.jpg',
					'first_name' => 'Mrs Pontsho',
					'last_name' => 'Mogiwa',
					'role' => 'Lecturer',
				],
				[
					'profile_picture' => 'jacobus_sutton.jpg',
					'first_name' => 'Mr Jacobus',
					'last_name' => 'Sutton',
					'role' => 'Lecturer',
				],
				[
					'profile_picture' => 'lwethu_htlatswayo.jpg',
					'first_name' => 'Ms Lwethu',
					'last_name' => 'Htlatswayo',
					'role' => 'Lecturer',
				],
				[
					'profile_picture' => 'tumi_motsamai.jpg',
					'first_name' => 'Ms Tumi',
					'last_name' => 'Motsamai',
					'role' => 'Lecturer',
				],
				[
					'profile_picture' => 'mpuse_mnguni.jpg',
					'first_name' => 'Mrs Mpuse',
					'last_name' => 'Mnguni',
					'role' => 'Training Kitchen Assistant',
				],
				[
					'profile_picture' => 'irene_xaba.jpg',
					'first_name' => 'Ms Irene',
					'last_name' => 'Xaba',
					'role' => 'Office Cleaner',
				]
			];


			global $wpdb;
			$program_query = "SELECT * FROM `{$wpdb->prefix}nds_staff`";
			$staff_members = $wpdb->get_results($program_query);

			echo '<div class="grid md:grid-cols-4">';
			foreach ($staff_members as $staff_member) {
				$staff_member->profile_picture = (int)$staff_member->profile_picture;
				
				echo staff_card($staff_member);  // Call the function for each staff member
			}
			echo '</div>';
		}
		add_shortcode('show_staff_members', 'display_staff');

		function showCourses($atts)
		{

			global $wpdb;

			$out = "";
			//$category_id = $category_id['id'];
			$program_query = "SELECT `id`, `name` AS program_name FROM `{$wpdb->prefix}nds_program_types` WHERE name =" . $atts['name'];

			$program_name = $wpdb->get_row($program_query);
			exit(var_dump($wpdb->last_query));
			echo '<pre>';
			print_r($program_name);
			echo '</pre>';
			exit();

			$category = get_category($category_id);
			$program_slug = $category->slug;

			$query = "SELECT * FROM `{$wpdb->prefix}nds_courses` WHERE program_id = $program_name->id;";
			$courses = $wpdb->get_results($query);


		?>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">Course Image</th>
						<th scope="col">Course Name</th>
						<th scope="col">Course Level</th>
						<th scope="col">Duration</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($courses as $key => $course):
						$post = get_post($course->post_id);
						$course_slug = $post->post_name;
					?>
						<tr>
							<td><img src="receptionist-level-2.jpg" alt="<?php echo $course->name; ?>" class="img-fluid" style="max-width: 100px;"></td>
							td><a class="shutup" href="<?php echo site_url('/' . $program_slug . '/' . $course_slug); ?>"><strong><?php echo $course->name; ?></strong></a></td>
							td>Intermediate</td>
							<td><?php echo $course->duration; ?> Months</td>
							<td><button class="btn btn-primary">Apply Now</button> <button class="btn btn-secondary">Book a Visit</button></td>
						</tr>
					<?php
					endforeach;
					?>
				</tbody>
			</table>
		<?php
		}
		add_shortcode('wpd_showingCourses', 'showCourses');

		function showAccredFn($atts)
		{

			$courseId = $atts['courseid'];

			echo '.';
		}
		add_shortcode('displayAccred', 'showAccredFn');

		add_shortcode('displaysideContact', 'sideContactFn');
		function sideContactFn($course, $program_name)
		{
			echo do_shortcode('[contact-form-7 id="db3849b" title="sidecontact"]');
		}

		function custom_image_gallery()
		{
			$base_dir = get_template_directory() . '/img/gallery/';
			$base_url = get_template_directory_uri() . '/img/gallery/';
			$output = '<div class="image-gallery">';

			$years = array('2022', '2023', '2024'); // Update this as needed

			foreach ($years as $year) {
				$year_path = $base_dir . $year;
				$year_url = $base_url . $year;

				if (is_dir($year_path)) {
					$output .= "<p>$year</p><div class='gallery'>";
					$images = glob($year_path . '/*.{jpg,png,gif}', GLOB_BRACE);

					foreach ($images as $image) {
						$img_url = $year_url . '/' . basename($image);
						$output .= "<img src='$img_url' class='gallery-img' loading='lazy' />";
					}

					$output .= '</div>';
				}
			}

			$output .= '</div>';
			return $output;
		}
		add_shortcode('custom_gallery', 'custom_image_gallery');


		function coursePanel($course, $program_name)
		{
		?>
			<div class="bg-white p-4 shadow-sm py-3">
				<div class="row">
					<div class="col head_and_desc">
						<?php echo do_shortcode('[marqueText smTxt="" bgTxt="' . (($course && $course->program_type_name) ? $course->program_type_name : "eeeeee") . '" align=""]'); ?>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7">
						<div class="grid grid-cols-3">
							<p class="text-base flex items-end gap-3 p-0 m-0"><span class="font-bold secolor">Enrollment date:</span> <span class="truncate text-gray-500"><?php echo ($course && $course->duration) ? $course->duration : "eeeeee"; ?></span></p>
							<p class="text-base flex items-end gap-3 p-0 m-0"><span class="font-bold secolor">Duration:</span> <span class="truncate text-gray-500"><?php echo ($course && $course->duration) ? $course->duration : "eeeeee"; ?>Months</span></p>
							<p class="text-base flex items-end gap-3 p-0 m-0"><span class="font-bold secolor">Price:</span> <span class="truncate text-gray-500">R<?php echo (isset($course) && $course->price) ? $course->price : " " ?></span></p>
						</div>
						<hr>
						<div class="d-flex align-items-center">
							<div class="d-flex align-items-center gap-3">
								<?php echo do_shortcode('[displayAccred courseid="' . $course->accreditation_body . '"]'); ?>
							</div>
						</div>
						<h5 class="fw-bold text-base secolor">Course Description:</h5>
						<p><?php echo ($course && $course->course_description) ? $course->course_description : "eeeeee"; ?></p>
						<div class="flex">
							<?php echo do_shortcode('[buttonFn type="outline" name="Enquire" href="/contact?course=' . $program_name->course_id . '"]'); ?>
						</div>
					</div>
					<div class="col-md-5">
						<div class="boxing bg-white shadow rounded p-3 mb-4 space-y-4">
							<!-- Header -->
							<div class="bg-slate-100 rounded flex py-2 px-4">
								<h6 class="text-lg font-bold secolor p-0 m-0">Gallery</h6>
							</div>
							<?php echo do_shortcode('[folderName_gallery slug="' . $program_name->program_name . '"]'); ?>

						</div>

						<div class="boxing bg-white shadow rounded p-3 mb-4 space-y-4">
							<!-- Header -->
							<div class="bg-slate-100 rounded flex py-2 px-4">
								<h6 class="text-lg font-bold secolor p-0 m-0">Get In Touch</h6>
							</div>
							<div>
								<?php echo do_shortcode('[contact-form-7 id="db3849b" title="sidecontact"]'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
		}

		function btnFn($atts)
		{
			$atts = shortcode_atts(
				array(
					'type' => 'solid',
					'name' => 'Button',
					'href' => '#'
				),
				$atts
			);

			$btnClass = ($atts['type'] == 'outline') ? 'nds_outline_btn' : 'nds_btn me-3';

			return '<button class="' . esc_attr($btnClass) . '" onclick="window.location.href=\'' . esc_url($atts['href']) . '\'">' . esc_html($atts['name']) . '</button>';
		}

		add_shortcode('buttonFn', 'btnFn');

		function wpd_showCoursesNavTabs($program)
		{
			global $wpdb;

			$programName = $program['program'];

			$out = "";

			$program_query = "SELECT `id`, `name` AS program_name FROM `{$wpdb->prefix}nds_program_types` WHERE name = '$programName';";
			$program_name = $wpdb->get_row($program_query);

			$category_id = get_cat_ID($program_name->program_name);

			$category = get_category($category_id);
			$program_slug = $category->slug;

			$query = "SELECT * FROM `{$wpdb->prefix}nds_courses` WHERE program_id = $program_name->id;";
			$courses = $wpdb->get_results($query);
		?>
			<ul class="nav nav-tabs border-0" id="myTab" role="tablist">
				<?php
				foreach ($courses as $key => $course):
					$slugish = str_replace(' ', '-', $course->name);
					// Add the 'active' class to the first tab
					$active_class = ($key === 0) ? 'active' : '';
				?>
					<li class="nav-item" role="presentation">
						<button class="fw-bold text-base mt-4 shutup nav-link <?php echo $active_class; ?>" id="<?php echo $slugish; ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo $slugish; ?>" type="button" role="tab" aria-controls="<?php echo $slugish; ?>" aria-selected="true">
							<p class="w-[200px] truncate text-xs m-0"><?php echo $course->name; ?></p>
						</button>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php
		}

		add_shortcode('showCoursesNavTabs', 'wpd_showCoursesNavTabs');

		function wpd_showPanelCoursesNavTabs($program)
		{
			global $wpdb;
			$out = "";

			$programName = $program['program'];


			$program_query = "SELECT `id`, `name` AS program_name FROM `{$wpdb->prefix}nds_program_types` WHERE name = '$programName';";
			$program_name = $wpdb->get_row($program_query);

			$category_id = get_cat_ID($program_name->program_name);

			$category = get_category($category_id);
			$program_slug = $category->slug;

			$query = "SELECT 
		courses.id AS course_id,
		courses.name AS course_name,
		courses.accreditation_body,
		courses.code,
		courses.nqf_level,
		courses.description AS course_description,
		courses.duration,
		courses.credits,
		courses.price,
		courses.start_date,
		courses.end_date,
		courses.status,
		courses.max_students,
		program_types.id AS program_type_id,
		program_types.name AS program_type_name,
		program_types.description AS program_type_description,
		education_paths.id AS education_path_id,
		education_paths.name AS education_path_name,
		education_paths.description AS education_path_description
		FROM 
		{$wpdb->prefix}nds_courses AS courses
		JOIN 
		{$wpdb->prefix}nds_program_types AS program_types ON courses.program_id = program_types.id
		JOIN 
		{$wpdb->prefix}nds_education_paths AS education_paths ON program_types.path_id = education_paths.id
		WHERE 
		courses.program_id = $program_name->id;
	";
			$courses = $wpdb->get_results($query);

		?>
			<div class="tab-content" id="myTabContent">
				<?php
				foreach ($courses as $key => $course):
					$slugish = str_replace(' ', '-', $course->course_name);
					// Add the 'active show' class to the first tab panel
					$active_panel_class = ($key === 0) ? 'active show' : '';

					$query_possible_employment = "SELECT * FROM `{$wpdb->prefix}nds_possible_employment` WHERE `course_id` = $course->course_id;";
					$possible_employment = $wpdb->get_results($query_possible_employment);
				?>
					<div class="tab-pane fade <?php echo $active_panel_class; ?>" id="<?php echo $slugish; ?>" role="tabpanel" aria-labelledby="<?php echo $slugish; ?>-tab">
						<?php coursePanel($course, $program_name); ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php
		}

		add_shortcode('showPanelCoursesNavTabs', 'wpd_showPanelCoursesNavTabs');

		function wpd_breadcrumbs($atts)
		{
			// Set default attributes
			$atts = shortcode_atts(
				array(
					'data' => '[]', // Default is an empty array
				),
				$atts,
				'custom_breadcrumbs'
			);

			// Decode the JSON data passed to the shortcode
			$breadlinks = json_decode(urldecode($atts['data']), true);

			// Check if the decoded data is valid
			if (!is_array($breadlinks)) {
				return "Invalid breadcrumb data.";
			}

			// Start the breadcrumb container
			$output = '<div class="max-w-7xl mx-auto px-4 py-3"><nav aria-label="breadcrumb"><ol class="flex items-center justify-center text-sm text-gray-500">';

			// Loop through each breadcrumb and generate the list items
			$total_links = count($breadlinks);
			foreach ($breadlinks as $index => $link) {
				if ($index !== 0) {
					$output .= '<li class="mx-1 text-gray-400">/</li>'; // Adjusted spacing for separator
				}

				// If it's the last item, make it active
				if ($index === $total_links - 1) {
					$output .= '<li class="text-gray-900 font-medium">' . $link['name'] . '</li>';
				} else {
					$output .= '<li><a href="/' . $link['slug'] . '" class="text-blue-600 hover:underline m-0">' . $link['name'] . '</a></li>';
				}
			}

			// Close the breadcrumb container
			$output .= '</ol></nav></div>';

			return $output;
		}
		add_shortcode('crumbs', 'wpd_breadcrumbs');

		function wpd_breadcrumbs2($atts)
		{
			// Set default attributes
			$atts = shortcode_atts(
				array(
					'data' => '[]', // Default is an empty array
				),
				$atts,
				'custom_breadcrumbs'
			);

			// Decode the JSON data passed to the shortcode
			$breadlinks = json_decode(urldecode($atts['data']), true);

			// Check if the decoded data is valid
			if (!is_array($breadlinks)) {
				return "Invalid breadcrumb data.";
			}

			// Start the breadcrumb container
			$output = '<div class="max-w-7xl mx-auto px-4 py-3"><nav aria-label="breadcrumb"><ol class="flex items-center text-sm text-gray-500">';

			// Loop through each breadcrumb and generate the list items
			$total_links = count($breadlinks);
			foreach ($breadlinks as $index => $link) {
				if ($index !== 0) {
					$output .= '<li class="mx-1 text-white">/</li>'; // Adjusted spacing for separator
				}

				// If it's the last item, make it active
				if ($index === $total_links - 1) {
					$output .= '<li class="text-white font-medium"><p class="m-0 text-white">' . $link['name'] . '</p></li>';
				} else {
					$output .= '<li><a href="/' . $link['slug'] . '" class="shutup text-white font-medium hover:underline m-0"><p class="m-0 text-white">' . $link['name'] . '</p></a></li>';
				}
			}

			// Close the breadcrumb container
			$output .= '</ol></nav></div>';

			return $output;
		}
		add_shortcode('nds_breadcrumb2', 'wpd_breadcrumbs2');



		function wpd_Textmarque($atts)
		{
			$alignmenting =  ($atts['align'] === "center") ? "text-center" : "";
			$out = "";
			$out .= '<div class="head_and_desc scp ' . $alignmenting . '">';
			$out .= '<p class="text-base/7 font-semibold m-0">' . $atts['smtxt'] . '</p>';
			$out .= '<h2 class="text-2xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl" style="color: #ffc500;">' . $atts['bgtxt'] . '</h2>';
			$out .= ' </div>';

			return $out;
		}
		add_shortcode('marqueText', 'wpd_Textmarque');

		function folderName_image_gallery($slugName)
		{
			$folderName = $slugName['slug'];
			// Get the base URL for the images in the gallery folder
			$base_url = get_template_directory_uri() . '/img/gallery/' . sanitize_title($folderName);

			// Check if the folder exists
			$gallery_path = get_template_directory() . '/img/gallery/' . sanitize_title($folderName);
			if (is_dir($gallery_path)) {
				$images = glob($gallery_path . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE); // Get images with specific extensions

				if ($images) {
					// Limit to 6 images
					$images = array_slice($images, 0, 6);

					echo '<div class="grid grid-cols-3 gap-2">'; // Start grid container
					foreach ($images as $image) {
						// Output each image inside the grid
						$image_url = (str_replace($gallery_path, $base_url, $image));
						echo '<div class="gallery-item h-[80px] rounded overflow-hidden"><img src="' . $image_url . '" alt="' . basename($image) . '" class="gallery-image w-full h-auto" /></div>';
					}
					echo '</div>'; // Close grid container
				} else {
					echo 'No images found in this gallery.';
				}
			} else {
				echo 'Gallery folder not found.';
			}
		}

		add_shortcode('folderName_gallery', 'folderName_image_gallery');


		function student_register_form()
		{
			ob_start();
		?>
			<div class="flex items-center justify-center min-h-screen bg-gray-100">
				<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
					<h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Student Register</h2>

					<form method="POST" class="space-y-4">
						<div>
							<label class="block text-gray-700 font-medium">Full Name</label>
							<input type="text" name="name" required
								class="w-full p-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
						</div>
						<div>
							<label class="block text-gray-700 font-medium">Email</label>
							<input type="email" name="email" required
								class="w-full p-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
						</div>
						<div>
							<label class="block text-gray-700 font-medium">Phone</label>
							<input type="text" name="phone"
								class="w-full p-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
						</div>
						<div>
							<label class="block text-gray-700 font-medium">Course</label>
							<select name="course"
								class="w-full p-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
								<option value="Web Development">Web Development</option>
								<option value="Data Science">Data Science</option>
								<option value="Cyber Security">Cyber Security</option>
							</select>
						</div>
						<div>
							<label class="block text-gray-700 font-medium">Password</label>
							<input type="password" name="password" required
								class="w-full p-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
						</div>
						<button type="submit"
							class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition">
							Register
						</button>
					</form>
				</div>
			</div>
<?php
			return ob_get_clean();
		}
		add_shortcode('student_register', 'student_register_form');
	}
endif; // NDStheme_setup
add_action('after_setup_theme', 'NDStheme_setup');
