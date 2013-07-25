<?php
// AT Timeout

/**
 * Override or insert variables into the html template.
 */
function at_timeout_preprocess_html(&$vars) {
  global $theme_key;

  $theme_name = 'at_timeout';
  $path_to_theme = drupal_get_path('theme', $theme_name);

   // Add a class for the active color scheme
  if (module_exists('color')) {
    //$class = check_plain(get_color_scheme_name($theme_key));
    //$vars['classes_array'][] = 'color-scheme-' . drupal_html_class($class);
  }

  // Add class for the active theme
  $vars['classes_array'][] = drupal_html_class($theme_key);

  // Add theme settings classes
  $settings_array = array(
    'body_background',
    'header_layout',
    'menu_bullets',
    'corner_radius',
    'box_shadows',
  );
  foreach ($settings_array as $setting) {
    $vars['classes_array'][] = theme_get_setting($setting);
  }

  // Add Noggin module settings extra classes, not all designs can support header images
  //if (module_exists('noggin')) {
  //  if (variable_get('noggin:use_header', FALSE)) {
  //    $va = theme_get_setting('noggin_image_vertical_alignment');
  //    $ha = theme_get_setting('noggin_image_horizontal_alignment');
  //    $vars['classes_array'][] = 'ni-a-' . $va . $ha;
  //    $vars['classes_array'][] = theme_get_setting('noggin_image_repeat');
  //    $vars['classes_array'][] = theme_get_setting('noggin_image_width');
  //  }
  //}

  // Special case for PIE htc rounded corners, not all themes include this
  if (theme_get_setting('ie_corners') == 1) {
    drupal_add_css($path_to_theme . '/css/ie-htc.css', array(
      'group' => CSS_THEME,
      'browsers' => array(
        'IE' => 'lte IE 8',
        '!IE' => FALSE,
        ),
      'preprocess' => FALSE,
      )
    );
  }

}

/**
 * Override or insert variables into the html template.
 */
function at_timeout_process_html(&$vars) {
  if (module_exists('color')) {
    _color_html_alter($vars);
  }
}

/**
 * Override or insert variables into the page template.
 */
function at_timeout_process_page(&$vars) {
  if (module_exists('color')) {
    _color_page_alter($vars);
  }
}


/**
 * Override or insert variables into the node template.
 */
function at_timeout_preprocess_node(&$vars) {
  $vars['classes_array'][] = 'article';
	$vars['classes_array'][] = 'timeout-article';
}

/**
 * Override or insert variables into the block template.
 */
function at_timeout_preprocess_block(&$vars) {
  if ($vars['block']->module == 'superfish' || $vars['block']->module == 'nice_menu') {
    $vars['content_attributes_array']['class'][] = 'clearfix';
  }
  if (!$vars['block']->subject) {
    $vars['content_attributes_array']['class'][] = 'no-title';
  }
  if ($vars['block']->region == 'menu_bar_top') {
    $vars['title_attributes_array']['class'][] = 'element-invisible';
  }
}

/**
 * Theme feed icons.
 */
function at_timeout_feed_icon($variables) {
  $text = t('Subscribe to @feed-title', array('@feed-title' => $variables['title']));
  $path = path_to_theme() . '/feed-icon.png';
  if ($image = theme('image', array('path' => $path, 'alt' => $text))) {
    return l($image, $variables['url'], array('html' => TRUE, 'attributes' => array('class' => array('feed-icon'), 'title' => $text)));
  }
}
