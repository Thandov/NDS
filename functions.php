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

		if (!file_exists(get_template_directory() . '/class-wp-bootstrap-navwalker.php')) {
			// file does not exist... return an error.
			return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
		} else {
			// file exists... require it.
			require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
		}
		// Define the Custom Nav Walker class to modify dropdown with tooltips
		class Custom_Nav_Walker extends WP_Bootstrap_Navwalker
		{
			public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
			{
				parent::start_el($output, $item, $depth, $args, $id);

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

			$query = "SELECT * FROM `wp_nds_education_paths`";
			$out = '';

			$result = $wpdb->get_results($query);
			$paths = $result;

			$out .= '<div class="container pathContainer">';
			$out .= '<div class="row">';
			if (!empty($paths)) {
				foreach ($paths as $path) {
					$out .= '<div class="col-sm-12 col-md-3"><a href="/' . sanitize_title_with_dashes($path->name) . '" class="pathlink text-decoration-none">';
					$out .= '<div class="circles mx-auto"></div>';
					$out .= '<div class="text-center"><h6 id="' . $path->id . '" class="theSelectedPath mt-3 fw-bold">' . $path->name . '</h6></a></div>';
					$out .= '</div>';
				}
			}
			$out .= '</div>';
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

			$query = "SELECT * FROM `wp_nds_education_paths` WHERE LOWER(`name`) = LOWER('$slu');";
			$out = '';
			$result = $wpdb->get_row($query);

			$query2 = "SELECT * FROM `wp_nds_program_types` WHERE `path_id` = '$result->id';";
			$program_types = $wpdb->get_results($query2);

			foreach ($program_types as $key => $program_type) {
				echo progCard($out, $result->name, $program_type);
			}

			return $out;
		}
		add_shortcode('displaySelectedPathPrgramTypes', 'wpb_displaySelectedPathPrgramTypes');
	}


endif; // NDStheme_setup
add_action('after_setup_theme', 'NDStheme_setup');

function recp_card($recipe = null)
{
	ob_start();
	echo "dfsdfsdf";
	?>
	<div class="card border-0 mb-3 recipe_card" style="max-width: 350px;">
		<div class="g-0 d-flex align-items-center">
			<div class="">
				<img src="<?php bloginfo('template_directory'); ?>/img/recipes/<?php echo ($recipe) ? $recipe['img'] : "r1.png"; ?>" height="100" class="rounded" alt="recipe pic">
			</div>
			<div class="">
				<div class="card-body ms-3">
					<h5 class="card-title"><?php echo ($recipe) ? $recipe["recipe_name"] : "Recipe Name"; ?></h5>
					<p class="card-text m-0"><?php echo ($recipe) ? $recipe["recipe_desc"] : "Description"; ?></p>
					<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				</div>
			</div>
		</div>
	</div>
<?php
	return ob_get_clean(); // Capture and return the output
}

function display_recipes_blog()
{
	$recipe = "";
	echo recp_card($recipe);
}
add_shortcode('recipes_blog', 'display_recipes_blog');

function staff_card($staff_member = null)
{
	ob_start();
?>
	<div class="team_wrp text-center">
		<div class="circleprofile mx-auto">
			<img src="<?php bloginfo('template_directory'); ?>/img/staff/<?php echo ($staff_member) ? $staff_member["staff_img"] : "placeholder.png"; ?>" alt="<?php echo ($staff_member) ? $staff_member["staff_name"] : "Recipe Name"; ?>">
		</div>
		<h5 class="empname fw-bold m-0"><?php echo ($staff_member) ? $staff_member["staff_name"] : "Recipe Name"; ?></h5>
		<div class="jobtitle"><?php echo ($staff_member) ? $staff_member["Job_title"] : "Recipe Name"; ?></div>
	</div>
<?php
	return ob_get_clean(); // Capture and return the output
}

function display_staff()
{
	$staff_member = [
		'staff_img' => 'placeholder.png',
		'staff_name' => 'Lebo Lekotokoto',
		'Job_title' => 'Founder & Director',
	];

	echo staff_card($staff_member);
}
add_shortcode('show_staff_members', 'display_staff');

function showCourses($category_id)
{

	global $wpdb;
	$out = "";
	$category_id = $category_id['id'];
	$program_query = "SELECT `id`, `name` AS program_name FROM `wp_nds_program_types` WHERE category_id = $category_id;";

	$program_name = $wpdb->get_row($program_query);

	$category = get_category($category_id);
	$program_slug = $category->slug;

	$query = "SELECT * FROM `wp_nds_courses` WHERE program_id = $program_name->id;";
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
add_shortcode('wpd_showCourses', 'showCourses');

function coursePanel($course, $possible_employment)
{
?>
	<div class="container py-3">
		<div class="row">
			<div class="col-md-7 head_and_desc">
				<p class="text-base/7 font-semibold m-0 text-base/7 font-semibold" style="color: #2a344e;"><a href="/category/<?php echo  str_replace(' ', '-', $course->program_type_name); ?>" class="text-decoration-none text-reset"><?php echo ($course && $course->program_type_name) ? $course->program_type_name : "eeeeee"; ?></a></p>
				<h2 class="mt-2 text-2xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl" style="color: #ffc500;"><?php echo ($course && $course->course_name) ? $course->course_name : "eeeeee"; ?></h2>
			</div>
			<div class="col-md-5 d-flex align-items-center">
				<div class="d-flex align-items-center gap-3">
					<?php echo $course->accrediation_body; ?>
					<img class="s" src="<?php bloginfo('template_directory'); ?>/img/partners/Asset 0.png" style="height: 40px; width: 140px; " alt="./img/partners/Asset 0.png" />
					<img class="tttt" src="<?php bloginfo('template_directory'); ?>/img/partners/Asset 1.png" alt="./img/partners/Asset 1.png" />
					<img class="tttt" src="<?php bloginfo('template_directory'); ?>/img/partners/Asset 2.png" alt="./img/partners/Asset 2.png" />
					<img class="tttt" src="<?php bloginfo('template_directory'); ?>/img/partners/Asset 3.png" alt="./img/partners/Asset 3.png" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7">
				<div class="grid grid-cols-2 mb-4">
					<p class="text-base "><span class="text-sm/6 font-semibold text-gray-900">Enrollment date:</span> <span class="truncate text-xs/5 text-gray-500"><?php echo ($course && $course->duration) ? $course->duration : "eeeeee"; ?></span></p>
					<p class="text-base "><span class="text-sm/6 font-semibold text-gray-900">Duration:</span> <span class="truncate text-xs/5 text-gray-500"><?php echo ($course && $course->duration) ? $course->duration : "eeeeee"; ?></span></p>
					<p class="text-base "><span class="text-sm/6 font-semibold text-gray-900">program_id:</span> <span class="truncate text-xs/5 text-gray-500"><?php echo ($course && $course->course_name) ? $course->nqf_level : "eeeeee"; ?></span></p>
					<p class="text-base "><span class="text-sm/6 font-semibold text-gray-900">course_name:</span> <span class="truncate text-xs/5 text-gray-500"><?php echo (isset($course) && $course->course_name) ? "     " . $course->course_name : " " ?></span></p>
					<p class="text-base "><span class="text-sm/6 font-semibold text-gray-900">Accredited By:</span> <span class="truncate text-xs/5 text-gray-500"><?php echo (isset($course) && $course->accrediation_body) ? "     " . $course->accrediation_body : " " ?></span></p>
					<p class="text-base "><span class="text-sm/6 font-semibold text-gray-900">Credits:</span> <span class="truncate text-xs/5 text-gray-500"><?php echo (isset($course) && $course->credits) ? "     " . $course->credits : " " ?></span></p>
					<p class="text-base "><span class="text-sm/6 font-semibold text-gray-900">Price:</span> <span class="truncate text-xs/5 text-gray-500"><?php echo (isset($course) && $course->price) ? "     " . $course->price : " " ?></span></p>
				</div>
				<hr>
				<h5 class="fw-bold text-base mt-4">Course Description:</h5>
				<p><?php echo ($course && $course->course_description) ? $course->course_description : "eeeeee"; ?></p>
				<button class="nds_btn me-3">Apply Here</button>
			</div>
			<div class="col-md-5">
				<div class="boxing bg-white shadwo-sm rounded p-3 mb-4">
					<p class="fw-bold">Related <a href="/category/<?php echo  str_replace(' ', '-', $course->program_type_name); ?>" class="text-decoration-none text-reset"><?php echo ($course && $course->program_type_name) ? $course->program_type_name : "eeeeee"; ?></a> </p>
				</div>
				<div class="boxing bg-white shadow-sm rounded p-3">
					<p class="fw-bold">Course Potential careers</p>
					<ul role="list" class="divide-y divide-gray-100">
						<?php
						foreach ($possible_employment as $key => $pe):
						?>
							<li class="flex justify-between gap-x-6 px-2">
								<div class="flex min-w-0 gap-x-4">
									<div class="min-w-0 flex-auto">
										<p class="text-sm/6 font-semibold text-gray-900"><?php echo $pe->job_title; ?></p>
										<p class="truncate text-xs/5 text-gray-500"><?php echo $pe->salary_range; ?></p>
									</div>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>

				</div>
			</div>
		</div>
	</div>
<?php
}

function wpd_showCoursesNavTabs($category_id)
{
	global $wpdb;
	$out = "";
	$category_id = $category_id['id'];

	$program_query = "SELECT `id`, `name` AS program_name FROM `wp_nds_program_types` WHERE category_id = $category_id;";
	$program_name = $wpdb->get_row($program_query);

	$category = get_category($category_id);
	$program_slug = $category->slug;

	$query = "SELECT * FROM `wp_nds_courses` WHERE program_id = $program_name->id;";
	$courses = $wpdb->get_results($query);
?>
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<?php
		foreach ($courses as $key => $course):
			$slugish = str_replace(' ', '-', $course->name);
			// Add the 'active' class to the first tab
			$active_class = ($key === 0) ? 'active' : '';
		?>
			<li class="nav-item" role="presentation">
				<button class="fw-bold text-base mt-4 shutup nav-link <?php echo $active_class; ?>" id="<?php echo $slugish; ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo $slugish; ?>" type="button" role="tab" aria-controls="<?php echo $slugish; ?>" aria-selected="true"><?php echo $course->name; ?></button>
			</li>
		<?php endforeach; ?>
	</ul>
<?php
}

add_shortcode('showCoursesNavTabs', 'wpd_showCoursesNavTabs');

function wpd_showPanelCoursesNavTabs($category_id)
{
	global $wpdb;
	$out = "";
	$category_id = $category_id['id'];

	$program_query = "SELECT `id`, `name` AS program_name FROM `wp_nds_program_types` WHERE category_id = $category_id;";
	$program_name = $wpdb->get_row($program_query);

	$category = get_category($category_id);
	$program_slug = $category->slug;

	$query = "SELECT 
		courses.id AS course_id,
		courses.name AS course_name,
		courses.accrediation_body,
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
		wp_nds_courses AS courses
		JOIN 
		wp_nds_program_types AS program_types ON courses.program_id = program_types.id
		JOIN 
		wp_nds_education_paths AS education_paths ON program_types.path_id = education_paths.id
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

			$query_possible_employment = "SELECT * FROM `wp_nds_possible_employment` WHERE `course_id` = $course->course_id;";
			$possible_employment = $wpdb->get_results($query_possible_employment);
		?>
			<div class="tab-pane fade <?php echo $active_panel_class; ?>" id="<?php echo $slugish; ?>" role="tabpanel" aria-labelledby="<?php echo $slugish; ?>-tab">
				<?php coursePanel($course, $possible_employment); ?>
			</div>
		<?php endforeach; ?>
	</div>
<?php
}

add_shortcode('showPanelCoursesNavTabs', 'wpd_showPanelCoursesNavTabs');

//austin work with the below wpd_breadcrumbs function
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

	// Start the Bootstrap breadcrumb container
	$output = '<div class="container"><div class="row"><div class="col"></div><nav aria-label="breadcrumb"><ol class="breadcrumb">';

	// Loop through each breadcrumb and generate the list items
	$total_links = count($breadlinks);
	foreach ($breadlinks as $index => $link) {
		// If it's the last item, make it active
		if ($index === $total_links - 1) {
			$output .= '<li class="breadcrumb-item active" aria-current="page">' . $link['name'] . '</li>';
		} else {
			$output .= '<li class="breadcrumb-item"><a class="shutup" href="/' . $link['slug'] . '">' . $link['name'] . '</a></li>';
		}
	}

	// Close the breadcrumb container
	$output .= '</ol></nav></div></div></div>';

	return $output;
}
add_shortcode('crumbs', 'wpd_breadcrumbs');

function wpd_Textmarque($atts)
{
	$out = "";
	$out .= '<div class="head_and_desc scp">';
	$out .= '<p class="text-base/7 font-semibold">'. $atts['smtxt'].'</p>';
	$out .= '<h2 class="text-2xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl" style="color: #ffc500;">'. $atts['bgtxt'].'</h2>';
	$out .= ' </div>';

	return $out;
}
add_shortcode('marqueText', 'wpd_Textmarque');

function custom_image_gallery()
{
	$base_dir = get_template_directory() . '/img/gallery/';
	$base_url = get_template_directory_uri() . '/img/gallery/';

	$output = '<div class="">';

	$years = array('2022', '2023', '2024'); // Add/remove years as needed

	foreach ($years as $year) {
		$year_path = $base_dir . $year;
		$year_url = $base_url . $year;

		if (is_dir($year_path)) {
			$output .= "<h2 class='mt-4'>$year</h2>";
			$output .= '<div class="row g-3">'; // Bootstrap grid row

			$images = glob($year_path . '/*.{jpg,png,gif}', GLOB_BRACE);

			foreach ($images as $image) {
				$img_url = $year_url . '/' . basename($image);
				$output .= '
                    <div class="col-md-3 col-sm-6">
                        <div class="card shadow-sm overflow-hidden" style="height: 140px">
                            <a href="' . $img_url . '" data-lightbox="gallery">
                                <img src="' . $img_url . '" class="card-img-top img-fluid object-fit-cover" loading="lazy" alt="Gallery Image" style="height: 100%; width: 100%; object-fit: cover;">
                            </a>
                        </div>
                    </div>
                ';
			}

			$output .= '</div>'; // Close row
		}
	}

	$output .= '</div>'; // Close container
	return $output;
}
add_shortcode('custom_gallery', 'custom_image_gallery');
