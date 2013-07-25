<?php
// AT Timeout
include_once(drupal_get_path('theme', 'adaptivetheme') . '/inc/google.web.fonts.inc');

// Override noggin selector
//if (module_exists('noggin')) {
//  $default_var = variable_get('noggin:header_selector', 'div#header');
//  if ($default_var == 'div#header') {
//    variable_set('noggin:header_selector', 'header#header');
//  }
//}

/**
 * Implements hook_form_system_theme_settings_alter().
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */
function at_timeout_form_system_theme_settings_alter(&$form, &$form_state) {

  // Include a hidden form field with the current release information
  $form['at-release'] = array(
    '#type' => 'hidden',
    '#default_value' => '7.x-3.x',
  );

  // Tell the submit function its safe to run the color inc generator
  // if running on AT Core 7.x-3.x
  $form['at-color'] = array(
    '#type' => 'hidden',
    '#default_value' => TRUE,
  );

  // EXTENSIONS
  $enable_extensions = isset($form_state['values']['enable_extensions']);
  if (($enable_extensions && $form_state['values']['enable_extensions'] == 1) || (!$enable_extensions && $form['at-settings']['extend']['enable_extensions']['#default_value'] == 1)) {

    // Header layout
    $form['at']['header'] = array(
      '#type' => 'fieldset',
      '#title' => t('Header layout'),
      '#description' => t('<h3>Header layout</h3><p>Change the position of the logo, site name and slogan. Note that his will automatically alter the header region layout also. If the branding elements are centered the header region will center below them, otherwise the header region will float in the opposite direction.</p>'),
    );
    $form['at']['header']['header_layout'] = array(
      '#type' => 'radios',
      '#title' => t('Branding position'),
      '#default_value' => theme_get_setting('header_layout'),
      '#options' => array(
        'hl-l'  => t('Left'),
        'hl-r'  => t('Right'),
        'hl-c' => t('Centered'),
      ),
    );
    
    // Rounded Corners
    $form['at']['corners'] = array(
      '#type' => 'fieldset',
      '#title' => t('Rounded corners'),
      '#description' => t('<h3>Rounded Corners</h3><p>Rounded corners are implimented using CSS and only work in modern compliant browsers. You can set the radius for both the main content and main menu tabs.</p>'),
    );
    $form['at']['corners']['corner_radius'] = array(
      '#type' => 'select',
      '#title' => t('Main content radius'),
      '#default_value' => theme_get_setting('corner_radius'),
      '#description' => t('Change the corner radius for the main content area.'),
      '#options' => array(
        'rc-0' => t('none'),
        'rc-4' => t('4px'),
        'rc-6' => t('6px'),
        'rc-8' => t('8px'),
        'rc-10' => t('10px'),
        'rc-12' => t('12px'),
      ),
    );
    $form['at']['corners']['htc'] = array(
      '#type' => 'fieldset',
      '#title' => t('IE corners'),
    );
    $form['at']['corners']['htc']['ie_corners'] = array(
      '#type' => 'checkbox',
      '#title' => t('Enable rounded corners for Internet Explorer 6, 7 and 8'),
      '#default_value' => theme_get_setting('ie_corners'),
      '#description' => t('<p>NOTE: For this to work you must download install the <a href="!link">CSS3PIE</a> library to <code>sites/all/libraries/PIE</code>.</p><p>The path should be like this: <code>sites/all/libraries/PIE/PIE.php</code></p><p>Usage is at your own risk. Elements such as text inside other JS items such as drop menus or slideshows may be degraded in Internet Explorer, and some padding or margin may be incorrect in IE6.</p>', array('!link' => 'http://css3pie.com/')),
    );
    
    // Page Styles
    $form['at']['pagestyles'] = array(
      '#type' => 'fieldset',
      '#title' => t('Box Shadows and Textures'),
      '#description' => t('<h3>Shadows and Textures</h3><p>The box shadows are implimented using CSS and only work in modern compliant browsers. The textures are small, semi-transparent images that tile to fill the entire background.</p>'),
    );
    $form['at']['pagestyles']['shadows'] = array(
      '#type' => 'fieldset',
      '#title' => t('Box Shadows'),
      '#description' => t('<h3>Box Shadows</h3><p>Box shadows (a drop shadow/glow effect) apply to the main content column and work only in CSS3 compliant browsers such as Firefox, Safari and Chrome.</p>'),
    );
    $form['at']['pagestyles']['shadows']['box_shadows'] = array(
      '#type' => 'radios',
      '#title' => t('<strong>Apply a box shadow to the main content column</strong>'),
      '#default_value' => theme_get_setting('box_shadows'),
      '#options' => array(
        'bs-n' => t('None'),
        'bs-l' => t('Box shadow - light'),
        'bs-d' => t('Box shadow - dark'),
      ),
    );
    $form['at']['pagestyles']['textures'] = array(
      '#type' => 'fieldset',
      '#title' => t('Textures'),
      '#description' => t('<h3>Body Textures</h3><p>This setting adds a texture over the main background color - the darker the background the more these stand out, on light backgrounds the effect is subtle.</p>'),
    );
    $form['at']['pagestyles']['textures']['body_background'] = array(
      '#type' => 'select',
      '#title' => t('Select texture'),
      '#default_value' => theme_get_setting('body_background'),
      '#options' => array(
        'bb-n'   => t('None'),
        'bb-b'   => t('Bubbles'),
        'bb-hs'  => t('Horizontal stripes'),
        'bb-dp'  => t('Diagonal pattern'),
        'bb-dll' => t('Diagonal lines - loose'),
        'bb-dlt' => t('Diagonal lines - tight'),
        'bb-sd'  => t('Small dots'),
        'bb-bd'  => t('Big dots'),
        'bb-wgp' => t('Woodgrain'),
      ),
    );
  
    // Menu Styles
    $form['at']['menu_styles'] = array(
      '#type' => 'fieldset',
      '#title' => t('Menu Bullets'),
      '#description' => t('<h3>Menu Bullets</h3><p>This setting allows you to customize the bullet images used on menus items. Bullet images only show on normal vertical block menus.</p>'),
    );
    $form['at']['menu_styles']['menu_bullets'] = array(
      '#type' => 'select',
      '#title' => t('Menu Bullets'),
      '#default_value' => theme_get_setting('menu_bullets'),
      '#options' => array(
        'mb-n' => t('None'),
        'mb-dd' => t('Drupal default'),
        'mb-ah' => t('Arrow head'),
        'mb-ad' => t('Double arrow head'),
        'mb-ca' => t('Circle arrow'),
        'mb-fa' => t('Fat arrow'),
        'mb-sa' => t('Skinny arrow'),
      ),
    );
  
    // Noggin
    //if (module_exists('noggin')) {
    //  // Rewrite the selector to suit Adaptivetheme and HTML5
    //  $form['noggin']['settings']['header_selector']['#default_value'] = variable_get('noggin:header_selector', 'header#header');
    //  // Extra fields for noggin settings
    //  $form['atnoggin'] = array(
    //    '#type' => 'fieldset',
    //    '#title' => t('Header Image Extra Styles'),
    //    '#description' => t('These settings extend the Noggin module Header Image Settings.'),
    //    '#collapsible' => FALSE,
    //    '#collapsed' => FALSE,
    //    '#states' => array(
    //      'invisible' => array(
    //        'input[name="use_header"]' => array('checked' => FALSE),
    //      ),
    //    ),
    //  );
    //  $form['atnoggin']['noggin_image_vertical_alignment'] = array(
    //    '#type' => 'radios',
    //    '#title' => t('Image alignment - vertical'),
    //    '#default_value' => theme_get_setting('noggin_image_vertical_alignment'),
    //    '#options' => array(
    //      't' => t('Top'),
    //      'c' => t('Middle'),
    //      'b' => t('Bottom'),
    //    ),
    //  );
    //  $form['atnoggin']['noggin_image_horizontal_alignment'] = array(
    //    '#type' => 'radios',
    //    '#title' => t('Image alignment - horizontal'),
    //    '#default_value' => theme_get_setting('noggin_image_horizontal_alignment'),
    //    '#options' => array(
    //      'l' => t('Left'),
    //      'r' => t('Right'),
    //      'c' => t('Center'),
    //    ),
    //  );
    //  $form['atnoggin']['noggin_image_repeat'] = array(
    //    '#type' => 'radios',
    //    '#title' => t('Image repeat'),
    //    '#default_value' => theme_get_setting('noggin_image_repeat'),
    //    '#options' => array(
    //      'ni-r-r' => t('Repeat'),
    //      'ni-r-rx' => t('Horizontal repeat'),
    //      'ni-r-ry' => t('Vertical repeat'),
    //      'ni-r-nr' => t('No repeat'),
    //    ),
    //  );
    //  $form['atnoggin']['noggin_image_width'] = array(
    //    '#type' => 'radios',
    //    '#title' => t('Image width'),
    //    '#default_value' => theme_get_setting('noggin_image_width'),
    //    '#options' => array(
    //      'ni-w-a' => t('Auto <span class="description">- use actual image dimensions</span>'),
    //      'ni-w-ftw' => t('100% width <span class="description"> - stretch to fit, this only works in modern CSS3 capable browsers</span>'),
    //    ),
    //  );
    //}
  }
}
