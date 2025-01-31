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

		/**
		 * Enable support for the following post formats:
		 * aside, gallery, quote, image, and video
		 */
		add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));

		function load_stylesheets()
		{
			wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', [], 1, 'all');
			wp_enqueue_style('bootstrap');

			wp_register_style('style', get_stylesheet_directory_uri() . '/style.css', [], 1, 'all');
			wp_enqueue_style('style');

			wp_register_style('headcara', get_stylesheet_directory_uri() . '/css/headcara.css', [], 1, 'all');
			wp_enqueue_style('headcara');

			wp_register_style('owlcarousel', get_stylesheet_directory_uri() . '/css/owl.carousel.css', [], 1, 'all');
			wp_enqueue_style('owlcarousel');
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
	}
endif; // NDStheme_setup
add_action('after_setup_theme', 'NDStheme_setup');
