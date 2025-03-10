<?php
class Custom_Navwalker extends Walker_Nav_Menu
{

	// Start Level
	function start_lvl(&$output, $depth = 0, $args = null)
	{
		$output .= '<ul class="sub-menu">' . "\n";
	}

	// End Level
	function end_lvl(&$output, $depth = 0, $args = null)
	{
		$output .= "</ul>\n";
	}

	// Start Element
	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

		if (in_array('menu-item-has-children', $classes)) {
			$class_names .= ' has-dropdown';
		}

		$output .= '<li class="' . esc_attr($class_names) . '">';

		$atts = array();
		$atts['href'] = ! empty($item->url) ? $item->url : '#';

		$attributes = '';
		foreach ($atts as $attr => $value) {
			if (! empty($value)) {
				$attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
			}
		}

		$title = apply_filters('the_title', $item->title, $item->ID);
		$item_output = '<a' . $attributes . '>';
		$item_output .= $title;

		if (in_array('menu-item-has-children', $classes)) {
			$item_output .= ' <i class="las la-angle-down"></i>';
		}

		$item_output .= '</a>';

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}

	// End Element
	function end_el(&$output, $item, $depth = 0, $args = null)
	{
		$output .= "</li>\n";
	}
}
